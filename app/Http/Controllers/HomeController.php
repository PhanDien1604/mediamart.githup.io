<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\Website;

class HomeController extends Controller
{
    private $home;
    protected $data = [];
    public function __construct() {
        $this->home = new Home;
        $this->website = new Website;

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
        // dd($this->data);
        return view("clients.home",$this->data);
    }
    public function groupProduct() {
        // dd($this->data);
        return view("clients.productgroup",$this->data);
    }
    public function product() {
        return view("clients.product",$this->data);
    }

}
