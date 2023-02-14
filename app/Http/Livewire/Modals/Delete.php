<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;

class Delete extends Component
{
    public $item;

    public function delete(){
        $this->item->delete();
        $this->emit('refreshLivewireDatatable');
        $this->dispatchBrowserEvent('hideAddModal');
    }

    public function render()
    {
        return view('livewire.modals.delete');
    }
}
