@section('page-title')
    Add Payment
@endsection

<div class="row">
    <div class="col-12">
        <div class=" bg-transparent mb-4">
            <div class="card-body">
                <livewire:forms.add-payment-form />
            </div>
        </div>
    </div>
{{--    <div class="col-12 col-md-6 col-lg-6">--}}
{{--        <div class="card card-light shadow-sm mb-4">--}}
{{--            @if($sendMoney)--}}
{{--            <div class="card-header">--}}

{{--                <h3>Users</h3>--}}
{{--                <div class="float-end">--}}
{{--                    <input  class="form-control" placeholder="Search" wire:model="search" >--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            @else--}}
{{--                <div class="card-header">--}}

{{--                    <h3>Request Money from your Supervisor</h3>--}}
{{--                </div>--}}

{{--            @endif--}}
{{--            <div class="card-body">--}}

{{--                <div class="h5 ">--}}
{{--                    @if($sendMoney)--}}
{{--                        @error('selectedErr')--}}
{{--                        <div class="text-danger">{{$message}}</div>--}}
{{--                        @enderror--}}
{{--                    @foreach($rusers as $user)--}}
{{--                            <div wire:key="livewire-users-accordion-{{$user->id}} " class="accordion accordion-flush shadow-sm mb-4 " id="{{'accordionFlush'.$user->id}}">--}}
{{--                                <input  wire:model="amounts.{{$user->id}}.selected" class="form-check-input float-end h3" type="checkbox" value="{{true}}" id="defaultCheck{{$user->id}}">--}}
{{--                                <div  class="accordion-item">--}}
{{--                                    <h2 class="accordion-header" id="flush-headingOne-{{$user->id}}">--}}
{{--                                        <div class="form-check">--}}
{{--                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"--}}
{{--                                                    data-bs-target="#flush-collapseOne-{{$user->id}}" aria-expanded="true" aria-controls="flush-collapseOne-{{$user->id}}" class="form-check-label" for="defaultCheck1">--}}
{{--                                                {{$user->name}}--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                    </h2>--}}
{{--                                    <div id="flush-collapseOne-{{$user->id}}" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne-{{$user->id}}"--}}
{{--                                         data-bs-parent="#{{'accordionFlush'.$user->id}}">--}}
{{--                                        <div class="accordion-body text-secondary">--}}

{{--                                            <div >--}}
{{--                                                                                            <livewire:datatables.user-table />--}}
{{--                                                <input type="number" class="form-control" placeholder="Amount"  wire:model="amounts.{{$user->id}}.amount" >--}}
{{--                                                @error('amounts.'.$user->id.'.amount')--}}
{{--                                                <div class="text-danger">{{str_replace('amounts.'.$user->id.'.amount','',$message)}}</div>--}}
{{--                                                @enderror--}}
{{--                                            </div>--}}

{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                    @else--}}
{{--                        <label  class="form-check-label" for="defaultCheck{{$parent->id}}">--}}
{{--                            {{$parent->name}}--}}
{{--                        </label>--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
</div>


