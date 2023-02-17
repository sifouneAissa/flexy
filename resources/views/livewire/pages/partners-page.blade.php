@section('page-title')
    Partners
@endsection
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
