<div>

    <div class="row">
        <div class="col-12 text-center mb-4">
{{--            @error('total_amount')<span class="text-danger float-start">{{ $message }}</span>@enderror--}}

            <input wire:model="ramount" style="border: solid;border-color: #00dfa3"  type="text" class="trasparent-input text-center" value="100.00" placeholder="Enter Amount">
            @error('ramount')<span class="text-danger float-start">{{ $message }}</span>@enderror

        </div>
    </div>
    <!-- coupon code-->
    <div class="row">
        <div class="row mb-3">
            <div class="row mb-2">
                <div class="col">
                    <h6 class="title">From your supervisor</h6>
                </div>
            </div>
            <div class="col-12 px-0">
                <!-- swiper users connections -->
                <div class="swiper-container connectionwiper">
                    <div class="swiper-wrapper">
                            <div  class="swiper-slide">
                                <a  href="javascript: void(0)" class="card text-center">
                                    <div class="card-body p-1 bg-success rounded-18">
                                        <div class="position-absolute end-0 top-0 bg-success z-index-1">
                                        </div>
                                        <figure class="avatar avatar-80 shadow-sm rounded-18">
                                            <img src="{{$parent->profile_photo_url}}" alt="">
                                        </figure>
                                        <p class="text-secondary">{{$parent->name}}</p>
                                    </div>
                                </a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Saving targets -->
    <div class="row mb-2">
        <div class="col">
            <h6 class="title">Choose a method of payment</h6>
            @error('rselected_method_payment')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
    </div>
    <!-- swiper credit cards -->
    <div class="row mb-2">
        <div class="col-12 px-0">
            <div class="swiper-container cardswiper">
                <div class="swiper-wrapper">
                    @foreach($methods as $method)
                        <div class="swiper-slide">
                            <div wire:click="selectMethod({{$method['id']}})" class="card shadow-sm shadow-purple mb-3 {{$method['selected'] ? 'bg-success' : 'theme-bg'}}">
                                <img src="assets/img/card-bg.png" alt="" class="cardimg" />
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col-auto align-self-center">
                                            <img src="assets/img/maestro.png" alt="">
                                        </div>
                                        <div class="col align-self-center text-end">
                                            <p class="small">
                                                <span class="text-muted size-10">{{$method['provider']}}</span><br>
                                                <span class="">{{$method['name']}}</span>
                                            </p>
                                        </div>
                                    </div>
                                    <h6 class="fw-normal mb-3">
                                        {{$method['description']}}
                                    </h6>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-12 ">
            <button wire:click="saver"  class="btn btn-default btn-lg shadow-sm w-100">
                Receive Money
            </button>
        </div>
    </div>
</div>
