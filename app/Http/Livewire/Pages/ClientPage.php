<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;

class ClientPage extends Component
{

    public function render()
    {
        return view('livewire.pages.client-page')->layout("livewire.layouts.base-layout");
    }
}
