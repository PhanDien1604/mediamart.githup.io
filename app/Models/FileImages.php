<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class FileImages extends Model
{
    use HasFactory;

    public function addImage($key, $data, $product_id) {
        foreach ($data as $value) {
            $image_id = DB::table('images_product')->insertGetId([
                'key' => $key,
                'path' => $value
            ]);
            // dd($image_id);
            DB::table('image_product_rel')->insert([
                'image_id' => $image_id,
                'product_id' => $product_id
            ]);
        }
    }

    public function getEditImages($product_id, $key) {
        $images = DB::table('images_product')->where('key',$key)
        ->whereIn(
            'id',
            DB::table('image_product_rel')->select('id')
            ->where('product_id',$product_id)
        )
        ->get();
        return $images;
    }

    public function getDetail($id) {
        return DB::select('SELECT * FROM images_product WHERE id = ?', [$id]);
    }

    public function deleteImage($id) {
        DB::delete('DELETE FROM image_product_rel WHERE image_id = ?', [$id]);

        return DB::delete('DELETE FROM images_product WHERE id = ?', [$id]);
    }

    public function getImageBelongProduct() {
        return DB::table('products')
            ->select('products.*','image_product_rel.product_id','image_product_rel.image_id','images_product.path as image')
            ->leftjoin('image_product_rel','products.id','=','image_product_rel.product_id')
            ->leftjoin('images_product','images_product.id','=','image_product_rel.image_id')
            ->groupBy('products.id')
            ->get();
    }

    public function getListDetail($id) {
        return DB::select('SELECT * FROM image_product_rel WHERE product_id = ?', [$id]);
    }
}

