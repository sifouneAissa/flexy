<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- manifest meta -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="manifest" href="manifest.json" />


    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/assets/imgwebp/favicon180.webp" sizes="180x180">
    <link rel="icon" href="/assets/imgwebp/favicon32.webp" sizes="32x32" type="image/png">
    <link rel="icon" href="/assets/imgwebp/favicon16.webp" sizes="16x16" type="image/png">

    <!-- Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- swiper carousel css -->
    <link rel="stylesheet" href="/assets/vendor/swiperjs-6.6.2/swiper-bundle.min.css">

    <!-- style css for this template -->
    <link href="/assets/css/style.css" rel="stylesheet" id="style">
    <!-- Scripts -->
{{--    @vite(['resources/css/app.css', 'resources/js/app.js'])--}}

    @livewireStyles
</head>
<body>


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
<livewire:partials.sidebar />

        <main class="h-100">

            <livewire:partials.applogo />

            <div class="main-container container">
            {{ $slot }}
            </div>
        </main>

<!-- Footer -->
<footer class="footer">
    <livewire:partials.b-navbar />
</footer>
<!-- Menu Modal -->
<div class="modal fade" id="menumodal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content shadow">
            <div class="modal-body">
                <h1 class="mb-4"><span class="text-secondary fw-light">Quick</span><br />Actions!</h1>
                <div class="text-center">
                    <img src="/assets/imgwebp/QRCode.webp" alt="" class="mb-2" />
                    <p class="small text-secondary mb-4">Ask to scan this QR-Code<br />to accept money</p>
                </div>
                <div class="row justify-content-center mb-4">
                    <div class="col-auto text-center">
                        <a href="/bills.html" class="avatar avatar-70 p-1 shadow-sm shadow-danger rounded-20 bg-opac mb-2"  data-bs-dismiss="modal">
                            <div class="icons text-danger">
                                <i class="bi bi-receipt-cutoff size-24"></i>
                            </div>
                        </a>
                        <p class="size-10 text-secondary">Pay Bill</p>
                    </div>

                    <div class="col-auto text-center">
                        <a href="/sendmoney.html" class="avatar avatar-70 p-1 shadow-sm shadow-purple rounded-20 bg-opac mb-2"  data-bs-dismiss="modal">
                            <div class="icons text-purple">
                                <i class="bi bi-arrow-up-right size-24"></i>
                            </div>
                        </a>
                        <p class="size-10 text-secondary">Send Money</p>
                    </div>

                    <div class="col-auto text-center">
                        <a href="/receivemoney.html" class="avatar avatar-70 p-1 shadow-sm shadow-success rounded-20 bg-opac mb-2"  data-bs-dismiss="modal">
                            <div class="icons text-success">
                                <i class="bi bi-arrow-down-left size-24"></i>
                            </div>
                        </a>
                        <p class="size-10 text-secondary">Receive Money</p>
                    </div>
                </div>
                <div class="row justify-content-center mb-2">
                    <div class="col-auto text-center">
                        <a href="/withdraw.html" class="avatar avatar-70 p-1 shadow-sm shadow-secondary rounded-20 bg-opac mb-2"  data-bs-dismiss="modal">
                            <div class="icons text-secondary">
                                <i class="bi bi-bank size-24"></i>
                            </div>
                        </a>
                        <p class="size-10 text-secondary">Withdraw</p>
                    </div>

                    <div class="col-auto text-center">
                        <a href="/addmoney.html" class="avatar avatar-70 p-1 shadow-sm shadow-warning rounded-20 bg-opac mb-2"  data-bs-dismiss="modal">
                            <div class="icons text-warning">
                                <i class="bi bi-wallet2 size-24"></i>
                            </div>
                        </a>
                        <p class="size-10 text-secondary">Add Money</p>
                    </div>

                    <div class="col-auto text-center">
                        <div class="avatar avatar-70 p-1 shadow-sm shadow-info rounded-20 bg-opac mb-2"  data-bs-dismiss="modal">
                            <div class="icons text-info">
                                <i class="bi bi-tv size-24"></i>
                            </div>
                        </div>
                        <p class="size-10 text-secondary">Recharge</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer ends-->
<livewire:partials.pwabtn />
@livewireScripts

<!-- Required jquery and libraries -->
<script src="/assets/js/jquery-3.3.1.min.js"></script>
<script src="/assets/js/popper.min.js"></script>
<script src="/assets/vendor/bootstrap-5/js/bootstrap.bundle.min.js"></script>

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
