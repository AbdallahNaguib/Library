<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Book;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function getLogin(){
        return View('login');
    }
    public function PostLogin(){
        $rules = [
            'email' => 'required|email',
            'password' => "required|min:8",
        ];
        $this->validate(request(),$rules);
        if(Auth::attempt(request()->only('email', 'password'))){
            return redirect('/home');
        }
        Session::flash('error','wrong email or password');
        return redirect('/login')->withInput();
    }
    public function getRegister(){
        return View('register');
    }
    public function postRegister(Request $request){
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => "required|confirmed|min:8",
        ];
        $this->validate(request(),$rules);
        User::add($request);
        return redirect('/home');
    }


}
