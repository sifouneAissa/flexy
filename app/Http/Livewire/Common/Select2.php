<?php

namespace App\Http\Livewire\Common;

use Livewire\Component;

class Select2 extends Component
{
    public $selected = [];


    public $series = [
        'Wanda Vision',
        'Money Heist',
        'Lucifer',
        'Stranger Things',
    ];


    public function updatedSelected(){
        dd($this->selected);
    }


    public function render()
    {
        return view('livewire.common.select2')->layout("livewire.layouts.base-layout");
    }
}
