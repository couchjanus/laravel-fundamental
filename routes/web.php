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

Route::get(
    '/', function () {
        return view('welcome');
    }
);

Route::get('blog', 'PostController@index');

Route::get(
    'blog/{id}', [
        'uses' => 'PostController@show', 'as' => 'show'
        ]
);

Route::get('news', 'PostController@getLatestPosts');

Route::get('latest', 'PostController@latestPost');
Route::get('oldest', 'PostController@oldestPost');
