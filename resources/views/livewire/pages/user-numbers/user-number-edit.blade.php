@section('page-title')
    Edit Number
@endsection

<div class="row">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card card-light shadow-sm mb-4">
            <div class="card-body">
                <livewire:forms.edit-user-number-form :item="$item" />
            </div>
        </div>
    </div>
        <div class="col-12 col-md-6 col-lg-6">
            <div class="card card-light shadow-sm mb-4">
                <div class="card-header">
                    <h3>Activities</h3>
                </div>
                <div class="card-body">
                    <livewire:common.activity-log-card :item="$item" />
                </div>
            </div>
        </div>
</div>
