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


//frontend routes
Route::get('/', 'NewsController@index')->name('home');

//backend routes

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/login', 'LoginController@loginForm')->name('login');
Route::post('/login', 'LoginController@login')->name('login.post');


Route::get('/dashboard/add-news','DashboardController@addNewsForm')->name('add.news');

Route::post('/dashboard/add-news','NewsController@store')->name('post.news');

//temporary logins for delete when done in production
Route::get('/add-user', function(){
    return view('backend.temp.add-user');
})->name('add.user');

Route::post('/add-user', 'LogicHelper@addUser');

Route::get('/logout', 'LoginController@logout')->name('logout');

Route::get('/view-news/{id}', function($id){
    return view('backend.view-individual-news')->with('id',$id);
})->name('show.news.indv');

Route::get('/view-news', 'NewsController@show')->name('show.news');

Route::get('search', 'DashboardController@search')->name('search');

Route::get('/edit-news/{id}', function($id){
    return view('backend.edit-news')->with('id',$id);
})->name('show.edit');

Route::post('/post-edit', 'NewsController@edit')->name('post.edit');
