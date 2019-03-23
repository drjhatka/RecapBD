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
Route::get('/', 'FrontendController@index')->name('home');
Route::get('/show-news/{id}', 'FrontendController@showNews')->name('show.frontend.news');

//backend routes

//login routes
    Route::get('/login', 'LoginController@loginForm')->name('login');
    Route::post('/login', 'LoginController@login')->name('login.post');
    Route::get('/logout', 'LoginController@logout')->name('logout');
// end login routes

//dashboard home
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

//--------------Add News------------------
    Route::get('/dashboard/add-news','NewsController@create')->name('add.news');
    Route::post('/dashboard/add-news','NewsController@store')->name('post.news');
//!-------------Add News

//--------------Add Editorials---------------
    Route::get('/dashboard/add-editorial','EditorialController@index')->name('add.editorial');
    Route::post('/dashboard/add-editorial','EditorialController@save')->name('save.editorial');
//!--------------Add Editorials

//--------------Edit Editorials----------------
    Route::get('/edit-editorial/{id}','EditorialController@showEditForm')->name('editorial.edit.form');
    Route::post('/edit-editorial')->name('edit.editorial');
//!--------------Edit Editorials--------------

//--------------View Editorials ---------------
    Route::get('/show-editorials','EditorialController@viewAllEditorials')->name('view.editorials');
//!-------------View Editorials ---------------


//--------------Show News
    Route::get('/view-news', 'NewsController@show')->name('show.news');
    Route::get('/view-news/{id}','NewsController@showIndvNews')->name('show.news.indv');
//!-------------Show News

//search operations
    Route::get('/search', 'DashboardController@search')->name('search');
//search show
    Route::get('/search-show', 'DashboardController@showSearchResult')->name('search.result');

//--------------Edit News
    Route::get('/edit-news/{id}','NewsController@showEditForm')->name('show.edit');
    Route::post('/post-edit', 'NewsController@edit')->name('post.edit');
//!--------------Edit News


//--------------Delete News
    Route::get('/delete/{news_id}', 'NewsController@delete')->name('delete.news');

//temporary logins for delete when done in production
    Route::get('/add-user', function(){
        return view('backend.temp.add-user');
    })->name('add.user');

    Route::post('/add-user', 'LogicHelper@addUser');

    Route::get('/add-tags','LogicHelper@addTag')->name('add.tags');
    Route::post('/post-tags','LogicHelper@postTag')->name('post.tags');

