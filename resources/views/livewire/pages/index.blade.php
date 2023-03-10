@section('page-title')
Welcome
@endsection
<div>
<!-- balance -->
<livewire:partials.app-sub-menu :withRoute="true" />
<!-- categories list -->
{{--<div class="row mb-4">--}}
{{--    <div class="col-12">--}}
{{--        <div class="card bg-theme text-white">--}}
{{--            <div class="card-body pb-0">--}}
{{--                <div class="row justify-content-between gx-0 mx-0 pb-3">--}}
{{--                    <div class="col-auto text-center">--}}
{{--                        <a href="pay.html" class="avatar avatar-60 p-1 shadow-sm rounded-15 bg-opac mb-2">--}}
{{--                            <div class="icons bg-success text-white rounded-12 bg-opac">--}}
{{--                                <i class="bi bi-receipt-cutoff size-22"></i>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                        <p class="size-10">Pay</p>--}}
{{--                    </div>--}}

{{--                    <div class="col-auto text-center">--}}
{{--                        <a href="sendmoney.html" class="avatar avatar-60 p-1 shadow-sm rounded-15 bg-opac mb-2">--}}
{{--                            <div class="icons bg-success text-white rounded-12 bg-opac">--}}
{{--                                <i class="bi bi-arrow-up-right size-22"></i>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                        <p class="size-10">Send</p>--}}
{{--                    </div>--}}

{{--                    <div class="col-auto text-center">--}}
{{--                        <a href="receivemoney.html" class="avatar avatar-60 p-1 shadow-sm rounded-15 bg-opac mb-2">--}}
{{--                            <div class="icons bg-success text-white rounded-12 bg-opac">--}}
{{--                                <i class="bi bi-arrow-down-left size-22"></i>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                        <p class="size-10">Receive</p>--}}
{{--                    </div>--}}

{{--                    <div class="col-auto text-center">--}}
{{--                        <a href="withdraw.html" class="avatar avatar-60 p-1 shadow-sm rounded-15 bg-opac mb-2">--}}
{{--                            <div class="icons bg-success text-white rounded-12 bg-opac">--}}
{{--                                <i class="bi bi-bank size-22"></i>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                        <p class="size-10">Withdraw</p>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="row justify-content-between gx-0 mx-0 collapse" id="collpasemorelink">--}}
{{--                    <div class="col-auto text-center">--}}
{{--                        <a href="bills.html" class="avatar avatar-60 p-1 shadow-sm rounded-15 bg-opac mb-2">--}}
{{--                            <div class="icons bg-success text-white rounded-12 bg-opac">--}}
{{--                                <i class="bi bi-tv size-22"></i>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                        <p class="size-10">TV</p>--}}
{{--                    </div>--}}

{{--                    <div class="col-auto text-center">--}}
{{--                        <a href="addmoney.html" class="avatar avatar-60 p-1 shadow-sm rounded-15 bg-opac mb-2">--}}
{{--                            <div class="icons bg-success text-white rounded-12 bg-opac">--}}
{{--                                <i class="bi bi-wallet2 size-22"></i>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                        <p class="size-10">Add Money</p>--}}
{{--                    </div>--}}

{{--                    <div class="col-auto text-center">--}}
{{--                        <a href="shop.html" class="avatar avatar-60 p-1 shadow-sm rounded-15 bg-opac mb-2">--}}
{{--                            <div class="icons bg-success text-white rounded-12 bg-opac">--}}
{{--                                <i class="bi bi-cart size-22"></i>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                        <p class="size-10">Buy</p>--}}
{{--                    </div>--}}

