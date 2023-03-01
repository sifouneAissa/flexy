<div >

    <style type="text/css">

        .search-box ul{
            list-style: none;
            padding: 0px;
            width: 250px;
            position: absolute;
            margin: 0;
            background: white;
        }

        .search-box ul li{
            background: lavender;
            padding: 4px;
            margin-bottom: 1px;
        }

        /*.search-box ul li:nth-child(even){*/
        /*    background: cadetblue;*/
        /*    color: white;*/
        /*}*/

        .search-box ul li:hover{
            cursor: pointer;
        }

        .search-box input[type=text]{
            padding: 5px;
            width: 250px;
            letter-spacing: 1px;
        }
    </style>
    <form id="add-user-form" wire:submit.prevent="save" >
        <div class="form-floating mb-3 z-index-99 {{$errors->has('client_name') ? 'is-invalid' : 'is-valid'}} ">
            <input wire:model="client_name" type="text" class="form-control"  placeholder="Name"
                   id="client_name" wire:keyup="search">

            <label for="client_name">Client Name</label>
            @error('client_name')
            <button type="button" class="text-danger tooltip-btn" data-bs-toggle="tooltip"
                    data-bs-placement="left" title="{{$message}}" id="nameerror">
                <i class="bi bi-info-circle"></i>
            </button>
            {{--            <span class="error">{{ $message }}</span> --}}

            @enderror
            <div class="search-box ">
                <ul  class="" wire:ignore.self>
                    @if(!empty($records))
                        @foreach($records as $record)

                            <li  wire:click="selectUser({{ $record->id }})">
                                <a class="dropdown-item">{{ $record->name}}</a>
                            </li>

                        @endforeach
                    @endif
                </ul>
            </div>
        </div>

        <div class="form-floating mb-3 {{$errors->has('phone_number') ? 'is-invalid' : 'is-valid'}}">
            <input wire:model="phone_number" type="text" class="form-control"  placeholder="Name" id="phone_number" />
            <label for="phone_number">Phone Number</label>
            @error('phone_number')
            <button type="button" class="text-danger tooltip-btn" data-bs-toggle="tooltip"
                    data-bs-placement="left" title="{{$message}}" id="nameerror">
                <i class="bi bi-info-circle"></i>
            </button>
            {{--            <span class="error">{{ $message }}</span> --}}
            @enderror
        </div>

        <div class="form-floating mb-3 {{$errors->has('amount') ? 'is-invalid' : 'is-valid'}}">
            <input wire:model="amount" type="text" class="form-control"  placeholder="Name" id="amount" />
            <label for="amount">Amount</label>
            @error('amount')
            <button type="button" class="text-danger tooltip-btn" data-bs-toggle="tooltip"
                    data-bs-placement="left" title="{{$message}}" id="nameerror">
                <i class="bi bi-info-circle"></i>
            </button>
            {{--            <span class="error">{{ $message }}</span> --}}
            @enderror
        </div>

        <div class="d-grid">
            <button  type="submit" class="btn btn-default btn-lg shadow-sm">Send
                <div  wire:loading class="spinner-border float-end" role="status"></div>
            </button>
        </div>
    </form>
</div>
<script>
    document.addEventListener('livewire:load', function () {
    })


</script>
<!-- CSS -->
