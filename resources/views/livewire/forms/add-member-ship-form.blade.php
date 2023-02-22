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
            <button  type="submit" class="btn btn-default btn-lg shadow-sm">Create</button>
        </div>
    </form>
</div>
<script>
    document.addEventListener('livewire:load', function () {
    })


</script>
