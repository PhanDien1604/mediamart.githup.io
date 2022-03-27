<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FileImages;

class ImagesController extends Controller
{
    private $fileImage;
    public function __construct() {
        $this->fileImage = new FileImages();
    }

    public function postUploadImage(Request $request) {

        $images = [];
        if($request->hasfile('images')) {
            foreach ($request->file('images') as $key => $file) {
                $image_name = $request->product_code."-".$key+1;
                $ext = strtolower($file->getClientOriginalExtension());
                $image_fullname = $image_name.".".$ext;
                $path = 'images';
                $image_url = $path.$image_fullname;
                $file->move($path,$image_fullname);
                $images[] = $image_url;
            }
        }
        $dataImages = [
            $request->product_code,
            implode('|',$images),
        ];
        $this->fileImage->addImage($dataImages);

    }
}
