@section('page-title')
    Payments
@endsection

<div wire:key="payments-livewire">
    <livewire:datatables.payment-table />
</div>

<script>

    // add modal
    function setShowDeleteModal(id,state){
        state ? $('#deleteModal-'+id).modal("show") : $('#deleteModal-'+id).modal("hide");
    }
</script>
