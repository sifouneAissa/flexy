<div>

    @foreach($types as $type)
        @php
            $providers = $type->providers;
        @endphp
        @if($providers->isNotEmpty())

            <div class="row mb-2">
                <div class="col">
                    <h6 class="title">{{$type->name}} - <i class="{{$type->icon}}"></i></h6>
                </div>
                <div class="col-auto">
                    <a href="bills.html" class="small">Pay Bill</a>
                </div>
            </div>


            <div class="row mb-3">
                <div class="col-12 px-0">
                    <!-- swiper Companies -->
                    <div class="">
                        <div class="row col-12">
                            @foreach($providers as $provider)
                                <div class="col-lg-3  col-md-4 col-6  ">
                                    <a href="#" class="bg-transparent text-center">
                                        <div class="card-body p-1">
                                            <figure class="avatar avatar-80 shadow-sm rounded-18">
                                                <img src="{{$provider?->getWebP()}}" alt="">
                                            </figure>
                                            <p class="text-secondary">{{$provider->name}}</p>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif
     @endforeach

</div>
