<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\GroupProductController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\WareHouseController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;

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


Route::prefix('/admin')->name('admin.')->group(function(){

    Route::get('/',[AdminController::class,'index'])->name('home');

    Route::get('/login',[UserController::class,'login'])->name('login');

    Route::post('/checkLogin',[UserController::class,'checkLogin'])->name('checkLogin');

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

        Route::post('/category/logo',[WebsiteController::class,'postAddLogoCategory'])->name('postAddLogoCategory');

        Route::post('/category/sub',[WebsiteController::class,'postAddCategorySub'])->name('postAddCategorySub');

        Route::post('/category/promo',[WebsiteController::class,'postCategoryPromo'])->name('postCategoryPromo');

        Route::get('/delete/{id}',[WebsiteController::class,'deleteCategory'])->name('deleteCategory');

        Route::get('/delete/logoCategory/{id}',[WebsiteController::class,'deleteLogoCategory'])->name('deleteLogoCategory');

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

        // import

        Route::get('edit/{id}/import',[WareHouseController::class,'importWarehouse'])->name('importWarehouse');

        Route::post('edit/{id}/import',[WareHouseController::class,'postImportWarehouse'])->name('postImportWarehouse');

        Route::get('/edit/{id}/import/product',[WareHouseController::class,'importProductWarehouse'])->name('importProductWarehouse');

        Route::post('/edit/{id}/import/product-new',[WareHouseController::class,'postImportProductNewWarehouse'])->name('postImportProductNewWarehouse');

        Route::post('/edit/{id}/import/product-old/{warehouse_product_id}',[WareHouseController::class,'postImportProductOldWarehouse'])->name('postImportProductOldWarehouse');

        Route::post('/updateAmountImporttWarehouse/{id}',[WareHouseController::class,'updateAmountImporttWarehouse'])->name('updateAmountImporttWarehouse');

        Route::get('/deleteImportWarehouse/{id}',[WareHouseController::class,'deleteImportWarehouse'])->name('deleteImportWarehouse');

        Route::get('/deleteProductWarehouse/{id}',[WareHouseController::class,'deleteProductWarehouse'])->name('deleteProductWarehouse');

        // export

        Route::get('/edit/{id}/export',[WareHouseController::class,'exportWarehouse'])->name('exportWarehouse');

        Route::post('edit/{id}/export',[WareHouseController::class,'postExportWarehouse'])->name('postExportWarehouse');

        Route::get('/edit/{id}/export/product',[WareHouseController::class,'exportProductWarehouse'])->name('exportProductWarehouse');

        Route::post('/edit/{id}/export/product/{warehouse_product_id}',[WareHouseController::class,'postExportProductWarehouse'])->name('postExportProductWarehouse');

        Route::post('/updateAmountExporttWarehouse/{id}',[WareHouseController::class,'updateAmountExporttWarehouse'])->name('updateAmountExporttWarehouse');

        Route::get('/deleteExportWarehouse/{id}',[WareHouseController::class,'deleteExportWarehouse'])->name('deleteExportWarehouse');

        Route::get('/edit/{id}/statistical-import/{date}',[WareHouseController::class,'statisticalImportWarehouse'])->name('statisticalImportWarehouse');

        Route::post('/edit/{id}/statistical-import/{date}',[WareHouseController::class,'postStatisticalImportWarehouse'])->name('postStatisticalImportWarehouse');

        Route::get('/edit/{id}/statistical-export/{date}',[WareHouseController::class,'statisticalExportWarehouse'])->name('statisticalExportWarehouse');

        Route::post('/edit/{id}/statistical-export/{date}',[WareHouseController::class,'postStatisticalExportWarehouse'])->name('postStatisticalExportWarehouse');

        Route::get('/all',[WareHouseController::class,'showProductWarehouse'])->name('showProductWarehouse');

    });

    Route::get('/client',[ClientController::class,'client'])->name('client');

    Route::prefix('/order')->name('order.')->group(function(){

        Route::get('/wait-confirm',[OrderController::class,'orderWaitConfirm'])->name('orderWaitConfirm');

        Route::get('/wait-for-the-good',[OrderController::class,'orderWaitForTheGood'])->name('orderWaitForTheGood');

        Route::get('/delivering',[OrderController::class,'orderDelivering'])->name('orderDelivering');

        Route::get('/delivey-success',[OrderController::class,'orderDeliveySuccess'])->name('orderDeliveySuccess');

        Route::get('/edit{orderCode}/{status}',[OrderController::class,'editStatusOrder'])->name('editStatusOrder');

    });

});

Route::get('/',[HomeController::class,'index'])->name('home');

Route::prefix('/')->name('home.')->group(function(){

    Route::get('/login',[HomeController::class,'login'])->name("login");

    Route::post('/',[HomeController::class,'postLogin'])->name("postLogin");

    Route::get('/register',[HomeController::class,'register'])->name("register");

    Route::post('/login',[HomeController::class,'postRegister'])->name("postRegister");

    Route::get('/profile',[HomeController::class,'profile'])->name("profile");

    Route::post('/profile',[HomeController::class,'editProfile'])->name("editProfile");

    Route::get('/profile/change-password',[HomeController::class,'changePassword'])->name("changePassword");

    Route::post('/profile/change-password',[HomeController::class,'postChangePassword'])->name("postChangePassword");

    Route::get('/cart',[HomeController::class,'cart'])->name("cart");

    Route::post('/cart/update',[HomeController::class,'updateCart'])->name("updateCart");

    Route::post('/cart/delete',[HomeController::class,'deleteCart'])->name("deleteCart");

    Route::post('/add-cart',[HomeController::class,'addCart'])->name("addCart");

    Route::get('/order',[HomeController::class,'order'])->name("order");

    Route::post('/order',[HomeController::class,'postOrder'])->name("postOrder");

    Route::post('/order/delete',[HomeController::class,'deleteOrder'])->name("deleteOrder");

    Route::post('/{groupProductId}/add-cart',[HomeController::class,'addCart'])->name("addCartGroupProduct");

    // Route::get('/{groupProductId}/{productId}/add-cart',[HomeController::class,'addCart'])->name("addCartProduct");

    Route::get('/{groupProductId}',[HomeController::class,'groupProduct'])->name("groupProduct");

    Route::get('/{groupProductId}/{productId}',[HomeController::class,'product'])->name("product");

});
