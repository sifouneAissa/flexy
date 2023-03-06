<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <form id="edit-user-form" wire:submit.prevent="save" >

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

        <div class="form-floating mb-3 {{$errors->has('percentage') ? 'is-invalid' : 'is-valid'}}">
            <input wire:model="provider" type="text" class="form-control"  placeholder="Name"
                   id="provider">
            <label for="provider">Provider</label>
            @error('provider')
            <button type="button" class="text-danger tooltip-btn" data-bs-toggle="tooltip"
                    data-bs-placement="left" title="{{$message}}" id="nameerror">
                <i class="bi bi-info-circle"></i>
            </button>

            @enderror
        </div>

        <div class="form-floating mb-3 {{$errors->has('description') ? 'is-invalid' : 'is-valid'}}">
            <textarea wire:model="description" type="text" class="form-control"  placeholder="Description"
                      id="description"></textarea>
            <label for="description">Description</label>
            @error('description')
            <button type="button" class="text-danger tooltip-btn" data-bs-toggle="tooltip"
                    data-bs-placement="left" title="{{$message}}" id="nameerror">
                <i class="bi bi-info-circle"></i>
            </button>

            @enderror
        </div>


        <div class="form-group mt-3">
            <label>Please choose an image that matches the mentioned dimensions ({{$this->m_h .'x'. $this->m_w}}) !</label>
            <div class="ml-2 col-lg-6">
                <div  id="image-form">
                    <input type="file" name="img[]" wire:model="photo" class="file" style="visibility: hidden;position: absolute;" accept="image/*">
                    <div class="input-group my-3">
                        <input type="text" class="form-control" disabled placeholder="{{$photo ? $photo?->getClientOriginalName() : 'Upload new file'}}" id="file">
                        <div class="input-group-append">
                            <button type="button" class="browse btn btn-primary">Browse...</button>
                        </div>
                    </div>
                </div>
            </div>
            <div style="position:relative;" class="ml-2 col-lg-6">
                <img  src="{{$photo?->temporaryUrl() ? $photo->temporaryUrl() : $d_img}}" id="preview" class="img-thumbnail">
                @if($photo)
                    <i style="position: absolute;right: 10px;top: 10px;" wire:click="removeImage" class="bi-trash text-danger"></i>
                @endif
            </div>

            @error('photo') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="d-grid mt-5">
            <button  type="submit" class="btn btn-default btn-lg shadow-sm">Edit</button>
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
