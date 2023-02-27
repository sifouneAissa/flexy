@section('page-title')
    Settings general
@endsection
<div>


    <div wire:key="settings-page">
        <livewire:datatables.setting-table />
    </div>

      @can('update setting general')

        <!-- Modal -->
            <div class="modal fade" id="setting-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" wire:key="setting-modal" wire:ignore.self>
                <div class="modal-dialog modal-lg" role="document" >
                    <div class="modal-content">

                        <form wire:submit.prevent="save">
                            <div class="modal-header bg-warning">
                                <h3 class="modal-title" id="exampleModalLongTitle">Edit Setting</h3>
                                <button onclick="setModal(false)" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group form-floating  mb-3 {{$errors->has('name') ? 'is-invalid' : 'is-valid'}}">
                                    <input wire:model="name" type="text" class="form-control " id="name" placeholder="Name">
                                    <label class="form-control-label" for="name">Name</label>
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group form-floating  mb-3 {{$errors->has('content') ? 'is-invalid' : 'is-valid'}}">
                                    <textarea wire:model="content" type="text" class="form-control " id="content" placeholder="Content" rows="3"></textarea>
                                    <label class="form-control-label" for="content">Content</label>
                                    @error('content')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mb-2">
                                    <label>You wanna attach this setting with photo ?</label>
                                    <div class="form-switch col-auto h2">
                                        <input wire:model="with_photo" class="form-check-input" type="checkbox" id="switch-mode">
                                    </div>
                                </div>

                                @if($with_photo)
                                    <div class="form-group mt-3">
                                        <label>Please choose an image !</label>
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
                                            <img  src="{{$photo?->temporaryUrl() ? $photo->temporaryUrl() : $d_url}}" id="preview" class="img-thumbnail">
                                            @if($photo)
                                                <i style="position: absolute;right: 10px;top: 10px;" wire:click="removeImage" class="bi-trash text-danger"></i>
                                            @endif
                                        </div>

                                        @error('photo') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                @endif
                            </div>
                            <div class="modal-footer">
                                <button type="button" onclick="setModal(false)" class="btn btn-outline-warning" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-warning">Save changes</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

        @endcan
</div>

<script>
    function setModal(state){
        $('#setting-modal').modal(state ? 'show' : 'hide');
    }

    window.addEventListener('setModal', (e) => {
        console.log("check");
        // $('.modal-backdrop').remove();
        setModal(e.detail.state);
    });

    document.addEventListener('livewire:load', function () {
        $(document).on("click", ".browse", function() {
            var file = $(this).parents().find(".file");
            file.trigger("click");
        });
    })


</script>
