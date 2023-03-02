<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;

class Index extends Component
{
    public $user;
    public function mount(){
            $this->user = auth()->user();
    }

    public function render()
    {
        return view('livewire.pages.index')->layout('livewire.layouts.base-layout');
    }
}
