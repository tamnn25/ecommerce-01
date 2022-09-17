<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Product;
use App\Models\Message;
use App\Models\Order;
use App\Models\Comment;
use App\Models\User;

class DashboardController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $CountCategory = Category::count();
        $CountProduct = Product::count();
        $CountOrder = Order::count();
        $CountUser = User::count();
        $CountAdmin = Admin::count();
        $countCustomer = User::count();

        return view('admin.dashboard')->with([
            'countCategory' => $CountCategory,
            'countProduct' => $CountProduct,
            'countOrder' => $CountOrder,
            'countUser' => $CountUser,
            'countAdmin' => $CountAdmin,
            'countCustomer' => $countCustomer
        ]);
    }
}
