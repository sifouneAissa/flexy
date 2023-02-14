<div class="d-flex justify-content-around h5">
    <livewire:forms.edit-role :item="$item" wire:key="item{{time()}}" />
    <livewire:modals.delete :item="$item" :builder="\Spatie\Permission\Models\Role::class" wire:key="item{{time()}}"  />
</div>
