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
        // dd($data);
        DB::insert('INSERT INTO products (id, name, infor, group_prd, amount, price, promo, supplier, introduction_article)
        values (?, ?, ?, ?, ?, ?, ?, ?, ?)', $data);
    }

    public function showImages() {
        $images = DB::select('SELECT * FROM images_product');
        // dd($images);
    }
    public function addImage($data) {
        DB::insert('INSERT INTO images_product (id, fullname)
        values (?, ?)', $data);
    }
}
