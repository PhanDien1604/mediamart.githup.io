<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class Website extends Model
{
    use HasFactory;
    public function addCategory($data) {
        if (!empty($data[2])) {
            foreach ($data[2] as $item) {
                DB::table('category_web')->insert([
                    'row'=>$data[0],
                    'group_main_id'=>$data[1],
                    'group_main_name' => (DB::table('group_product')->select('name')->where('id',$data[1])->get())[0]->name,
                    'group_sub_id'=>$item,
                    'group_sub_name' => (DB::table('group_product')->select('name')->where('id',$item)->get())[0]->name
                ]);
            }
        }else {
            DB::table('category_web')->insert([
                'row'=>$data[0],
                'group_main_id'=>$data[1],
                'group_main_name' => (DB::table('group_product')->select('name')->where('id',$data[1])->get())[0]->name
            ]);
        }

    }
    public function getAllCategory() {
        return DB::table('category_web')->get();
    }

    public function getDetailCategory($id) {
        return DB::table('category_web')->where('id',$id)->get();
    }

    public function deleteCategory($id) {
        DB::table('category_web')->where('id',$id)->delete();
    }

    public function getAllCategoryPromo() {
        return DB::table('category_promo_web')->get();
    }
    public function categoryPromo($data) {
        foreach($data as $key => $item) {
            DB::table('category_promo_web')->where('id',$key+1)->update([
                'promo_id' => $item
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
