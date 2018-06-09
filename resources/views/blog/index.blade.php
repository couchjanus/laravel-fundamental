@extends('layouts.blog')
@section('content')
<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="card mb-4">
                <div v-for="post in posts">
                    <div class="card-body">
                        <h2 class="card-title">@{{ post.title }}</h2>  
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                                  
                        <a :href="'/blog/' + post.slug" class="btn btn-primary">Read More &rarr;</a>
                    </div>
                    
                    <div class="card-footer text-muted">
                        Posted on  by&nbsp;
                        <a href=""> Janus Nic</a>
                    </div>
                </div>
                <!-- Pagination -->
                <pagination v-if="pagination.last_page > 1" :pagination="pagination" :offset="3" @paginate="fetchPosts()"></pagination>
            </div>
        </div>
        
    </div>
</div>
@endsection
