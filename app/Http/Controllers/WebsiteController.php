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
        $categorySub = $this->website->getAllCategory('category-sub');
        $categoryMain = $this->website->getAllCategory('category-main');
        $categoryPromo = $this->website->getAllCategoryPromo('category-promo');
        $logoCategory = $this->website->getLogoCategory('logo-category');
        // dd(!empty($categoryPromo[0]));
        return view('admin.website',compact('groupProducts','promos','categorySub','categoryMain','logoCategory','categoryPromo'));
    }

    public function imageWeb() {
        $bannerTop = $this->website->getAllImgWeb('banner_top');
        $bannerBody = $this->website->getAllImgWeb('banner_body');
        $bannerSub = $this->website->getAllImgWeb('banner_sub');
        $bannerPromo = $this->website->getAllImgWeb('banner_promo');
        $backgroudPromo = $this->website->getAllImgWeb('backgroud_promo');
        // dd(!empty($bannerSub));
        return view('admin.imageWebsite',compact('bannerTop','bannerBody','bannerSub','bannerPromo','backgroudPromo'));
    }

    public function postAddCategory(Request $request) {

        // dd('postAddCategory');
        $rules = [
            'category' => 'required|not_in:0'
        ];
        $messages = [
            'not_in' => 'Mời bạn chọn :attribute'
        ];
        $attributes = [
            'category' => 'danh mục'
        ];

        $request->validate($rules,$messages,$attributes);

        $dataInsert = [
            $request->row_category_main,
            $request->category
        ];
        $this->website->addCategory("category-main",$dataInsert);
        return back()->with('msg','Thêm dữ liệu thành công');
    }

    public function postAddLogoCategory(Request $request) {
        $rules = [
            'row_logo' => 'required|unique:logo_category_web,row'
        ];
        $messages = [
            'unique' => ':attribute đã tồn tại'
        ];
        $attributes = [
            'row_logo' => 'Số hàng'
        ];
        $request->validate($rules,$messages,$attributes);
        $dataImg = "";
        if($request->hasfile('logo_category')) {
            $file = $request->file('logo_category');
            $image_name = "logo-".$request->row_logo;
            $ext = strtolower($file->getClientOriginalExtension());
            $image_fullname = $image_name.".".$ext;
            $path = 'images/website/logo-category/';
            $image_url = $path.$image_fullname;
            $file->move($path,$image_fullname);
            $dataImg = $image_url;
        } else {
            return back();
        }
        // dd($dataImg);
        $this->website->addLogoCategory($request->row_logo, $dataImg);
        return  back()->with('msg','Thêm dữ liệu thành công');
    }

    public function postAddCategorySub(Request $request) {
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
        $this->website->addCategorySub('category-sub',$dataInsert);
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
    public function deleteLogoCategory($id) {
        if(!empty($id)) {
            $categoryDetail = $this->website->getDetailLogoCategory($id);
            if(!empty($categoryDetail[0])) {
                $this->website->deleteLogoCategory($id);
            }else {
                return back();
            }
        }else {
            return back();
        }
        return back()->with('msg','Xóa dữ liệu thành công');
    }

    public function postCategoryPromo(Request $request) {
        $this->website->categoryPromo("category-promo",$request->promo_web);
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
