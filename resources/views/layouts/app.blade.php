<!DOCTYPE html>
<!-- Stored in resources/views/layouts/app.blade.php -->
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

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

        <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

        @yield('meta')
        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        {{--Common App Styles--}}
        {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
        {{--Styles--}}
        @yield('styles')

        {{--Head--}}
        @yield('head')

    </head>
    <body class="@yield('body_class')">
        {{--Page--}}
        @yield('navigation')

        <!-- Page Content -->
        <div class="container">
            @yield('page')
        </div>

        @yield('footer')

        {{--Common Scripts--}}
        {{--Laravel Js Variables--}}
        {{--Scripts--}}

        @yield('scripts')

    </body>
</html>
