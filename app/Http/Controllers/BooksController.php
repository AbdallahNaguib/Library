<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{

    public function getBooks(){
        $books = Book::all();
        return view('admin.books.index',['list'=>$books]);
    }
    public function addBook(){
        return View('admin.books.create');
    }
    public function postBook(Request $request){
        $rules = [
            'name' => 'required',
            'description' => "required",
            'price' => "required",
            'quantity' => "required",
        ];
        $this->validate(request(),$rules);
        Book::add($request);
        return redirect('admin/books');
    }
    public function deleteBook($id){
        $book = Book::find($id);
        DB::table('comments')
            ->where('book_id', $id)
            ->delete();
        DB::table('likes')
            ->where('book_id', $id)
            ->delete();
        $book->delete();
        return back();
    }
    public function getEditBook($id){
        $book=Book::find($id);
        return view('admin.books.edit',['book'=>$book]);
    }
    public function editBook($id){
        $rules = [
            'name' => 'required',
            'description' => "required",
            'price' => "required",
            'quantity' => "required",
        ];
        $this->validate(request(),$rules);
        $book = Book::find($id);
        $book->name = request('name');
        $book->description = request('description');
        $book->price = request('price');
        $book->quantity = request('quantity');
        $book->category_id = request('category');
        $book->save();
        return redirect('admin/books');
    }
}
