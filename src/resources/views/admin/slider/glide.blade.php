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
    <link href="/slider/glide/css/glide.core.css" rel="stylesheet">
    <link href="/slider/glide/css/glide.theme.css" rel="stylesheet">

    <style>
        li {
            list-style: none;
            text-align: center;
        }
        .glide__arrow {
            color: #ccc;
        }
    </style>
    @yield('after_styles')
    @stack('after_styles')
</head>

<body class="">

<div class="glide">
    <div class="glide__track" data-glide-el="track">
        <ul class="glide__slides">
            <li class="glide__slide"><img src="/slider/img1.png"></li>
            <li class="glide__slide"><img src="/slider/img2.png"></li>
            <li class="glide__slide"><img src="/slider/img3.png"></li>
            <li class="glide__slide"><img src="/slider/img4.png"></li>
        </ul>
    </div>
    <div class="glide__arrows" data-glide-el="controls">
        <button class="glide__arrow glide__arrow--left" data-glide-dir="<">&lt;</button>
        <button class="glide__arrow glide__arrow--right" data-glide-dir=">">&gt;</button>
    </div>
    <div class="glide__bullets" data-glide-el="controls[nav]">
        <button class="glide__bullet" data-glide-dir="=0"></button>
        <button class="glide__bullet" data-glide-dir="=1"></button>
        <button class="glide__bullet" data-glide-dir="=2"></button>
        <button class="glide__bullet" data-glide-dir="=3"></button>
    </div>
</div>

<div>
    <a href="/">back</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>

<script>
    new Glide('.glide').mount()
</script>

</body>
</html>
