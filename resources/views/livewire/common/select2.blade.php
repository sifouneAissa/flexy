
        <div class="form-control">
            <div >
                <select wire:model="selected" class="form-control" id="jselect2">
                    <option disabled value="">Select Option</option>
                    <option></option>
                    @foreach($series as $item)
                        <option value="{{ $item }}">{{ $item }}</option>
                    @endforeach
                </select>
            </div>
        </div>
<script >
    window.onload = (function () {
        $('#jselect2').select2({
            placeholder: 'Select an option',
            multiple : true
        });
        $('#jselect2').on('change', function (e) {
            var data = $('#jselect2').select2("val");
            @this.set('selected', data);
        });
    });
</script>
