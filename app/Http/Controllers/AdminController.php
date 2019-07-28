<?php

namespace App\Http\Controllers;

use App\Admin;
use App\User;
use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function index(){
        return View('admin.home');
    }
    public function addAdmin(){
        return View('admin.admins.create');
    }
    public function getAdmins(){
        $admins = Admin::all();
        return view('admin.admins.index',['list'=>$admins]);
    }
    public function postAdmin(Request $request){
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:admins,email',
            'password' => "required|min:8",
        ];
        $this->validate(request(),$rules);
        Admin::add($request);
        return redirect('admin/admins');
    }
    public function deleteAdmin($id){
        $user = Admin::find($id);
        DB::table('books')
            ->where('admin_id', $id)
            ->update(['admin_id'=>1]);

        DB::table('categories')
            ->where('admin_id', $id)
            ->update(['admin_id'=>1]);

        $user->delete();
        return back();
    }
    public function getEditAdmin($id){
        $user=Admin::find($id);
        return view('admin.admins.edit',['admin'=>$user]);
    }
    public function editAdmin($id){
        if(strlen(request('password'))==0){

            // he doesn't want to update password
            $rules = [
                'name' => 'required',
                'email' => 'required|email',
            ];
            $this->validate(request(), $rules);
            $user = Admin::find($id);
            $user->name = request('name');
            $user->email = request('email');
            $user->save();
        }else {
            $rules = [
                'name' => 'required',
                'email' => 'required|email',
                'password' => "required|min:8",
            ];
            $this->validate(request(), $rules);
            $user = Admin::find($id);
            $user->name = request('name');
            $user->password = bcrypt(request('password'));
            $user->email = request('email');
            $user->save();
        }
        return redirect('admin/admins');
    }
}
