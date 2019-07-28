<?php

namespace App\Http\Controllers;

use App\Book;
use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{
    public function create($id){
        $likesForThisBook = Book::find($id)->likes;
        $userid=Auth::user()->id;
        foreach($likesForThisBook as $like){
            if($like->user_id == $userid){
                // if the user already liked this post then unlike
                $like->delete();
                return redirect('home');
            }
        }
        $like = new Like();
        $like->book_id=$id;
        $like->user_id=Auth::user()->id;
        $like->save();
        return redirect('home');
    }
}
