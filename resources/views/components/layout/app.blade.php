<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Estate</title>
</head>
<body>
    <x-layout.header />

    {{ $slot }}

    <x-layout.contact />

    <x-layout.footer />
</body>
</html>
