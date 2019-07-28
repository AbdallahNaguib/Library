<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Category extends Model
{
    public function books(){
        return $this->hasMany(Book::class);
    }
    public static function add(Request $request){
        $category = new Category();
        $category->name = $request->get('name');
        $category->admin_id = Auth::user()->id;
        $category->save();
    }
}
