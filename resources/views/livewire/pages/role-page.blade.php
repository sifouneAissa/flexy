<div wire:key="livewire-roles">
    <livewire:datatables.role-table />
</div>

<script>
    window.addEventListener('showUpdate', (e) => {
        $('.modal-backdrop').remove();
        $('#editModal-'+e.detail.id).modal("show")
    });


    function DModal(id){
        $('#editModal-'+id).modal("hide")
    }
</script>
