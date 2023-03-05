<div class="sidebar-wrap  sidebar-overlay z-index-99"  >
    <!-- Sidebar main menu -->

    <div class="closemenu text-muted">Close Menu</div>
    <div class="sidebar " >

        <div class="row align-content-center">
                <select wire:model="lang"  class="form-select form-control text-center bg-transparent text-white" id="select" >
                    <option class="bg-primary text-white"  disabled>Language</option>
                    @foreach($locales as $key =>  $value)
                        <option class="bg-primary text-white" value="{{$value}}"><div class="row">
                                {{__('lang.'.$value)}}
                            </div></option>
                    @endforeach
                </select>
        </div>
        <div class="row my-3"  >
            <div class="col-12 profile-sidebar">
                <div class="clearfix"></div>
                <div class="circle small one"></div>
                <div class="circle small two"></div>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                     viewBox="0 0 194.287 141.794" class="menubg">
                    <defs>
                        <linearGradient id="linear-gradient" x1="0.5" x2="0.5" y2="1"
                                        gradientUnits="objectBoundingBox">
                            <stop offset="0" stop-color="#09b2fd" />
                            <stop offset="1" stop-color="#6b00e5" />
                        </linearGradient>
                    </defs>
                    <path id="menubg"
                          d="M672.935,207.064c-19.639,1.079-25.462-3.121-41.258,10.881s-24.433,41.037-49.5,34.15-14.406-16.743-50.307-29.667-32.464-19.812-16.308-41.711S500.472,130.777,531.872,117s63.631,21.369,93.913,15.363,37.084-25.959,56.686-19.794,4.27,32.859,6.213,44.729,9.5,16.186,9.5,26.113S692.573,205.985,672.935,207.064Z"
                          transform="translate(-503.892 -111.404)" fill="url(#linear-gradient)" />
                </svg>

                <div class="row mt-3">
                    <div class="col-auto">
                        <figure class="avatar avatar-80 rounded-20 p-1 bg-transparent shadow-sm">
                            <img src="{{auth()->user()->profile_photo_url}}" alt="" class="rounded-18">
                        </figure>
                    </div>
                    <div class="col px-0 align-self-center">
                        <h5 class="mb-2">{{auth()->user()->name}}</h5>
                        <p class="text-muted size-12">{{auth()->user()->email}},<br />{{auth()->user()->roles->first()?->name}}</p>
                    </div>



                </div>

            </div>
        </div>


        <!-- user emnu navigation -->
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-pills">
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link active" aria-current="page" href="index.html">--}}
{{--                            <div class="avatar avatar-40 icon"><i class="bi bi-house-door"></i></div>--}}
{{--                            <div class="col">Dashboard</div>--}}
{{--                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                    @foreach($items as $item)
                        @if($item->need_login && auth()->user())
                            @can($item->permission)
                                <livewire:partials.sidebar.nav-item wire:key="{{$item->id}}-item" :item="$item" />
                            @endcan
                        @elseif(!$item->need_login)
                            <livewire:partials.sidebar.nav-item wire:key="{{$item->id}}-item" :item="$item" />
                        @endif
                    @endforeach


                    @if(auth()->user())
                        <li class="nav-item">

                            <form id="logform" method="POST" action="{{ route('logout') }}" >
                                @csrf
                                <a class="nav-link" href="javascript: void(0)"  onclick="document.getElementById('logform').submit()" tabindex="-1">
                                    <div class="avatar avatar-40 icon"><i class="bi bi-box-arrow-right"></i></div>
                                    <div class="col">Logout</div>
                                    <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                </a>
                            </form>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
<script>

    function select() {
        let langs = {
            'ar' : 'rtl',
            'en' : 'ltr',
            'fr': 'ltr'
        };
        console.log("check");
        let storageKey = 'fwadirectionmode';

        let value = document.getElementById('select').value;

        let cookie = langs[value];
        var body = $('body');

        body.removeClass(cookie === 'rtl' ? 'ltr' : 'rtl');
        setCookie(storageKey, cookie, 1);
        body.addClass(cookie);
        if(cookie==='rtl'){

            $('.bi-chevron-right').addClass('bi-chevron-left').removeClass('bi-chevron-right')
            $('.bi-arrow-right').addClass('bi-arrow-left').removeClass('bi-arrow-right')
            $('.bi-arrow-left').addClass('bi-arrow-right').removeClass('bi-arrow-left')

        }

    }

    document.addEventListener('livewire:load', function () {
        // Your JS here.
        select();
    })


    window.addEventListener('setLang', (e) => {
        select();
    });

</script>
