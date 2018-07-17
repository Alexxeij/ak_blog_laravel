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

// home
Route::get('/', 'PostController@index');

Route::get('/article', 'ArticleController@index');
// admin
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

// one post
Route::get('/{slug}', 'PostController@show')->name('postShow');


