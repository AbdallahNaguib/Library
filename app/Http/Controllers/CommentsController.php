<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function create($id){
        $comment = new Comment();
        $comment->book_id=$id;
        $comment->user_id=Auth::user()->id;
        $comment->content=request('content');
        $comment->save();
        return back();
    }
}
