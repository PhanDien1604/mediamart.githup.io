<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class Products extends Model
{
    use HasFactory;

    protected $table = "products";

    public function getAllProducts() {
        $products = DB::select('SELECT * FROM products');

        return $products;
    }
    public function addProduct($data) {
        // dd($data[1]);
        $product_id = DB::table('products')->insertGetId([
            'code' => $data[0],
            'name' => $data[1],
            'info' => $data[2],
            'price' => $data[3],
            'introduction_article' => $data[4],
            'promo_id' => $data[5],
            'creat_at' => $data[6],
            'status' => $data[7]
        ]);
        return $product_id;
    }
    public function getDetail($id) {
        return DB::select('SELECT * FROM '.$this->table.' WHERE id = ?', [$id]);
    }
    public function updateProduct($data, $id) {
        return DB::table('products')->where('id',$id)->update([
            'code' => $data[0],
            'name' => $data[1],
            'info' => $data[2],
            'price' => $data[3],
            'introduction_article' => $data[4],
            'promo_id' => $data[5],
            'creat_at' => $data[6],
            'status' => $data[7]
        ]);
    }
    public function deleteProduct($id) {
        return DB::table('products')->where('id',$id)->delete();
    }

    public function getProductBelongtGroup($id) {
        return DB::table('products')
            ->select('products.*','group_product_rel.group_id')
            ->join('group_product_rel','products.id','=','group_product_rel.product_id')
            ->where('group_product_rel.group_id',$id)
            ->get();
    }

    public function getProductNoBelongtGroup($group_id) {
        return DB::table('products')
            ->select('products.*','image_product_rel.product_id','image_product_rel.image_id','images_product.fullname as image',
            'group_product_rel.group_id')
            ->leftjoin('group_product_rel','products.id','=','group_product_rel.product_id')
            ->whereNotIn(
                'products.id',
                DB::table('group_product_rel')
                ->select('group_product_rel.product_id')
                ->where('group_product_rel.group_id',$group_id)
            )
            ->leftjoin('image_product_rel','products.id','=','image_product_rel.product_id')
            ->leftjoin('images_product','images_product.id','=','image_product_rel.image_id')
            ->groupBy('products.id')
            ->get();
    }
}
