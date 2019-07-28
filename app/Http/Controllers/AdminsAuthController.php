<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminsAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

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
        return redirect('/admin/login');
    }
}
