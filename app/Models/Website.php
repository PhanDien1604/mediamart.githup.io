<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Website extends Model
{
    use HasFactory;
    public function addCategory($key,$data) {
        DB::table('category_web')->insert([
            'key'=>$key,
            'row'=>$data[0],
            'group_id'=>$data[1],
            'group_name'=>(DB::table('group_product')->select('name')->where('id',$data[1])->get())[0]->name
        ]);
    }
    public function addLogoCategory($row, $data) {
        DB::table('logo_category_web')->insert([
            'row'=>$row,
            'path'=>$data
        ]);
    }
    public function addCategorySub($key,$data) {
        if (!empty($data[2])) {
            foreach ($data[2] as $item) {
                DB::table('category_web')->insert([
                    'key'=>$key,
                    'row'=>$data[0],
                    'group_main_id'=>$data[1],
                    'group_main_name' => (DB::table('group_product')->select('name')->where('id',$data[1])->get())[0]->name,
                    'group_sub_id'=>$item,
                    'group_sub_name' => (DB::table('group_product')->select('name')->where('id',$item)->get())[0]->name
                ]);
            }
        }else {
            DB::table('category_web')->insert([
                'key'=>$key,
                'row'=>$data[0],
                'group_main_id'=>$data[1],
                'group_main_name' => (DB::table('group_product')->select('name')->where('id',$data[1])->get())[0]->name
            ]);
        }

    }
    public function getLogoCategory() {
        return DB::table('logo_category_web')->orderBy('row')->get();
    }
    public function getAllCategory($key) {
        return DB::table('category_web')->where('key',$key)->orderBy('row')->get();
    }

    public function getDetailCategory($id) {
        return DB::table('category_web')->where('id',$id)->get();
    }

    public function deleteCategory($id) {
        DB::table('category_web')->where('id',$id)->delete();
    }

    public function getDetailLogoCategory($id) {
        return DB::table('logo_category_web')->where('id',$id)->get();
    }

    public function deleteLogoCategory($id) {
        DB::table('logo_category_web')->where('id',$id)->delete();
    }

    public function getAllCategoryPromo($key) {
        return DB::table('category_web')
        ->where('key',$key)
        ->get();
    }
    public function categoryPromo($key, $data) {
        $dataOld = DB::table('category_web')
        ->select('id')
        ->where("key",$key)
        ->get();
        // dd($dataOld);
        foreach($dataOld as $i => $item) {
            // dd($data[$i]);
            // dd((DB::table('promotion')->where('id',$data[$i])->get())[0]);
            DB::table('category_web')->where('id',$item->id)->update([
                'promo_id' => $data[$i],
                'promo_name' => $data[$i] != "" ?
                    (DB::table('promotion')->select('info')->where('id',$data[$i])->get())[0]->info : ""
            ]);
        }
    }
    public function getAllImgWeb($key) {
        return DB::table('setting')->where('key',$key)->get();
    }
    public function getDetailImge($id) {
        return DB::table('setting')->where('id',$id)->get();
    }
    public function imagesWebsite($key, $data) {
        if(!empty($data)) {
            foreach ($data as $item) {
                DB::table('setting')->insert([
                    'key' => $key,
                    'path' => $item
                ]);
            }
        }
    }
    public function deleteImage($id) {
        DB::table('setting')->where('id',$id)->delete();
    }
}
