<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function getCategories(){
        $categories = Category::all();
        return view('admin.categories',['list'=>$categories]);
    }
    public function postCategory(Request $request){
        $rules = [
            'name' => 'required',
        ];
        $this->validate(request(),$rules);
        Category::add($request);
        return redirect('admin/categories');
    }
    public function deleteCategory($id){
        $category = Category::find($id);
        DB::table('books')
            ->where('category_id', $id)
            ->update(['category_id'=>1]);
        $category->delete();
        return back();
    }
    public function addCategory(){
        return View('admin.categories-create');
    }
    public function getEditCategory($id){
        $category=Category::find($id);
        return view('admin.categories-edit',['category'=>$category]);
    }
    public function editCategory($id){
        $category = Category::find($id);
        $category->name = request('name');
        $category->save();
        return redirect('/admin/categories');
    }
}
