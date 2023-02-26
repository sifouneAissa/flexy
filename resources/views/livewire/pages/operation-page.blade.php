@section('page-title')
Percentages
@endsection
<div class="row mb-2 mt-5">

    <div class="col-6 col-md-4 col-lg-3">
        <div class="card mb-3">
            <div class="card-body p-1 position-relative">
                <div class="position-absolute start-0 top-0 m-2 z-index-1">
                    @foreach($pupercentages as $puper)
                        <div class="tag tag-small bg-theme">
                            {{$puper['percentage']}}% {{$puper['provider_name']}}
                        </div>
                    @endforeach
                </div>
                <figure class="avatar w-100 rounded-15 border">
                    <img src="/images/flexy.webp" alt="" class="w-100">
                </figure>
            </div>
            <div class="card-body pt-2">
                <div class="row">
                    <div class="col">
                        <p class="small"><small class="text-muted size-20">Flexy operations</small><br />$ 265.00
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
    @foreach($spupercentages as $provider)

        <div class="col-6 col-md-4 col-lg-3">
            <div class="card mb-3">
                <div class="card-body p-1 position-relative">
                    <div class="position-absolute start-0 top-0 m-2 z-index-1">
                        <div class="tag tag-small bg-theme">
                            {{$provider['percentage']}}% Plus
                        </div>
                    </div>
{{--                    <div class="position-absolute end-0 top-0 p-2 z-index-1 ">--}}
{{--                        <button--}}
{{--                            class="btn btn-sm btn-26 roudned-circle shadow-sm shadow-danger text-white bg-danger">--}}
{{--                            <i class="bi bi-heart size-10 vm"></i>--}}
{{--                        </button>--}}
{{--                    </div>--}}
                    <figure class="avatar w-100 rounded-15 border">
                        <img src="{{$provider['img']}}" alt="" class="w-100">
                    </figure>
                </div>
                <div class="card-body pt-2">
                    <div class="row">
                        <div class="col">
                            <p class="small"><small class="text-muted size-20">{{$provider['provider_name']}}</small><br />$ 265.00
                            </p>
                        </div>
{{--                        <div class="col-auto px-0">--}}
{{--                            <button class="btn btn-sm btn-link text-color-theme">--}}
{{--                                <i class="bi bi-bag-plus"></i>--}}
{{--                            </button>--}}
{{--                        </div>--}}
                    </div>

                </div>
            </div>
        </div>

    @endforeach
</div>
