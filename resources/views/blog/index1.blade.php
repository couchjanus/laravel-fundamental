@extends('layouts.app')

@section('title')
    Blog Post Title
@endsection

{{--Styles--}}
@section('styles')
    <!-- Custom styles for this template -->
    <link href="/css/styles.css" rel="stylesheet">
@endsection

@section('page')
    <?php foreach ($posts as $post) :?>
    <div class="blog-post">
    <h2 class="blog-post-title">{{$post->title}}</h2>               
    <p class="blog-post-meta">{{$post->created_at}}</p>
    <a class="button" href="/blog/{{$post->id}}">Read More</a>
    </div><!-- /.blog-post -->
    <?php endforeach;?>
@endsection