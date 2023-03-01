@section('page-title')
Flexy main
@endsection

<div class="row">
    <div class="col-12">

    </div>
    <div class="row mb-2 mt-5">

        @foreach($cards as $card )
            <div class="col-12 col-md-4 col-lg-3">
                <div class="card mb-3">
                    <div class="card-body p-1 position-relative">
                        <div class="position-absolute start-0 top-0 m-2 z-index-1">

                        </div>
                        <figure class="avatar w-100 rounded-15 border">
                            <a href="{{route($routes[$card->code])}}">
                                <img src="{{$card?->getWebP()}}" alt="" class="w-100">
                            </a>
                        </figure>
                    </div>
                    <div class="card-body pt-2">
                        <div class="row">
                            <div class="col">
                                <p class="small"><small class="text-muted size-20">{{$card->content}}</small>
                                    {{--                                <br />$ 265.00--}}
                                </p>
                            </div>
                            {{--                    <div class="col-auto px-0">--}}
                            {{--                        <button class="btn btn-sm btn-link text-color-theme">--}}
                            {{--                            <i class="bi bi-bag-plus"></i>--}}
                            {{--                        </button>--}}
                            {{--                    </div>--}}
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
