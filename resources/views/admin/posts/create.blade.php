@extends('layouts.admin')
@section('breadcrumbs')
  @include('admin.partials.breadcrumbs')
@stop
<!-- Main Content -->
@section('content')

<div class="col-sm-12">

   <div class="alert  alert-success alert-dismissible fade show" role="alert">
     <span class="badge badge-pill badge-success">Success</span> You successfully read this important alert message.
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
     </button>
   </div>

   <div class="card">
       <div class="card-header">
         <strong>{{$title}}</strong>
       </div>
       <div class="card-body card-block">
         <form action="" method="post" class="form-horizontal">
           <div class="row form-group">
             <div class="col col-md-3"><label for="title" class=" form-control-label">Title</label></div>
             <div class="col-12 col-md-9"><input type="text" id="title" name="title" placeholder="Enter title..." class="form-control"><span class="help-block">Please enter title</span></div>
           </div>
           <div class="row form-group">
             <div class="col col-md-3"><label for="content" class=" form-control-label">Content</label></div>
             <div class="col-12 col-md-9">
               <textarea id="content" name="content" placeholder="Enter content..." class="form-control" rows="6"></textarea>
               <span class="help-block">Please enter content</span></div>
           </div>
         </form>
       </div>
       <div class="card-footer">
         <button type="submit" class="btn btn-primary btn-sm">
           <i class="fa fa-dot-circle-o"></i> Submit
         </button>
         <button type="reset" class="btn btn-danger btn-sm">
           <i class="fa fa-ban"></i> Reset
         </button>
       </div>
     </div>

</div>
@endsection
