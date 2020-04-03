<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. Thesez`
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/','home');
Route::get('/login',function() {
    return view('home');
});
Route::view('/register/redirect','auth.emailconfirm');


Route::get('/boards','BoardController@index');
Route::get('/boards/{category}','CategoryController@show');
Route::get('/boards/{board}/create','PostController@create')->middleware('auth');
Route::post('/boards','PostController@store');

Route::post('comment/create/{postid}','CommentController@store');
Route::post('/more','CommentController@index');
Route::get('/posts/{post}','PostController@show');
Route::put('/posts/{post}','PostController@update');
Route::get('/posts/{post}/remove','PostController@destroy');
Route::get('/posts/{comment}/comments/remove','CommentController@destroy');
Route::put('/posts/{post}','PostController@update');
Auth::routes();

Route::get("/profile/{user}",'ProfileController@show');
Route::put('/profile/{user}','ProfileController@update');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout','Auth\LoginController@logout');
Route::post('/tasks','LiveSearch@action');
