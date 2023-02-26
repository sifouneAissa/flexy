<div class="d-flex justify-content-around">
    @can('update setting general')
        <a wire:click="setModal({{$id}})" type="button" class="text-warning  h5"><i class="bi bi-pencil-square"></i>
        </a>
    @endcan
</div>
