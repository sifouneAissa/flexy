<div class="d-flex justify-content-around">
    <livewire:forms.edit-role :item="$item" wire:key="item{{time()}}" />
    <livewire:modals.delete :item="$item"  wire:key="item{{time()}}"  />
</div>
