<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\ImagesController;

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

    Route::get('/',[AdminController::class,'index'])->name('home');

    Route::get('/login',[AdminController::class,'login']);

    // Route::get('/customer',[AdminController::class,'customer_manager'])->name('customer_manager');

    Route::prefix('product')->name('product.')->group(function(){

        Route::get('/',[ProductController::class,'show'])->name('show');

        Route::get('/add',[ProductController::class,'add'])->name('add');

        Route::post('/add',[ProductController::class,'postAdd'])->name('postAdd');

        Route::get('/edit/{id}',[ProductController::class,'edit'])->name('edit');

        Route::post('/update',[ProductController::class,'postEdit'])->name('postEdit');

        Route::get('/delete/{id}',[ProductController::class,'delete'])->name('delete');

        Route::get('/group',[ProductController::class,'addGroup'])->name('addGroup');

        Route::post('/group',[ProductController::class,'postAddGroup'])->name('postAddGroup');

        Route::get('group/delete/{id}',[ProductController::class,'deleteGroup'])->name('deleteGroup');

        Route::post('/upload',[ImagesController::class,'postUploadImage'])->name('uploadImage');

    });
    Route::prefix('promo')->name('promo.')->group(function(){

        Route::get('/',[PromoController::class,'index'])->name('show');
    });
});
