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
    <link
        rel="stylesheet"
        href="https://unpkg.com/swiper@7/swiper-bundle.min.css"
    />
    <style>
        .swiper-slide {
            text-align: center;
        }
    </style>
    @yield('after_styles')
    @stack('after_styles')
</head>

<body class="">

<!-- スライダーのコンテナ -->
<div class="swiper">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <img src="/slider/img1.png" alt="">
        </div>
        <div class="swiper-slide">
            <img src="/slider/img2.png" alt="">
        </div>
        <div class="swiper-slide">
            <img src="/slider/img3.png" alt="">
        </div>
        <div class="swiper-slide">
            <img src="/slider/img4.png" alt="">
        </div>
    </div>
    <div class="swiper-pagination"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</div>

<div>
    <a href="/">back</a>
</div>

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script>
    const swiper = new Swiper(".swiper", {
        // ページネーションが必要なら追加
        pagination: {
            el: ".swiper-pagination"
        },
        // ナビボタンが必要なら追加

        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev"
        },

        centeredSlides: true,

        loop: true
    });
</script>
</body>
</html>
