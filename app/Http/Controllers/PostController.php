<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use DB;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        // $posts = DB::select('select * from posts');
        $posts = DB::table('posts')->paginate(5);
        // dd($posts);
        return view('blog.index', ['posts'=>$posts]);
    }

    public function getLatestPosts()
    {
        // $posts = DB::table('posts')->orderBy('id', 'desc')->take(5)->get();
        // $posts = DB::table('posts')->orderBy('id', 'desc')->skip(10)->take(5)->get();

        // $posts = DB::table('posts')
        //         ->offset(10)
        //         ->limit(5)
        //         ->get();

        // $posts = DB::table('posts')->orderBy('id', 'desc')->get();
        $posts = DB::table('posts')->latest()->take(10)->get();
        // $posts = DB::table('posts')->whereNotIn('category_id', [1, 3])
        // ->get();

        return view('blog.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function showById($id)
    {
        //
        // $post = DB::select("select * from posts where id = :id", ['id' => $id]);
        // $post = DB::table('posts')->where('id', '=', $id)->first();
        $post = DB::table('posts')->where('id', $id)->first();
        
        // $title = DB::table('posts')->where('id', $id)->value('title');
        return view('blog.show', ['post' => $post]);
        // return view('blog.show1', ['post' => $post]);
        // return view('blog.show2', ['post' => $post, 'hescomment' => true ]);
    }
 


// PostsController, метод showBySlug:
public function show($slug)
{
       /**
        * Вначале мы проверяем, не является ли слаг числом.
        * Часто слаги внедряют в программу уже после того,
        * как был другой механизм построения пути.
        * Например, через числовые индексы.
        * Тогда может получится ситуация, что пользователь,
        * зайдя на сайт по старой ссылке, увидит 404 ошибку,
        * что такой страницы не существует.
       */
      if (is_numeric($slug)) {
       
        // Get post for slug.
            $post = Post::findOrFail($slug);
              
            return Redirect::to(route('blog.show', $post->slug), 301);
             // 301 редирект со старой страницы, на новую.   
           
        }

        // Get post for slug.
        $post = Post::whereSlug($slug)->firstOrFail();

        return view('blog.show', [
           'post' => $post,
           'hescomment' => true
           ]
       );
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
