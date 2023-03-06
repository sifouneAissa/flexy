<div class="d-flex justify-content-around">
    <a href="{{route("payment.edit",['payment' => $id])}}" type="button" class="text-warning  h5"><i class="bi bi-pencil-square"></i>
    </a>

    <livewire:modals.delete :item="$item"  wire:key="item{{time()}}"  />
</div>
