@extends('layouts.app')

@section('title')
    Blog Post Title
@endsection

{{--Styles--}}
@section('styles')
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href={{ asset('css/styles.css') }}" rel="stylesheet">
@endsection

@section('navigation')
    @include('layouts.shared.navigation')
@endsection
<hr>

{{--Page--}}
@section('page')
   <div class="row">
      @yield('content')
      @yield('sidebar')
   </div>
@endsection
<hr>
@section('footer')
    @include('layouts.shared.footer')
@endsection
