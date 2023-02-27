@section('page-title')
Add pack
@endsection

<div class="row">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card card-light shadow-sm mb-4">
            <div class="card-body">
                <livewire:forms.add-provider-pack-form />
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-6">
            <div class="card card-light shadow-sm mb-4">
                <div class="card-header">

                    <h3>Informations</h3>
                    <div class="float-end">
                        <input  class="form-control" placeholder="Search" wire:model="search" >
                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                    </div>

                </div>
            </div>
    </div>
</div>
