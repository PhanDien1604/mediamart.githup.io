<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class FileImages extends Model
{
    use HasFactory;

    public function addImage($data, $product_id) {
        foreach ($data as $value) {
            $image_id = DB::table('images_product')->insertGetId([
                'fullname' => $value
            ]);
            // dd($image_id);
            DB::table('image_product_rel')->insert([
                'image_id' => $image_id,
                'product_id' => $product_id
            ]);
        }
    }

    public function getEditImages($product_id) {
        $images = DB::select('SELECT images_product.id ,images_product.fullname FROM image_product_rel, images_product, products
        WHERE products.id = image_product_rel.product_id AND image_product_rel.product_id = ? AND images_product.id = image_product_rel.image_id',[$product_id]);
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
            ->select('products.*','image_product_rel.product_id','image_product_rel.image_id','images_product.fullname as image')
            ->leftjoin('image_product_rel','products.id','=','image_product_rel.product_id')
            ->leftjoin('images_product','images_product.id','=','image_product_rel.image_id')
            ->groupBy('products.id')
            ->get();
    }

    public function getListDetail($id) {
        return DB::select('SELECT * FROM image_product_rel WHERE product_id = ?', [$id]);
    }

    public function deleteImageBelongProduct($id, $listImageDetail) {
        foreach ($listImageDetail as $value) {
            // echo $value->image_id;
            // // dd();
            DB::delete('DELETE FROM images_product WHERE  id = ?', [$value->image_id]);
        }
        // dd();
        DB::delete('DELETE FROM image_product_rel WHERE product_id = ?', [$id]);
    }
}

