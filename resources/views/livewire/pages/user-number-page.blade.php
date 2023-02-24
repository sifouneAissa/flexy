@section('page-title')
Numbers
@endsection
<div>

    <div wire:key="user-numbers-page" >
        <livewire:datatables.user-number-table />
    </div>

    <div class="card mt-2 col-lg-6">
        <div class="card-header">
            <h3>Activities</h3>
        </div>
        <div class="card-body">
            <livewire:common.activity-log-card :item="$citem" :all="true" />
        </div>
    </div>
</div>

<script>

    // add modal
    function setShowDeleteModal(id,state){
        state ? $('#deleteModal-'+id).modal("show") : $('#deleteModal-'+id).modal("hide");
    }
</script>
