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
    public function updateWarehouse($data, $id) {
        DB::table('warehouse')->where('id',$id)->update([
            'name'=>$data[0],
            'address' => $data[1]
        ]);
    }
    public function deleteWareHouse($id) {
        DB::table('warehouse')->where('id',$id)->delete();
    }

    public function getAllProductWarehouse($warehouse_id) {
        return DB::table('warehouse_product')->where('warehouse_id',$warehouse_id)->get();
    }
    public function getAllProductWarehouseDate($warehouse_id, $creat_at) {
        $data = DB::table('import_warehouse')
        ->select('import_warehouse.*','warehouse_product.code','warehouse_product.name')
        ->where('creat_at',$creat_at)
        ->where('import_warehouse.warehouse_id',$warehouse_id)
        ->leftjoin('warehouse_product','import_warehouse.warehouse_product_id','=','warehouse_product.id')
        ->get();

        return $data;
    }
    public function addProductWarehouse($data) {
        // dd($data);
        $warehouseProductId = DB::table('warehouse_product')->insertGetId([
            'code' => $data[0],
            'name' => $data[1],
            'warehouse_id' => $data[5]
        ]);

        DB::table('import_warehouse')->insert([
            'price' => $data[2],
            'amount' => $data[3],
            'creat_at' => $data[4],
            'warehouse_id' => $data[5],
            'warehouse_product_id' => $warehouseProductId
        ]);
    }
    public function updateProductWarehouse($product_id, $warehouse_id, $product_amount) {
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