{{--                    <div class="col-auto text-center">--}}
{{--                        <a href="rewards.html" class="avatar avatar-60 p-1 shadow-sm rounded-15 bg-opac mb-2">--}}
{{--                            <div class="icons bg-success text-white rounded-12 bg-opac">--}}
{{--                                <i class="bi bi-cash-coin size-22"></i>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                        <p class="size-10">Cashback</p>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <button class="btn btn-link mt-0 py-1 w-100 bar-more collapsed" type="button"--}}
{{--                        data-bs-toggle="collapse" data-bs-target="#collpasemorelink" aria-expanded="false"--}}
{{--                        aria-controls="collpasemorelink">--}}
{{--                    <span class=""></span>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<livewire:pages.index.flexy-detail />

<!-- Providers -->
<livewire:pages.index.providers-section />

{{--<!-- My Goals and Targets -->--}}
{{--<div class="row mb-2">--}}
{{--    <div class="col">--}}
{{--        <h6 class="title">My Goals and Targets</h6>--}}
{{--    </div>--}}

{{--</div>--}}
{{--<div class="row">--}}
{{--    <div class="col-12 col-md-6 col-lg-4 mb-3">--}}
{{--        <div class="card text-center overflow-hidden">--}}
{{--            <figure class="m-0 p-0 position-absolute top-0 start-0 w-100 h-100 coverimg">--}}
{{--                <img src="/assets/imgwebp/image1.webp" alt="">--}}
{{--            </figure>--}}
{{--            <div class="card-body">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-6 col-md-4 col-lg-3">--}}
{{--                        <div class="card text-center shadow-sm">--}}
{{--                            <div class="card-body">--}}
{{--                                <div--}}
{{--                                    class="avatar avatar-80 rounded-circle shadow-danger shadow-sm p-1 mb-3">--}}
{{--                                    <div id="circlesaving"></div>--}}
{{--                                </div>--}}
{{--                                <p class="text-secondary size-10 mb-0">Dream Car</p>--}}
{{--                                <p>15402k<span class="text-secondary size-10"> Saving</span></p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="col-12 col-md-6 col-lg-4 mb-4">--}}
{{--        <div class="card text-center overflow-hidden">--}}
{{--            <figure class="m-0 p-0 position-absolute top-0 start-0 w-100 h-100 coverimg">--}}
{{--                <img src="/assets/imgwebp/image4.webp" alt="">--}}
{{--            </figure>--}}
{{--            <div class="card-body">--}}
{{--                <div class="row justify-content-end">--}}
{{--                    <div class="col-6 col-md-4 col-lg-3">--}}
{{--                        <div class="card text-center shadow-sm">--}}
{{--                            <div class="card-body">--}}
{{--                                <div--}}
{{--                                    class="avatar avatar-80 rounded-circle shadow-warning shadow-sm p-1 mb-3">--}}
{{--                                    <div id="circlesaving2"></div>--}}
{{--                                </div>--}}
{{--                                <p class="text-secondary size-10 mb-0">Dream Home</p>--}}
{{--                                <p>55402k<span class="text-secondary size-10"> Saving</span></p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

{{--<!-- Dark mode switch -->--}}
{{--<div class="row mb-4">--}}
{{--    <div class="col-12">--}}
{{--        <div class="card shadow-sm">--}}
{{--            <div class="card-body">--}}
{{--                <div class="form-check form-switch">--}}
{{--                    <input class="form-check-input" type="checkbox" id="darkmodeswitch">--}}
{{--                    <label class="form-check-label text-muted px-2 " for="darkmodeswitch">Activate Dark--}}
{{--                        Mode</label>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

{{--<!-- offers banner -->--}}
{{--<div class="row mb-4">--}}
{{--    <div class="col-12">--}}
{{--        <div class="card theme-bg overflow-hidden">--}}
{{--            <figure class="m-0 p-0 position-absolute top-0 start-0 w-100 h-100 coverimg right-center-img">--}}
{{--                <img src="/assets/imgwebp/offerbg.webp" alt="">--}}
{{--            </figure>--}}
{{--            <div class="card-body py-4">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-9 align-self-center">--}}
{{--                        <h1 class="mb-3"><span class="fw-light">15% OFF</span><br/>GiftCard</h1>--}}
{{--                        <p>Thank you for spending with us, You have received Gift Card.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

{{--<!-- Transactions -->--}}
{{--<div class="row mb-3">--}}
{{--    <div class="col">--}}
{{--        <h6 class="title">Transactions<br><small class="fw-normal text-muted">Today, 24 Aug 2021</small>--}}
{{--        </h6>--}}
{{--    </div>--}}
{{--    <div class="col-auto align-self-center">--}}
{{--        <a href="#" class="small">View all</a>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<div class="row mb-4">--}}
{{--    <div class="col-12">--}}
{{--        <div class="card">--}}
{{--            <div class="card-body p-0">--}}
{{--                <ul class="list-group list-group-flush bg-none">--}}
{{--                    <li class="list-group-item">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-auto">--}}
{{--                                <div class="avatar avatar-60 shadow-sm card rounded-15 p-1">--}}
{{--                                    <img src="/assets/imgwebp/company4.webp" alt="" class="rounded-15">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col align-self-center ps-0">--}}
{{--                                <p class="text-secondary size-10 mb-0">Food</p>--}}
{{--                                <p>Zomato</p>--}}
{{--                            </div>--}}
{{--                            <div class="col align-self-center text-end">--}}
{{--                                <p class="text-secondary text-muted size-10 mb-0">15-10-2021 | 10:20am</p>--}}
{{--                                <p>-25.00</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </li>--}}
{{--                    <li class="list-group-item">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-auto">--}}
{{--                                <div class="avatar avatar-60 shadow-sm card rounded-15 p-1">--}}
{{--                                    <img src="/assets/imgwebp/company5.webp" alt="" class="rounded-15">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col align-self-center ps-0">--}}
{{--                                <p class="text-secondary size-10 mb-0">Travel</p>--}}
{{--                                <p>Uber</p>--}}
{{--                            </div>--}}
{{--                            <div class="col align-self-center text-end">--}}
{{--                                <p class="text-secondary text-muted size-10 mb-0">15-10-2021 | 10:20am</p>--}}
{{--                                <p>-26.00</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </li>--}}
{{--                    <li class="list-group-item">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-auto">--}}
{{--                                <div class="avatar avatar-60 shadow-sm card rounded-15 p-1">--}}
{{--                                    <img src="/assets/imgwebp/company2.webp" alt="" class="rounded-15">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col align-self-center ps-0">--}}
{{--                                <p class="text-secondary size-10 mb-0">Food</p>--}}
{{--                                <p>Starbucks</p>--}}
{{--                            </div>--}}
{{--                            <div class="col align-self-center text-end">--}}
{{--                                <p class="text-secondary text-muted size-10 mb-0">15-10-2021 | 10:20am</p>--}}
{{--                                <p>-18.00</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </li>--}}
{{--                    <li class="list-group-item">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-auto">--}}
{{--                                <div class="avatar avatar-60 shadow-sm card rounded-15 p-1">--}}
{{--                                    <img src="/assets/imgwebp/company3.webp" alt="" class="rounded-15">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col align-self-center ps-0">--}}
{{--                                <p class="text-secondary size-10 mb-0">Clothing</p>--}}
{{--                                <p>Walmart</p>--}}
{{--                            </div>--}}
{{--                            <div class="col align-self-center text-end">--}}
{{--                                <p class="text-secondary text-muted size-10 mb-0">15-10-2021 | 10:20am</p>--}}
{{--                                <p>-105.00</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

{{--<!-- Blogs -->--}}
{{--<div class="row mb-3">--}}
{{--    <div class="col">--}}
{{--        <h6 class="title">News and Upcomming</h6>--}}
{{--    </div>--}}
{{--    <div class="col-auto align-self-center">--}}
{{--        <a href="blog.html" class="small">Read more</a>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<div class="row">--}}
{{--    <div class="col-12 col-md-6 col-lg-4">--}}
{{--        <a href="blogdetails.html" class="card mb-3">--}}
{{--            <div class="card-body">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-auto">--}}
{{--                        <div class="avatar avatar-60 shadow-sm rounded-10 coverimg">--}}
{{--                            <img src="/assets/imgwebp/news.webp" alt="">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col align-self-center ps-0">--}}
{{--                        <p class="mb-1">Do share and Earn a lot</p>--}}
{{--                        <p class="text-muted size-12">Get $10 instant as reward while your friend or invited--}}
{{--                            member join finwallapp</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </a>--}}
{{--    </div>--}}
{{--    <div class="col-12 col-md-6 col-lg-4">--}}
{{--        <a href="blogdetails.html" class="card mb-3">--}}
{{--            <div class="card-body">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-auto">--}}
{{--                        <div class="avatar avatar-60 shadow-sm rounded-10 coverimg">--}}
{{--                            <img src="/assets/imgwebp/news1.webp" alt="">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col align-self-center ps-0">--}}
{{--                        <p class="mb-1">Walmart news latest picks</p>--}}
{{--                        <p class="text-muted size-12">Get $10 instant as reward while your friend or invited--}}
{{--                            member join finwallapp</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </a>--}}
{{--    </div>--}}
{{--    <div class="col-12 col-md-6 col-lg-4">--}}
{{--        <a href="blogdetails.html" class="card mb-3">--}}
{{--            <div class="card-body">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-auto">--}}
{{--                        <div class="avatar avatar-60 shadow-sm rounded-10 coverimg">--}}
{{--                            <img src="/assets/imgwebp/news2.webp" alt="">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col align-self-center ps-0">--}}
{{--                        <p class="mb-1">Do share and Help us</p>--}}
{{--                        <p class="text-muted size-12">Get $10 instant as reward while your friend or invited--}}
{{--                            member join finwallapp</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </a>--}}
{{--    </div>--}}
{{--</div>--}}

</div>
