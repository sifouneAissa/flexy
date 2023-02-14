<div  wire:key="livewire-roles">
    <livewire:datatables.role-table />
</div>
<script>
    window.addEventListener('showUpdate', (e) => {

        $('.modal-backdrop').remove();
        let select2 = $('#select'+e.detail.id);
        $('#editModal-'+e.detail.id).modal("show");

        select2.select2({
            placeholder: 'Select permissions',
            multiple : true,
            allowClear: true,
            dropdownParent: $('#editModal-'+e.detail.id),
            width: 'resolve'
        });

        if(e.detail.selected){
            select2.val(e.detail.selected);
            select2.trigger('change');
        }
    });


    function DModal(id){
        $('#editModal-'+id).modal("hide")
    }



</script>
<style>.select2-selection__rendered {
        line-height: 31px !important;
    }
    .select2-container .select2-selection--single {
        height: 45px !important;
    }
    .select2-selection__arrow {
        height: 31px !important;
    }
</style>
