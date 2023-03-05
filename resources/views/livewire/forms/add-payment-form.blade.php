<div >

    <!-- balance -->
    <livewire:partials.app-sub-menu :withRoute="false" />


{{--        @if(!$isAdmin)--}}
{{--            <div class="form-group">--}}
{{--                <label>{{$sendMoney ? 'Send Money' : 'Request Money'}}</label>--}}
{{--                <div class="form-switch col-auto h2">--}}
{{--                    <input wire:model="sendMoney" class="form-check-input" type="checkbox" id="switch-mode">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endif--}}
{{--        <div class="form-floating mt-3 {{$errors->has('amount') ? 'is-invalid' : 'is-valid'}}">--}}
{{--            <input wire:model="amount" type="text" class="form-control"  placeholder="Name"--}}
{{--                   id="amount">--}}
{{--            <label for="amount">Amount</label>--}}
{{--            @error('amount')--}}
{{--            <button type="button" class="text-danger tooltip-btn" data-bs-toggle="tooltip"--}}
{{--                    data-bs-placement="left" title="{{$message}}" id="nameerror">--}}
{{--                <i class="bi bi-info-circle"></i>--}}
{{--            </button>--}}
{{--            --}}{{--            <span class="error">{{ $message }}</span> --}}
{{--            @enderror--}}
{{--        </div>--}}
{{--        <div class="d-grid mt-3">--}}
{{--            <button  type="submit" class="btn btn-default btn-lg shadow-sm">Create</button>--}}
{{--        </div>--}}
        <div>
            @if(!$isAdmin)
            <ul class="nav nav-tabs mb-5" id="myTab" role="tablist">
                <li class="nav-item col-6" role="presentation">
                    <button class="nav-link active col-12 bg-transparent"  id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Send Money</button>
                </li>
                <li class="nav-item col-6" role="presentation">
                    <button class="nav-link col-12 bg-transparent" id="profile-tab"  data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Receive Money</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            @endif
                    <form id="add-user-form" wire:submit.prevent="save" >
                    <div class="row">
                        <div class="col-12 text-center mb-4">
                            @error('total_amount')<span class="text-danger float-start">{{ $message }}</span>@enderror

                            <input wire:model="amount" style="border: solid;border-color: #00dfa3"  type="text" class="trasparent-input text-center" value="100.00" placeholder="Enter Amount">
                            @error('amount')<span class="text-danger float-start">{{ $message }}</span>@enderror

                        </div>
                    </div>
                    <!-- coupon code-->
                    <div class="row">
                        <div class="row mb-3">
                            <div class="row mb-2">
                                <div class="col">
                                    <h6 class="title">Select users</h6>
                                    @error('selected_users')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="col-auto">
                                    <a href="{{route('client.index')}}" class="small">View More</a>
                                </div>
                            </div>
                            <div class="col-12 px-0">
                                <!-- swiper users connections -->
                                <div class="swiper-container connectionwiper">
                                    <div class="swiper-wrapper">
                                        @foreach($amounts as $record)
                                            <div  class="swiper-slide">
                                                <a wire:click="selectUser({{$record['id']}})" href="javascript: void(0)" class="card text-center">
                                                    <div class="card-body p-1 {{$record['selected'] ? 'bg-success' : 'bg-light'}} rounded-18">
                                                        <div class="position-absolute end-0 top-0 bg-success z-index-1">
                                                        </div>
                                                        <figure class="avatar avatar-80 shadow-sm rounded-18">
                                                            <img src="{{$record['profile_photo_url']}}" alt="">
                                                        </figure>
                                                        <p class="text-secondary">{{$record['name']}}</p>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Saving targets -->
                    <div class="row mb-2">
                        <div class="col">
                            <h6 class="title">Choose a method of payment</h6>
                            @error('selected_method_payment')
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
                            <button wire:click="save"  class="btn btn-default btn-lg shadow-sm w-100">
                                Send Money
                            </button>
                        </div>
                    </div>

                    </form>
                </div>
            @if(!$isAdmin)
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                    <livewire:forms.add-receive-payment-form />

                </div>
            @endif
            </div>
            </div>
</div>

<script>
    document.addEventListener('livewire:load', function () {
    })


</script>
