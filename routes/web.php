<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;

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

Route::get('/',[HomeController::class,'index']);
Route::get('/nhomsanpham',[HomeController::class,'productgroup']);
Route::get('/sanpham',[HomeController::class,'product']);
Route::prefix('admin')->name('admin.')->group(function(){

    Route::get('/',[AdminController::class,'index']);

    Route::get('/login',[AdminController::class,'login']);

    Route::get('/customer',[AdminController::class,'customer_manager'])->name('customer_manager');

    Route::prefix('product')->name('product.')->group(function(){

        Route::get('/',[ProductController::class,'show'])->name('show');

        Route::get('/add',[ProductController::class,'add'])->name('add');

        Route::post('/add',[ProductController::class,'postAdd']);

        Route::get('/edit',[ProductController::class,'add'])->name('edit');

        Route::post('/edit',[ProductController::class,'postEdit']);

        Route::delete('/delete',[ProductController::class,'delete'])->name('delete');
    });
});
