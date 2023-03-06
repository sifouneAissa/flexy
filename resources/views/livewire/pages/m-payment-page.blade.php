@section('page-title')
    Method the payments
@endsection
<div>
    <livewire:datatables.m-payment-table />
</div>


<script>

    // delete modal
    function setShowDeleteModal(id,state){
        state ? $('#deleteModal-'+id).modal("show") : $('#deleteModal-'+id).modal("hide");
    }
</script>



