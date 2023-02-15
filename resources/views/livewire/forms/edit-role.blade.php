<div  wire:key="{{$item->id}}edit-livewire-roles">
    <button type="button" class="text-warning  h5" wire:click="showU({{$item->id}})"><i class="bi bi-pencil-square"></i>
    </button>

    <div  class="modal fade " id="editModal-{{$item->id}}" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true" wire:key="{{$iteration}}{{$item->id}}modal-edit" wire:ignore>

        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                <form wire:submit.prevent="save({{$item->id}})">
                    <div class="modal-header bg-warning">
                        <h3 class="modal-title" id="exampleModalLabel">Edit Role</h3>
                        <button onclick="DModal({{$item->id}})" type="button" class="close" data-dismiss="modal"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div  class="modal-body" >
                        <div class="form-group form-floating  mb-3 {{$errors->has('name') ? 'is-invalid' : 'is-valid'}}">
                            <input wire:model.defer="name" type="text" class="form-control " id="name" placeholder="Name">
                            <label class="form-control-label" for="name">Name</label>
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group form-floating mb-3 {{$errors->has('permissions') ? 'is-invalid' : 'is-valid'}}" >
                                <select wire:model.defer="permissions" style="width: 100%"   class="form-control" id="select{{$item->id}}">
                                        @foreach(\Spatie\Permission\Models\Permission::get(['id','name']) as $p)
                                            <option  value="{{ $p->id }}">{{ $p->name }}</option>
                                        @endforeach
                                </select>

                                <label class="form-control-label h3" for="select{{$item->id}}">Permissions</label>
                                @error('permissions')
                                <span class="text-danger row m-1">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    <div class="modal-footer">
                        <button type="button" onclick="DModal({{$item->id}})" class="btn btn-outline-warning"
                                data-dismiss="modal">Close
                        </button>
                        <button type="submit" class="btn btn-warning">Save changes</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</div>
<script>

    document.addEventListener('livewire:load', function () {
        $('#select{{$item->id}}').on('change', function (e1) {
            var data = $('#select{{$item->id}}').select2("val");
            console.log(data);
            @this.set('permissions', data);
        });

    })
</script>
