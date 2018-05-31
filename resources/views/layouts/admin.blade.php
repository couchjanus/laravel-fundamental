<!doctype html>
<!-- Stored in resources/views/layouts/app.blade.php -->
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]>
<!-->
<html lang="{{ app()->getLocale() }}" class="no-js">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    {{--CSRF Token--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script type="text/javascript">
        var _token = '{!! csrf_token() !!}';
        var _url = '{!! url("/") !!}';
        var _appTimeZone = '{!! config('app.timezone', 'UTC') !!}';
    </script>
    {{--Title and Meta--}}

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - @yield('title')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    @yield('meta')

    {{--Common App Styles--}}
    <link rel="stylesheet" href="/vendor/normalize.css">
    <link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/vendor/select2/css/select2.min.css">
    
    <link rel="stylesheet" href="/vendor/font-awesome/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="assets/css/themify-icons.css"> -->
    <!-- <link rel="stylesheet" href="assets/css/flag-icon.min.css"> -->
    <!-- <link rel="stylesheet" href="assets/css/cs-skin-elastic.css"> -->
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="/css/style.css">
    <!-- <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet"> -->

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    {{--Styles--}}

    @yield('styles')

    {{--Head--}}
    @yield('head')

</head>
<body class="@yield('body_class')">

    {{--Page--}}
    <!-- Left Panel -->
    @include('layouts.shared.admin.navigation')
    <!-- End Left Panel -->

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        @include('layouts.shared.admin.header')
        @yield('breadcrumbs')
        
        <!-- Page Content -->
        <div class="content mt-3">
            @yield('content')
        </div>
    </div>
    <!-- End Right Panel -->

    @include('layouts.shared.admin.footer')

    {{--Common Scripts--}}
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/popper/popper.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
    
    <script src="/js/main.js"></script>

    {{--Laravel Js Variables--}}
    {{--Scripts--}}

    @yield('scripts')

    </body>
</html>
