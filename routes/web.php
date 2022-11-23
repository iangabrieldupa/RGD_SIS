<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    //Category routes
    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        Route::get('/category', 'index');
        Route::get('/category/create', 'create');
        Route::post('/category', 'store');
        Route::get('/category/{category}/edit', 'edit');
        Route::put('/category/{category}', 'update');
    });

    //Unit routes
    Route::controller(App\Http\Controllers\Admin\UnitController::class)->group(function () {
        Route::get('/unit', 'index');
        Route::get('/unit/create', 'create');
        Route::post('/unit', 'store');
        Route::get('/unit/{unit}/edit', 'edit');
        Route::put('/unit/{unit}', 'update');
    });

    //Brand routes
    Route::controller(App\Http\Controllers\Admin\BrandController::class)->group(function () {
        Route::get('/brand', 'index');
        Route::get('/brand/create', 'create');
        Route::post('/brand', 'store');
        Route::get('/brand/{brand}/edit', 'edit');
        Route::put('/brand/{brand}', 'update');
    });

    //Supplier Routes
    Route::controller(App\Http\Controllers\Admin\SupplierController::class)->group(function () {
        Route::get('/supplier', 'index');
        Route::get('/supplier/create', 'create');
        Route::post('/supplier', 'store');
        Route::get('/supplier/{supplier}/edit', 'edit');
        Route::put('/supplier/{supplier}', 'update');
    });

    //Product Routes
    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
        Route::get('/product', 'index');
        Route::get('/product/create', 'create');
        Route::post('/product', 'store');
        Route::get('/product/{product}/edit', 'edit');
        Route::put('/product/{product}', 'update');
    });

    //Order Routes
    Route::controller(App\Http\Controllers\Admin\OrderController::class)->group(function () {
        Route::get('/order', 'index');
        Route::get('/order/create', 'create');
        Route::post('/order', 'store');
        Route::get('/order/{order}/edit', 'edit');
        Route::put('/order/{order}', 'update');
    });
});

