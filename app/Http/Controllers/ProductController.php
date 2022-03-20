<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\admin\ProductRequest;
use App\Models\Products;

class ProductController extends Controller
{
    private $products;
    public function __construct() {
        $this->products = new Products();
    }
    public function show() {
        $productsList = $this->products->getAllProducts();

        return view('admin.product-manager',compact('productsList'));
    }
    public function add() {
        $imagesList = $this->products->showImages();

        return view('admin.addproduct');
    }
    public function postAdd(ProductRequest $request) {
        $images = [];
        if($request->hasfile('images')) {
            foreach ($request->file('images') as $key => $file) {
                $image_name = $request->product_code."-".$key+1;
                $ext = $file->extension();
                $image_fullname = $image_name.".".$ext;
                $path = public_path('\assets\images');
                $image_url = $path.$image_fullname;
                $file->move($path,$image_fullname);
                $images[] = $image_url;
            }
        }
        $this->products->addImage($dataImages);

        $request->validated();
        $dataInsert = [
            $request->product_code,
            $request->product_name,
            $request->product_infor,
            $request->product_group,
            $request->product_amount,
            $request->product_price,
            $request->product_promo,
            $request->product_supplier,
            $request->introduction_article
        ];
        $dataImages = [
            $request->product_code,
            implode('|',$images),
        ];
        $this->products->addProduct($dataInsert);
        return redirect()->route('admin.product.show');
    }
    public function edit() {
        return view("admin.editproduct");
    }
    public function postEdit() {
        
    }
    public function delete() {

    }
}
