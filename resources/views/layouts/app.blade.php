<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    @yield('pagecss')
</head>
<body style="padding: 60px 0;">
    <div id="app">
        @include('layouts.header')

        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
            
        <main class="py-4">
            <div class="row">
                <div class="col-12 col-md-9 col-lg-9">
                @yield('content')
                </div>
        
                <div class="col-12 col-md-3 col-lg-3 justify-content-end">
                @include('layouts.sidebar')
                </div>
            </div>
        </main>

        @include('layouts.footer')
    </div>
    @yield('pagejs')
</body>
</html>
