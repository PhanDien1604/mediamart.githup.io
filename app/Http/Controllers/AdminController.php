<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public $data = [];
    public function index() {
        return view('admin.home');
    }
    public function product_manager() {
        return view('admin.product-manager');
    }
    public function addproduct() {
        return view('admin.addproduct');
    }
    public function customer_manager() {
        return view('admin.customer-manager');
    }
}
