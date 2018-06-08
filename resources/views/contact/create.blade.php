@extends('layouts.main')

@section('jumbotron')
    <br>
    <div class="jumbotron">
        <div class="container">
            <h1>Contact Us</h1>
            <h2>Your message will be delivered to our clandestine team</h2>
            
        </div>
    </div>
@endsection
@section('content')
    <div class="container">
      <div class="row justify-content-center">
        @if ($message = Session::get('success'))
            <div class="alert  alert-success alert-dismissible fade show" role="alert">
                <span class="badge badge-pill badge-success">Success</span> {!! $message !!}.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
              </button>
            </div>
        @endif

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

        <div class="col-md-8">
          <div class="card">
            <div class="card-header">Contact us</div>
            <div class="card-body">
                <p>
                    Send us your questions, comments, and suggestions and someone will be in touch within
                    24 hours.
                </p>

                {!! Form::open(['route' => 'contact.store']) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Your Name') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'E-mail Address') !!}
                    {!! Form::text('email', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('msg', 'Message') !!}
                    {!! Form::textarea('msg', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                </div>

                {!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}

                {!! Form::close() !!}
                <br />
              </div>
          </div>
        </div>
      </div>
    </div>
@endsection

