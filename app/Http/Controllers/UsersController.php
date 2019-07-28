<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function getUsers(){
        $users = User::all();
        return view('admin.users',['list'=>$users]);
    }
    public function addUser(){
        return View('admin.users-create');
    }
    public function postUser(Request $request){
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => "required|min:8",
        ];
        $this->validate(request(),$rules);
        User::add($request);
        return redirect('admin/users');
    }
    public function deleteUser($id){
        DB::table('comments')
            ->where('user_id', $id)
            ->delete();
        DB::table('likes')
            ->where('user_id', $id)
            ->delete();

        DB::table('orders')
            ->where('visitor_id', $id)
            ->update(['visitor_id'=>1]);

        $user = User::find($id);
        $user->delete();
        return back();
    }
    public function getEditUser($id){
        $user=User::find($id);
        return view('admin.users-edit',['user'=>$user]);
    }
    public function editUser($id){
        if(strlen(request('password'))==0){
            $rules = [
                'name' => 'required',
                'email' => 'required|email',
            ];
            $this->validate(request(), $rules);
            $user = User::find($id);
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
            $user = User::find($id);
            $user->name = request('name');
            $user->password = bcrypt(request('password'));
            $user->email = request('email');
            $user->save();
        }
        return redirect('admin/users');
    }
}
