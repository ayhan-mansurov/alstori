<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.name', 'ALSTORI') }} - @yield('metaTitle')</title>
    <meta name="description" content="@yield('metaDescription')">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/logo/favicon.png') }}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome-pro.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon_shofy.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/alstori-main.css') }}">
    @livewireStyles
    @stack('styles')
</head>
<body>
    <!-- pre loader area start -->
    @livewire('components.preloader-component')
    <!-- pre loader area end -->

    <!-- back to top start -->
    @livewire('components.back-to-top-component')
    <!-- back to top end -->

    <!-- offcanvas area start -->
    @livewire('components.offcanvas-area-component')
    <!-- offcanvas area end -->

    <!-- mobile menu area start -->
    @livewire('components.bottom-menu-sticky-component')
    <!-- mobile menu area end -->

    <!-- search area start -->
    @livewire('components.search-area-component')
    <!-- search area end -->

    <!-- cart mini area start -->
    @livewire('components.cartmini-area-component')
    <!-- cart mini area end -->

    <!-- header area start -->
    @livewire('components.header-component')
    <!-- header area end -->

    <!-- header sticky start -->
    @livewire('components.header-sticky-component')
    <!-- header sticky end -->

    <!-- filter offcanvas area start -->
    @livewire('components.filter-offcanvas-area-component')
    <!-- filter offcanvas area end -->

    @yield('content')

    <!-- footer area start -->
    @livewire('components.footer-component')
    <!-- footer area end -->

    <!-- JS here -->
    <script src="{{ asset('assets/js/vendor/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/waypoints.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-bundle.js') }}"></script>
    <script src="{{ asset('assets/js/meanmenu.js') }}"></script>
    <script src="{{ asset('assets/js/swiper-bundle.js') }}"></script>
    <script src="{{ asset('assets/js/slick.js') }}"></script>
    <script src="{{ asset('assets/js/range-slider.js') }}"></script>
    <script src="{{ asset('assets/js/magnific-popup.js') }}"></script>
    <script src="{{ asset('assets/js/nice-select.js') }}"></script>
    <script src="{{ asset('assets/js/purecounter.js') }}"></script>
    <script src="{{ asset('assets/js/countdown.js') }}"></script>
    <script src="{{ asset('assets/js/wow.js') }}"></script>
    <script src="{{ asset('assets/js/isotope-pkgd.js') }}"></script>
    <script src="{{ asset('assets/js/imagesloaded-pkgd.js') }}"></script>
    <script src="{{ asset('assets/js/ajax-form.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="https://cdn.tiny.cloud/1/rrncgs4xvycy79chy4ykv5qj63rfv8gfpouqvgabz5c7fv4a/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    @livewireScripts
    @stack('scripts')
</body>
</html>

