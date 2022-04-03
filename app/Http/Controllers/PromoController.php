<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Promotions;

class PromoController extends Controller
{
    private $products;
    private $promotions;
    public function __construct() {
        $this->products = new Products();
        $this->promotions = new Promotions();
    }

    public function index() {
        $promoList = $this->promotions->getAllPromo();
        // dd($promoList);
        return view("admin.categoryPromo",compact('promoList'));
    }

    public function showSub($promo_sub) {
        if($promo_sub == "product") {
            $promo_sub = "Sản phẩm";
        }else if($promo_sub == "client") {
            $promo_sub = "Khách hàng";
        }else if($promo_sub == "order"){
            $promo_sub = "Đơn hàng";
        }
        $promoList = $this->promotions->getPromoSub($promo_sub);
        // dd($promoList);
        return view("admin.promoSub",compact('promoList'));
    }

    public function add() {
        return view("admin.addPromo");
    }

    public function postAdd(Request $request) {
        $rules = [
            "promo_code" => "required|min:6|unique:promotion,code,",
            "promo_info" => "required",
            "promo_discount" => "required|integer",
            "date_range" => "required"
        ];

        $messages = [
            "required" => ":attribute bắt buộc phải nhập",
            "min" => ":attribute không được nhỏ hơn :min kí tự",
            "integer" => ":attribute phải là số",
            "unique" => ":attribute đã tồn tại"
        ];

        $attributes = [
            "promo_code" => "Mã nhóm sản phẩm",
            "promo_info" => "Tên nhóm sản phẩm",
            "promo_discount" => "Giảm giá",
            "date_range" => "Khoảng thời gian"
        ];
        $request->validate($rules,$messages,$attributes);

        $dataInsert = [
            $request->promo_code,
            $request->promo_info,
            $request->promo_total_money,
            $request->promo_unit,
            $request->promo_discount,
            $request->promo_apply,
            $request->date_range,
            $request->promo_status
        ];
        // dd($dataInsert);
        $promo_id = $this->promotions->addPromo($dataInsert);

        return redirect()->route('admin.promo.show')->with('msg','Thêm dữ liệu thành công');
    }

    public function editPromo(Request $request, $id) {
        if(!empty($id)) {
            $promoDetail = $this->promotions->getDetailPromo($id);
            if(!empty($promoDetail[0])) {
                $request->session()->put('id',$id);
                $promoDetail = $promoDetail[0];
            }else {
                return back();
            }
        }else {
            return back();
        }
        return view("admin.editPromo",compact('promoDetail'));
    }

    public function updatePromo(Request $request) {
        $id = session('id');
        if(empty($id)) {
            return back();
        }
        $rules = [
            "promo_code" => "required|min:6|unique:promotion,code,".$id,
            "promo_info" => "required",
            "promo_discount" => "required|integer",
            "date_range" => "required"
        ];

        $messages = [
            "required" => ":attribute bắt buộc phải nhập",
            "min" => ":attribute không được nhỏ hơn :min kí tự",
            "integer" => ":attribute phải là số",
            "unique" => ":attribute đã tồn tại"
        ];

        $attributes = [
            "promo_code" => "Mã nhóm sản phẩm",
            "promo_info" => "Tên nhóm sản phẩm",
            "promo_discount" => "Giảm giá",
            "date_range" => "Khoảng thời gian"
        ];
        $request->validate($rules,$messages,$attributes);

        $dataUpdate = [
            $request->promo_code,
            $request->promo_info,
            $request->promo_total_money,
            $request->promo_unit,
            $request->promo_discount,
            $request->promo_apply,
            $request->date_range,
            $request->promo_status
        ];
        // dd($dataUpdate);
        $this->promotions->updatePromo($dataUpdate, $id);

        return redirect()->route('admin.promo.show')->with('msg','Cập nhật dữ liệu thành công');

    }

    public function deletePromo($id) {
        if(!empty($id)) {
            $promoDetail = $this->promotions->getDetailPromo($id);
            if(!empty($promoDetail[0])) {
                $this->promotions->deletePromo($id);
            }else {
                return back();
            }
        }else {
            return back();
        }
        return back()->with('msg','Xóa dữ liệu thành công');
    }
}
