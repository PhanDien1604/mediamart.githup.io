<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $data = [];
    public function index(Request $request) {
        return view("clients.home",$this->data);
    }
    public function product() {
        return view("clients.product",$this->data);
    }
    public function productgroup() {
        return view("clients.productgroup",$this->data);
    }
}
