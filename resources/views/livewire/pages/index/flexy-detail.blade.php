<div>
<div class="row mb-4">
    <div class="col-12 text-center mb-4">
        <img src="{{$cicon}}" class="rounded"  style="width:50px;height:50px" alt="My Happy SVG"/>
        <input wire:model="phone_number" wire:keyup="search"  type="text" class="trasparent-input text-center"  placeholder="Enter Phone Number">
        @error('phone_number')
            <p class="text-danger">{{$message}}</p>
        @enderror

        @if(!$errors->has('phone_number') && $phone_number)
            <div class="row justify-content-between gx-0 mx-0 collapse" id="flexy-extra" wire:ignore.self>
                <input wire:model="amount" type="text" class="trasparent-input text-center"  placeholder="Amount">
                @error('amount')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <button id="btn-collapse" class="btn btn-link mt-0 py-1 w-100 bar-more collapsed " type="button"
                    data-bs-toggle="collapse" data-bs-target="#flexy-extra" aria-expanded="false"
                    aria-controls="flexy-extra">
                <span class="text-dark"></span>
            </button>

                <button  class="col-auto btn btn-link mt-0 py-1 w-100 bar-more collapsed" onclick="setM(true)">
                    Choose Offer
                </button>
                @if(!$nexist)
                <button   class="btn btn-success h3" onclick="setM(true,'add-to-favorite')">
                    Add to Favorite
                </button>
                @endif

                @if(!$errors->has('amount') && $amount)
                <button class="h1 text-success" wire:click="save">
                    <i class="bi bi-check-circle "></i>
                </button>
                @endif


            <div  class="modal fade " id="offers" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >

                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">

                        <form >
                            <div class="modal-header bg-success">
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
                                <button type="button" onclick="setM(false)" class="btn btn-outline-success"
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

</script>
