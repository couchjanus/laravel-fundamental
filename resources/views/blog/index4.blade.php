@extends('layouts.blog')
@section('content')
    <?php foreach ($posts as $post) :?>
    <div class="blog-post">
    <h2 class="blog-post-title">{{$post->title}}</h2>               
    <p class="blog-post-meta">{{$post->created_at}}</p>
    <a class="button" href="/blog/{{$post->id}}">Read More</a>
    </div><!-- /.blog-post -->
    <?php endforeach;?>
@endsection
