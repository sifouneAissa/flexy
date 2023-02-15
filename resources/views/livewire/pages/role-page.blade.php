<div  wire:key="livewire-roles">
    <livewire:datatables.role-table />
    <!-- Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" wire:key="{{$iteration}}addModal" wire:ignore>
        <div class="modal-dialog modal-lg" role="document" >
            <div class="modal-content">

                <form wire:submit.prevent="save">
                    <div class="modal-header bg-primary">
                        <h3 class="modal-title" id="exampleModalLongTitle">Add Role</h3>
                        <button onclick="setShowModal(false)" type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                        <div class="form-group form-floating mb-3 {{$errors->has('permissions') ? 'is-invalid' : 'is-valid'}}" >
                            <select wire:model.defer="permissions" style="width: 100%"   class="form-control" id="selectAdd">
                                @foreach(\Spatie\Permission\Models\Permission::get(['id','name']) as $p)
                                    <option  value="{{ $p->id }}">{{ $p->name }}</option>
                                @endforeach
                            </select>

                            <label class="form-control-label h3" for="selectAdd">Permissions</label>
                            @error('permissions')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="setShowModal(false)" class="btn btn-outline-primary " data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</div>

<script>


    window.addEventListener('showUpdate', (e) => {

        $('.modal-backdrop').remove();
        let select2 = $('#select'+e.detail.id);
        $('#editModal-'+e.detail.id).modal("show");

        select2.select2({
            placeholder: 'Select permissions',
            multiple : true,
            allowClear: true,
            dropdownParent: $('#editModal-'+e.detail.id),
            width: 'resolve',
            dir : @this.get("dir")
        });

        if(e.detail.selected){
            select2.val(e.detail.selected);
            select2.trigger('change');
        }
    });

    window.addEventListener('hideModal', (e) => {
         DModal(e.detail.id);
    });

    window.addEventListener('hideAddModal', (e) => {
        setShowModal(false,[]);
    });


    function DModal(id){
        $('#editModal-'+id).modal("hide")
    }

    window.addEventListener('showAdd', (e) => {
        $('.modal-backdrop').remove();
        setShowModal(true,e.detail.selected);
    });


    // add modal
    function setShowModal(state,selected){

        state ? $('#addModal').modal("show") : $('#addModal').modal("hide");

        let select2 = $('#selectAdd');

        select2.select2({
            placeholder: 'Select permissions',
            multiple : true,
            allowClear: true,
            dropdownParent: $('#addModal'),
            width: 'resolve',
            dir : @this.get("dir")
        });


        select2.val(selected);
        select2.trigger('change');

    }

    document.addEventListener('livewire:load', function () {
        $('#selectAdd').on('change', function (e1) {
            var data = $('#selectAdd').select2("val");
            @this.set('permissions', data);
        });

    })
    // add modal
    function setShowDeleteModal(id,state){
        state ? $('#deleteModal-'+id).modal("show") : $('#deleteModal-'+id).modal("hide");
    }

</script>
<style>.select2-selection__rendered {
        line-height: 31px !important;
    }
    .select2-container .select2-selection--single {
        height: 45px !important;
    }
    .select2-selection__arrow {
        height: 31px !important;
    }
</style>
