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
Route::get('latest', 'PostController@latestPost');
// Route::get('oldest', 'PostController@oldestPost');

// Route::get('blog/popular', 'PostController@popular');
// Route::resource(
//     'blog', 'PostController', [
//         'only' => [
//             'index', 'show'
//         ]
//     ]
// );

// Route::resource(
//     'blog', 'PostController', [
//         'except' => [
//             'create', 'store', 'update', 'destroy'
//         ]
//     ]
// );



Route::get('admin', 'Admin\DashboardController');


// Зарегистрировать маршрут контроллера ресурса:

Route::resource('admin/posts', 'Admin\PostController');


Route::get('admin/categories/trashed', 'Admin\CategoryController@getOnlyTrashed')->name('categories.trashed');
Route::get('admin/categories/restore/{id}', 'Admin\CategoryController@restore')->name('categories.restore');
Route::get('admin/categories/clear/{id}', 'Admin\CategoryController@clear')->name('categories.clear');

Route::resource('admin/categories', 'Admin\CategoryController');

Route::resource('admin/tags', 'Admin\TagController');

// Route::resource(
//     'posts', 'Admin\PostController', ['names' => [
//     'create' => 'posts.build',
//     'destroy' => 'posts.delete'
//     ]]
// );


// Route::resource(
//     'posts', 'AdminUserController', ['parameters' => [
//     'posts' => 'admin_posts'
//     ]]
// );
