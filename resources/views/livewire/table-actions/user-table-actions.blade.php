<div class="d-flex justify-content-around">
    @can('delete role')
        <a href="{{route("user.edit",['user' => $id])}}" type="button" class="text-warning  h5"><i class="bi bi-pencil-square"></i>
        </a>
    @endcan
    @can('delete role')
        <livewire:modals.delete :item="$item"  wire:key="item{{time()}}"  />
    @endcan
</div>
