<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory;
    public function addOrder($data) {
        DB::table('order')->insert([
            'code' => $data[3],
            'amount' => $data[0],
            'product_id' => $data[1],
            'client_id' => $data[2],
            'status' => '0'
        ]);
    }
    public function getById($client_id) {
        return DB::table('order')
        ->leftJoin(
            DB::raw(
                "(
                    SELECT products.*, images_product.path as image FROM products
                    LEFT JOIN image_product_rel on products.id = image_product_rel.product_id
                    LEFT JOIN images_product on images_product.id = image_product_rel.image_id
                    GROUP BY products.id
                ) as products"
            ),'products.id','=','order.product_id'
        )
        ->where('order.client_id',$client_id)
        ->where('order.status',0)
        ->get();
    }

    public function deleteOrder($client_id) {
        DB::table('order')->where('client_id',$client_id)->where('status',0)->delete();
    }

    public function getOrderByCode($status) {
        return DB::table('order')
        ->select('order.code','order.status','client.username','client.tel','client.address')
        ->leftJoin('client','client.id','order.client_id')
        ->groupBy('order.code')
        ->where('status',$status)
        ->get();
    }
    public function totalPriceOrder($code) {
        return DB::select('SELECT sum(total) as total_price FROM (SELECT price*amount as total FROM mediamart.order
            LEFT JOIN (SELECT products.id, products.price FROM products) as product_rice
            on product_rice.id = mediamart.order.product_id
            WHERE mediamart.order.code = ?) as tbl_order
            ', [$code]);
    }
    public function getOrderByStatus($code, $status) {
        return DB::table('order')
        ->select('order.*', 'products.code as product_code','products.name','products.price')
        ->leftJoin('products','products.id','order.product_id')
        ->where('order.code',$code)
        ->where('order.status',$status)
        ->get();
    }
    public function editStatusOrder($orderId, $status) {
        DB::table('order')->where('code',$orderId)->update([
            'status' => $status
        ]);
    }
}
