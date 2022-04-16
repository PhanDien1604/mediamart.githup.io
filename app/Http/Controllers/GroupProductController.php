<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\GroupProducts;
use App\Models\FileImages;

class GroupProductController extends Controller
{
    private $products;
    private $groupProducts;
    private $fileImage;
    public function __construct() {
        $this->products = new Products();
        $this->groupProducts = new GroupProducts();
        $this->fileImage = new FileImages();
    }
    public function addGroup() {
        $groupProductsList = $this->groupProducts->getAllGroupProduct();
        $productsList = $this->fileImage->getImageBelongProduct();
        return view('admin.addGroupProduct',compact('groupProductsList','productsList'));
    }
    public function postAddGroup(Request $request) {

        $rules = [
            "group_product_code" => "required|unique:group_product,code",
            "group_product_name" => "required"
        ];

        $messages = [
            "required" => ":attribute bắt buộc phải nhập",
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
        $group_id = $this->groupProducts->addGroupProduct($dataInsert);
        return redirect()->route("admin.product.group.editGroup",['id'=>$group_id])->with('msg',"Thêm dữ liệu thành công");
    }

    public function editGroup(Request $request, $id) {
        if(!empty($id)) {
            $groupDetail = $this->groupProducts->getDetailGroup($id);
            if(!empty($groupDetail[0])) {
                $request->session()->put('id',$id);
                $groupDetail = $groupDetail[0];
            }else {
                return redirect()->route('admin.product.show');
            }
        }else {
            return redirect()->route('admin.home');
        }
        $products = $this->products->getProductBelongtGroup($id);
        $productNotGroup = $this->products->getProductNoBelongtGroup($id);
        return view('admin.editGroupProduct', compact('groupDetail','products','productNotGroup'));
    }
    public function postEditGroup(Request $request) {
        $id = session('id');
        if(empty($id)) {
            return back();
        }
        $rules = [
            "group_product_code" => "required|unique:group_product,code,".$id,
            "group_product_name" => "required"
        ];

        $messages = [
            "required" => ":attribute bắt buộc phải nhập",
            "integer" => ":attribute phải là số",
            "unique" => ":attribute đã tồn tại"
        ];

        $attributes = [
            "group_product_code" => "Mã nhóm sản phẩm",
            "group_product_name" => "Tên nhóm sản phẩm",
        ];
        $request->validate($rules,$messages,$attributes);
        $dataUpdate = [
            $request->group_product_code,
            $request->group_product_name,
        ];
        // dd($dataUpdate);
        $this->groupProducts->updateGroupProduct($dataUpdate, $id);
        return redirect()->route('admin.product.group.addGroup')->with('msg','Cập nhật giữ liệu thành công');
    }

    public function deleteGroup($id) {
        if(!empty($id)) {
            $groupProductDetail = $this->groupProducts->getDetailGroup($id);
            if(!empty($groupProductDetail[0])) {
                $this->groupProducts->deleteGroupProduct($id);
            }else {
                return redirect()->route('admin.product.group.addGroup');
            }
        }else {
            return redirect()->route('admin.product.group.addGroup');
        }

        return redirect()->route('admin.product.group.addGroup')->with('msg','Xóa dữ liệu thành công');
    }
    // Relationship
    public function productNoBelongGroup($id) {
        $productsList = $this->products->getProductNoBelongtGroup($id);
        // dd($productsList);
        $group_id = $id;
        return view('admin.productNoBelongGroup',compact('productsList','group_id'));
    }

    public function addProductBelongGroup($id, $group_id) {
        // dd($id.' '.$product_id);
        if(!empty($id)) {
            $productDetail = $this->products->getDetail($id);
            if(!empty($productDetail[0])) {
                $this->groupProducts->updateProductBelongGroup($id, $group_id);
            }else {
                return back();
            }
        }else {
            return back();
        }
        return back()->with('msg','Thêm sản phẩm vào nhóm thành công');
    }
    public function deleteProductBelongGroup($id, $group_id) {
        if(!empty($id)) {
            $productDetail = $this->products->getDetail($id);
            if(!empty($productDetail[0])) {
                $this->groupProducts->deleteProductBelongGroup($id, $group_id);
            }else {
                return back();
            }
        }else {
            return back();
        }
        return back()->with('msg','Xóa sản phẩm nhóm thành công');
    }

}
