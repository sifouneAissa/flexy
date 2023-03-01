
<!-- Header -->
<header wire:key="header-app-logo" class="header position-fixed" >
    @if($isBase)
        <div class="row" wire:key="header-app-logo-base">
            <div class="col-auto">
                <a href="javascript:void(0)" target="_self" class="btn btn-light btn-44 menu-btn">
                    <i class="bi bi-list"></i>
                </a>
            </div>
            <div class="col text-center">
                <div class="logo-small">
                    <img src="/assets/imgwebp/logo.webp" alt="" />
                    <h5><span class="text-secondary fw-light">Finance</span><br />Wallet</h5>
                </div>
            </div>

            <div class="form-check form-switch col-auto h2" >
                <input title="Switch theme"  wire:click="setMode"  class="form-check-input" type="checkbox" id="switch-mode" >
            </div>

            <div class=" col-auto mt-1">
                <select wire:model.defer="lang" wire:change="setLang"  class="form-select form-control" id="select">
                    <option  disabled>Language</option>
                    @foreach(config('app.locales') as $key =>  $value)
                        <option value="{{$value}}"><div class="row">
                                {{__('lang.'.$value)}}
                            </div></option>
                    @endforeach
                </select>
            </div>

{{--            <div class="form-floating col-auto">--}}
{{--                <i  wire:click="setMode('dark-mode')"  class="bi bi-moon-stars fs-4 mb-2 d-block"></i>--}}
{{--            </div>--}}
{{--            <div  class="form-floating col-auto">--}}
{{--                <i  wire:click="setMode('light-mode')"  class="bi bi-sun fs-4 mb-2 d-block"></i>--}}
{{--            </div>--}}


            @if($showP)
                <div  class="col-auto">
                    <a href="{{route("profile.show")}}" target="_self" class="btn btn-light btn-44">
                        <i class="bi bi-person-circle"></i>
                        <span class="count-indicator"></span>
                    </a>
                </div>
            @endif
            {{--        <div class="row mb-4">--}}
            {{--            <div class="col-6 d-grid">--}}
            {{--                <input type="radio" class="btn-check" name="layout-mode" checked id="btn-ltr">--}}
            {{--                <label class="btn btn-outline-primary shadow-sm" for="btn-ltr">Left to Right</label>--}}
            {{--            </div>--}}
            {{--            <div class="col-6 d-grid">--}}
            {{--                <input type="radio" class="btn-check" name="layout-mode" id="btn-rtl">--}}
            {{--                <label class="btn btn-outline-primary shadow-sm" for="btn-rtl">Right to Left</label>--}}
            {{--            </div>--}}
            {{--        </div>--}}
        </div>
    @else
    <div  class="row"  wire:key="header-app-logo-crud">
        <div class="col-auto">
            <a type="button" @if($link) href="{{route($link)}}" @else href="#" @endif class="btn btn-light btn-44 {{!$link ? 'back-btn' : ''}}">
                <i class="bi bi-arrow-left"></i>
            </a>
        </div>
        <div class="col text-center">
            <div class="logo-small">
                <img src="/assets/img/logo.png" alt="" />
                <h5><span class="text-secondary fw-light">Finance</span><br />Wallet</h5>
            </div>
        </div>

        <div class="form-check form-switch col-auto h2" >
            <input  wire:click="setMode"  class="form-check-input" type="checkbox" id="switch-mode" >
        </div>
        <div class="col-auto mt-1" >
            <select wire:model.defer="lang" wire:change="setLang"  class="form-select form-control" id="select">
                <option  disabled>Language</option>
                @foreach(config('app.locales') as $key =>  $value)
                    <option value="{{$value}}">{{__('lang.'.$value)}} </option>

                    <img src="/flags/ar.webp" alt="" />
                @endforeach
            </select>
        </div>
{{--        <div class="form-floating col-auto">--}}
{{--            <i  wire:click="setMode('dark-mode')"  class="bi bi-moon-stars fs-4 mb-2 d-block"></i>--}}
{{--        </div>--}}
{{--        <div  class="form-floating col-auto">--}}
{{--            <i  wire:click="setMode('light-mode')"  class="bi bi-sun fs-4 mb-2 d-block"></i>--}}
{{--        </div>--}}


        @if($showP)
            <div  class="col-auto">
                <a href="{{route("profile.show")}}" target="_self" class="btn btn-light btn-44">
                    <i class="bi bi-person-circle"></i>
                    <span class="count-indicator"></span>
                </a>
            </div>
        @endif
    </div>
    @endif
</header>
<!-- Header ends -->
<script>
    document.addEventListener('livewire:load', function () {
        // Your JS here.
        select();
        mode(@this.get('mode'));
    })

    /* create cookie */
    function setCookie(cname, cvalue, exdays) {
        const d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        let expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";  path=/; SameSite=None; Secure";
    }

    function getCookie(cname) {
        let name = cname + "=";
        let ca = document.cookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    window.addEventListener('setLang', (e) => {
        select();
        @this.dispatch();
    });

    window.addEventListener('setMode', (e) => {
        this.mode(e.detail.mode);
    });

    function select() {
        let langs = {
            'ar' : 'rtl',
            'en' : 'ltr',
            'fr': 'ltr'
        };

        let storageKey = 'fwadirectionmode';

        let value = document.getElementById('select').value;
        console.log('value');
        console.log(value);
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

    function mode(mode){
                var html = $('html');
                setCookie('fwalayoutmode', mode, 1)
                html.attr('class', getCookie("fwalayoutmode"));
                $('#switch-mode').prop('checked', (mode === 'dark-mode'))
    }
</script>
