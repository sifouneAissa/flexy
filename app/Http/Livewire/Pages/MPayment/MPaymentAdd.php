<?php

namespace App\Http\Livewire\Pages\MPayment;

use Livewire\Component;

class MPaymentAdd extends Component
{


    public function render()
    {
        return view('livewire.pages.m-payment.m-payment-add')->layout('livewire.layouts.crud-layout',[
            'link' => 'mpayment.index'
        ]);
    }
}
