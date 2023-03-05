<div>
    <style>
        .trasparent-input {
            font-size: 40px;
            line-height: 68px;
            padding: 10px 15px;
            border: 0;
            background-color: transparent;
            display: block;
            width: 100%;
            border-radius: var(--finwallapp-rounded);
        }

        .trasparent-input:focus {
            background-color : transparent;
            outline: none;
        }
        .card-transparent:focus-within {
            border: solid;
            border-color: #00dfa3;
            background-color: var(--finwallapp-theme-bordercolor);
        }
        .card-transparent {
            background-color: var(--finwallapp-theme-bordercolor);
        }

    </style>
<div class="row mb-4">
    <div class="col-12 text-center mb-4" wire:ignore.self>
        <div class="d-flex rounded-18 card-transparent"  >
            @if($code && $code!=='info')
                <div class="col-auto mt-3 ml-3">
                    <button class="" type="button" data-bs-toggle="modal" data-bs-target="#attachefiles">
                        <img src="{{$cicon}}" class="rounded-18" style="width:50px;height:60px" alt="My Happy SVG">
                    </button>
                </div>
            @endif
            <div class="col">
                <div class="input-group">
                    <input onfocus="setV(event)" oninput="setV(event)"   id="number-col" onkeypress="return isNumber(event)"   maxlength="10" type="text" inputmode="numeric"  wire:keyup="search" class="trasparent-input text-center" placeholder="Enter Phone Number">

                </div>
            </div>
        </div>
        @error('phone_number_code')
            <p class="text-danger float-start">{{$message}}</p>
        @enderror

        @if((!$errors->has('phone_number') && $code!=='info' && $phone_number))
            <div class="row justify-content-between gx-0 mx-0 collapse mt-2 rounded-18 card-transparent" id="flexy-extra" style="border: solid;border-color: #99dfaa" wire:ignore.self>
                <input  oninput="setA(event)"   onkeypress="return isNumber(event,'amount')" id="amoun-col"  type="text" inputmode="numeric" class="trasparent-input text-center"  placeholder="Amount">
                @error('amount')
                <p class="text-danger float-start">{{$message}}</p>
                @enderror
            </div>

            <button id="btn-collapse" class="btn btn-link mt-0 py-1 w-100 bar-more collapsed mt-2" type="button"
                    data-bs-toggle="collapse" data-bs-target="#flexy-extra" aria-expanded="false"
                    aria-controls="flexy-extra">
                <span class="text-dark"></span>
            </button>

               <div class="align-content-around">
                   <button class="btn btn-primary col-auto collapsed mt-2 h3" title="Search for offers" onclick="setM(true)">
                       Offres <i class="bi bi-search-heart"></i>
                   </button>
                   @if(!$nexist)
                       <button   class="col-auto btn btn-success h3 mt-2" title="add to favorite" onclick="setM(true,'add-to-favorite')">
                           Favorite <i class="bi bi-heart-fill"></i>
                       </button>
                   @endif
               </div>

            <button class=" h1 {{(!$errors->has('amount') && $amount) ? 'text-success' : 'text-danger'}} mt-2" @if(!$errors->has('amount') && $amount) wire:click="save" @endif title="Send">
                @if(!$errors->has('amount') && $amount)
                    <i class="bi bi-check-circle "></i>
                @else
                    <i class="bi bi-check-circle "></i>
                @endif
            </button>


            <div  class="modal fade " id="offers" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >

                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">

                        <form >
                            <div class="modal-header bg-primary">
                                <h3 class="modal-title" id="exampleModalLabel">Offers</h3>
                                <button onclick="setM(false)" type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div  class="modal-body" >
                                <div class="text-center">
                                    No offers available for {{$phone_number}}
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" onclick="setM(false)" class="btn btn-outline-primary"
                                        data-dismiss="modal">Close
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            <div  class="modal fade" id="add-to-favorite" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>

                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">

                        <form >
                            <div class="modal-header bg-success">
                                <h3 class="modal-title" id="exampleModalLabel">Add to favorite</h3>
                                <button onclick="setM(false,'add-to-favorite')" type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div  class="modal-body" >
                                <div class="text-center">
                                        <div class="form-floating mb-3 {{$errors->has('client_phone') ? 'is-invalid' : 'is-valid'}}">
                                            <input wire:model="client_phone" type="text" class="form-control"  placeholder="Name" id="phone_number" />
                                            <label for="client_phone">Phone Number</label>
                                            @error('client_phone')
                                            <button type="button" class="text-danger tooltip-btn" data-bs-toggle="tooltip"
                                                    data-bs-placement="left" title="{{$message}}" id="nameerror">
                                                <i class="bi bi-info-circle"></i>
                                            </button>
                                            @enderror
                                        </div>
                                    <div class="form-floating mb-3 z-index-99 {{$errors->has('name') ? 'is-invalid' : 'is-valid'}} ">
                                        <input wire:model="name" type="text" class="form-control"  placeholder="Name"
                                               id="name" >
                                        <label for="name">Client Name</label>
                                        @error('name')
                                        <button type="button" class="text-danger tooltip-btn" data-bs-toggle="tooltip"
                                                data-bs-placement="left" title="{{$message}}" id="nameerror">
                                            <i class="bi bi-info-circle"></i>
                                        </button>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" onclick="setM(false,'add-to-favorite')" class="btn btn-outline-success"
                                        data-dismiss="modal">Close
                                </button>
                                <button wire:click="saveClient" type="button"  class="btn btn-success"
                                        data-dismiss="modal">Save
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

        @endif
    </div>

