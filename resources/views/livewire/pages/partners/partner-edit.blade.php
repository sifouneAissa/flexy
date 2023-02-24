@section('page-title')
Partner edit
@endsection
<div>

    <div class="row">
        <div class="col-12 profile-page">
            <div class="clearfix"></div>
            <div class="circle small one"></div>
            <div class="circle small two"></div>
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="282.062"
                 height="209.359" viewBox="0 0 282.062 209.359" class="menubg">
                <defs>
                    <linearGradient id="linear-gradient" x1="0.5" x2="0.5" y2="1"
                                    gradientUnits="objectBoundingBox">
                        <stop offset="0" stop-color="#09b2fd" />
                        <stop offset="1" stop-color="#6b00e5" />
                    </linearGradient>
                </defs>
                <path id="profilebg"
                      d="M751.177,233.459c-28.511,1.567-38.838,7.246-61.77,27.573s-27.623,71.926-65.15,70.883-27.624-21.369-79.744-40.132-47.13-53.005-23.676-84.8,4.009-57.671,33-75.867,83.269,30.223,127.232,21.5,64.157-41.353,82.329-26,5.953,29.138,8.773,46.369,13.786,23.5,13.786,37.91S779.688,231.893,751.177,233.459Z"
                      transform="translate(-503.892 -122.573)" fill="url(#linear-gradient)" />
            </svg>


            <div class="row my-3 py-4">
                <div class="col-7 align-self-center">
                    <h1 class="mb-2"><span class="fw-light text-secondary">User to Edit !</span><br />{{$item->name}}</h1>
                    <p class="text-muted size-12">{{$item->email}},<br />Algeria</p>
                </div>

                <div class="col align-self-center">
                    <figure class="avatar avatar-100 rounded-20 p-1 bg-white shadow-sm">
                        <img src="{{$item->profile_photo_url}}" alt="" class="rounded-18">
                    </figure>
                </div>
            </div>
        </div>
    </div>

    <!-- buttons -->
    <div class="row mb-4">
        <div class="col">
            <a href="" class="btn btn-light btn-lg shadow-sm w-100">Invite</a>
        </div>
        <div class="col">
            <a href="message.html" class="btn btn-default btn-lg shadow-sm w-100">Message</a>
        </div>
    </div>

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
