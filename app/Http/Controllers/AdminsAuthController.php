<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminsAuthController extends Controller
{

    public function getAdminLogin(){
        return view('auth.admin_login');
    }

    public function postAdminLogin(){
        $rules = [
            'email' => 'required|email',
            'password' => "required|min:8",
        ];
        $this->validate(request(),$rules);
        if(Auth::guard('admin')->attempt(request()->only('email', 'password'))){
            return redirect('/admin');
        }
        Session::flash('error','wrong email or password');
        return redirect('/admin/login')->withInput();
    }
}
