@extends('layouts.app')

@section('title')
    Blog Post Title
@endsection

{{--Styles--}}
@section('styles')
    <!-- Bootstrap core CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/css/styles.css" rel="stylesheet">
@endsection

@section('navigation')
    @include('layouts.shared.navigation')
@endsection
<hr>
@section('page')
    <?php foreach ($posts as $post) :?>
    <div class="blog-post">
    <h2 class="blog-post-title">{{$post->title}}</h2>               
    <p class="blog-post-meta">{{$post->created_at}}</p>
    <a class="button" href="/blog/{{$post->id}}">Read More</a>
    </div><!-- /.blog-post -->
    <?php endforeach;?>
@endsection
<hr>
@section('footer')
    @include('layouts.shared.footer')
@endsection