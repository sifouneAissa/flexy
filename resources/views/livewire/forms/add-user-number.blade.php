<div >
    <form id="add-user-form" wire:submit.prevent="save" >
        <div class="form-group form-floating mb-3 {{$errors->has('role') ? 'is-invalid' : 'is-valid'}}" >
            <select wire:model="provider_id" style="width: 100%"   class="form-control form-select" >
                @foreach($providers as $p)
                    <option  value="{{ $p->id }}">{{ $p->name }}</option>
                @endforeach
            </select>

            <label class="form-control-label h3" for="selectAdd">Provider</label>
        </div>

        <div class="form-floating mb-3 {{$errors->has('number') ? 'is-invalid' : 'is-valid'}}">
            <input wire:model="number" type="text" class="form-control"  placeholder="Name"
                   id="name">
            <label for="name">Number</label>
            @error('number')
            <button type="button" class="text-danger tooltip-btn" data-bs-toggle="tooltip"
                    data-bs-placement="left" title="{{$message}}" id="nameerror">
                <i class="bi bi-info-circle"></i>
            </button>
            {{--            <span class="error">{{ $message }}</span> --}}
            @enderror
        </div>


        <div class="form-group mb-2">
            <label>Your wanna use this number as provider ?</label>
            <div class="form-switch col-auto h2">
                <input wire:model="is_personnel" class="form-check-input" type="checkbox" id="switch-mode">
            </div>
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
