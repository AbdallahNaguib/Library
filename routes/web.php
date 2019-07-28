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

Route::get('/login','AuthController@getLogin');
Route::post('/logn','AuthController@PostLogin');
Route::get('/admin/login','AdminsAuthController@getAdminLogin');


Route::get('/admin/users','UsersController@getUsers');
Route::get('/admin/users/create','UsersController@getUsers');
Route::get('/admin/users/{user}/edit','UsersController@getEditUser');
Route::patch('/admin/users/{user}','UsersController@editUser');
Route::delete('/admin/users/{user}','UsersController@deleteUser');
Route::post('admin/users/create','UsersController@postUser');
Route::get('admin/users/create','UsersController@addUser');


Route::get('/admin/books','BooksController@getBooks');
Route::get('/admin/books/{book}/edit','BooksController@getEditBook');
Route::patch('/admin/books/{book}','BooksController@editBook');
Route::delete('/admin/books/{book}','BooksController@deleteBook');
Route::post('admin/books/create','BooksController@postBook');
Route::get('admin/books/create','BooksController@addBook');


Route::get('/admin/admins','AdminController@getAdmins');
Route::get('/admin/admins/{admin}/edit','AdminController@getEditAdmin');
Route::patch('/admin/admins/{admin}','AdminController@editAdmin');
Route::delete('/admin/admins/{admin}','AdminController@deleteAdmin');
Route::post('admin/admins/create','AdminController@postAdmin');
Route::get('admin/admins/create','AdminController@addAdmin');

Route::get('/admin/categories','CategoriesController@getCategories');
Route::get('/admin/categories/{category}/edit','CategoriesController@getEditCategory');
Route::patch('/admin/categories/{category}','CategoriesController@editCategory');
Route::delete('/admin/categories/{category}','CategoriesController@deleteCategory');
Route::post('admin/categories/create','CategoriesController@postCategory');
Route::get('admin/categories/create','CategoriesController@addCategory');

Route::post('admin/logn','AdminsAuthController@PostAdminLogin');
Route::get('/admin','AdminController@index');
Route::delete('/admin/users/{id}','AdminController@deleteUser');

Route::get('/register','AuthController@getRegister');
Route::post('/regster','AuthController@postRegister');
Route::post('/books/{books}/like','LikesController@create');
Route::post('/books/{books}/comment','CommentsController@create');
Route::get('/books/{books}/show','BooksForUserController@show');
Route::post('/books/{books}/order','BooksForUserController@order');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/orders', 'HomeController@orders');
