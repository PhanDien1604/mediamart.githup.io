<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\admin\ProductRequest;
use App\Models\Products;
use App\Models\FileImages;
use App\Models\Promotions;

class ProductController extends Controller
{
    private $products;
    private $fileImage;
    private $promotions;
    public function __construct() {
        $this->products = new Products();
        $this->fileImage = new FileImages();
        $this->promotions = new Promotions();
    }
    public function show() {
        $productsList = $this->fileImage->getImageBelongProduct();

        return view('admin.categoryProduct',compact('productsList'));
    }
    public function add() {
        $promoList = $this->promotions->getPromoSub('Sản phẩm');

        return view('admin.addProduct',compact('promoList'));
    }
    public function postAdd(ProductRequest $request) {
        $dataImages = [];
        if($request->hasfile('images')) {
            foreach ($request->file('images') as $key => $file) {
                $image_name = time().rand(1,1000);
                $ext = strtolower($file->getClientOriginalExtension());
                $image_fullname = $image_name.".".$ext;
                $path = 'images/products';
                $image_url = $path.$image_fullname;
                $file->move($path,$image_fullname);
                $dataImages[] = $image_url;
            }
        }

        $request->validated();

        $dataInsert = [
            $request->product_code,
            $request->product_name,
            $request->product_info,
            $request->product_price,
            $request->introduction_article,
            $request->product_promo,
            $request->creat_at,
            $request->product_status
        ];

        $product_id = $this->products->addProduct($dataInsert);
        $this->fileImage->addImage($dataImages, $product_id);
        // dd($product_id);
        return redirect()->route('admin.product.show')->with('msg','Thêm dữ liệu thành công')->with('bg-msg','success');
    }
    public function edit(Request $request, $id) {
        if(!empty($id)) {
            $productDetail = $this->products->getDetail($id);
            // dd($productDetail);
            if(!empty($productDetail[0])) {
                $request->session()->put('id',$id);
                $productDetail = $productDetail[0];
            }else {
                return redirect()->route('admin.product.show');
            }
        }else {
            return redirect()->route('admin.home');
        }
        $images = $this->fileImage->getEditImages($id);
        // dd($images);
        $promoList = $this->promotions->getPromoSub('Sản phẩm');

        return view("admin.editProduct", compact('productDetail', 'images','promoList'));
    }
    public function postEdit(Request $request) {
        $dataImages = [];
        if($request->hasfile('images')) {
            foreach ($request->file('images') as $key => $file) {
                $image_name = time().rand(1,1000);
                $ext = strtolower($file->getClientOriginalExtension());
                $image_fullname = $image_name.".".$ext;
                $path = 'images/products';
                $image_url = $path.$image_fullname;
                $file->move($path,$image_fullname);
                $dataImages[] = $image_url;
            }
        }
        $id = session('id');
        if(empty($id)) {
            return back();
        }

        $rules = [
            "product_code" => "required|min:6|unique:products,code,".$id,
            "product_name" => "required",
            "product_price" => "required|integer"
        ];

        $messages = [
            "required" => ":attribute bắt buộc phải nhập",
            "min" => ":attribute không được nhỏ hơn :min kí tự",
            "integer" => ":attribute phải là số",
            "unique" => ":attribute đã tồn tại"
        ];

        $attributes = [
            "product_code" => "Mã sản phẩm",
            "product_name" => "Tên sản phẩm",
            "product_price" => "Giá sản phẩm"
        ];
        $request->validate($rules,$messages,$attributes);

        $dataUpdate = [
            $request->product_code,
            $request->product_name,
            $request->product_info,
            $request->product_price,
            $request->introduction_article,
            $request->product_promo,
            $request->creat_at,
            $request->product_status
        ];
        $this->products->updateProduct($dataUpdate, $id);
        $this->fileImage->addImage($dataImages, $id);
        return redirect()->route('admin.product.edit',['id'=>$id])->with('msg','Cập nhật dữ liệu thành công');
    }
    public function delete($id) {
        if(!empty($id)) {
            $productDetail = $this->products->getDetail($id);
            $listImageDetail = $this->fileImage->getListDetail($id);
            if(!empty($productDetail[0])) {
                $this->fileImage->deleteImageBelongProduct($id, $listImageDetail);
                $this->products->deleteProduct($id);
            }else {
                return redirect()->route('admin.product.show');
            }
        }else {
            return redirect()->route('admin.product.show');
        }
        return back()->with('msg','Xóa dữ liệu thành công');
    }

    public function deleteImage($id) {
        if(!empty($id)) {
            $imageDetail = $this->fileImage->getDetail($id);
            if(!empty($imageDetail[0])) {
                $this->fileImage->deleteImage($id);
            }else {
                return back();
            }
        }else {
            return back();
        }

        return back()->with('msg','Xóa ảnh thành công');
    }
}
