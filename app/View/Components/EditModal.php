<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class EditModal extends Component
{
    public $value = null;
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('livewire.datatables.edit',['value' => $this->value]);
    }
}
