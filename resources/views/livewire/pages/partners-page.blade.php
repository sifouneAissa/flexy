@section('page-title')
    Partners
@endsection

<div>
    <div wire:key="livewire-partners-accordion" class="accordion accordion-flush shadow-sm mb-4" id="accordionFlushExample">
        <div  class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne">
                    Manage Users?
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne"
                 data-bs-parent="#accordionFlushExample">
                <div class="accordion-body text-secondary">

                    <div wire:key="livewire-partners">
                        <livewire:datatables.partner-table  />
                    </div>

                </div>
            </div>
        </div>
    </div>
    @if($parent)
        <div class="row">
            <livewire:partials.pages.user-card :item="$parent" :withRole="true" />
        </div>
@endif
<!-- user block -->
    <div class="row">
        @foreach($children as $child)
            <livewire:partials.pages.user-card :item="$child" />
        @endforeach
    </div>
    <!-- User list items  -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm mb-4 ">
                <ul class="list-group list-group-flush bg-none">
                    @if($parent)
                        <li class="list-group-item border-0">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="card">
                                        <div class="card-body p-1">
                                            <figure class="avatar avatar-44 rounded-15">
                                                <img src="{{$parent->profile_photo_url}}" alt="">
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <p>{{$parent->name}}<br><small class="text-secondary">{{$parent->email}}</small></p>
                                </div>
                                <div class="col-auto text-end">
                                    <p>
                                        <small class="text-secondary">Online <span
                                                class="avatar avatar-6 rounded-circle bg-success d-inline-block"></span></small>
                                    </p>
                                </div>
                            </div>
                        </li>
                    @endif
                    @foreach($children as $child)
                        <li class="list-group-item border-0">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="card">
                                        <div class="card-body p-1">
                                            <figure class="avatar avatar-44 rounded-15">
                                                <img src="{{$child->profile_photo_url}}" alt="">
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <p>{{$child->name}}<br><small class="text-secondary">{{$child->email}}</small></p>
                                </div>
                                <div class="col-auto text-end">
                                    <p>
                                        <small class="text-secondary">Online <span
                                                class="avatar avatar-6 rounded-circle bg-success d-inline-block"></span></small>
                                    </p>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        {{--    modals--}}
        <div>
            <div class="modal fade" id="levels-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" >
                <div class="modal-dialog" role="document" >
                    <div class="modal-content">
                        <div class="modal-header bg-warning">
                            <h3>
                                Edit Levels
                            </h3>
                            <button onclick="modal('levels-edit',false)" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                @foreach($users as $user)
                                    <p class="h5">{{$user->name}}  ({{$user->level?->name}})</p>
                                @endforeach
                            </div>

                            <div class="form-group row mt-5">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Level</label>
                                <div class="col-sm-10">
                                    <select wire:model.defer="level_id" class="form-select">
                                        @foreach($levels as $level)
                                            <option value="{{$level->id}}">{{$level->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button"  onclick="modal('levels-edit',false)" class="btn btn-outline-warning" data-dismiss="modal">Close</button>
                            <button type="submit" wire:click="saveL" class="btn btn-warning">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="memberships-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" >
                <div class="modal-dialog" role="document" >
                    <div class="modal-content">
                        <div class="modal-header bg-warning">
                            <h3>
                                Edit Levels
                            </h3>
                            <button onclick="modal('memberships-edit',false)" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                @foreach($users as $user)
                                    <p class="h5">{{$user->name}}  ({{$user->level?->name}})</p>
                                @endforeach
                            </div>

                            <div class="form-group row mt-5">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Member ship</label>
                                <div class="col-sm-10">
                                    <select wire:model.defer="member_ship_id" class="form-select">
                                        @foreach($memberships as $membership)
                                            <option value="{{$membership->id}}" >{{$membership->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button"  onclick="modal('memberships-edit',false)" class="btn btn-outline-warning" data-dismiss="modal">Close</button>
                            <button type="submit" wire:click="saveM" class="btn btn-warning">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    function modal(id,state){
        state ? $('#'+id).modal("show") : $('#'+id).modal("hide");
    }
    window.addEventListener('setModal', (e) => {
        // show or hide modal
        modal(e.detail.id,e.detail.state);
    });
    window.addEventListener('removeModal', (e) => {
        // hide modals
        modal('levels-edit',false);
        modal('memberships-edit',false);
        $('.modal-backdrop').remove();
    });
</script>
