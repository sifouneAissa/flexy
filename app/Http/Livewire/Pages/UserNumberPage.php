<?php

namespace App\Http\Livewire\Pages;

use App\Models\UserNumber;
use Livewire\Component;

class UserNumberPage extends Component
{
    public $citem = UserNumber::class;

    public function render()
    {
        return view('livewire.pages.user-number-page')->layout('livewire.layouts.base-layout');
    }
}
