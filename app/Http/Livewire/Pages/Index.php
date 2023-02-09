<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.pages.index')->layout('livewire.layouts.base-layout');
    }
}
