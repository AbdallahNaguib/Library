<?php

namespace App;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Book extends Model
{
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function likes(){
        return $this->hasMany(Like::class);
    }
    public function orders(){
        return $this->hasMany(order::class);
    }
    public static function add(Request $request){
        $book = new Book();
        $book->name = $request->get('name');
        $book->description = $request->get('description');
        $book->price = $request->get('price');
        $book->quantity = $request->get('quantity');
        $book->category_id = $request->get('category');
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move("uploads/books/",$filename);
            $book->image = $filename;
        }
        $book->admin_id = Auth::user()->id;
        $book->save();
    }
}
