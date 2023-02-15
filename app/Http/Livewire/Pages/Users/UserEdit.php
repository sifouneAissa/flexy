<?php

namespace App\Http\Livewire\Pages\Users;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class UserEdit extends Component
{
    public $user;
    public $aroles ;

    public function mount(User $user){
        $this->user = $user;
        $this->aroles = Role::get(['name','id']);
    }

    public function render()
    {
        return view('livewire.pages.users.user-edit')->layout('livewire.layouts.crud-layout');
    }
}
