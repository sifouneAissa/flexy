<div class="d-flex justify-content-around">
    @can('update payment method')
    <a href="{{route("mpayment.edit",['mpayment' => $id])}}" type="button" class="text-warning  h5"><i class="bi bi-pencil-square"></i>
    </a>
    @endcan
    @can('delete payment method')
    <livewire:modals.delete :item="$item"  wire:key="item{{time()}}"  />
    @endcan
</div>
