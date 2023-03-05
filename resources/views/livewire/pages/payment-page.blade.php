@section('page-title')
    Payments
@endsection

<div wire:key="payments-livewire">

    <livewire:partials.app-sub-menu />

    <ul class="nav nav-tabs mb-5" id="myTab" role="tablist">
        <li class="nav-item col-6" role="presentation">
            <button class="nav-link active col-12 bg-transparent"  id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Balance</button>
        </li>
        <li class="nav-item col-6" role="presentation">
            <button class="nav-link col-12 bg-transparent" id="profile-tab"  data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Credit</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div wire:key="payment-table">
                <livewire:datatables.payment-table />
            </div>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div wire:key="payment-sellers-table">
                <livewire:datatables.payment-table :isSeller="false" />
            </div>
        </div>
    </div>


</div>

<script>

    // add modal
    function setShowDeleteModal(id,state){
        state ? $('#deleteModal-'+id).modal("show") : $('#deleteModal-'+id).modal("hide");
    }
</script>


