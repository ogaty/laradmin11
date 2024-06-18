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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;display=swap">
    <link href="/slider/splide/css/splide-core.min.css" rel="stylesheet">
    <link href="/slider/splide/css/themes/splide-default.min.css" rel="stylesheet">

    <style>
        .splide__slide {
            text-align: center;
        }
    </style>
    @yield('after_styles')
    @stack('after_styles')
</head>

<body class="">
<section class="splide" aria-label="" id="image-carousel">
    <div class="splide__track">
        <ul class="splide__list">
            <li class="splide__slide">
                <img src="/slider/img1.png" alt="">
            </li>
            <li class="splide__slide">
                <img src="/slider/img2.png" alt="">
            </li>
            <li class="splide__slide">
                <img src="/slider/img3.png" alt="">
            </li>
            <li class="splide__slide">
                <img src="/slider/img4.png" alt="">
            </li>
        </ul>
    </div>
</section>

<div>
    <a href="/">back</a>
</div>

<script src="/slider/splide/js/splide.js"></script>
<script>
    document.addEventListener( 'DOMContentLoaded', function () {
        new Splide( '#image-carousel' ).mount();
    } );
</script>
</body>
</html>
