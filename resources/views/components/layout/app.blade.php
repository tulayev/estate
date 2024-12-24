<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Estate</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.15.1/css/ol.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.15.1/build/ol.js" defer></script>
    @switch(Route::currentRouteName())
        @case('home')
            <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
            <script src="{{ asset('assets/js/home.js') }}" defer></script>
            @break
    @endswitch
</head>
<body class="bg-gray-200 min-h-screen flex flex-col">
    <x-layout.header />

    {{ $slot }}

    <x-layout.contact />

    <x-layout.footer />
</body>
</html>
