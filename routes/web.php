<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\GroupProductController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\WareHouseController;


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

        Route::get('edit/image/delete/{id}',[ProductController::class,'deleteImage'])->name('deleteImage');

        Route::post('/update',[ProductController::class,'postEdit'])->name('postEdit');

        Route::get('/delete/{id}',[ProductController::class,'delete'])->name('delete');

        Route::prefix('group')->name('group.')->group(function(){

            Route::get('/',[GroupProductController::class,'addGroup'])->name('addGroup');

            Route::post('/add',[GroupProductController::class,'postAddGroup'])->name('postAddGroup');

            Route::get('/edit/{id}',[GroupProductController::class,'editGroup'])->name('editGroup');

            Route::post('/update',[GroupProductController::class,'postEditGroup'])->name('postEditGroup');

            Route::get('/delete/{id}',[GroupProductController::class,'deleteGroup'])->name('deleteGroup');

            Route::get('/addProductBelongGroup/{id}',[GroupProductController::class,'productNoBelongGroup'])->name('groupNoBelongProduct');

            Route::get('/addProductBelongGroup/{id}/{group_id}',[GroupProductController::class,'addProductBelongGroup'])->name('addGroupBelongProduct');

            Route::get('/deleteProductBelongGroup/{id}/{group_id}',[GroupProductController::class,'deleteProductBelongGroup'])->name('deleteProductBelongGroup');

        });

    });
    Route::prefix('promo')->name('promo.')->group(function(){

        Route::get('/',[PromoController::class,'index'])->name('show');

        Route::get('show/{promo_sub}',[PromoController::class,'showSub'])->name('showSub');

        Route::get('/add',[PromoController::class,'add'])->name('add');

        Route::post('/add',[PromoController::class,'postAdd'])->name('postAdd');

        Route::get('/edit/{id}',[PromoController::class,'editPromo'])->name('edit');

        Route::post('/update',[PromoController::class,'updatePromo'])->name('update');

        Route::get('/delete/{id}',[PromoController::class,'deletePromo'])->name('delete');

        Route::get('/addProductBelongPromo/{id}',[PromoController::class,'productNoBelongPromo'])->name('productNoBelongPromo');

        Route::get('/addProductBelongPromo/{id}/{promo_id}',[PromoController::class,'addProductBelongPromo'])->name('addProductBelongPromo');

        Route::get('/deleteProductBelongPromo/{id}/{promo_id}',[PromoController::class,'deleteProductBelongPromo'])->name('deleteProductBelongPromo');

    });

    Route::prefix('website')->name('website.')->group(function(){

        Route::get('/',[WebsiteController::class,'index'])->name('index');

        Route::post('/category',[WebsiteController::class,'postAddCategory'])->name('postAddCategory');

        Route::post('/category/promo',[WebsiteController::class,'postCategoryPromo'])->name('postCategoryPromo');

        Route::get('/delete/{id}',[WebsiteController::class,'deleteCategory'])->name('deleteCategory');

        Route::get('/image',[WebsiteController::class,'imageWeb'])->name('imageWeb');

        Route::post('/image',[WebsiteController::class,'postImageWeb'])->name('postImageWeb');

        Route::get('/image/delete/{id}',[WebsiteController::class,'deleteImageWeb'])->name('deleteImageWeb');
    });

    Route::prefix('warehouse')->name('warehouse.')->group(function(){

        Route::get('/',[WareHouseController::class,'index'])->name('index');

        Route::post('/',[WareHouseController::class,'postAddWareHouse'])->name('postAddWareHouse');

        Route::get('/edit/{id}',[WareHouseController::class,'editWareHouse'])->name('editWareHouse');

        Route::post('/edit/{id}',[WareHouseController::class,'postEditWareHouse'])->name('postEditWareHouse');

        Route::get('/delete/{id}',[WareHouseController::class,'deleteWareHouse'])->name('deleteWareHouse');

        Route::get('/addProductBelongWarehouse/{id}',[WareHouseController::class,'productNoBelongWarehouse'])->name('productNoBelongWarehouse');

        Route::post('/addProductBelongWarehouse/{id}/{product_id}',[WareHouseController::class,'addProductBelongWarehouse'])->name('addProductBelongWarehouse');

        Route::post('/addAmountProductWarehouse/{id}/{product_id}',[WareHouseController::class,'postAddAmountProductWarehouse'])->name('addAmountProductWarehouse');

        Route::get('/deleteProductBelongWarehouse/{id}/{product_id}',[WareHouseController::class,'deleteProductBelongWarehouse'])->name('deleteProductBelongWarehouse');

    });
});
