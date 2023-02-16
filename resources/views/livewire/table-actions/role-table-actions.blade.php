<div class="d-flex justify-content-around">
    @can("update role")
        {{--        <livewire:forms.edit-role :item="$item" wire:key="item{{time()}}" />--}}
        <button  type="button" class="text-warning  h5" wire:click="showU({{$item->id}})"><i class="bi bi-pencil-square"></i>
        </button>
    @endcan

    @can('delete role')
        <livewire:modals.delete :item="$item"  wire:key="item{{time()}}"  />
    @endcan
</div>
