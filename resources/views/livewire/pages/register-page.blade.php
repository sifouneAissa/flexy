@section('page-title')
Register
@endsection
<div class="row h-100">
    <div class="col-11 col-sm-11 mx-auto">
        <!-- header -->
        <div class="row">
            <header class="header">
                <div class="row">
                    <div class="col">
                        <div class="logo-small">
                            <img src="/assets/img/logo.png" alt="" />
                            <h5><span class="text-secondary fw-light">Finance</span><br />Wallet</h5>
                        </div>
                    </div>
                    <div class="col-auto align-self-center">
                        <a href="{{route("login")}}">Sing in</a>
                    </div>
                </div>
            </header>
        </div>
        <!-- header ends -->
    </div>
    <livewire:forms.register-form />
</div>
