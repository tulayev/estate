<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ env('APP_NAME', 'Estate') }}</title>
    <link rel="icon" href="{{ asset('assets/images/icons/logo-primary.svg') }}">
    <!-- Swiper css -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <!-- Leaflet css -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <!-- Uikit css -->
    <link rel="stylesheet" href="{{ asset('assets/css/uikit.min.css') }}" />
    <!-- Tailwind css -->
    <link rel="stylesheet" href="{{ asset('assets/css/tailwind.css') }}" />
    <!-- Fonts css -->
    <link rel="stylesheet" href="{{ asset('assets/font/fonts.css') }}" />
    <!-- Style css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <!-- Swiper js -->
    <script defer src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script defer src="{{ asset('assets/js/swiper.js') }}"></script>
    <!-- Leaflet js -->
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
    <!-- Uikit js -->
    <script defer src="{{ asset('assets/js/uikit-icons.min.js') }}"></script>
    <script defer src="{{ asset('assets/js/uikit.min.js') }}"></script>
    <!-- Alpine js -->
    <script defer src="https://unpkg.com/alpinejs@3.9.6/dist/cdn.min.js"></script>
</head>
<body>
    <x-layout.header />

    {{ $slot }}

    <x-layout.contact />

    <x-layout.footer />
</body>
</html>
