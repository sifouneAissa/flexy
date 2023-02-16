<?php

namespace App\Http\Livewire\Forms;

use App\Actions\Fortify\CreateNewUser;
use Illuminate\Http\Request;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use Laravel\Fortify\Http\Requests\LoginRequest;
use Laravel\Fortify\Rules\Password;
use Livewire\Component;

class RegisterForm extends Component
{

    public $password;
    public $password_confirmation;
    public $email;
    public $name;
    public $referBy = null;
    public $referred_by = null;


    protected function rules(){
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required',  new Password, 'confirmed'],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function register()
    {
        $validatedData = $this->validate();
        //
        $request = new Request();

        if($this->referBy)
            $this->referred_by = $this->referBy?->id;

        $request->merge($this->all());


        app(RegisteredUserController::class)->store($request,(new CreateNewUser()));

        return redirect()->to('/');

    }


    public function render()
    {
        return view('livewire.forms.register-form');
    }
}
