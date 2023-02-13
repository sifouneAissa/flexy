<div>
    <button type="button" class="text-warning" wire:click="showU({{$item->id}})"><i class="bi bi-pencil-square"></i>
    </button>

    <div wire:key="{{time()}}modal-edit" class="modal fade" id="editModal-{{$item->id}}" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>

        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <form wire:submit.prevent="save({{$item->id}})">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button onclick="DModal({{$item->id}})" type="button" class="close" data-dismiss="modal"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group form-floating  mb-3 {{$errors->has('name') ? 'is-invalid' : 'is-valid'}}">
                            <input wire:model.defer="name" type="text" class="form-control " id="name" placeholder="Name">
                            <label class="form-control-label" for="name">Name</label>
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="DModal({{$item->id}})" class="btn btn-secondary"
                                data-dismiss="modal">Close
                        </button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</div>
