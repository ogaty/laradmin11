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

    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="/css/table.css">
    <link rel="stylesheet" href="/sidebar/sidebar.css">
    <link rel="stylesheet" href="/remixicon/remixicon.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;display=swap">

    @yield('after_styles')
    @stack('after_styles')
</head>

<body class="">

<div class="layout has-sidebar fixed-sidebar fixed-header">
    @include('admin/sidebar')
    <div id="overlay" class="overlay"></div>
    <div class="layout">
        <main class="content">
            <div>
                <a id="btn-toggle" href="#" class="sidebar-toggler break-point-sm">
                    <i class="ri-menu-line ri-xl"></i>
                </a>
            </div>
            @yield('content')
            <footer class="footer">
                <small style="margin-bottom: 20px; display: inline-block">
                    © 2023-{{ date('Y') }}
                </small>
                <br />
                <div class="social-links">
                    <a href="https://github.com/ogaty/laradmin11" target="_blank">
                        <i class="ri-github-fill ri-xl"></i>
                    </a>
                </div>
            </footer>
        </main>
        <div class="overlay"></div>
    </div>
</div>

@yield('before_scripts')
@stack('before_scripts')

<script src="/sidebar/sidebar.js"></script>

@yield('after_scripts')
@stack('after_scripts')

</body>
</html>
