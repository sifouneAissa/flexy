@section('page-title')
Packs
@endsection

<div wire:key="packs-livewire">
    <livewire:datatables.pack-table />
</div>

<script>

    // add modal
    function setShowDeleteModal(id,state){
        state ? $('#deleteModal-'+id).modal("show") : $('#deleteModal-'+id).modal("hide");
    }
</script>
