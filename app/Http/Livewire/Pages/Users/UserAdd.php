<?php

namespace App\Http\Livewire\Pages\Users;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserAdd extends Component
{
    public $apermissions ;
    public $aroles ;

    public function mount(){
        $this->apermissions = Permission::get(['name','id']);
        $this->aroles = Role::get(['name','id']);
    }

    public function render()
    {
        return view('livewire.pages.users.user-add')->layout('livewire.layouts.crud-layout');
    }
}
