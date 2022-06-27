<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function login() {
        return view('admin.login');
    }
    public function checkLogin(Request $request) {
        $email = $request->email;
        $password = $request->password;
        $user[] = (User::where('email',$email)->where('password',$password)->get())->toArray();
        if(empty($user[0])) {
            return back()->with('fail','Tài khoản hoặc mật khẩu sai');
        }
        $request->session()->put('user',$user[0][0]);
        return redirect()->route('admin.home');
    }
}
