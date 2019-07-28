<?php

namespace App\Http\Controllers;

use App\Book;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $books = Book::all();
        return view('home',['books'=>$books]);
    }
    public function orders()
    {
        $orders = Order::all()->where('visitor_id',Auth::user()->id);
        $list=[];

        return view('user-orders',['list'=>$orders]);
    }
}
