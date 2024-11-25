<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Univent') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app" {{ request()->is('login') || request()->is('register') ? 'full-width' : '' }}>    
        <!-- Sidebar -->
        @if(!request()->is('login') && !request()->is('/'))
            @include('layouts.sidebar')
        @else
            @include('layouts.navbar')
        @endif
        <div class="main-content {{ request()->is('login') || request()->is('register') ? 'full-width' : '' }}">
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>

@push('styles')
<style>

</style>
@endpush

