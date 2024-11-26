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
        @if(!request()->is('login') && !request()->is('/'))
                @include('layouts.sidebar')
           
        @else
            @if(!request()->is('login'))
            @include('layouts.navbar')
            @endif
        @endif
        <div class="main-content {{ request()->is('login') || request()->is('register') ? 'full-width' : '' }}">
            <main class="py-4">
                @yield('content')
            </main>
        </div>

        <div class="svg_container">
        <!-- <svg width="100%" height="100%" id="svg" viewBox="0 0 1440 590" xmlns="http://www.w3.org/2000/svg" class="transition duration-300 ease-in-out delay-150">
            <defs>
                <linearGradient id="gradient" x1="0%" y1="50%" x2="100%" y2="50%">
                    <stop offset="5%" stop-color="#8ed1fc"></stop><stop offset="95%" stop-color="#8ED1FC"></stop>
                </linearGradient>
            </defs>
            <path d="M 0,600 L 0,150 C 120.43062200956936,158.77511961722487 240.86124401913872,167.55023923444975 326,181 C 411.1387559808613,194.44976076555025 460.9856459330143,212.57416267942583 554,208 C 647.0143540669857,203.42583732057417 783.1961722488038,176.1531100478469 885,151 C 986.8038277511962,125.84688995215312 1054.2296650717703,102.81339712918661 1141,103 C 1227.7703349282297,103.18660287081339 1333.8851674641148,126.59330143540669 1440,150 L 1440,600 L 0,600 Z" stroke="none" stroke-width="0" fill="url(#gradient)" fill-opacity="0.53" class="transition-all duration-300 ease-in-out delay-150 path-0"></path>
            <defs>
                <linearGradient id="gradient" x1="0%" y1="50%" x2="100%" y2="50%">
                    <stop offset="5%" stop-color="#8ed1fc"></stop>
                    <stop offset="95%" stop-color="#8ED1FC"></stop>
                </linearGradient>
            </defs>
            <path d="M 0,600 L 0,350 C 109.04306220095694,310.66985645933016 218.08612440191388,271.33971291866027 298,284 C 377.9138755980861,296.66028708133973 428.6985645933014,361.311004784689 525,387 C 621.3014354066986,412.688995215311 763.1196172248805,399.4162679425838 875,386 C 986.8803827751195,372.5837320574162 1068.822966507177,359.02392344497605 1158,353 C 1247.177033492823,346.97607655502395 1343.5885167464116,348.488038277512 1440,350 L 1440,600 L 0,600 Z" stroke="none" stroke-width="0" fill="url(#gradient)" fill-opacity="1" class="transition-all duration-300 ease-in-out delay-150 path-1"></path>
        </svg>    -->

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

