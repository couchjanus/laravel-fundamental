@extends('layouts.blog')
@section('content')
<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            @if (count($posts) > 0)
                @foreach ($posts as $post)
                    @include('blog.partials.post')
                @endforeach
            @else
                @include('blog.partials.post-none')
            @endif
        </div>
    </div>
</div>
@endsection
