@extends('layouts.admin')
@section('breadcrumbs')
  @include('admin.partials.breadcrumbs')
@stop
@section('content')

<!-- Main Content -->
<div class="col-sm-12">
    @if ($message = Session::get('success'))
    <div class="alert  alert-success alert-dismissible fade show" role="alert">
        <span class="badge badge-pill badge-success">Success</span> {!! $message !!}.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif 
   <div class="card">
        <div class="card-header">
            <strong class="card-title">{{ $title }}</strong><a href="{{route('tags.create')}}"><button type="button" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i>&nbsp;Add New</button></a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                  @each('admin.tags.partials.tag',
                         $tags,
                         'tag',
                         'admin.tags.partials.tag-none'
                      )
                </tbody>
            </table>
            {{ $tags->links() }}
        </div>
    </div>
</div>

@foreach($tags as $tag)
  @include('admin.tags.partials.modal_destroy')
@endforeach
@endsection
