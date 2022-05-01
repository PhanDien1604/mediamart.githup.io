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
        return back()->with('msg',"Thêm dữ liệu thành công");
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
        $date = date("d-m-Y");
        $products = $this->warehouse->getAllProductWarehouse($id);
        // dd($products);
        return view('admin.editWareHouse', compact('warehouseDetail','products','date'));
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

        $this->warehouse->updateWarehouse($dataUpdate, $id);
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

    public function importWarehouse(Request $request, $id) {
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
        $creat_at = date("Y/m/d");
        $products = $this->warehouse->getAllProductImportWarehouse($id, $creat_at);
        // dd($products);
        return view("admin.importWarehouse",compact('warehouseDetail','products'));
    }
    public function postImportWarehouse(Request $request, $id) {
        $date = date_format(date_create($request->creat_at),"d-m-Y");
        return redirect()->route("admin.warehouse.importWarehouse",['id'=>$id, 'date'=>$date]);
    }
    public function postImportProductNewWarehouse(Request $request, $id) {
        $rules = [
            "product_code" => "required|max:10|unique:warehouse_product,code",
            "product_name" => "required",
            "product_amount" => "required|integer",
            "product_price" => "required|integer",
        ];

        $messages = [
            "required" => ":attribute bắt buộc phải nhập",
            "max" => ":attribute phải nhỏ hơn :min kí tự",
            "integer" => ":attribute phải là số",
            "unique" => ":attribute đã tồn tại"
        ];

        $attributes = [
            "product_code" => "Mã sản phẩm",
            "product_name" => "Tên sản phẩm",
            "product_amount" => "Số lượng",
            "product_price" => "Giá sản phẩm",
        ];
        $request->validate($rules,$messages,$attributes);
        $creat_at = date("Y/m/d");
        $dataInsert = [
            $request->product_code,
            $request->product_name,
            $request->product_price,
            $request->product_amount,
            $creat_at,
            $id
        ];
        // dd($dataInsert);
        $this->warehouse->addProductNewWarehouse($dataInsert);
        return back()->with('msg','Nhập sản phẩm vào kho thành công');
    }
    public function postImportProductOldWarehouse(Request $request, $id, $productWarehouseId) {
        // dd("postImportProductOldWarehouse");
        $rules = [
            "product_amount" => "required|integer",
        ];

        $messages = [
            "required" => ":attribute bắt buộc phải nhập",
            "integer" => ":attribute phải là số",
        ];

        $attributes = [
            "product_amount" => "Số lượng",
        ];
        $request->validate($rules,$messages,$attributes);
        $creat_at = date("Y/m/d");
        $dataInsert = [
            $request->product_amount,
            $creat_at,
            $id,
            $productWarehouseId
        ];
        // dd($dataInsert);
        $this->warehouse->addProductOldWarehouse($dataInsert);
        return back()->with('msg','Nhập sản phẩm vào kho thành công');
    }
    public function importProductWarehouse(Request $request, $id) {
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
        $products = $this->warehouse->getAllProductAllWarehouse();
        return view("admin.importProductWarehouse",compact('warehouseDetail','products'));
    }
    public function updateAmountImporttWarehouse(Request $request, $id) {
        $dataUpdate = [
            $request->product_amount
        ];
        $this->warehouse->updateAmountImporttWarehouse($id,$dataUpdate);
        return back()->with('msg','Cập nhật giữ liệu thành công');
    }
    public function deleteProductWarehouse($id) {
        if(!empty($id)) {
            $getDetailProductWareHouse = $this->warehouse->getDetailProductWareHouse($id);
            if(!empty($getDetailProductWareHouse[0])) {
                $this->warehouse->deleteProductWarehouse($id);
            }else {
                return back();
            }
        }else {
            return back();
        }

        return back()->with('msg','Xóa dữ liệu thành công');
    }
    public function deleteImportWarehouse($id) {
        if(!empty($id)) {
            $getDetailImportWarehouse = $this->warehouse->getDetailImportWarehouse($id);
            if(!empty($getDetailImportWarehouse[0])) {
                $this->warehouse->deleteImportWarehouse($id);
            }else {
                return back();
            }
        }else {
            return back();
        }

        return back()->with('msg','Xóa dữ liệu thành công');
    }


    public function exportWarehouse(Request $request, $id) {
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
        $creat_at = date("Y/m/d");
        $products = $this->warehouse->getAllProductExportWarehouse($id, $creat_at);
        return view("admin.exportWarehouse",compact('warehouseDetail','products'));
    }
    public function exportProductWarehouse(Request $request, $id) {
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
        $products = $this->warehouse->getAllProductWarehouse($id);
        // dd($products);
        return view("admin.exportProductWarehouse",compact('warehouseDetail','products'));
    }
    public function postExportProductWarehouse(Request $request, $id, $productWarehouseId) {
        $rules = [
            "product_amount" => "required|integer",
        ];

        $messages = [
            "required" => ":attribute bắt buộc phải nhập",
            "integer" => ":attribute phải là số",
        ];

        $attributes = [
            "product_amount" => "Số lượng",
        ];
        $request->validate($rules,$messages,$attributes);
        $creat_at = date("Y/m/d");
        $dataUpdate = [
            $request->product_amount,
            $creat_at,
            $id,
            $productWarehouseId
        ];
        $this->warehouse->exportAmountWarehouse($dataUpdate);
        return back()->with('msg','Xuất sản phẩm thành công');
    }
    public function deleteExportWarehouse($id) {
        if(!empty($id)) {
            $getDetailExportWarehouse = $this->warehouse->getDetailExportWarehouse($id);
            if(!empty($getDetailExportWarehouse[0])) {
                $this->warehouse->deleteExportWarehouse($id);
            }else {
                return back();
            }
        }else {
            return back();
        }

        return back()->with('msg','Xóa dữ liệu thành công');
    }

    public function statisticalImportWarehouse(Request $request, $id, $date) {
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
        $date = date_format(date_create($date),'Y/m/d');
        $sum = $this->warehouse->sumStatisticalImport($id, $date);
        $products = $this->warehouse->getAllProductImportWarehouse($id, $date);
        return view('admin.statisticalImportWarehouse', compact('warehouseDetail','products','date','sum'));
    }
    public function postStatisticalImportWarehouse(Request $request, $id) {
        $date = date_format(date_create($request->creat_at),'d-m-Y');
        return redirect()->route('admin.warehouse.statisticalImportWarehouse',['id'=>$id,'date'=>$date]);
    }
    public function statisticalExportWarehouse(Request $request, $id, $date) {
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
        $date = date_format(date_create($date),'Y/m/d');
        $sum = $this->warehouse->sumStatisticalExport($id, $date);
        $products = $this->warehouse->getAllProductExportWarehouse($id, $date);
        return view('admin.statisticalExportWarehouse', compact('warehouseDetail','products','date','sum'));
    }
    public function postStatisticalExportWarehouse(Request $request, $id) {
        $date = date_format(date_create($request->creat_at),'d-m-Y');
        return redirect()->route('admin.warehouse.statisticalExportWarehouse',['id'=>$id,'date'=>$date]);
    }

    // all
    public function showProductWarehouse() {
        $products = $this->warehouse->getAllProductAllWarehouse();
        return view('admin.showProductWarehouse',compact('products'));
    }
}
