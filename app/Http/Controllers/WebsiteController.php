<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index() {
        return view('admin.website');
    }

    public function postAddCategory() {

    }

    public function imageWeb() {
        return view('admin.imageWebsite');
    }

    public function postImageWeb() {

    }
}
