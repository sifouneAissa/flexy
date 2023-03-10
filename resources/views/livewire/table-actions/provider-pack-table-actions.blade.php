<div class="d-flex justify-content-around">
    @can('update provider pack')
        <a href="{{route("pack.edit",['providerPack' => $id])}}" type="button" class="text-warning  h5"><i class="bi bi-pencil-square"></i>
        </a>
    @endcan
    @can('delete provider pack')
        <livewire:modals.delete :item="$item"  wire:key="item{{time()}}"  />
    @endcan
</div>
