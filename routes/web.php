<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\OrderUserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PasswordController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('/', [HomeController::class, 'index'])->name('index');

// Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::group(['prefix' => 'home', 'as' => 'home.'], function () {
    Route::get('shop/{id}', [HomeController::class, 'shop'])->name('shop');
    Route::get('contact', [HomeController::class, 'contact'])->name('contact');
});

Route::group(['prefix' => 'comment', 'as' => 'comment.'], function () {
    Route::post('add-comment', [CommentController::class, 'store'])->name('add-comment')->middleware(['auth']);
});

Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
    Route::get('/detail/{id}', [ProductController::class, 'detail'])->name('detail');
    Route::post('/review', [ProductController::class, 'review'])->name('review');
    Route::get('/delete-comment/{id}', [ProductController::class, 'deleteComment'])->name('delete-comment');
    Route::get('/search', [ProductController::class, 'searchProduct'])->name('search');
    Route::get('/category/{id}', [ProductController::class, 'getProductByCategory'])->name('category');
});

Route::group(['prefix' => 'cart', 'as' => 'cart.'], function () {
    Route::get('/', [CartController::class, 'CartInfo'])->name('cart-info');
    Route::post('cart/{id}', [CartController::class, 'addCart'])->name('add-cart');
    Route::get('checkout', [CartController::class, 'checkout'])->middleware(['auth'])->name('checkout');
    Route::post('checkout-complete', [CartController::class, 'Complete'])->name('checkout-complete');
    Route::post('send-verify-code', [CartController::class, 'sendVerifyCode'])->middleware(['auth'])->name('send-verify-code');
    Route::post('confirm-verify-code', [CartController::class, 'confirmVerifyCode'])->middleware(['auth'])->name('confirm-verify-code');
    Route::post('/delete', [CartController::class, 'destroy'])->name('destroy');
});

Route::group(['prefix'  =>  'order_user', 'middleware' => 'auth',  'as'    =>  'order_user.'], function () {
    route::get('/', [OrderUserController::class, 'order_user'])->name('list_order');
    route::get('/detail/{id}', [OrderUserController::class, 'detailOrder'])->name('detail_order');
    Route::get('/profile', [OrderUserController::class, 'profile'])->name('profile');
    Route::get('/edit', [OrderUserController::class, 'edit'])->name('edit');
});

Route::group(['prefix' => 'password', 'as' => 'password.'], function () {

    Route::get('/', [PasswordController::class, 'change'])->name('password');
    route::get('/detail/{id}', [PasswordController::class, 'detailpassword'])->name('detailchange');
    Route::put('/update/{id}', [PasswordController::class, 'update'])->name('store');
});
