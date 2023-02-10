
<!-- Header -->
<header class="header position-fixed">
    <div class="row">
        <div class="col-auto">
            <a href="javascript:void(0)" target="_self" class="btn btn-light btn-44 menu-btn">
                <i class="bi bi-list"></i>
            </a>
        </div>
        <div class="col text-center">
            <div class="logo-small">
                <img src="assets/imgwebp/logo.webp" alt="" />
                <h5><span class="text-secondary fw-light">Finance</span><br />Wallet</h5>
            </div>
        </div>
        <div class="form-floating col-auto">
            <select wire:model="lang"  class="form-select form-control" id="select">
                <option  disabled>Language</option>
                @foreach(config('app.locales') as $key =>  $value)
                    <option value="{{$value}}">{{__('lang.'.$value)}}</option>
                @endforeach
            </select>
            <label for="select">Language</label>
        </div>

        <div class="col-auto">
            <a href="profile.html" target="_self" class="btn btn-light btn-44">
                <i class="bi bi-person-circle"></i>
                <span class="count-indicator"></span>
            </a>
        </div>
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
</header>
<!-- Header ends -->
<script>
    document.addEventListener('livewire:load', function () {
        // Your JS here.
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
        this.select();
    });

    function select() {
        let langs = {
            'ar' : 'rtl',
            'en' : 'ltr',
            'fr': 'ltr'
        };

        let storageKey = 'fwadirectionmode';

        let value = document.getElementById('select').value;
        let cookie = langs[value];

        var body = $('body');

        setCookie(storageKey, cookie, 1);
        body.addClass(cookie);
        body.removeClass(cookie === 'rtl' ? 'ltr' : 'rtl');
    }
</script>
