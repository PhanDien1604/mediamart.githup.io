<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Promotions extends Model
{
    use HasFactory;

    public function getAllPromo() {
        return DB::table('promotion')->get();
    }

    public function getPromoSub($promo_sub) {
        return DB::table('promotion')->where('subject_apply',$promo_sub)->get();
    }

    public function addPromo($data) {
        return DB::table('promotion')->insertGetId([
            'code'=>$data[0],
            'info'=>$data[1],
            'total_money'=>$data[2],
            'unit'=>$data[3],
            'discount'=>$data[4],
            'subject_apply'=>$data[5],
            'date_range'=>$data[6],
            'status'=>$data[7]
        ]);
    }
    public function getDetailPromo($id) {
        return DB::table('promotion')->where('id',$id)->get();
    }

    public function updatePromo($data, $id) {
        DB::table('promotion')->where('id',$id)->update([
            'code'=>$data[0],
            'info'=>$data[1],
            'total_money'=>$data[2],
            'unit'=>$data[3],
            'discount'=>$data[4],
            'subject_apply'=>$data[5],
            'date_range'=>$data[6],
            'status'=>$data[7]
        ]);
    }

    public function deletePromo($id) {
        DB::table('promotion')->where('id',$id)->delete();
    }

    public function indexPromoProduct($product_id) {
        return DB::table('promo_product_rel')->select("promo_id")->where('product_id',$product_id)->get();
    }
    public function addPromoProduct($product_id, $promo_id) {
        DB::table('promo_product_rel')->insert([
            "product_id" => $product_id,
            "promo_id" => $promo_id
        ]);
    }
    public function updatePromoProduct($product_id, $promo_id) {
        DB::table('promo_product_rel')
        ->where("product_id",$product_id)
        ->update([
            "promo_id" => $promo_id
        ]);
    }

    public function getPromoProduct($product_id) {
        return DB::select('SELECT info FROM promo_product_rel  
            LEFT JOIN promotion on promo_product_rel.promo_id = promotion.id 
            WHERE product_id = ?
            ', [$product_id]);
    }
}

