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
    <div id="app" class="header" {{ request()->is('login') || request()->is('register') ? 'full-width' : '' }}>
        <!-- Sidebar -->
        @if(!request()->is('login') && !request()->is('/') && !request()->is('register') && !request()->is('minhas-inscricoes') && !request()->is('perfil') && !request()->is('certificado') && !request()->is('validate'))
            @include('layouts.sidebar')
        @else
            @if(!request()->is('login') && !request()->is('register'))
                @include('layouts.navbar')
            @endif
        @endif
        <div class="main-content {{ request()->is('login') || request()->is('register') ? 'full-width' : '' }}">
            <main class="py-4">
                @yield('content')
            </main>
        </div>

        <div class="svg_container">

        <svg width="100%" height="100%" id="svg" viewBox="0 0 1440 590" xmlns="http://www.w3.org/2000/svg" class="transition duration-300 ease-in-out delay-150"><style>
            </style><defs><linearGradient id="gradient" x1="0%" y1="50%" x2="100%" y2="50%"><stop offset="5%" stop-color="#8ed1fc"></stop><stop offset="95%" stop-color="#8ED1FC"></stop></linearGradient></defs><path d="M 0,600 L 0,150 C 111.99043062200957,111.49282296650718 223.98086124401914,72.98564593301435 319,86 C 414.01913875598086,99.01435406698565 492.0669856459331,163.55023923444975 576,161 C 659.9330143540669,158.44976076555025 749.7511961722487,88.81339712918661 860,93 C 970.2488038277513,97.18660287081339 1100.928229665072,175.1961722488038 1201,197 C 1301.071770334928,218.8038277511962 1370.5358851674641,184.4019138755981 1440,150 L 1440,600 L 0,600 Z" stroke="none" stroke-width="0" fill="url(#gradient)" fill-opacity="0.53" class="transition-all duration-300 ease-in-out delay-150 path-0"></path><style>
            </style><defs><linearGradient id="gradient" x1="0%" y1="50%" x2="100%" y2="50%"><stop offset="5%" stop-color="#8ed1fc"></stop><stop offset="95%" stop-color="#8ED1FC"></stop></linearGradient></defs><path d="M 0,600 L 0,350 C 109.14832535885168,361.4928229665072 218.29665071770336,372.9856459330144 315,371 C 411.70334928229664,369.0143540669856 495.9617224880383,353.55023923444975 597,352 C 698.0382775119617,350.44976076555025 815.8564593301436,362.8133971291866 908,351 C 1000.1435406698564,339.1866028708134 1066.6124401913876,303.19617224880386 1151,299 C 1235.3875598086124,294.80382775119614 1337.6937799043062,322.4019138755981 1440,350 L 1440,600 L 0,600 Z" stroke="none" stroke-width="0" fill="url(#gradient)" fill-opacity="1" class="transition-all duration-300 ease-in-out delay-150 path-1"></path></svg>
        </div>
    </div>
</body>
</html>

@push('styles')
<style>

</style>
@endpush