</div>

<!-- People -->
<div class="row mb-2">
    <div class="col">
        <h6 class="title">Favorite Clients</h6>
    </div>
    <div class="col-auto">
        <a href="{{route('client.index')}}" class="small">View More</a>
    </div>
</div>
<div class="row mb-3">
    <div class="col-12 px-0">
        <!-- swiper users connections -->
        <div class="swiper-container connectionwiper">
            <div class="swiper-wrapper">
                @foreach($records as $record)
                    <div wire:click="select({{$record->id}})" class="swiper-slide">
                        <a href="javascript: void(0)" class="card text-center">
                            <div class="card-body p-1">
                                <div class="position-absolute end-0 top-0 bg-success z-index-1 online-status">
                                </div>
                                <figure class="avatar avatar-80 shadow-sm rounded-18">
                                    <img src="{{$record->profile_photo_url}}" alt="">
                                </figure>
                                <p class="text-secondary">{{$record->name}}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>

<script>


    window.addEventListener('livewire:load', function () {
    });

    function setV(){
        setTimeout(function (){
            let phone = @this.get('phone_number');
            if(@this.get('code')==='info' && phone?.length>1) {
                $('#number-col').val('0');
            @this.set('phone_number',null);
            }
            else
            @this.set('phone_number',$('#number-col').val());
        },500);
    }

    function setA(event){
        setTimeout(function (){
            @this.set('amount',$('#amoun-col').val());
        },500);
    }

    window.addEventListener('btnClick', (e) => {
        $('#btn-collapse').click();
    });

    window.addEventListener('setM', (e) => {
        setM(e.detail.state,e.detail.id)
    });

    function setM(state,id){
        if(!id)
        $('#offers').modal(state ? 'show' : 'hide');
        else
        $('#'+id).modal(state ? 'show' : 'hide');
    }
    //
    function isNumber(evt,f) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }

        if(f==='amount'){
            // setA();
        }
        else
        if($('#number-col').val().length===10){
            // $('#number-col').val($('#number-col').val());
            setV();
        }

        return true;
    }

    function delay(callback, ms) {
        var timer = 0;
        return function() {
            var context = this, args = arguments;
            clearTimeout(timer);
            timer = setTimeout(function () {
                callback.apply(context, args);
            }, ms || 0);
        };
    }


</script>
