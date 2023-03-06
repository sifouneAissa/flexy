<div>
    <!-- service provider -->
    <div class="row mb-3">
        <div class="col">
            <h6 class="title">Selected Method the payment</h6>
        </div>
    </div>

    <!-- swiper credit cards -->
    <div class="row mb-2">
        <div class="col-12 px-0">
            <div class="swiper-container cardswiper">
                <div class="swiper-wrapper">
                    @foreach($methods as $method)
                        <div class="swiper-slide">
                            <div  class="card shadow-sm shadow-purple mb-3 {{$method['selected'] ? 'bg-success' : 'theme-bg'}}">
                                <img src="/assets/img/card-bg.png" alt="" class="cardimg" />
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col-auto align-self-center">
                                            <img src="/assets/img/maestro.png" alt="">
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


    <!-- Direct bill -->
    <div class="row mb-3">
        <div class="col">
            <h6 class="title">Payment Details</h6>
        </div>
    </div>
    <div class="row mb-1 justify-content-center">
        <div class="col-12">
            <div class="card bg-opac-50 mb-3">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-auto">
                            <div class="avatar avatar-44 shadow-sm rounded-10">
                                <img src="{{$buyer->profile_photo_url}}" alt="">
                            </div>
                        </div>
                        <div class="col align-self-center ps-0">
                            <p class="mb-0 text-color-theme">From : {{$buyer->email}}</p>
                            <p class="text-muted small">Payment ID: #{{$item->id}}</p>
                        </div>
                        <div class="col-auto">
                            <a href="{{route('payment.create')}}" class="btn btn-default btn-44 shadow-sm">
                                <i class="bi bi-arrow-up-right-circle"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body {{$badge}} rounded-18">
                            <div class="row">
                                <div class="col-auto">
{{--                                    <div class="avatar avatar-60 shadow-sm rounded-10 bg-danger text-white">--}}
{{--                                        <img src="/assets/img/company3.jpg" alt="">--}}
{{--                                    </div>--}}
                                </div>
                                <div class="col align-self-center ps-0 "  data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">

                                    <p class="text-color-theme">Amount
                                        <span class="tag {{$badge}} text-white px-2 float-end">{{$item->status}}</span>
                                    </p>

                                    <div class="row">
                                        <div class="col h3">{{$item->amount}}</div>
                                        <div class="col-auto align-self-center text-end">
                                            <span class="text-muted size-12 " >Date: {{translateDate($item->created_at)}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" id="collapseExample" wire:ignore.self>
                                    <div class="card mb-3 overflow-hidden bg-opac-50">
                                        <div class="card-body px-0">
                                            <ul class="list-group list-group-flush w-100 bubble-sheet log-information">
                                                @foreach($statuses as $val)
                                                    <li @if($canSet) wire:click="$set('status','{{$val}}')" @endif class="list-group-item">
                                                        <div class="avatar avatar-15 {{$status === $val ? 'border-success' : 'border-dark'}} rounded-circle"></div>
                                                        <p><span class="{{$val === 'waiting' ? 'text-warning' : ($val === 'payed' ? 'text-success' : 'text-danger')}}">{{$val}}</span>
                                                            <br/>
                                                                @if($val==='waiting')
                                                                    This Payment is still waiting
                                                                    <div class=" align-self-center text-end">
                                                                        <span class="text-muted size-12 " >{{translateDate($this->item->created_at)}}</span>
                                                                    </div>
                                                                @elseif($val==='payed')
                                                                    if you check this one you will get payed
                                                                    <div class=" align-self-center text-end">
                                                                        <span class="text-muted size-12 " >{{$item->status === 'payed' ? translateDate($this->item->updated_at) : ''}}</span>
                                                                    </div>
                                                                @elseif($val==='rejected')
                                                                    reject message

                                                                    <div class=" align-self-center text-end">
                                                                        <span class="text-muted size-12 " >{{$item->status === 'rejected' ? translateDate($this->item->updated_at) : ''}}</span>
                                                                    </div>
                                                                @endif
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- service provider -->
    <div class="row mb-3">
        <div class="col">
            <h6 class="title">Upcomming Payments by <span class="text-primary h5">{{$buyer->name}}</span></h6>
        </div>
        <div class="col-auto">
            <a href="" class="small">View more</a>
        </div>
    </div>
    <div class="row mb-1">
        @foreach($payments as $payment)
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto">
                                <div class="avatar avatar-44 shadow-sm rounded-10 bg-danger text-white">
                                    <i class="bi bi-cash vm"></i>
                                </div>
                            </div>
                            <div class="col align-self-center ps-0">
                                <p class="mb-0 size-12"><span class="text-color-theme fw-medium">{{$payment->buyer->name }}</span>
                                    <span class="text-muted ">Recharge Expiring</span>
                                </p>
                                <p>{{$payment->amount}} <small class="size-12 text-muted">{{$payment->created_at?->diffForHumans()}}</small></p>
                            </div>
                            <div class="col-auto">
                                <a href="{{route('payment.edit',['payment' => $payment->id])}}" class="btn btn-default btn-44 shadow-sm">
                                    <i class="bi bi-arrow-up-right-circle"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Button trigger modal -->
{{--    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">--}}
{{--        Launch demo modal--}}
{{--    </button>--}}

    <!-- Modal -->
    @if($canSet)
        <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{$buyer->name}} #{{$item->id}} Amount : {{$item->amount}}</h5>
                        <button onclick="showM(false,true)" type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        You want to change the status to {{$this->status}}
                    </div>
                    <div class="modal-footer">
                        <button onclick="showM(false,true)" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button wire:click="save()" type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>

        </div>
    @endif

</div>
<script>
    function showM(status,setStatus) {
        $('#confirmModal').modal(status ? 'show' : 'hide');
        if(setStatus)
            @this.set("status",@this.get('ostatus'));
    }

    window.addEventListener('showM', (e) => {
        showM(e.detail.status);
    });

</script>
