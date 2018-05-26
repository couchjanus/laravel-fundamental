<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Показать список всех доступных posts.
        // Метод all() в Eloquent возвращает все результаты из таблицы модели.
        $posts = Post::paginate(10);

        $title = "Post List";
        $breadcrumbs = ['Dashboard'=>'/admin', 'Publication List'=>'#'];

        return view('admin.posts.index', ['posts' => $posts, 'title' => $title, 'breadcrumbs'=>$breadcrumbs]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $title = "New Post";
      $categories = Category::pluck('name', 'id');
      $breadcrumbs = ['Dashboard'=>'/admin', 'Publication List'=>'/admin/posts', 'New Post'=>'#'];

      return view('admin.posts.create', ['title' => $title, 'breadcrumbs'=>$breadcrumbs, 'categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:posts|max:255',
            'content' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect(route('posts.index'))
                        ->withErrors($validator)
                        ->withInput();
        }

        // Store the blog post...
        $post = Post::create($request->all());

        return redirect(route('posts.index'))->with('success', 'An post has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
