<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;

class RegisterPage extends Component
{
    public function render()
    {
        return view('livewire.pages.register-page')->layout('livewire.layouts.login-base-layout');
    }
}
