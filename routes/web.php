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

    //Attribute routes
    Route::controller(App\Http\Controllers\Admin\AttributeController::class)->group(function () {
        Route::get('/attribute', 'index');
        Route::get('/attribute/create', 'create');
        Route::post('/attribute', 'store');
        Route::get('/attribute/{attribute}/edit', 'edit');
        Route::put('/attribute/{attribute}', 'update');
    });

});

