@extends('layouts.admin')
@section('breadcrumbs')
  @include('admin.partials.breadcrumbs')
@stop
<!-- Main Content -->
@section('content')

<div class="col-sm-12">

  @if (count($errors) > 0)
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      @foreach ($errors->all() as $error)
        <span class="badge badge-pill badge-danger">Error</span> {!! $error !!}.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
      </button>
      @endforeach
    </div>
  @endif

   <div class="card">
       <div class="card-header">
         <strong>{{$title}}</strong>
       </div>
       <div class="card-body card-block">
         {!! Form::open(['method' => 'POST', 'enctype' => "multipart/form-data", 'route' => 'posts.store', 'class' => 'form-horizontal']) !!}

           <div class="row form-group">
            <div class="col col-md-3">
             {!! Form::label('title', 'Title*', ['class' => 'form-control-label']) !!}
            </div>
            <div class="col-12 col-md-9">
              {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => 'Enter Title']) !!}
               <span class="help-block">Please enter title</span>
               @if($errors->has('title'))
                   <p class="help-block">
                       {{ $errors->first('title') }}
                   </p>
               @endif
            </div>
           </div>

           <div class="row form-group">
             <div class="col col-md-3"><label for="is_active" class=" form-control-label">Is Active</label></div>
             <div class="col-12 col-md-9">
               {{ Form::checkbox('is_active', 1, null, ['class' => 'form-control']) }}
               </div>
           </div>

           <div class="row form-group">
            <div class="col col-md-3">
              {!! Form::label('category_id', 'Select Category:', ['class' => 'form-control-label']) !!}

            </div>
            <div class="col-12 col-md-9">
              {!! Form::select('category_id', $categories, null, ['id' => 'category_id', 'class' => 'form-control']) !!}
            </div>
           </div>

           <div class="row form-group">
             <div class="col col-md-3">
               {!! Form::label('content', 'Content', ['class' => 'form-control-label']) !!}
             </div>
             <div class="col-12 col-md-9">
               {!! Form::textarea('content', old('content'), array('class' => 'form-control', 'rows'=>"6")) !!}
               <span class="help-block">Please enter content</span>

               @if($errors->has('content'))
                   <p class="help-block">
                       {{ $errors->first('content') }}
                   </p>
               @endif
             </div>


           </div>

       </div>
       <div class="card-footer">
         <a href="{!! route('posts.index') !!}" class="btn btn-danger btn-sm">Cancel</a>
         {!! Form::submit('Save', ['class' => 'btn btn-primary btn-sm']) !!}
       </div>
       {!! Form::close() !!}
     </div>

</div>
@endsection
