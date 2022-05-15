<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\Website;
use App\Models\Products;
use App\Models\FileImages;
use App\Models\Promotions;

class HomeController extends Controller
{
    private $home;
    private $product;
    protected $data = [];
    public function __construct() {
        $this->home = new Home;
        $this->website = new Website;
        $this->product = new Products;
        $this->image = new FileImages;
        $this->promo = new Promotions;

        $category = [];
        for($i = 1; $i<=10; $i++) {
            $categoryLogo = $this->home->getLogoCategory($i);
            $categoryMain = $this->home->getCategoryMain($i);
            $categorySub = $this->home->getCategorySub($i);
            $category[] = [
                $categoryLogo,
                $categoryMain,
                $categorySub
            ];
        }
        $categoryPromo = $this->home->getCategoryPromo();
        $bannerTop = $this->website->getAllImgWeb('banner_top');
        $bannerBody = $this->website->getAllImgWeb('banner_body');
        $bannerSub = $this->website->getAllImgWeb('banner_sub');
        $bannerPromo = $this->website->getAllImgWeb('banner_promo');
        $backgroudPromo = $this->website->getAllImgWeb('backgroud_promo');

        $this->data = [
            "category"=>$category,
            "categoryPromo"=>$categoryPromo,
            "bannerTop"=>$bannerTop,
            "bannerBody"=>$bannerBody,
            "bannerSub"=>$bannerSub,
            "bannerPromo"=>$bannerPromo,
            "backgroudPromo"=>$backgroudPromo
        ];
    }
    public function index(Request $request) {
        return view("clients.home",$this->data);
    }
    public function groupProduct($id) {
        $products = $this->product->getProductBelongtGroup($id);
        $groupId = $id;
        return view("clients.productgroup",$this->data, compact('products','groupId'));
    }
    public function product($groupId, $id) {
        // dd($id);
        $product = $this->product->getDetail($id)[0];
        $images = $this->image->getDetailImageProduct($id);
        $promo = $this->promo->getPromoProduct($id)[0];

        // dd($promo);
        return view("clients.product",$this->data, compact('product','images','promo'));
    }

    public function cart() {
        return view("clients.cart",$this->data);
    }
}
