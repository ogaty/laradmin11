<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}"/> {{-- Encrypted CSRF token for Laravel, in order for Ajax requests to work --}}

    <link rel="icon" type="image/png" href="/38.png">

    <title>{{ config('app.name') }}</title>

    @yield('before_styles')
    @stack('before_styles')

    <link rel="stylesheet" href="/remixicon/remixicon.css">

    @yield('after_styles')
    @stack('after_styles')
</head>

<body class="">

@yield('header')

@yield('content')

@yield('before_scripts')
@stack('before_scripts')

@yield('after_scripts')
@stack('after_scripts')

</body>
</html>
