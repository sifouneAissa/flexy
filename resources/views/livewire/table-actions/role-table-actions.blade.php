<div class="d-flex justify-content-around">
    @can("add role")
    <livewire:forms.edit-role :item="$item" wire:key="item{{time()}}" />
    @endcan
    @can('delete role')
    <livewire:modals.delete :item="$item"  wire:key="item{{time()}}"  />
    @endcan
</div>
