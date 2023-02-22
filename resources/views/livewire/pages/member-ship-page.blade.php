@section('page-title')
    Memberships
@endsection


<div wire:key="memberships-page">
    <livewire:datatables.member-ship-table />
</div>


<script>

    // add modal
    function setShowDeleteModal(id,state){
        state ? $('#deleteModal-'+id).modal("show") : $('#deleteModal-'+id).modal("hide");
    }
</script>
