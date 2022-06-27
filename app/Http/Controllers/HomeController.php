<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\Website;
use App\Models\Products;
use App\Models\FileImages;
use App\Models\Promotions;
use App\Models\Client;
use App\Models\Cart;
use App\Models\Order;

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
        $this->client = new Client;
        $this->cart = new Cart;
        $this->order = new Order;

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
        $products = $this->product->getAllImageBelongProduct();
        // dd($products);
        return view("clients.home",$this->data, compact('products'));
    }
    public function groupProduct($id) {
        $products = $this->product->getProductBelongtGroup($id);
        $groupId = $id;
        return view("clients.productgroup",$this->data, compact('products','groupId'));
    }
    public function product($groupId, $id) {
        $product = $this->product->getDetail($id)[0];
        $images = $this->image->getDetailImageProduct($id);
        $promo = $this->promo->getPromoProduct($id)[0];

        return view("clients.product",$this->data, compact('product','images','promo'));
    }

    public function cart() {
        if(session('client')) {
            $prdInCart = $this->cart->getPrdInCart(session('client')->id);
            return view("clients.cart",$this->data, compact('prdInCart'));
        }
        return view("clients.login");
    }
    public function updateCart(Request $request) {
        $amount = $request->input('amount');
        $product_id = $request->input('product_id');
        $dataUpdate = [
            $amount,
            $product_id,
            session('client')->id
        ];
        $this->cart->updateCart($dataUpdate);
        return response()->json([
        ]);
    }
    public function addCart(Request $request) {
        $product_id = $request->input('product_id');
        if(session('client')) {
            $checkPrdToCart = $this->cart->checkPrdToCart($product_id, session('client')->id);
            if(!empty($checkPrdToCart[0])) {
                $amount = $checkPrdToCart[0]->amount;
                $amount++;
                $dataUpdate = [
                    $amount,
                    $product_id,
                    session('client')->id
                ];
                $this->cart->updateCart($dataUpdate);
            } else {
                $dataInsert = [
                    '1',
                    $product_id,
                    session('client')->id
                ];
                $this->cart->addCart($dataInsert);
            }
            return response()->json([
                'status' => "Thêm vào giỏ hàng thành công"
            ]);
        }
    }

    public function deleteCart(Request $request) {
        $cart_id = $request->input('cart_id');
        $this->cart->deleteCart($cart_id);
        return response()->json();
    }
    public function order() {
        if(session('client')) {
            $id = session('client')->id;
        }
        $orders = $this->order->getById($id);
        return view('clients.order', $this->data, compact('orders'));
    }
    public function postOrder(Request $request) {
        $products_order = $request->products_order;
        $amount = $request->amounts;
        if($products_order) {
            $code_order = time().rand(1,1000);
            for ($i=0; $i < count($products_order); $i++) {
                $data = [
                    $amount[$i],
                    $products_order[$i],
                    session('client')->id,
                    $code_order
                ];
                $this->order->addOrder($data);
            }
        }
        return back();
    }
    public function deleteOrder() {
        if(session('client')) {
            $id = session('client')->id;
        }
        $this->order->deleteOrder($id);
        return back();
    }
    public function login() {
        return view('clients.login');
    }

    public function postLogin(Request $request) {
        $rules = [
            "account" => "required",
            "password" => "required",
        ];

        $messages = [
            "required" => ":attribute bắt buộc phải nhập",
            "unique" => ":attribute đã tồn tại",
            "in" => ":attribute không đúng",
            "in_array" => ":attribute không tồn tại"
        ];

        $attributes = [
            "account" => "Tài khoản",
            "password" => "Mật khẩu",
        ];
        $request->validate($rules,$messages,$attributes);
        $data = [
            $request->account,
            $request->password
        ];
        $client = $this->client->checkLogin($data);
        if(!empty($client[0])) {
            $request->session()->put('client',$client[0]);
            return view('clients.home',$this->data);
        }
        return back()->with('fail','Tài khoản hoặc mật khẩu không chính xác');
    }
    public function register() {
        return view('clients.register');
    }
    public function postRegister(Request $request) {
        $rules = [
            "username" => "required",
            "account" => "required|unique:client,account",
            "password" => "required",
            "password_confirmation" => "required|same:password"
        ];

        $messages = [
            "required" => ":attribute bắt buộc phải nhập",
            "unique" => ":attribute đã tồn tại",
            "same" => ":attribute không đúng"
        ];

        $attributes = [
            "username" => "Tên người dùng",
            "account" => "Tài khoản",
            "password" => "Mật khẩu",
            "password_confirmation" => "Xác nhận mật khẩu"
        ];
        $request->validate($rules,$messages,$attributes);
        $data = [
            $request->username,
            $request->account,
            $request->password,
        ];

        $this->client->add($data);
        return view('clients.login');
    }

    public function profile() {
        if(session('client')) {
            $id = session('client')->id;
        }
        $client = $this->client->getById($id)[0];
        return view('clients.profileUser', $this->data, compact('client'));
    }
    public function editProfile(Request $request) {
        if(session('client')) {
            $id = session('client')->id;
        }
        $dataImg ="";
        if($request->hasfile('img_user')) {
            $file = $request->file('img_user');
            $image_name = time().rand(1,1000);
            $ext = strtolower($file->getClientOriginalExtension());
            $image_fullname = $image_name.".".$ext;
            $path = 'images/users/';
            $image_url = $path.$image_fullname;
            $file->move($path,$image_fullname);
            $dataImg = $image_url;
        }
        $data = [
            $request->address ? $request->address : "",
            $request->tel ? $request->tel : "",
            $request->email ? $request->email : "",
            $dataImg
        ];
        $this->client->updateProfile($id, $data);
        return back();
    }
    public function changePassword() {
        return view('clients.changePassword',$this->data);
    }
    public function postChangePassword(Request $request) {
        if(session('client')) {
            $id = session('client')->id;
            $password = session('client')->password;
        }
        $rules = [
            "password_old" => "required|in:$password",
            "password_new" => "required",
            "password_confirmation" => "required|same:password_new"
        ];

        $messages = [
            "required" => ":attribute bắt buộc phải nhập",
            "same" => ":attribute không đúng",
            "in" => ":attribute không đúng"
        ];

        $attributes = [
            "password_new" => "Mật khẩu mới",
            "password_old" => "Mật khẩu cũ",
            "password_confirmation" => "Nhập lại mật khẩu"
        ];
        $request->validate($rules,$messages,$attributes);

        $password_new = $request->password_new;

        $this->client->editPassword($id, $password_new);
        return redirect()->route('home.profile');
    }
}
