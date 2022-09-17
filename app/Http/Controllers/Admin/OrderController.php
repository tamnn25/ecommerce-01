<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    private const RECORD_LIMIT = 10;

    /**
     * Define Variable
     */
    private $order;

    /**
     * Constructor
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $orders = Product::all();
        $orders = Order::with('orderDetail')
            ->with('user')
            ->with('product')
            ->orderBy('id', 'desc')
            ->paginate(8);

        if (!empty($request->full_name)) {
            $orders = Order::where('user_id', 'like', '%' . $request->full_name . '%')
                ->orderBy('id', 'desc')
                ->paginate(8);
        }
        if (!empty($request->date)) {
            $orders = Order::where('created_at', 'like', '%' . $request->date . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(8);
        }
        if (!empty($request->status)) {
            $orders = Order::whereIn('status', $request->status)
                ->orderBy('id', 'desc')
                ->paginate(8);
        }


        $data['orders'] = $orders;
        return view('admin.orders.index', $data);
    }
    public function show($id)
    {
        $data = [];
        $order = Order::whereId($id)
            ->with('orderDetail')
            ->first();
        //dd($order);
        $data['order'] = $order;

        return view('admin.orders.detail', $data);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = [];
        $order = Order::find($id);

        $data['order'] = $order;

        return view('admin.orders.parts.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        DB::beginTransaction();
        try {
            $order = Order::find($id);
            $order->status = $request->status;
            $order->save();
            DB::commit();
            return redirect()->route('admin.order.index')->with('success', 'update status successfully');
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        DB::beginTransaction();
        try {
            $orders = Order::with('orderDetail')
                ->find($id);

            //delete orderDetail
            foreach ($orders->orderDetail as $orderDetail) {
                $orderDetail->delete();
            }

            $orders->delete();

            DB::commit();

            return redirect()->route('admin.order.index')->with('sucess', 'delete Sucessful.');
        } catch (Exception $ex) {
            DB::rollback();

            echo $ex->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStatus($id, Request $request)
    {
        // Get Order Info
        $order = $this->order->findOrFail($id);

        try {
            // Set value for field STATUS
            $order->status = $request->status;

            // Save data
            $order->save();

            return response()->json([
                'message' => trans('message.update_order_status_success'),
                'status_name' => $order->status_name,
            ], 200);
        } catch (Exception $ex) {
            return response()->json([
                'error_message' => $ex->getMessage(),
            ], 500);
        }
    }

    public function reportOrder(Request $request)
    {
        $order = Order::where('status', 4)->with('orderDetail')->get();
        $sum = 0;

        if (!empty($request->start_date) && !empty($request->end_date)) {
            $order = Order::whereDate('created_at', '>=', $request->start_date)
                ->whereDate('created_at', '<=', $request->end_date)
                ->where('status', 4)->with('orderDetail')->get();
            $sum = 0;
        }
        foreach ($order as $key => $value) {
            $arrDetail = $value->orderDetail->toArray();
            $sumTotal = array_sum(array_column($arrDetail, 'total'));

            $sum += $sumTotal;
        }

        $data['total'] = $sum;
        $data['order'] = $order;

        return view('admin.report.reportOrder', $data);
    }
}
