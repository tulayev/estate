<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ env('APP_NAME', 'Estate') }}</title>
    <link rel="icon" href="{{ asset('assets/images/logoicon.svg') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/uikit.min.css') }}" />
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/tailwind.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/font/fonts.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <!-- Uikit js -->
    <script defer src="{{ asset('assets/js/uikit-icons.min.js') }}"></script>
    <script defer src="{{ asset('assets/js/uikit.min.js') }}"></script>
    <!-- Alpine js -->
    <script defer src="https://unpkg.com/alpinejs@3.9.6/dist/cdn.min.js"></script>
    <!-- Swiper js -->
    <script defer src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script defer src="{{ asset('assets/js/swiper.js') }}"></script>
</head>
<body>
    {{ $slot }}
</body>
</html>
