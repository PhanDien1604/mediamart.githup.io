<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Products extends Model
{
    use HasFactory;

    protected $table = "products";

    public function getAllProducts() {
        $products = DB::select('SELECT * FROM products');
        DB::insert('insert into users (id, name) values (?, ?)', [1, 'Dayle']);
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
            'creat_at' => $data[5],
            'status' => $data[6]
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
            'creat_at' => $data[5],
            'status' => $data[6]
        ]);
    }
    public function deleteProduct($id) {
        return DB::table('products')->where('id',$id)->delete();
    }

    public function getProductBelongtGroup($id) {
        // return DB::table('products')
        //     ->select('products.*','group_product_rel.group_id')
        //     ->join('group_product_rel','products.id','=','group_product_rel.product_id')
        //     ->where('group_product_rel.group_id',$id)
        //     ->get();
        return DB::table('products')
            ->select('products.*','image_product_rel.product_id','image_product_rel.image_id','images_product.path as image',
            'group_product_rel.group_id')
            ->leftjoin('group_product_rel','products.id','=','group_product_rel.product_id')
            ->whereIn(
                'products.id',
                DB::table('group_product_rel')
                ->select('group_product_rel.product_id')
                ->where('group_product_rel.group_id',$id)
            )
            ->leftjoin('image_product_rel','products.id','=','image_product_rel.product_id')
            ->leftjoin('images_product','images_product.id','=','image_product_rel.image_id')
            ->groupBy('products.id')
            ->get();
    }

    public function getProductNoBelongtGroup($group_id) {
        return DB::table('products')
            ->select('products.*','image_product_rel.product_id','image_product_rel.image_id','images_product.path as image',
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

    public function getDetailImageBelongProduct($id) {
        return DB::table('products')
            ->select('products.*','image_product_rel.product_id','image_product_rel.image_id','images_product.path as image')
            ->leftjoin('image_product_rel','products.id','=','image_product_rel.product_id')
            ->leftjoin('images_product','images_product.id','=','image_product_rel.image_id')
            ->groupBy('products.id')
            ->having('products.id',$id)
            ->get();
    }
}
