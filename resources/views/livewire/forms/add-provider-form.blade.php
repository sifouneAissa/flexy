<div >
    <form id="add-user-form" wire:submit.prevent="save" >

        <div class="form-group mb-2">
            <label>You wanna use this as a service provider ?</label>
            <div class="form-switch col-auto h2">
                <input wire:model="is_service_provider" class="form-check-input" type="checkbox" id="switch-mode">
            </div>
        </div>


        <div class="form-floating  mb-3 {{$errors->has('name') ? 'is-invalid' : 'is-valid'}}">
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

        @if(!$is_service_provider)
            <div class="form-floating mb-3 {{$errors->has('code') ? 'is-invalid' : 'is-valid'}}">
                <input wire:model="code" type="text" class="form-control"  placeholder="Name"
                       id="code">
                <label for="code">Code</label>
                @error('code')
                <button type="button" class="text-danger tooltip-btn" data-bs-toggle="tooltip"
                        data-bs-placement="left" title="{{$message}}" id="nameerror">
                    <i class="bi bi-info-circle"></i>
                </button>
                {{--            <span class="error">{{ $message }}</span> --}}
                @enderror
            </div>
        @endif

        <div class="form-floating mb-3 {{$errors->has('percentage') ? 'is-invalid' : 'is-valid'}}">
            <input wire:model="percentage" type="text" class="form-control"  placeholder="Name"
                   id="percentage">
            <label for="percentage">Percentage</label>
            @error('percentage')
            <button type="button" class="text-danger tooltip-btn" data-bs-toggle="tooltip"
                    data-bs-placement="left" title="{{$message}}" id="nameerror">
                <i class="bi bi-info-circle"></i>
            </button>

            @enderror
        </div>


        <div class="form-group">
            <label>Your wanna make this percentage fix ?</label>
            <div class="form-switch col-auto h2">
                <input wire:model="percentage_fix" class="form-check-input" type="checkbox" id="switch-mode">
            </div>
        </div>


        @if($is_service_provider)
            <div class="form-group mt-3">
                <label>Please choose an image that matches the mentioned dimensions ({{$this->m_h .'x'. $this->m_w}}) !</label>
                <div class="ml-2 col-lg-6">
                    <div  id="image-form">
                        <input type="file" name="img[]" wire:model="photo" class="file" style="visibility: hidden;position: absolute;" accept="image/*">
                        <div class="input-group my-3">
                            <input type="text" class="form-control" disabled placeholder="{{$photo ? $photo?->getClientOriginalName() : 'Upload file'}}" id="file">
                            <div class="input-group-append">
                                <button type="button" class="browse btn btn-primary">Browse...</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ml-2 col-lg-6">
                    <img src="{{$photo?->temporaryUrl() ? $photo->temporaryUrl() : 'https://placehold.it/80x80'}}" id="preview" class="img-thumbnail">
                </div>
                @error('photo') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        @endif

        <div class="d-grid mt-5">
            <button  type="submit" class="btn btn-default btn-lg shadow-sm">Create</button>
        </div>
    </form>
</div>
<script>
    document.addEventListener('livewire:load', function () {
        $(document).on("click", ".browse", function() {
            var file = $(this).parents().find(".file");
            file.trigger("click");
        });
    })


</script>
<style>
    .file {
        visibility: hidden;
        position: absolute;
    }
</style>
