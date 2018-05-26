@extends('layouts.admin')
@section('breadcrumbs')
  @include('admin.partials.breadcrumbs')
@stop
@section('content')

<!-- Main Content -->
<div class="col-sm-12">

   <div class="alert  alert-success alert-dismissible fade show" role="alert">
     <span class="badge badge-pill badge-success">Success</span> You successfully read this important alert message.
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
     </button>
   </div>

   <div class="card">
        <div class="card-header">
            <strong class="card-title">{{ $title }}</strong><a href="{{route('categories.create')}}"><button type="button" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i>&nbsp;Add New</button></a>
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
                  @each('admin.categories.partials._trashed',
                         $categories,
                         'category',
                         'admin.categories.partials.category-none'
                      )
                </tbody>
            </table>
            {{ $categories->links() }}
        </div>
    </div>
</div>

@foreach($categories as $category)
  @include('admin.categories.partials.modal_destroy')
@endforeach
@endsection
