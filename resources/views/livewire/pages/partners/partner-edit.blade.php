@section('page-title')
Partner edit
@endsection
<div>

    <div class="row">
        <div class="col-12 col-md-6 col-lg-6">
            <livewire:partials.pages.user-card :col12="true" :item="$item" :withRole="true" />
        </div>
        <div class="col-12 col-md-6 col-lg-6">
            <div class="card card-light shadow-sm mb-4">
                <div class="card-header">
                    <h3>Informations</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group row">
                            <label for="staticEmail" class="col-2 col-form-label">Level</label>
                            <div class="col-10">
                                <input   class="form-control-plaintext" readonly id="staticEmail" value="{{$item->level?->name}}">
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-2 col-form-label">Member ship</label>
                            <div class="col-10">
                                <input   class="form-control-plaintext" readonly id="staticEmail" value="{{$item->membership?->name}}">
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div wire:key="partner-edit-form" class="row align-content-center ">
        <div class="col-lg-6 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Percentage Informations</h3>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="save">
                            @foreach($providers as $provider)
                                <div wire:key="form-input-{{$provider->id}}" class="col-12 mt-2">
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">{{$provider->name}}</label>
                                        <div class="col-sm-10">
                                            <input  wire:model="user_providers.{{$loop->index}}.percentage" class="form-control" id="staticEmail">
                                            @error('user_providers.'.$loop->index.'.percentage')
                                            <div class="text-danger">{{str_replace('user providers.'.$loop->index.'.percentage','',$message)}}</div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                            <button type="submit" class="btn btn-primary float-end mt-2">
                                Save
                            </button>
                        </form>
                    </div>
                </div>
        </div>
        <div class="col-lg-6 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3>Informations general</h3>
                </div>
                <div class="card-body">

                    <form wire:submit.prevent="saveE">
                        <div class="col-12 mt-2">
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">MemberShip</label>
                                <div class="col-sm-10">
                                    <select wire:model="member_ship_id" class="form-select">
                                        @foreach($memberships as $membership)
                                            <option value="{{$membership->id}}" >{{$membership->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-2">
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Level</label>
                                <div class="col-sm-10">
                                    <select wire:model="level_id" class="form-select">
                                        @foreach($levels as $level)
                                            <option value="{{$level->id}}">{{$level->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary float-end mt-2" type="submit">
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
