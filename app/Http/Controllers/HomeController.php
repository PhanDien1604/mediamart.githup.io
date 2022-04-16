<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\Website;

class HomeController extends Controller
{
    private $home;
    public function __construct() {
        $this->home = new Home;
        $this->website = new Website;
    }
    public function index(Request $request) {
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
        $bannerTop = $this->website->getAllImgWeb('banner_top');
        $bannerBody = $this->website->getAllImgWeb('banner_body');
        $bannerSub = $this->website->getAllImgWeb('banner_sub');
        $bannerPromo = $this->website->getAllImgWeb('banner_promo');
        $backgroudPromo = $this->website->getAllImgWeb('backgroud_promo');
        // dd($bannerTop);
        return view("clients.home",compact('category','bannerTop','bannerBody','bannerSub','bannerPromo','backgroudPromo'));
    }
    public function product() {
        return view("clients.product",$this->data);
    }
    public function productgroup() {
        return view("clients.productgroup",$this->data);
    }
}
