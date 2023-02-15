<?php

namespace App\Http\Livewire\Forms;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Rules\Password;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class EditUserForm extends Component
{

    public $password;
    public $password_confirmation;
    public $email;
    public $name;
    public $role;
    public $user;

    protected function rules(){
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore($this->user->id)],
            'password' => ['confirmed'],
            'role' => ['required']
        ];
    }


    public function mount(){
        // init user info
        $this->role = $this->user->roles->first()?->id;
        $this->email = $this->user->email;
        $this->name = $this->user->name;
    }


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function save(){

        $state = $this->validate();

        $inputs = filterRequest($this->all(),User::class);

        if(key_exists('password',$inputs))
        $inputs['password'] = Hash::make($this->password);

        $this->user->update($inputs);

        $this->user->assignRole(Role::find($this->role));

        return redirect()->to(route('user.index'));
    }


    public function render()
    {
        return view('livewire.forms.edit-user-form');
    }
}
