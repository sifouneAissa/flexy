<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;

class UserPage extends Component
{
    public function render()
    {
        return view('livewire.pages.user-page')->layout('livewire.layouts.base-layout');
    }
}
