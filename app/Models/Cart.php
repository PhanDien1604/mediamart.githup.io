<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cart extends Model
{
    use HasFactory;
    public function getAll() {
        return DB::table('cart')
        ->get();
    }
    public function addCart($data) {
        DB::table('cart')->insert([
            'amount' => $data[0],
            'product_id'=>$data[1],
            'client_id'=>$data[2],
        ]);
    }
    public function updateCart($data) {
        DB::table('cart')
        ->where('product_id',$data[1])
        ->where('client_id',$data[2])
        ->update([
            'amount' => $data[0]
        ]);
    }
    public function checkPrdToCart($product_id, $client_id) {
        return DB::table('cart')
        ->where('product_id',$product_id)
        ->where('client_id',$client_id)
        ->get();
    }
    public function getPrdInCart($client_id) {
        return DB::table('products')
            ->select('products.*','images_product.path as image','cart.*')
            ->leftjoin('image_product_rel','products.id','=','image_product_rel.product_id')
            ->leftjoin('images_product','images_product.id','=','image_product_rel.image_id')
            ->groupBy('products.id')
            ->leftJoin('cart','cart.product_id','=','products.id')
            ->where('cart.client_id',$client_id)
            ->get();
    }
    public function deleteCart($cart_id) {
        DB::table('cart')->where('id',$cart_id)->delete();
    }
}
