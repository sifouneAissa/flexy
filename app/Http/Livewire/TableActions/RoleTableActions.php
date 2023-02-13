<?php

namespace App\Http\Livewire\TableActions;

use Livewire\Component;

class RoleTableActions extends Component
{

    public $update = false;


    public function render()
    {
        return view('livewire.table-actions.role-table-actions');
    }


    public function check(){
        dd('check');
    }

}
