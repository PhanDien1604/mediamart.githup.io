<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class WareHouse extends Model
{
    use HasFactory;
    public function getAllWareHouse() {
        return DB::table('warehouse')->get();
    }
    public function addWareHouse($data) {
        DB::table('warehouse')->insertGetId([
            'name' => $data[0],
            'address' => $data[1]
        ]);
    }
    public function getDetailWareHouse($id) {
        return DB::table('warehouse')->where('id',$id)->get();
    }
    public function updateGroupWarehouse($data, $id) {
        DB::table('warehouse')->where('id',$id)->update([
            'name'=>$data[0],
            'address' => $data[1]
        ]);
    }
    public function deleteWareHouse($id) {
        DB::table('warehouse')->where('id',$id)->delete();
    }

    public function updateProductBelongWarehouse($product_id, $warehouse_id, $product_amount) {
        DB::table('warehouse_product_rel')->insert([
            'warehouse_id' => $warehouse_id,
            'product_id' => $product_id,
            'product_amount' => $product_amount
        ]);
    }
    public function addAmountProductWarehouse($product_id, $warehouse_id, $product_amount) {
        $amount_old = DB::table('warehouse_product_rel')->select('product_amount')
                    ->where('warehouse_id',$warehouse_id)->where('product_id',$product_id)->get();
        $amount_old = $amount_old[0]->product_amount;
        $amount_new = $product_amount+$amount_old;
        DB::table('warehouse_product_rel')->where('warehouse_id',$warehouse_id)->where('product_id',$product_id)->update([
            'product_amount' => $amount_new
        ]);
    }
    public function deleteProductBelongWarehouse($product_id, $warehouse_id) {
        DB::delete('DELETE FROM warehouse_product_rel WHERE warehouse_id = ? AND product_id=?', [$warehouse_id, $product_id]);
    }
}
