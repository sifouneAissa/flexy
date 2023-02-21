<div >
    <form id="add-user-form" wire:submit.prevent="save" >
        <div class="form-floating mb-3 {{$errors->has('name') ? 'is-invalid' : 'is-valid'}}">
            <input wire:model="name" type="text" class="form-control"  placeholder="Name"
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
            <input wire:model="email" type="text" class="form-control"
                   placeholder="username@email.com" id="email">
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
        <div class="form-group form-floating mb-3 {{$errors->has('role') ? 'is-invalid' : 'is-valid'}}" >
            <select wire:model="role" style="width: 100%"   class="form-control form-select" >
                @foreach(\Spatie\Permission\Models\Role::get(['id','name']) as $p)
                    <option  value="{{ $p->id }}">{{ $p->name }}</option>
                @endforeach
            </select>

            <label class="form-control-label h3" for="selectAdd">Role</label>
            @error('role')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>


        <div class="d-grid">
            <button  type="submit" class="btn btn-default btn-lg shadow-sm">Create</button>
        </div>
    </form>
</div>
<script>
    document.addEventListener('livewire:load', function () {
    })


</script>
