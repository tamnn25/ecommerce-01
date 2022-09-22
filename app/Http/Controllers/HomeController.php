<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Promotion;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::get();
        $category = Category::get();
        $productLimit = Product::orderBy('created_at', 'desc')->limit(12)->get();

        return view('home.homepage')->with([
            'products'       => $products,
            'categories'     => $category,
            'productLimit' => $productLimit
        ]);
    }

    public function contact()
    {
        return view('home.contactpage');
    }

    public function categories($id) {
        $category = Category::with('product')->find($id); 

        return view('home.homepage')->with('products', $category);
    }

    public function shop(Request $request, $id)
    {
        $money = !empty($request->money) ? $request->money : '';
        $categories = Category::all();

        if ($id == 0) {
            if ($money) {
                if ($money == 1) {
                    $products = Product::whereBetween('price', [0, 100000])->paginate(9);
                } elseif ($money == 2) {
                    $products = Product::whereBetween('price', [100000, 500000])->paginate(9);
                } else {
                    $products = Product::whereBetween('price', [500000, 1000000])->paginate(9);
                }
            } else {
                $products = Product::paginate(9);
            }
        } else {
            if ($money) {
                if ($money == 1) {
                    $products = Product::where('category_id', $id)->whereBetween('price', [0, 100])->paginate(9);
                } elseif ($money == 2) {
                    $products = Product::where('category_id', $id)->whereBetween('price', [100, 500])->paginate(9);
                } else {
                    $products = Product::where('category_id', $id)->whereBetween('price', [500, 1000])->paginate(9);
                }
            } else {
                $products = Product::where('category_id', $id)->paginate(9);
            }
        }

        // $products   = ($id == 0) ? Product::paginate(9) : Product::where('category_id', $request->id)->paginate(9);
        //  nếu  sản phẩm   tìm kiếm  ko có sản phẩm  thì show ra ko có và ngược lại
        // dd(Product::paginate(9)->orderBy('name'));
        // ------------------------------------------------
        $productLimit   = Product::orderBy('created_at', 'desc')->limit(12)
            ->get();
        $lasterProduct  = $this->formatDataProduct($productLimit);
        // show thoong tin sản phẩm mới được thêm vào

        return view('home.shop')->with([
            'lasterProduct' => $lasterProduct,
            'products'      => $products,
            'categories'    => $categories,
        ]);
    }

    public function formatDataProduct($products)
    {
        // hàm for  chạy id sản phẩm mới thêm id từ 1 ->3  và lắp lại 

        $productFormat = [];
        for ($i = 1; $i <= 3; $i++) {
            foreach ($products as $key => $value) {
                if ($key + 1 <= $i * 3 && $key >= ($i - 1) * 3) {
                    $productFormat[$i][$key] = $value;
                }
            }
        }
        return $productFormat;
    }

    public function formatcommentProduct($comment)
    {
        // hàm for  chạy  sản phẩm dc đánh giá cao nhất id từ 1 ->3  và lắp lại 

        $commentFormat = [];
        for ($i = 1; $i <= 3; $i++) {
            foreach ($comment as $key => $value) {
                if ($key + 1 <= $i * 3 && $key >= ($i - 1) * 3) {
                    $commentFormat[$i][$key] = $value;
                }
            }
        }
        return $commentFormat;
    }



    /**
     * formatDataProduct
     *
     *  @param Product $products
     *
     * @return mixed
     */
}
