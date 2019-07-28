<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/login','AuthController@getLogin')->middleware('guest');
Route::post('/logn','AuthController@PostLogin')->middleware('guest');
Route::get('/admin/login','AdminsAuthController@getAdminLogin')->middleware('guest');


Route::get('/admin/users','UsersController@getUsers')->middleware('auth:admin');
Route::get('/admin/users/create','UsersController@getUsers')->middleware('auth:admin');
Route::get('/admin/users/{user}/edit','UsersController@getEditUser')->middleware('auth:admin');
Route::patch('/admin/users/{user}','UsersController@editUser')->middleware('auth:admin');
Route::delete('/admin/users/{user}','UsersController@deleteUser')->middleware('auth:admin');
Route::post('admin/users/create','UsersController@postUser')->middleware('auth:admin');
Route::get('admin/users/create','UsersController@addUser')->middleware('auth:admin');


Route::get('/admin/books','BooksController@getBooks')->middleware('auth:admin');
Route::get('/admin/books/{book}/edit','BooksController@getEditBook')->middleware('auth:admin');
Route::patch('/admin/books/{book}','BooksController@editBook')->middleware('auth:admin');
Route::delete('/admin/books/{book}','BooksController@deleteBook')->middleware('auth:admin');
Route::post('admin/books/create','BooksController@postBook')->middleware('auth:admin');
Route::get('admin/books/create','BooksController@addBook')->middleware('auth:admin');


Route::get('/admin/admins','AdminController@getAdmins')->middleware('auth:admin');
Route::get('/admin/admins/{admin}/edit','AdminController@getEditAdmin')->middleware('auth:admin');
Route::patch('/admin/admins/{admin}','AdminController@editAdmin')->middleware('auth:admin');
Route::delete('/admin/admins/{admin}','AdminController@deleteAdmin')->middleware('auth:admin');
Route::post('admin/admins/create','AdminController@postAdmin')->middleware('auth:admin');
Route::get('admin/admins/create','AdminController@addAdmin')->middleware('auth:admin');

Route::get('/admin/categories','CategoriesController@getCategories')->middleware('auth:admin');
Route::get('/admin/categories/{category}/edit','CategoriesController@getEditCategory')->middleware('auth:admin');
Route::patch('/admin/categories/{category}','CategoriesController@editCategory')->middleware('auth:admin');
Route::delete('/admin/categories/{category}','CategoriesController@deleteCategory')->middleware('auth:admin');
Route::post('admin/categories/create','CategoriesController@postCategory')->middleware('auth:admin');
Route::get('admin/categories/create','CategoriesController@addCategory')->middleware('auth:admin');

Route::post('admin/logn','AdminsAuthController@PostAdminLogin')->middleware('guest:admin');
Route::get('/admin','AdminController@index')->middleware('auth:admin');

Route::get('/register','AuthController@getRegister')->middleware('guest');
Route::post('/regster','AuthController@postRegister')->middleware('guest');
Route::post('/books/{books}/like','LikesController@create')->middleware('auth');
Route::post('/books/{books}/comment','CommentsController@create')->middleware('auth');
Route::get('/books/{books}/show','BooksForUserController@show')->middleware('auth');
Route::post('/books/{books}/order','BooksForUserController@order')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->middleware('auth');
Route::get('/orders', 'HomeController@orders')->middleware('auth');
