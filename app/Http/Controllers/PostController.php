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
        // $posts = DB::table('posts')->simplePaginate(10);
        // return view('blog.index', ['posts' => $posts]);

        $posts = Post::paginate(10);

        $response = [
            'pagination' => [
                'total' => $posts->total(),
                'per_page' => $posts->perPage(),
                'current_page' => $posts->currentPage(),
                'last_page' => $posts->lastPage(),
                'from' => $posts->firstItem(),
                'to' => $posts->lastItem()
            ],
            'data' => $posts
        ];

        return response()->json($response);
    }

    public function getLatestPosts()
    {
        // $posts = DB::table('posts')->orderBy('id', 'desc')->take(5)->get();
        // $posts = DB::table('posts')->orderBy('id', 'desc')->skip(10)->take(5)->get();

        // $posts = DB::table('posts')
        //         ->offset(10)
        //         ->limit(5)
        //         ->get();

        $posts = App\Post::where('status', 1)
               ->orderBy('id', 'desc')
               ->take(10)
               ->get();

        return view('blog.index', ['posts' => $posts]);
    }

    public function latestPost()
    {
        $post = DB::table('posts')
                ->latest()
                ->first();
        return view('blog.show', ['post' => $post]);
    }

    public function oldestPost()
    {
        $post = DB::table('posts')
            ->oldest()
            ->first();
        return view('blog.show', ['post' => $post]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
      if (is_numeric($slug)) {

      // Get post for slug.
          $post = Post::findOrFail($slug);

          return Redirect::to(route('blog.show', $post->slug), 301);
           // 301 редирект со старой страницы, на новую.

      }
      // Get post for slug.
       
      $post = Post::whereSlug($slug)->firstOrFail();
      $this->breadcrumbs
           ->addCrumb('Blog', 'blog')
           ->addCrumb($post->title, "");
      
      return view('blog.show', [
         'post' => $post,
         'breadcrumbs' => $this->breadcrumbs,
         'hescomment' => true
         ]
     );
    }


    public function getTitle($id)
    {
        $title = DB::table('posts')->where('id', $id)->value('title');
        return $title;
    }

}
