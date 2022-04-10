<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Website;
use App\Models\Promotions;
use App\Models\GroupProducts;

class WebsiteController extends Controller
{
    private $groupProduct;
    private $promotion;
    public function __construct() {
        $this->groupProduct = new GroupProducts;
        $this->promotion = new Promotions;
        $this->website = new Website;
    }

    public function index() {
        $groupProducts = $this->groupProduct->getAllGroupProduct();
        $promos = $this->promotion->getAllPromo();
        $category = $this->website->getAllCategory();
        $categoryPromo = $this->website->getAllCategoryPromo();

        return view('admin.website',compact('groupProducts','promos','category','categoryPromo'));
    }

    public function imageWeb() {
        $bannerTop = $this->website->getAllImgWeb('banner_top');
        $bannerBody = $this->website->getAllImgWeb('banner_body');
        $bannerSub = $this->website->getAllImgWeb('banner_sub');
        $bannerPromo = $this->website->getAllImgWeb('banner_promo');
        $backgroudPromo = $this->website->getAllImgWeb('backgroud_promo');

        return view('admin.imageWebsite',compact('bannerTop','bannerBody','bannerSub','bannerPromo','backgroudPromo'));
    }

    public function postAddCategory(Request $request) {
        $rules = [
            'category_main' => 'required|not_in:0'
        ];
        $messages = [
            'not_in' => 'Mời bạn chọn :attribute'
        ];
        $attributes = [
            'category_main' => 'danh mục chính'
        ];

        $request->validate($rules,$messages,$attributes);

        $dataInsert = [
            $request->row_category,
            $request->category_main,
            $request->category_sub
        ];
        $this->website->addCategory($dataInsert);
        return back()->with('msg','Thêm dữ liệu thành công');
    }

    public function deleteCategory($id) {
        if(!empty($id)) {
            $categoryDetail = $this->website->getDetailCategory($id);
            if(!empty($categoryDetail[0])) {
                $this->website->deleteCategory($id);
            }else {
                return back();
            }
        }else {
            return back();
        }
        return back()->with('msg','Xóa dữ liệu thành công');
    }

    public function postCategoryPromo(Request $request) {
        $this->website->categoryPromo($request->promo_web);
        return  back()->with('msg','Cập nhật dữ liệu thành công');
    }

    public function postImageWeb(Request $request) {
        $dataImgBannerTop = [];
        if($request->hasfile('banner_top')) {
            foreach ($request->file('banner_top') as $file) {
                $image_name = time().rand(1,1000);
                $ext = strtolower($file->getClientOriginalExtension());
                $image_fullname = $image_name.".".$ext;
                $path = 'images/website/';
                $image_url = $path.$image_fullname;
                $file->move($path,$image_fullname);
                $dataImgBannerTop[] = $image_url;
            }
        }
        $this->website->imagesWebsite('banner_top',$dataImgBannerTop);

        $dataImgBannerBody = [];
        if($request->hasfile('banner_body')) {
            foreach ($request->file('banner_body') as $file) {
                $image_name = time().rand(1,1000);
                $ext = strtolower($file->getClientOriginalExtension());
                $image_fullname = $image_name.".".$ext;
                $path = 'images/website/';
                $image_url = $path.$image_fullname;
                $file->move($path,$image_fullname);
                $dataImgBannerBody[] = $image_url;
            }
        }
        $this->website->imagesWebsite('banner_body',$dataImgBannerBody);

        $dataImgBannerSub = [];
        if($request->hasfile('banner_sub')) {
            foreach ($request->file('banner_sub') as $file) {
                $image_name = time().rand(1,1000);
                $ext = strtolower($file->getClientOriginalExtension());
                $image_fullname = $image_name.".".$ext;
                $path = 'images/website/';
                $image_url = $path.$image_fullname;
                $file->move($path,$image_fullname);
                $dataImgBannerSub[] = $image_url;
            }
        }
        $this->website->imagesWebsite('banner_sub',$dataImgBannerSub);

        $dataImgBannerPromo = [];
        if($request->hasfile('banner_promo')) {
            foreach ($request->file('banner_promo') as $file) {
                $image_name = time().rand(1,1000);
                $ext = strtolower($file->getClientOriginalExtension());
                $image_fullname = $image_name.".".$ext;
                $path = 'images/website/';
                $image_url = $path.$image_fullname;
                $file->move($path,$image_fullname);
                $dataImgBannerPromo[] = $image_url;
            }
        }
        $this->website->imagesWebsite('banner_promo',$dataImgBannerPromo);

        $dataImgBgPromo = [];
        if($request->hasfile('backgroud_promo')) {
            foreach ($request->file('backgroud_promo') as $file) {
                $image_name = time().rand(1,1000);
                $ext = strtolower($file->getClientOriginalExtension());
                $image_fullname = $image_name.".".$ext;
                $path = 'images/website/';
                $image_url = $path.$image_fullname;
                $file->move($path,$image_fullname);
                $dataImgBgPromo[] = $image_url;
            }
        }
        $this->website->imagesWebsite('backgroud_promo',$dataImgBgPromo);

        return back()->with('msg','Cập nhật dữ liệu thành công');
    }

    public function deleteImageWeb($id) {
        if(!empty($id)) {
            $imageDetail = $this->website->getDetailImge($id);
            if(!empty($imageDetail[0])) {
                $this->website->deleteImage($id);
            }else {
                return back();
            }
        }else {
            return back();
        }

        return back()->with('msg','Xóa ảnh thành công');
    }

}
