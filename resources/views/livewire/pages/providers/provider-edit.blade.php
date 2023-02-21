@section('page-title')
    Edit Provider
@endsection
<div class="row">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card card-light shadow-sm mb-4">
            <div class="card-body">
                <livewire:forms.edit-provider-form :item="$item"/>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card card-light shadow-sm mb-4">
            <div class="card-header">

                <h3>Set up percentage for users</h3>
                <div class="float-end">
                    <input  class="form-control" placeholder="Search" wire:model="search" >
                </div>
            </div>
            <div class="card-body">
                <div class="">
                    @foreach($fusers as $user)

                        <div wire:key="livewire-users-accordion-{{$user->id}}" class="accordion accordion-flush shadow-sm mb-4" id="{{'accordionFlush'.$user->id}}">
                            <div  class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne-{{$user->id}}">
                                    <div class="form-check">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapseOne-{{$user->id}}" aria-expanded="true" aria-controls="flush-collapseOne-{{$user->id}}" class="form-check-label" for="defaultCheck1">
                                            {{$user->name}}
                                        </button>
                                    </div>
                                </h2>
                                <div id="flush-collapseOne-{{$user->id}}" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne-{{$user->id}}"
                                     data-bs-parent="#{{'accordionFlush'.$user->id}}">
                                    <div class="accordion-body text-secondary">

                                        <div >
                                            {{--                                            <livewire:datatables.user-table />--}}
                                            <input type="number" class="form-control" placeholder="Percentage"  wire:model="percentages.{{$user->id}}.percentage" >
                                            @error('percentages.'.$user->id.'.percentage')
                                            <div class="text-danger">{{str_replace('percentages.'.$user->id.'.percentage','',$message)}}</div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>
