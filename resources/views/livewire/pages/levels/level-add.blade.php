@section('page-title')
    Add Level
@endsection

<div class="row">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card card-light shadow-sm mb-4">
            <div class="card-body">
                <livewire:forms.add-level-form />
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card card-light shadow-sm mb-4">
            <div class="card-header">

                <h3>Checkout memberships</h3>
                <div class="float-end">
                    <input  class="form-control" placeholder="Search" wire:model="search" >
                </div>
            </div>
            <div class="card-body">
                <div class="h5 ">
                    @foreach($fmodels as $model)
                        <div class="form-check mt-2">
                            <input wire:model="selected" class="form-check-input float-end" type="checkbox" value="{{$model->id}}" id="defaultCheck{{$model->id}}">
                            <label  class="form-check-label " for="defaultCheck{{$model->id}}">
                                {{$model->name}}
                            </label>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>
