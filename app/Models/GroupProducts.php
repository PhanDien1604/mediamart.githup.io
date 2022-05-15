<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class GroupProducts extends Model
{
    use HasFactory;

    public function getAllGroupProduct() {
        $groupProducts = DB::select('SELECT * FROM group_product');
        return $groupProducts;
    }
    public function addGroupProduct($data) {
        return DB::table('group_product')->insertGetId(
            ['code' => $data[0], 'name' => $data[1]]
        );
    }
    public function getDetailGroup($id) {
        return DB::select('SELECT * FROM group_product WHERE id = ?', [$id]);
    }

    public function updateGroupProduct($dataUpdate, $id) {
        $dataUpdate[] = $id;
        DB::update('UPDATE group_product SET code = ?, name = ? where id = ?', $dataUpdate);
    }

    public function deleteGroupProduct($id) {
        DB::delete('DELETE FROM group_product_rel WHERE group_id = ?', [$id]);
        return DB::delete('DELETE FROM group_product WHERE id = ?', [$id]);
    }

    public function updateProductBelongGroup($product_id, $group_id) {
        DB::table('group_product_rel')->insert([
            'group_id' => $group_id,
            'product_id' => $product_id
        ]);
    }
    public function deleteProductBelongGroup($product_id, $group_id) {
        DB::delete('DELETE FROM group_product_rel WHERE group_id = ? AND product_id=?', [$group_id, $product_id]);
    }
}
