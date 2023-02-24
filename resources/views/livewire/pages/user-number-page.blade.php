@section('page-title')
Numbers
@endsection

<div wire:key="user-numbers-page" >
    <livewire:datatables.user-number-table />
</div>



<script>

    // add modal
    function setShowDeleteModal(id,state){
        state ? $('#deleteModal-'+id).modal("show") : $('#deleteModal-'+id).modal("hide");
    }
</script>
