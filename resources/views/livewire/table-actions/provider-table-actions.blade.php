<div class="d-flex justify-content-around">
    @can('update provider')
        <a href="{{route("provider.edit",['provider' => $id])}}" type="button" class="text-warning  h5"><i class="bi bi-pencil-square"></i>
        </a>
    @endcan
    @can('delete provider')
        <livewire:modals.delete :item="$item"  wire:key="item{{time()}}"  />
    @endcan
</div>
