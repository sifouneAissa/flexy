<div >
    <form id="add-user-form" wire:submit.prevent="save" >
        @if(!$isAdmin)
            <div class="form-group">
                <label>{{$sendMoney ? 'Send Money' : 'Request Money'}}</label>
                <div class="form-switch col-auto h2">
                    <input wire:model="sendMoney" class="form-check-input" type="checkbox" id="switch-mode">
                </div>
            </div>
        @endif
        <div class="form-floating mt-3 {{$errors->has('amount') ? 'is-invalid' : 'is-valid'}}">
            <input wire:model="amount" type="text" class="form-control"  placeholder="Name"
                   id="amount">
            <label for="amount">Amount</label>
            @error('amount')
            <button type="button" class="text-danger tooltip-btn" data-bs-toggle="tooltip"
                    data-bs-placement="left" title="{{$message}}" id="nameerror">
                <i class="bi bi-info-circle"></i>
            </button>
            {{--            <span class="error">{{ $message }}</span> --}}
            @enderror
        </div>
        <div class="d-grid mt-3">
            <button  type="submit" class="btn btn-default btn-lg shadow-sm">Create</button>
        </div>
    </form>
</div>
<script>
    document.addEventListener('livewire:load', function () {
    })


</script>
