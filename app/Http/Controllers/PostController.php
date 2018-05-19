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
        $posts = DB::table('posts')->get();
        // $posts = DB::table('posts')->paginate(10);
        // $posts = DB::table('posts')->simplePaginate(10);
        // dd($posts);
        return view('blog.index', ['posts' => $posts]);
        // return view('blog.index8', ['posts' => $posts]);
        // return view('blog.index9', compact('posts'));
        
    }

    public function getLatestPosts()
    {
        // $posts = DB::table('posts')->orderBy('id', 'desc')->take(5)->get();
        // $posts = DB::table('posts')->orderBy('id', 'desc')->skip(10)->take(5)->get();

        // $posts = DB::table('posts')
        //         ->offset(10)
        //         ->limit(5)
        //         ->get();

        $posts = DB::table('posts')->orderBy('id', 'desc')->get();
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
    public function show($id)
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

    public function getPosts()
    {
        // $posts = DB::table('posts')
        //         ->where('id', '>=', 100)
        //         ->get();

        // $posts = DB::table('posts')
        //                 ->where('id', '<>', 100)
        //                 ->get();

        // $posts = DB::table('posts')
        //                 ->where('title', 'like', 'T%')
        //                 ->get();

        // $posts = DB::table('posts')->where([
        //     ['status', '=', '1'],
        //     ['id', '>', '100'],
        // ])->get();


        // $posts = DB::table('posts')
        //             ->where('id', '>', 100)
        //             ->orWhere('status', true)
        //             ->get();
        
        // $posts = DB::table('posts')
        //     ->whereBetween('id', [1, 100])->get();

        // $posts = DB::table('posts')
        //     ->whereNotBetween('id', [1, 100])
        //     ->get();

        // $posts = DB::table('posts')
        //     ->whereIn('category_id', [1, 2, 3])
        //     ->get();
        
        // $posts = DB::table('posts')
        //     ->whereNotIn('category_id', [1, 2, 3])
        //     ->get();
        
        // $posts = DB::table('posts')
        //     ->whereNull('updated_at')
        //     ->get();
        
        // $posts = DB::table('posts')
        //     ->whereNotNull('updated_at')
        //     ->get();

        // $posts = DB::table('posts')
        //     ->whereDate('created_at', '2018-05-17')
        //     ->get();
        // $posts = DB::table('posts')
        //     ->whereMonth('created_at', '05')
        //     ->get();
        
        // $posts = DB::table('posts')
        //     ->whereDay('created_at', '18')
        //     ->get();

        // $posts = DB::table('posts')
        //     ->whereYear('created_at', '2018')
        //     ->get();
        // $posts = DB::table('posts')
        //     ->whereColumn('updated_at', '>', 'created_at')
        //     ->get();

        return view('blog.index', ['posts' => $posts]);
    }


    public function getTitle($id)
    {
        $title = DB::table('posts')->where('id', $id)->value('title');
        return $title;
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
