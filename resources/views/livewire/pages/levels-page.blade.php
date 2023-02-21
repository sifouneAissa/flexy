@section('page-title')
Levels
@endsection


<div wire:key="levels-page">
    <livewire:datatables.level-table />
</div>


<script>

    // add modal
    function setShowDeleteModal(id,state){
        state ? $('#deleteModal-'+id).modal("show") : $('#deleteModal-'+id).modal("hide");
    }
</script>
