<div>
    <div class="row mb-3">
        <div class="col align-self-center">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <div class="row">
                        <div class="col-auto">
                            <h6 class="mb-1">Welcome to your profile</h6>
                            <p><b>{{$user->name}}</b></p>
                        </div>
                        <div class="col text-end">

                            <h6 class="mb-1"><i class="bi bi-check-circle"></i></h6>
                            <p>Email : <b>{{$user->email}}</b></p>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6 mb-4">
                            <p class="mb-2">Affiliate links :</p>

                            <p id="copied" hidden class="text-success text-end"><i class="bi bi-check"></i>Copied</p>
                            <input onclick="copyToClipboard()" id="affiliate-input"  autocomplete="false" class="form-control" type="text" value="{{$user->getReferralLink()}}">
                        </div>
{{--                        <div class="col-12 col-md-6 mb-4">--}}
{{--                            <p class="mb-2">Billed To:</p>--}}
{{--                            <p class="text-secondary">Maxartkiller,--}}
{{--                                <br> 1234 Main Apt., 4B Springfield,<br>ST 54321--}}
{{--                            </p>--}}
{{--                        </div>--}}
                    </div>
{{--                    <div class="row ">--}}
{{--                        <div class="col-12 col-md-6 mb-4">--}}
{{--                            <p class="mb-2">Payment Method:</p>--}}
{{--                            <p class="text-secondary ">Visa ending **** 4242--}}
{{--                                <br>--}}
{{--                                <a href="">maxartkiller@maxartkiller.com</a>--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                        <div class="col-12 col-md-6">--}}
{{--                            <p class="mb-2">Order Date:</p>--}}
{{--                            <p class="text-secondary">Aug 7, 2021--}}
{{--                                <br><span class="text-danger">Payment due Dec 1, 2021</span>--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                </div>

            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        @if (Laravel\Fortify\Features::canUpdateProfileInformation())
            @livewire('profile.update-profile-information-form')

            <x-jet-section-border />
        @endif

        @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
            <div class="mt-10 sm:mt-0">
                @livewire('profile.update-password-form')
            </div>

            <x-jet-section-border />
        @endif

        @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
            <div class="mt-10 sm:mt-0">
                @livewire('profile.two-factor-authentication-form')
            </div>

            <x-jet-section-border />
        @endif

        <div class="mt-10 sm:mt-0">
            @livewire('profile.logout-other-browser-sessions-form')
        </div>

        @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
            <x-jet-section-border />

            <div class="mt-10 sm:mt-0">
                @livewire('profile.delete-user-form')
            </div>
        @endif
    </div>
</div>

<script>
    function copyToClipboard() {
        var textBox = document.getElementById("affiliate-input");
        textBox.select();
        document.execCommand("copy");
        $("#copied").removeAttr('hidden');
    }
</script>
