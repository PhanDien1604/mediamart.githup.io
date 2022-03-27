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
        DB::insert('INSERT INTO products (code, name, info, price, introduction_article, creat_at, status)
        values (?, ?, ?, ?, ?, ?, ?)', $data);
    }
    public function getDetail($id) {
        return DB::select('SELECT * FROM '.$this->table.' WHERE id = ?', [$id]);
    }
    public function updateProduct($data, $id) {
        // dd($data);
        $data[] = $id;
        return DB::update('UPDATE products SET code=?, name=?, info=?, price=?, introduction_article=?, creat_at=?, status=?
        WHERE id = ?', $data);
    }
    public function deleteProduct($id) {
        return DB::delete('DELETE FROM products WHERE id = ?', [$id]);
    }
    // Group Product

    public function getAllGroupProduct() {
        $groupProducts = DB::select('SELECT * FROM group_product');

        return $groupProducts;
    }
    public function addGroupProduct($data) {
        DB::insert('INSERT INTO group_product (code, name)
        values (?, ?)', $data);
    }
    public function getDetailGroup($id) {
        return DB::select('SELECT * FROM group_product WHERE id = ?', [$id]);
    }
    public function deleteGroupProduct($id) {
        return DB::delete('DELETE FROM group_product WHERE id = ?', [$id]);
    }
    // Images

}
