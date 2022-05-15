<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

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
    public function getDetailProductWareHouse($id) {
        return DB::table('warehouse_product_rel')->where('id',$id)->get();
    }

    public function getAllProductWarehouse($warehouse_id) {
        $data = DB::table('warehouse_product_rel')
        ->selectRaw('warehouse_product_rel.*, warehouse_product.code, warehouse_product.name, warehouse_product.price, warehouse_product.amount')
        ->leftJoin(
            DB::raw("
                (
                    SELECT warehouse_product.*,
                        (CASE WHEN sum(import_warehouse.amount)-import_warehouse.amountExport
                            THEN sum(import_warehouse.amount)-import_warehouse.amountExport
                            ELSE 0
                        END) as amount
                    FROM warehouse_product
                    LEFT JOIN
                        (
                            SELECT import_warehouse.*,
                                (CASE WHEN sum(export_warehouse.amount) THEN sum(export_warehouse.amount) ELSE 0 END) as amountExport
                                FROM import_warehouse
                            LEFT JOIN (SELECT * FROM export_warehouse WHERE export_warehouse.warehouse_id = ".$warehouse_id.") as export_warehouse
                                on import_warehouse.warehouse_product_id = export_warehouse.warehouse_product_id
                            WHERE import_warehouse.warehouse_id =".$warehouse_id."
                            GROUP BY import_warehouse.id
                        ) as import_warehouse on warehouse_product.id = import_warehouse.warehouse_product_id
                    GROUP BY warehouse_product.id
                ) as warehouse_product"
            ), 'warehouse_product_rel.warehouse_product_id','=','warehouse_product.id'
        )
        ->groupBY('warehouse_product_rel.id')
        ->having('warehouse_product_rel.warehouse_id',$warehouse_id)
        ->get();

        // dd($data);
        return $data;
    }
    public function getAllProductAllWarehouse() {
        $data = DB::table('warehouse_product')
        ->selectRaw('warehouse_product.*,
            (CASE WHEN sum(import_warehouse.amount)-import_warehouse.amountExport
                THEN sum(import_warehouse.amount)-import_warehouse.amountExport
                ELSE 0
            END) as amount,
            import_warehouse.warehouse_product_id')
        ->leftjoin(
            DB::raw("(SELECT import_warehouse.*,
                    (CASE WHEN sum(export_warehouse.amount) THEN sum(export_warehouse.amount) ELSE 0 END) as amountExport FROM import_warehouse
                LEFT JOIN export_warehouse on import_warehouse.warehouse_product_id = export_warehouse.warehouse_product_id
                GROUP BY import_warehouse.id
                ) as import_warehouse
            "),
            'import_warehouse.warehouse_product_id','=','warehouse_product.id'
        )
        ->groupBy('warehouse_product.id')
        ->get();
        return $data;
    }

    // import
    public function getAllProductImportWarehouse($warehouse_id, $creat_at) {
        $data = DB::table('import_warehouse')
        ->select('import_warehouse.*','warehouse_product.code','warehouse_product.name','warehouse_product.price')
        ->where('creat_at',$creat_at)
        ->where('import_warehouse.warehouse_id',$warehouse_id)
        ->leftjoin('warehouse_product','import_warehouse.warehouse_product_id','=','warehouse_product.id')
        ->get();

        return $data;
    }
    public function sumStatisticalImport($warehouse_id, $creat_at) {
        $sum = DB::select(
            'SELECT sum(sumItem) as sumPrd
            FROM (SELECT import_warehouse.amount * warehouse_product.price as sumItem FROM import_warehouse
                LEFT JOIN warehouse_product on import_warehouse.warehouse_product_id = warehouse_product.id
                WHERE creat_at = ? and import_warehouse.warehouse_id = ?) as prdImportWarehouse'
        , [$creat_at, $warehouse_id]);
        return $sum[0]->sumPrd;
    }
    public function addProductNewWarehouse($data) {
        // dd($data);
        $warehouseProductId = DB::table('warehouse_product')->insertGetId([
            'code' => $data[0],
            'name' => $data[1],
            'price' => $data[2]
        ]);

        DB::table('warehouse_product_rel')->insert([
            'warehouse_id' => $data[5],
            'warehouse_product_id'=>$warehouseProductId
        ]);

        DB::table('import_warehouse')->insert([
            'amount' => $data[3],
            'creat_at' => $data[4],
            'warehouse_id' => $data[5],
            'warehouse_product_id' => $warehouseProductId
        ]);
    }
    public function addProductOldWarehouse($data) {
        DB::table('warehouse_product_rel')->insert([
            'warehouse_id' => $data[2],
            'warehouse_product_id'=>$data[3]
        ]);
        DB::table('import_warehouse')->insert([
            'amount' => $data[0],
            'creat_at' => $data[1],
            'warehouse_id' => $data[2],
            'warehouse_product_id' => $data[3]
        ]);
    }
    public function deleteProductWarehouse($id) {
        DB::table('warehouse_product_rel')->where('id',$id)->delete();
    }
    public function getDetailImportWarehouse($id) {
        return DB::table('import_warehouse')->where('id',$id)->get();
    }
    public function deleteImportWarehouse($id) {
        DB::table('import_warehouse')->where('id',$id)->delete();
    }
    public function updateAmountImporttWarehouse($id, $data) {
        DB::table('import_warehouse')->where('id',$id)->update([
            'amount'=>$data[0]
        ]);
    }

    // export
    public function exportAmountWarehouse($data) {
        DB::table('export_warehouse')->insert([
            'amount'=>$data[0],
            'creat_at' => $data[1],
            'warehouse_id' => $data[2],
            'warehouse_product_id' => $data[3]
        ]);
    }
    public function getAllProductExportWarehouse($warehouse_id, $creat_at) {
        $data = DB::table('export_warehouse')
        ->select('export_warehouse.*','warehouse_product.code','warehouse_product.name','warehouse_product.price')
        ->where('creat_at',$creat_at)
        ->where('export_warehouse.warehouse_id',$warehouse_id)
        ->leftjoin('warehouse_product','export_warehouse.warehouse_product_id','=','warehouse_product.id')
        ->get();
        return $data;
    }
    public function sumStatisticalExport($warehouse_id, $creat_at) {
        $sum = DB::select(
            'SELECT sum(sumItem) as sumPrd
            FROM (SELECT export_warehouse.amount * warehouse_product.price as sumItem FROM export_warehouse
                LEFT JOIN warehouse_product on export_warehouse.warehouse_product_id = warehouse_product.id
                WHERE creat_at = ? and export_warehouse.warehouse_id = ?) as prdExportWarehouse'
        , [$creat_at, $warehouse_id]);
        return $sum[0]->sumPrd;
    }
    public function getDetailExportWarehouse($id) {
        return DB::table('export_warehouse')->where('id',$id)->get();
    }
    public function deleteExportWarehouse($id) {
        DB::table('export_warehouse')->where('id',$id)->delete();
    }
}
