<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Category;
use App\Tag;
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
        $tags = Tag::pluck('name', 'id');
        $breadcrumbs = ['Dashboard'=>'/admin', 'Publication List'=>'/admin/posts', 'New Post'=>'#'];

        return view('admin.posts.create', ['title' => $title, 'breadcrumbs'=>$breadcrumbs, 'categories'=>$categories, 'tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Store the blog post...

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->is_active = $request->has('is_active');

        $post->save();

        // $post->tags()->sync($request->input('tags'), false);
        
        $post->tags()->syncWithoutDetaching($request->tags);
        
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
    public function edit($id)
    {
        $title = "Edit Post";
        $categories = Category::select('id', 'name')->pluck('name', 'id');
        $tags = Tag::orderBy('name')->pluck('name', 'id');
        $post = Post::find($id);
        $breadcrumbs = ['Dashboard'=>'/admin', 'Publication List'=>'/admin/posts', 'Edit Post'=>'#'];
        return view('admin.posts.edit', ['title' => $title, 'breadcrumbs' => $breadcrumbs, 'categories' => $categories, 'post' => $post, 'tags' => $tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->is_active = $request->has('is_active');

        $post->save();
        $post->tags()->toggle($request->tags);

        return redirect(route('posts.index'))->with('success', 'An article has been updated');
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
