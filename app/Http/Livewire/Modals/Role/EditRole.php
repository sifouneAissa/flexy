<?php

namespace App\Http\Livewire\Modals\Role;

use App\Http\Livewire\Modals\BaseEdit;
use App\View\Components\EditModal;
use Livewire\Component;

class EditRole extends Component
{
    public $item = null;

    public function render()
    {
        return view('livewire.modals.role.edit-role',[
            'item' =>$this->item,
        ]);
    }
}
