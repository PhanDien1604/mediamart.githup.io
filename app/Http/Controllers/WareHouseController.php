<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WareHouse;
use App\Models\Products;
use App\Models\FileImages;

class WareHouseController extends Controller
{
    //
    private $products;
    private $fileImage;
    public function __construct() {
        $this->products = new Products();
        $this->fileImage = new FileImages();
        $this->warehouse = new WareHouse();
    }
    public function index() {
        $warehouseList = $this->warehouse->getAllWareHouse();
        $productsList = $this->fileImage->getImageBelongProduct();

        return view('admin.warehouse', compact('productsList','warehouseList'));
    }
    public function postAddWareHouse(Request $request) {

        $rules = [
            "warehouse_name" => "required|min:6",
            "warehouse_address" => "required"
        ];

        $messages = [
            "required" => ":attribute bắt buộc phải nhập",
            "min" => ":attribute không được nhỏ hơn :min kí tự",
            "integer" => ":attribute phải là số",
        ];

        $attributes = [
            "warehouse_name" => "Tên kho",
            "warehouse_address" => "Địa chỉ",
        ];
        $request->validate($rules,$messages,$attributes);

        $dataInsert = [
            $request->warehouse_name,
            $request->warehouse_address
        ];
        $warehouse_id = $this->warehouse->addWareHouse($dataInsert);
        return redirect()->route("admin.warehouse.editWareHouse",['id'=>$warehouse_id])->with('msg',"Thêm dữ liệu thành công");
    }

    public function editWareHouse(Request $request, $id) {
        if(!empty($id)) {
            $warehouseDetail = $this->warehouse->getDetailWareHouse($id);
            if(!empty($warehouseDetail[0])) {
                $request->session()->put('id',$id);
                $warehouseDetail = $warehouseDetail[0];
            }else {
                return back();
            }
        }else {
            return back();
        }

        $products = $this->products->getProductBelongtWarehouse($id);
        $productNotWarehouse = $this->products->getProductNoBelongtWarehouse($id);
        return view('admin.editWareHouse', compact('warehouseDetail','products','productNotWarehouse'));
    }
    public function postEditWareHouse(Request $request) {
        $id = session('id');
        if(empty($id)) {
            return back();
        }
        $rules = [
            "warehouse_name" => "required|min:6",
            "warehouse_address" => "required"
        ];

        $messages = [
            "required" => ":attribute bắt buộc phải nhập",
            "min" => ":attribute không được nhỏ hơn :min kí tự",
            "integer" => ":attribute phải là số",
        ];

        $attributes = [
            "warehouse_name" => "Tên kho",
            "warehouse_address" => "Địa chỉ",
        ];
        $request->validate($rules,$messages,$attributes);
        $dataUpdate = [
            $request->warehouse_name,
            $request->warehouse_address
        ];

        $this->warehouse->updateGroupWarehouse($dataUpdate, $id);
        return redirect()->route('admin.warehouse.index')->with('msg','Cập nhật giữ liệu thành công');
    }

    public function deleteWareHouse($id) {
        if(!empty($id)) {
            $warehouseDetail = $this->warehouse->getDetailWareHouse($id);
            if(!empty($warehouseDetail[0])) {
                $this->warehouse->deleteWareHouse($id);
            }else {
                return back();
            }
        }else {
            return back();
        }

        return back()->with('msg','Xóa dữ liệu thành công');
    }

    // Relationship
    public function productNoBelongWarehouse($id) {
        $productsList = $this->products->getProductNoBelongtWarehouse($id);
        // dd($productsList);
        $warehouse_id = $id;
        return view('admin.productNoBelongWarehouse',compact('productsList','warehouse_id'));
    }

    public function addProductBelongWarehouse(Request $request, $id, $product_id) {
        $request->validate(
            ['product_amount'=>'required|integer'],
            ['integer'=>':attribute phải là số'],
            ['product_amount'=>'Số lượng']
        );
        // dd($request->product_amount);
        if(!empty($product_id)) {
            $productDetail = $this->products->getDetail($product_id);
            if(!empty($productDetail[0])) {
                $this->warehouse->updateProductBelongWarehouse($product_id, $id, $request->product_amount);
            }else {
                return back();
            }
        }else {
            return back();
        }
        return back()->with('msg','Thêm sản phẩm vào kho thành công');
    }
    public function postAddAmountProductWarehouse(Request $request, $id, $product_id) {
        $request->validate(
            ['product_amount'=>'required|integer'],
            ['integer'=>':attribute phải là số'],
            ['product_amount'=>'Số lượng']
        );
        // dd($request->product_amount);
        if(!empty($product_id)) {
            $productDetail = $this->products->getDetail($product_id);
            if(!empty($productDetail[0])) {
                $this->warehouse->addAmountProductWarehouse($product_id, $id, $request->product_amount);
            }else {
                return back();
            }
        }else {
            return back();
        }
        return back()->with('msg','Thêm số lượng sản phẩm vào kho thành công');
    }
    public function deleteProductBelongWarehouse($id, $product_id) {
        if(!empty($product_id)) {
            $productDetail = $this->products->getDetail($product_id);
            if(!empty($productDetail[0])) {
                $this->warehouse->deleteProductBelongWarehouse($product_id, $id);
            }else {
                return back();
            }
        }else {
            return back();
        }
        return back()->with('msg','Xóa sản phẩm kho thành công');
    }
}
