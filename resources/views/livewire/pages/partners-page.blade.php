@section('page-title')
    Partners
@endsection

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
</div>
