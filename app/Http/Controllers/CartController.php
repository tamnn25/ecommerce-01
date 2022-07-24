<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendVerifyCode;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderVerify;
use Cart;
use App\Models\Price;
use App\Utils\CommonUtil;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function addCart(Request $request, $id)
    {
        //get data from SESSION
        $sessionAll = Session::all();

        $carts = empty($sessionAll['carts']) ? [] : $sessionAll['carts'];

        if (!empty($carts[$id])) {

            $carts[$id]['quantity'] += $request->quantity;

            session(['carts' => $carts]);
            // function nay ko cos gia tri.
        } else {
            // validate ID of table product ? available TRUE | FALSE
            // check quantity of products.quantity compare with order_detail.quantity
            $product = Product::findOrFail($id);

            #check have param $id ?
            $newProduct = [
                'id'        => $id,

                'name'      => $product->name,

                'quantity'  => $request->quantity,

                'price'     => $product->price,

                'image'     => $product->thumbnail,
            ];

            $carts[$id] = $newProduct;
            session(['carts' => $carts]);
        }
        return redirect()->route('cart.cart-info')
            ->with('success', 'Add Product to Cart successful!');
    }

    public function CartInfo(Request $request)
    {
        $data = [];
        //get data from SESSION
        $sessionAll = Session::all();
        $carts = empty($sessionAll['carts']) ? [] : $sessionAll['carts'];
        $total = $this->calculateTotalCart($carts);
        $data['carts'] = $carts;
        $data['total'] = $total;

        session(['step_by_step' => 1]);

        return view('carts.cart_info', $data);
    }

    public function calculateTotalCart($carts)  // tổng tiền  shop c
    {
        $total = 0;
        if (!is_null($carts)) {
            foreach ($carts as $key => $cart) {
                $total += $cart['quantity'] * $cart['price'];
            }
        }
        return $total;
    }

    public function checkout(Request $request)
    {
        $data = [];

        //get cart info from SESSION
        $carts  = empty(Session::get('carts')) ? [] : Session::get('carts');
        $total = $this->calculateTotalCart($carts);
        $data['carts'] = $carts;
        $data['total'] = $total;

        return view('carts.checkout', $data);
    }

    public function Complete(Request $request)
    {
        // get cart info
        $carts = Session::all();

        $carts = Session::get('carts');
        // validate quanity of product -> Available (in-stock | out-stock)
        // create data to save into table orders
        $dataOrder = [
            'user_id'   => Auth()->id(),
            'status'    => Order::STATUS[1],
        ];
        DB::beginTransaction();
        try {
            // save data into table orders
            $order      = Order::create($dataOrder);
            $orderId    = $order->id;

            if (!empty($carts)) {
                foreach ($carts as $cart) {
                    $productId  =   $cart['id'];
                    $quantity   =   $cart['quantity'];
                    $price      =   $cart['price'];
                    $price = $cart['price'];

                    $orderDetail = [
                        'product_id' => $productId,
                        'order_id' => $orderId,
                        'price' => $price,
                        'quantity' => $quantity,
                        'total' => $price * $quantity,
                    ];

                    // save data into table order_details
                    OrderDetail::create($orderDetail);
                    $product = Product::whereId($productId)->first();
                    //    --------------------------------
                    $product = Product::whereId($productId)->first();
                    $product->update(['quantity' => $product->quantity - $quantity]);
                    // khi order thanh công sẽ trừ số lượng  product
                }
            }
            DB::commit();
            // remove session carts, step_by_step
            $request->session()->forget(['carts', 'step_by_step']);

            return redirect()->route('order_user.list_order')->with('success', 'Your Order was successful!');
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function sendVerifyCode(Request $request)
    {
        // send code to verify Order
        // check exist send code ?
        $userId = Auth::id();

        $email = Auth::user()->email;

        $currentDate = date('Y-m-d H:i:s');

        $dateSubtract15Minutes = date('Y-m-d H:i:s', (time() - 60 * 1)); // current - 15 minutes

        Log::info('dateSubtract15Minutes');

        Log::info($dateSubtract15Minutes);
        $orderVerify = OrderVerify::where('user_id', $userId)
            ->whereBetween('expire_date', [$dateSubtract15Minutes, $currentDate])
            ->where('status', orderVerify::STATUS[0])
            ->first();

        if (!is_null($orderVerify)) { // already sent code and this code is available
            return response()->json(['message' => 'Please check email to get code after 15 minutes.']);
        } else {
            $dataSave = [
                'user_id'        => $userId,

                'status'         => OrderVerify::STATUS[0], // default 0

                'code'           => CommonUtil::generateUUID(),

                'expire_date'    => $currentDate,
            ];
            DB::beginTransaction();
            try {
                OrderVerify::create($dataSave);
                $carts = Session::get('carts');
                // commit insert data into table

                // send code to email
                Mail::to($email)->send(new SendVerifyCode($dataSave, $carts)); //dùng cái này để send nè giờ   truyền dữ liệu bên  checkout qua email

                DB::commit();

                return response()->json(['message' => 'Please check email.']);
            } catch (\Exception $exception) {
                info($exception);
                DB::rollBack();

                return response()->json(['message' => $exception->getMessage()]);
            }
        }
    }

    public function confirmVerifyCode(Request $request)
    {
        $code = $request->code;
        $userId = Auth::id();

        $orderVerify = OrderVerify::where('code', $code)
            ->where('user_id', $userId)
            ->where('status', OrderVerify::STATUS[0])
            ->first();
        //  validate code

        DB::beginTransaction();
        try {
            $orderVerify->status = OrderVerify::STATUS[1];
            $orderVerify->save();
            DB::commit();
            // add step by step to SESSION
            session(['step_by_step' => 2]);

            return response()->json(['message' => 'Confirmed']);
        } catch (\Exception $exception) {
            DB::rollBack();

            return response()->json(['message' => $exception->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $sessionAll = Session::all();

        $carts = empty($sessionAll['carts']) ? [] : $sessionAll['carts'];
        if (!empty($carts[$id])) {

            unset($carts[$id]);

            session()->put('carts', $carts);

            return redirect()->back()->with(['message' => 'success']);
        }

        return redirect()->back()->with(['message' => 'failed']);
    }
}
