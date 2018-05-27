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
    return view('welcome');
});
Route::get('/about', 'AboutController')->name('about');
Route::get('/blog', 'PostController@index')->name('blog');
Route::get('/blog/{slug}', 'PostController@show')->name('show');
Route::get('/news', 'PostController@getLatestPosts')->name('news');

Route::get('contact', 'ContactController@index')->name('contactus');
Route::get('admin', 'Admin\DashboardController')->name('contactus');


Route::get('admin/categories/trashed', 'Admin\CategoryController@getOnlyTrashed')->name('categories.trashed');
Route::get('admin/categories/restore/{id}', 'Admin\CategoryController@restore')->name('categories.restore');
Route::get('admin/categories/clear/{id}', 'Admin\CategoryController@clear')->name('categories.clear');

Route::resource('admin/categories', 'Admin\CategoryController');
Route::resource('admin/tags', 'Admin\TagController');
Route::resource('admin/posts', 'Admin\PostController');