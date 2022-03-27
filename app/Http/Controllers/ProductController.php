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

        return view('admin.categoryProduct',compact('productsList'));
    }
    public function add() {
        $imagesList = $this->products->showImages();


        $groupProductsList = $this->products->getAllGroupProduct();
        // dd($groupProductsList);

        return view('admin.addProduct',compact('groupProductsList'));
    }
    public function postAdd(ProductRequest $request) {
        // dd($request->all());
        // $images = [];
        // if($request->hasfile('images')) {
        //     foreach ($request->file('images') as $key => $file) {
        //         $image_name = $request->product_code."-".$key+1;
        //         $ext = strtolower($file->getClientOriginalExtension());
        //         $image_fullname = $image_name.".".$ext;
        //         $path = 'public\images';
        //         $image_url = $path.$image_fullname;
        //         $file->move($path,$image_fullname);
        //         $images[] = $image_url;
        //     }
        // }
        // dd($images);
        // $dataImages = [
        //     $request->product_code,
        //     implode('|',$images),
        // ];
        // $this->products->addImage($dataImages);

        $request->validated();
        $dataInsert = [
            $request->product_code,
            $request->product_name,
            $request->product_info,
            $request->product_price,
            $request->introduction_article,
            $request->creat_at,
            $request->checkbox_view
        ];
        // dd($dataInsert);
        $this->products->addProduct($dataInsert);
        return redirect()->route('admin.product.add')->with('msg','Thêm dữ liệu thành công')->with('bg-msg','success');
    }
    public function edit(Request $request, $id=0) {
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
        return view("admin.editProduct", compact('productDetail'));
    }
    public function postEdit(Request $request) {
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
            $request->creat_at,
            $request->checkbox_view
        ];
        $this->products->updateProduct($dataUpdate, $id);
        return redirect()->route('admin.product.edit',['id'=>$id])->with('msg','Cập nhật dữ liệu thành công');
    }
    public function delete($id) {
        if(!empty($id)) {
            $productDetail = $this->products->getDetail($id);
            if(!empty($productDetail[0])) {
                $this->products->deleteProduct($id);
            }else {
                return redirect()->route('admin.product.show');
            }
        }else {
            return redirect()->route('admin.product.show');
        }

        return redirect()->route('admin.product.show');
    }

    public function addGroup() {
        $groupProductsList = $this->products->getAllGroupProduct();

        return view('admin.addGroupProduct',compact('groupProductsList'));
    }
    public function postAddGroup(Request $request) {

        $rules = [
            "group_product_code" => "required|min:6|unique:group_product,code",
            "group_product_name" => "required"
        ];

        $messages = [
            "required" => ":attribute bắt buộc phải nhập",
            "min" => ":attribute không được nhỏ hơn :min kí tự",
            "integer" => ":attribute phải là số",
            "unique" => ":attribute đã tồn tại"
        ];

        $attributes = [
            "group_product_code" => "Mã nhóm sản phẩm",
            "group_product_name" => "Tên nhóm sản phẩm",
        ];
        $request->validate($rules,$messages,$attributes);

        $dataInsert = [
            $request->group_product_code,
            $request->group_product_name,
        ];
        // dd($dataInsert);
        $this->products->addGroupProduct($dataInsert);
        return redirect()->route("admin.product.addGroup")->with('msg',"Thêm dữ liệu thành công");
    }

    public function deleteGroup($id) {
        if(!empty($id)) {
            $groupProductDetail = $this->products->getDetailGroup($id);
            if(!empty($groupProductDetail[0])) {

                $this->products->deleteGroupProduct($id);
            }else {
                return redirect()->route('admin.product.addGroup');
            }
        }else {
            return redirect()->route('admin.product.addGroup');
        }

        return redirect()->route('admin.product.addGroup')->with('msg','Xóa dữ liệu thành công');
    }
}
