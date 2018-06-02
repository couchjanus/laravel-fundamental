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
    'blog/{slug}', [
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

// Можно использовать метод middleware для назначения посредника на маршрут:

// Route::get('admin', 'Admin\DashboardController')->middleware('auth');
 
// Для назначения нескольких посредников для маршрута:

// Route::get('admin', 'Admin\DashboardController')->middleware('auth', 'admin');
  
// можете использовать ключ middleware в массиве параметров маршрута:
  
// Route::get(
//     'admin', [
//         'uses' => 'Admin\DashboardController', 'as' => 'admin', 'middleware' => 'auth'
//         ]
// );

// Используйте массив для назначения нескольких посредников для маршрута:

// Route::get(
//     'admin', [
//         'uses' => 'Admin\DashboardController', 'as' => 'admin', 'middleware' => ['auth', 'admin']
//         ]
// );


// Вместо использования массива вы можете использовать сцепку метода middleware() с определением маршрута:

Route::get('admin', 'Admin\DashboardController')->middleware(['auth', 'admin']);


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

Route::get('/contact', 'ContactController@index');
Route::post('/contact', 'ContactController@store')->name('contact');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('social/{provider}', 'Auth\SocialController@redirect')->name('social.redirect');

Route::get('social/{provider}/callback', 'Auth\SocialController@handle')->name('social.handle');

