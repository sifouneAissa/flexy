
<form id="edit-provider-pack-form" wire:submit.prevent="save" >



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


    <div class="form-floating mb-3 {{$errors->has('count') ? 'is-invalid' : 'is-valid'}}">
        <input wire:model="count" type="text" class="form-control"  placeholder="Name"
               id="count">
        <label for="count">Count</label>
        @error('count')
        <button type="button" class="text-danger tooltip-btn" data-bs-toggle="tooltip"
                data-bs-placement="left" title="{{$message}}" id="nameerror">
            <i class="bi bi-info-circle"></i>
        </button>
        {{--            <span class="error">{{ $message }}</span> --}}
        @enderror
    </div>

    <div class="form-floating mb-3 {{$errors->has('price') ? 'is-invalid' : 'is-valid'}}">
        <input wire:model="price" type="text" class="form-control"  placeholder="Name"
               id="price">
        <label for="price">Price</label>
        @error('price')
        <button type="button" class="text-danger tooltip-btn" data-bs-toggle="tooltip"
                data-bs-placement="left" title="{{$message}}" id="nameerror">
            <i class="bi bi-info-circle"></i>
        </button>
        {{--            <span class="error">{{ $message }}</span> --}}
        @enderror
    </div>

    <div class="form-floating mb-3 {{$errors->has('bonus') ? 'is-invalid' : 'is-valid'}}">
        <input wire:model="bonus" type="text" class="form-control"  placeholder="Name"
               id="bonus">
        <label for="bonus">Bonus</label>
        @error('bonus')
        <button type="button" class="text-danger tooltip-btn" data-bs-toggle="tooltip"
                data-bs-placement="left" title="{{$message}}" id="nameerror">
            <i class="bi bi-info-circle"></i>
        </button>
        {{--            <span class="error">{{ $message }}</span> --}}
        @enderror
    </div>


    <div class="form-floating mb-3 {{$errors->has('description') ? 'is-invalid' : 'is-valid'}}">
            <textarea wire:model="description" type="text" class="form-control"  placeholder="Name"
                      id="description" rows="3"></textarea>
        <label for="description">Description</label>
        @error('description')
        <button type="button" class="text-danger tooltip-btn" data-bs-toggle="tooltip"
                data-bs-placement="left" title="{{$message}}" id="nameerror">
            <i class="bi bi-info-circle"></i>
        </button>
        {{--            <span class="error">{{ $message }}</span> --}}
        @enderror
    </div>

    <div class="d-grid">
        <button  type="submit" class="btn btn-default btn-lg shadow-sm">Edit</button>
    </div>
</form>
