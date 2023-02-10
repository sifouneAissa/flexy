<form wire:submit.prevent="login">
    <div class="col-11 col-sm-11 col-md-6 col-lg-5 col-xl-3 mx-auto align-self-center py-4">
        <h1 class="mb-4"><span class="text-secondary fw-light">Sign in to</span><br/>your account</h1>
        @error('failed') <span class="text-danger">{{ $message }}</span> @enderror
        <div class="form-group form-floating mb-3 {{$errors->has('email') ? 'is-invalid' : 'is-valid'}}">
            <input wire:model="email" type="text" class="form-control" value="maxartkiller" id="email"
                   placeholder="Username">

            <label class="form-control-label" for="email">Email</label>
            @error('email')
            <button type="button" class="text-danger tooltip-btn" data-bs-toggle="tooltip"
                    data-bs-placement="left" title="{{$message}}" id="emailerror">
                <i class="bi bi-info-circle"></i>
            </button>
{{--            <span class="error">{{ $message }}</span> --}}
            @enderror
        </div>
        <div class="form-group form-floating  mb-3 {{$errors->has('password') ? 'is-invalid' : 'is-valid'}}">
            <input wire:model="password" type="password" class="form-control " id="password" placeholder="Password">
            <label class="form-control-label" for="password">Password</label>
            @error('password')
            <button type="button" class="text-danger tooltip-btn" data-bs-toggle="tooltip"
                    data-bs-placement="left" title="{{$message}}" id="passworderror">
                <i class="bi bi-info-circle"></i>
            </button>
{{--            <span class="error">{{ $message }}</span>--}}
           @enderror
        </div>
        <p class="mb-3 text-end">
            <a href="forgot-password.html" class="">
                Forgot your password?
            </a>
        </p>

    </div>
    <div class="col-11 col-sm-11 mt-auto mx-auto py-4">
        <div class="row ">
            <div class="col-12 d-grid">
                <button class="btn btn-default btn-lg shadow-sm">Sign In</button>
            </div>
        </div>
    </div>
</form>
