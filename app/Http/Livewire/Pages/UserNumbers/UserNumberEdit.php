<?php

namespace App\Http\Livewire\Pages\UserNumbers;

use App\Models\UserNumber;
use Livewire\Component;

class UserNumberEdit extends Component
{
    public $item;

    public function mount(UserNumber $number){
        $this->item = $number;
    }

    public function render()
    {
        return view('livewire.pages.user-numbers.user-number-edit')->layout("livewire.layouts.crud-layout",[
            'link' => 'number.index'
        ]);
    }
}
