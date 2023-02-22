<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page-title')  - {{ config('app.name', 'Laravel') }}</title>

    <!-- manifest meta -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="manifest" href="/manifest.json" />

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/assets/img/favicon180.png" sizes="180x180">
    <link rel="icon" href="/assets/img/favicon32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/assets/img/favicon16.png" sizes="16x16" type="image/png">

    <!-- Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- swiper carousel css -->
    <link rel="stylesheet" href="/assets/vendor/swiperjs-6.6.2/swiper-bundle.min.css">

    <!-- style css for this template -->
    <link href="/assets/css/style.css" rel="stylesheet" id="style">

    {{--    select2--}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>

    <link href="/assets/tailwind/tailwind.min.css" rel="stylesheet">
    @vite(['resources/js/app.js'])

    @livewireStyles
</head>

<body class="body-scroll" data-page="">

<!-- loader section -->
<div class="container-fluid loader-wrap">
    <div class="row h-100">
        <div class="col-10 col-md-6 col-lg-5 col-xl-3 mx-auto text-center align-self-center">
            <div class="logo-wallet">
                <div class="wallet-bottom">
                </div>
                <div class="wallet-cards"></div>
                <div class="wallet-top">
                </div>
            </div>
            <p class="mt-4"><span class="text-secondary">Track finance with Wallet app</span><br><strong>Please
                    wait...</strong></p>
        </div>
    </div>
</div>
<!-- loader section ends -->
<!-- Begin page -->
<main class="h-100">


    <livewire:partials.applogo :isBase="false" :link="isset($link) ? $link : null" />

    <!-- main page content -->
    <div class="main-container container">
        {{$slot}}
    </div>
    <!-- main page content ends -->

</main>
<!-- Page ends-->
@livewireScripts
<script> window.addEventListener('langChanged', (e) => { window.location.reload();});</script>
<!-- Required jquery and libraries -->
<script src="/assets/js/jquery-3.3.1.min.js"></script>
<script src="/assets/js/popper.min.js"></script>
<script src="/assets/vendor/bootstrap-5/js/bootstrap.bundle.min.js"></script>
<!--select2-->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- Customized jquery file  -->
<script src="/assets/js/main.js"></script>
<script src="/assets/js/color-scheme.js"></script>

<!-- PWA app service registration and works -->
<script src="/assets/js/pwa-services.js"></script>

<!-- Chart js script -->
<script src="/assets/vendor/chart-js-3.3.1/chart.min.js"></script>

<!-- Progress circle js script -->
<script src="/assets/vendor/progressbar-js/progressbar.min.js"></script>

<!-- swiper js script -->
<script src="/assets/vendor/swiperjs-6.6.2/swiper-bundle.min.js"></script>

<!-- page level custom script -->
<script src="/assets/js/app.js"></script>

</body>

</html>
