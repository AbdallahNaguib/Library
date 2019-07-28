<?php

namespace App\Http\Controllers;

use App\Book;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BooksForUserController extends Controller
{
    public function show($id){
        $book = Book::find($id);
        return view('books.show',['book'=>$book]);
    }
    public function order($id){
        $book = Book::find($id);
        $quantity = request('quantity');
        if($quantity > $book->quantity){
            // if the user ordered more than what is available
            // then give him all the available
            $quantity = $book->quantity;
        }
        $book->quantity -= $quantity;
        $book->save();
        $order = new Order();
        $order->visitor_id = Auth::user()->id;
        $order->book_id = $id;
        $order->quantity = $quantity;
        $order->save();
        return redirect('/home');
    }
}
