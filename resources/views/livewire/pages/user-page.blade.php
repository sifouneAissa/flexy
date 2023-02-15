<div wire:key="livewire-users-accordion" class="accordion-item">
    <h2 class="accordion-header" id="flush-headingOne">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne">
                Manage Users?
        </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne"
         data-bs-parent="#accordionFlushExample">
        <div class="accordion-body text-secondary">

            <div wire:key="livewire-users">
                <livewire:datatables.user-table />
            </div>

        </div>
    </div>
</div>

