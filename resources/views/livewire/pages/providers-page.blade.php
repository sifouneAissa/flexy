@section('page-title')
Providers
@endsection

<div wire:key="providers-page">
    <livewire:datatables.provider-table />
</div>

<script>

    // add modal
    function setShowDeleteModal(id,state){
        state ? $('#deleteModal-'+id).modal("show") : $('#deleteModal-'+id).modal("hide");
    }
</script>
