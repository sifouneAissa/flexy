<div  wire:key="{{$item->id}}delete-livewire-roles">
    <button type="button" class="text-danger" onclick="setShowDeleteModal({{$item->id}},true)"><i class="bi bi-trash"></i>
    </button>

    <div  class="modal fade " id="deleteModal-{{$item->id}}" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalLabel" aria-hidden="true" >

        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                <form wire:submit.prevent="delete()">
                    <div class="modal-header bg-danger">
                        <h3 class="modal-title" id="exampleModalLabel">Delete Role</h3>
                        <button onclick="setShowDeleteModal({{$item->id}},false)" type="button" class="close" data-dismiss="modal"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div  class="modal-body" >
                        <div class="text-center">
                            Are you sure ?
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="setShowDeleteModal({{$item->id}},false)" class="btn btn-outline-danger"
                                data-dismiss="modal">Close
                        </button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</div>
<script>

    window.addEventListener('hideAddModal', (e) => {
        $('.modal-backdrop').remove();
        setShowDeleteModal({{$item->id}},false);
    });
</script>
