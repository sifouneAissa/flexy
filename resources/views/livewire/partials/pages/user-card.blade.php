
@if($withRole)
<div class="col-6 col-sm-4 col-md-3">
    <div class="card mb-4 shadow-sm p-2 bg-theme text-dark">
        <div class="card-body text-center bg-white rounded-15 shadow-sm">
            <div class="row align-items-center ">
                <a href="profile.html " class="col-auto mx-auto">
                    <div class="card mb-3">
                        <div class="card-body p-1">
                            <figure class="avatar avatar-80 mx-auto rounded-15">
                                <img src="{{$item->profile_photo_url}}" alt="">
                            </figure>
                        </div>
                    </div>
                </a>
            </div>
            <p class="mb-0 text-color-theme text-center">{{$item->name}}</p>
        </div>
            <div  class="card-footer border-0 text-center">
                <p class="text-small text-muted small">{{$item->email}}</p>
            </div>
    </div>
</div>
@else
<div class="col-6 col-sm-4 col-md-3">
    <div class="card mb-4 shadow-sm">
        <div class="card-body text-center">
            <div class="row align-items-center ">
                <a href="profile.html " class="col-auto mx-auto">
                    <div class="card mb-3">
                        <div class="card-body p-1">
                            <figure class="avatar avatar-80 mx-auto rounded-15">
                                <img src="{{$item->profile_photo_url}}" alt="">
                            </figure>
                        </div>
                    </div>
                </a>
            </div>
            <p class="mb-0 text-color-theme text-center">{{$item->name}}</p>
            <p class="text-small text-secondary small">{{$item->email}}</p>
        </div>
    </div>
</div>
@endif
