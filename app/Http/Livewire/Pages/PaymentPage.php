<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;

class PaymentPage extends Component
{
    public function render()
    {
        return view('livewire.pages.payment-page')->layout("livewire.layouts.base-layout");
    }
}
