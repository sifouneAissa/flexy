<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Layouts\BaseLayout;
use Livewire\Component;

class Test extends Component
{
    public function render()
    {
        return view('livewire.test')->layout('livewire.layouts.base-layout');
    }
}
