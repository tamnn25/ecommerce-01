<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\MyController;
use App\Http\Controllers\Admin\UserExcelController;

Route::group(['middleware' => ['check_login_admin'], 'as' => 'admin.'], function () {

    Route::get('login', [AuthController::class, 'getLogin'])->name('login');
    Route::post('login', [AuthController::class, 'postLogin'])->name('login.handle');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    // Admin Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/roleadmin', [DashboardController::class, 'role'])->name('roleadmin');

    // middleware check_role_sales: nếu role!= 1 && role != 2 thì không đc vào
    Route::middleware(['check_role_editer'])->group(function () {
        Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
            Route::get('/list', [CategoryController::class, 'index'])->name('index');
            Route::get('/create', [CategoryController::class, 'create'])->name('create');
            Route::post('/store', [CategoryController::class, 'store'])->name('store');
            Route::get('/show/{id}', [CategoryController::class, 'show'])->name('show');
            Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [CategoryController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [CategoryController::class, 'destroy'])->name('destroy');
        });

        Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
            Route::get('/list', [ProductController::class, 'index'])->name('index');
            Route::get('/create', [ProductController::class, 'create'])->name('create');
            Route::post('/store', [ProductController::class, 'store'])->name('store');
            Route::get('/show/{id}', [ProductController::class, 'show'])->name('show');
            Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [ProductController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [ProductController::class, 'destroy'])->name('destroy');
        });

        // Route::group(['prefix'  =>  'comment', 'as' => 'comment.'], function () {
        //     Route::get('/', [ConmmentController::class, 'index'])->name('comment');
        //     Route::delete('/delete/{id}', [ConmmentController::class, 'destroy'])->name('destroy');
        // });
        Route::group(['prefix' => 'order', 'as' => 'order.'], function () {
            Route::delete('/delete/{id}', [OrderController::class, 'destroy'])->name('destroy');
        });
    });

    Route::group(['prefix' => 'order', 'as' => 'order.'], function () {
        Route::get('/list', [OrderController::class, 'index'])->name('index');
        Route::get('/show/{id}', [OrderController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [OrderController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [OrderController::class, 'update'])->name('update');
        // Route::delete('/delete/{id}', [OrderController::class, 'destroy'])->name('destroy');
        Route::put('/update-status/{id}', [OrderController::class, 'updateStatus'])->name('update-status');
    });
    // middleware admin: nếu role khác 1 thì không đc vào
    Route::middleware(['check_role_admin'])->group(function () {
        Route::group(['prefix' => 'customer', 'as' => 'customer.'], function () {
            Route::get('/list', [CustomerController::class, 'index'])->name('index');

            // Route::get('/create', [CustomerController::class, 'create'])->name('create');
            // Route::post('/store', [CustomerController::class, 'store'])->name('store');
            // Route::get('/search', [CustomerController::class, 'search'])->name('search');

            // Route::get('/show/{id}', [CustomerController::class, 'show'])->name('show');
            // Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('edit');
            // Route::put('/update/{id}', [CustomerController::class, 'update'])->name('update');

            Route::delete('/delete/{id}', [CustomerController::class, 'destroy'])->name('destroy');
        });

        Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
            Route::get('/list', [UserController::class, 'index'])->name('index');
            Route::get('/create', [UserController::class, 'create'])->name('create');
            Route::post('/store', [UserController::class, 'store'])->name('store');
            Route::get('/show/{id}', [UserController::class, 'show'])->name('show');
            Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [UserController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('destroy');
        });

        Route::group(['prefix' => 'comment', 'as' => 'comment.'], function () {
            Route::get('/list', [CommentController::class, 'index'])->name('index');
            Route::get('/create', [CommentController::class, 'create'])->name('create');
            Route::post('/store', [CommentController::class, 'store'])->name('store');
            Route::get('/show/{id}', [CommentController::class, 'show'])->name('show');
            Route::get('/edit/{id}', [CommentController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [CommentController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [CommentController::class, 'destroy'])->name('destroy');
        });

        Route::group(['prefix' => 'report', 'as' => 'report.'], function () {
            Route::get('/orders', [OrderController::class, 'reportOrder'])->name('order');
        });

        // excel Admin
        Route::get('/importExportView', [MyController::class, 'importExportView'])->name('importExportView');
        Route::get('/export', [MyController::class, 'export'])->name('export');
        Route::post('/import', [MyController::class, 'import'])->name('import');

        //excel user
        Route::get('CustomerExcel', [UserExcelController::class, 'importExportView'])->name('customerExcel');
        Route::get('ExportCustomer', [UserExcelController::class, 'ExportCustomer'])->name('ExportCustomer');
        Route::post('ImportCustomer', [UserExcelController::class, 'ImportCustomer'])->name('ImportCustomer');
    });
});
