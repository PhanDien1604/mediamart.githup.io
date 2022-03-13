<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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
Route::get('/admin',[AdminController::class,'index']);
Route::get('/admin/product',[AdminController::class,'product_manager']);
Route::get('/admin/product/addproduct',[AdminController::class,'addproduct']);
Route::get('/admin/customer',[AdminController::class,'customer_manager']);
