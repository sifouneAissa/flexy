<?php

namespace App\Http\Livewire\Layouts;

use Livewire\Component;

class CrudLayout extends Component
{

    public $link;


    public function render()
    {
        return view('livewire.layouts.crud-layout');
    }
}
