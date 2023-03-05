<?php

namespace App\Http\Livewire\Partials;

use Livewire\Component;

class AppSubMenu extends Component
{
    public $user;
    public $withRoute =true;

    public function mount(){
        $this->user = auth()->user();
    }
    public function render()
    {
        return view('livewire.partials.app-sub-menu');
    }
}
