<?php

namespace App\Http\Livewire\Partials\Pages;

use Livewire\Component;

class UserCard extends Component
{
    public $item;
    public $withRole = false;


    public function render()
    {
        return view('livewire.partials.pages.user-card');
    }
}
