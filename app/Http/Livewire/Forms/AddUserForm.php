<?php

namespace App\Http\Livewire\Forms;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Laravel\Fortify\Rules\Password;
use Spatie\Permission\Models\Role;

class AddUserForm extends Component
{

    public $password;
    public $password_confirmation;
    public $email;
    public $name;
    public $role;

    protected function rules(){
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required',  new Password, 'confirmed'],
            'role' => ['required']
        ];
    }


    public function mount(){
        $this->role = Role::first()?->id;
    }


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }



    public function save(){
        $state = $this->validate();

        $user = User::query()->create(filterRequest($this->all(),User::class));

        $user->assignRole(Role::find($this->role));

        return redirect()->to(route('user.index'));
    }

    public function render()
    {
        return view('livewire.forms.add-user-form');
    }
}


