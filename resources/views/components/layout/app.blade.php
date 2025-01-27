<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ env('APP_NAME', 'Estate') }}</title>
    <link rel="icon" href="{{ asset('assets/images/icons/logo-icon.svg') }}">
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
    <!-- Axios js -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
    <div
        id="overlay"
        class="fixed w-full h-full top-0 left-0 flex justify-center items-center bg-primary z-[10001]"
    >
        <div class="loading"></div>
    </div>

    <x-layout.header />

    {{ $slot }}

    <x-layout.contact />

    <x-layout.footer />

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const overlay = document.getElementById('overlay');

            if (overlay) {
                setTimeout(() => overlay.style.display = 'none', 2000);
            }
        })
    </script>
</body>
</html>
