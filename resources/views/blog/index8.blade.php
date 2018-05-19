@extends('layouts.blog')
@section('content')
<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
        @each('blog.partials.post', 
               $posts, 
               'post', 
               'blog.partials.post-none'
            )
        <hr>

        </div>
        
    </div>
</div>
@endsection
