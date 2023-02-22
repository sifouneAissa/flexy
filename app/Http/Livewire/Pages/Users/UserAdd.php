<?php

namespace App\Http\Livewire\Pages\Users;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserAdd extends Component
{
    public $aroles ;

    public function mount(){
        $this->aroles = Role::get(['name','id']);
    }

    public function render()
    {
        return view('livewire.pages.users.user-add')->layout('livewire.layouts.crud-layout',[
            'link' => 'user.index'
        ]);
    }
}
