<?php

namespace App\Http\Livewire\Pages\UserNumbers;

use Livewire\Component;

class UserNumberAdd extends Component
{
    public function render()
    {
        return view('livewire.pages.user-numbers.user-number-add')->layout("livewire.layouts.crud-layout",[
            'link' => 'number.index'
        ]);
    }
}
