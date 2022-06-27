<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function __construct() {
        if(!session('user')) {
            return redirect()->route('admin.login');
        }
    }
    public function index(Request $request) {
        if(empty(session('user'))) {
            return redirect()->route('admin.login');
        }
        return view('admin.home');
    }

}
