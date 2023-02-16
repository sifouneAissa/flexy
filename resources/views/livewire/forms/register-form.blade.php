<form wire:submit.prevent="register">
<div class="col-11 col-sm-11 col-md-6 col-lg-5 col-xl-3 mx-auto align-self-center py-4">
    <h1 class="mb-4"><span class="text-secondary fw-light">Create</span><br/>new account</h1>
    @if($referBy)
        <h5 class="mb-4">Your account will be linked with {{$referBy->name}}</h5>
    @endif
    {{--    <div class="form-floating is-valid mb-3">--}}
{{--        <select class="form-control" id="country">--}}
{{--            <option selected>United States (+1)</option>--}}
{{--            <option>United Kingdoms (+44)</option>--}}
{{--        </select>--}}
{{--        <label for="country">Contry</label>--}}
{{--    </div>--}}
    <div class="form-floating mb-3 {{$errors->has('name') ? 'is-invalid' : 'is-valid'}}">
        <input wire:model="name" type="text" class="form-control" value="maxartkiller" placeholder="Name"
               id="name">
        <label for="name">Name</label>
        @error('name')
        <button type="button" class="text-danger tooltip-btn" data-bs-toggle="tooltip"
                data-bs-placement="left" title="{{$message}}" id="nameerror">
            <i class="bi bi-info-circle"></i>
        </button>
        {{--            <span class="error">{{ $message }}</span> --}}
        @enderror
    </div>
    <div class="form-floating mb-3 {{$errors->has('email') ? 'is-invalid' : 'is-valid'}}">
        <input wire:model="email" type="text" class="form-control" value="info@maxartkiller.com"
               placeholder="Email" id="email">
        <label for="email">Email</label>
        @error('email')
        <button type="button" class="text-danger tooltip-btn" data-bs-toggle="tooltip"
                data-bs-placement="left" title="{{$message}}" id="emailerror">
            <i class="bi bi-info-circle"></i>
        </button>
        {{--            <span class="error">{{ $message }}</span> --}}
        @enderror
    </div>

    <div class="form-floating mb-3 {{$errors->has('password') ? 'is-invalid' : 'is-valid'}}">
        <input wire:model="password" type="password" class="form-control"  placeholder="Password"
               id="password">
        <label for="password">Password</label>
        @error('password')
        <button type="button" class="text-danger tooltip-btn" data-bs-toggle="tooltip"
                data-bs-placement="left" title="{{$message}}" id="passworderror">
            <i class="bi bi-info-circle"></i>
        </button>
        {{--            <span class="error">{{ $message }}</span> --}}
        @enderror
    </div>
    <div class="form-floating mb-3 {{$errors->has('password_confirmation') ? 'is-invalid' : 'is-valid'}}">
        <input wire:model="password_confirmation" type="password" class="form-control" placeholder="Confirm Password" id="confirmpassword">
        <label for="confirmpassword">Confirm Password</label>
        @error('password_confirmation')
        <button type="button" class="text-danger tooltip-btn" data-bs-toggle="tooltip"
                data-bs-placement="left" title="{{$message}}" id="password_confirmationerror">
            <i class="bi bi-info-circle"></i>
        </button>
        {{--            <span class="error">{{ $message }}</span> --}}
        @enderror
    </div>
    <p class="mb-3"><span class="text-muted">By clicking on Sign up button, you are agree to the our </span> <a
            href="">Terms and Conditions</a></p>
</div>
<div class="col-11 col-sm-11 mt-auto mx-auto py-4">
    <div class="row ">
        <div class="col-12 d-grid">
            <button type="submit" class="btn btn-default btn-lg shadow-sm">Sign Up</button>
        </div>
    </div>
</div>
</form>
