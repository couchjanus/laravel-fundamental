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
        return view('index');
    }
);



Route::get(
    '/email', function () {
        return new App\Mail\ContactEmail();
    }
);

// Route::get('blog', 'PostController@index');
Route::get('blog', function () {
    return view('blog.index');
 })->name('blog');
 
Route::get('blogposts', 'PostController@index')->name('blogposts');

Route::get(
    'blog/{slug}', [
        'uses' => 'PostController@show', 'as' => 'show'
        ]
);

Route::get('/articles', function () {
    return view('articles.index', [
        'articles' => App\Entities\Article::all(),
    ]);
});

use \App\Repositories\ArticlesRepository;

Route::get('/search', function (ArticlesRepository $repository) {
    $articles = $repository->search((string) request('q'));
    return view('articles.index', [
    	'articles' => $articles,
    ]);
});

// Route::get('latest', 'PostController@latestPost');
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

Route::get('/trashed', 'Admin\UsersManagementController@indexTrashed')->name('users.trashed');
Route::resource('admin/users', 'Admin\UsersManagementController');
Route::resource('admin/tags', 'Admin\TagController');

Route::resource('roles', 'Admin\RolesController');
Route::resource('permissions', 'Admin\PermissionsController');



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

// Route::get('/contact', 'ContactController@index');
// Route::post('/contact', 'ContactController@store')->name('contact');

Route::get('contact', ['as' => 'contact', 'uses' => 'ContactController@create']);


 Route::post('contact', ['as' => 'contact_send', 'uses' => 'ContactController@send']);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('social/{provider}', 'Auth\SocialController@redirect')->name('social.redirect');

Route::get('social/{provider}/callback', 'Auth\SocialController@handle')->name('social.handle');

Route::get('/verify/token/{token}', 'Auth\VerificationController@verify')->name('auth.verify'); 
Route::get('/verify/resend', 'Auth\VerificationController@resend')->name('auth.verify.resend');

