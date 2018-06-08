@extends('layouts.blog')
@section('breadcrumb')
  {!! $breadcrumbs->render() !!} 
@endsection
@section('content')
<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
        <div class="post-preview">
              <h2 class="post-title">
                {{$post->title}}
              </h2>
              <blockquote>
                <p>{{$post->content}}</p>
              </blockquote>
            
            <p class="post-meta">Posted by
              <a href="#">Janus </a>
              {{$post->created_at}}</p>
          </div>
        <hr>
        @includeWhen($hescomment, 
                     'blog.partials.comments', 
                     ['some' => 'data']
                    )
        </div>
        
    </div>
</div>
@endsection
