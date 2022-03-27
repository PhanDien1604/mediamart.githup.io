<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class FileImages extends Model
{
    use HasFactory;

    public function showImages() {
        $images = DB::select('SELECT * FROM images_product');
    }
    public function addImage($data) {
        DB::insert('INSERT INTO images_product (id, fullname)
        values (?, ?)', $data);
    }
}
