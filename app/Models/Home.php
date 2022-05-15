<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Home extends Model
{
    use HasFactory;
    public function getCategoryMain($row) {
        $item = DB::table('category_web')
        ->select('group_id','group_name')
        ->where('row',$row)
        ->where('key','category-main')
        ->get();
        return $item;
    }
    public function getCategorySub($row) {
        $groupMainID = DB::table('category_web')
        ->select('group_main_id','group_main_name')
        ->where('row',$row)
        ->where('key','category-sub')
        ->groupBy('group_main_id')
        ->get();
        $item = [];
        if(!empty($groupMainID)) {
            foreach ($groupMainID as $value) {
                $item[] = [
                    $value->group_main_id,
                    $value->group_main_name,
                    DB::table('category_web')
                    ->select('group_sub_id', 'group_sub_name')
                    ->where('row',$row)
                    ->where('key','category-sub')
                    ->where('group_main_id',$value->group_main_id)
                    ->get()
                ];
            }
        }
        return $item;
    }
    public function getLogoCategory($row) {
        $item = DB::table('logo_category_web')
        ->where('row',$row)
        ->get();
        return $item;
    }
    public function getCategoryPromo() {
        $item = DB::table('category_web')
        ->where('key','category-promo')
        ->where('promo_id','<>',"")
        ->get();
        return $item;
    }
}
