<?php

namespace App\Http\Livewire\Pages\MPayment;

use App\Models\PaymentMethod;
use Livewire\Component;

class MPaymentEdit extends Component
{
    public $item;

    public function mount(PaymentMethod $mpayment){
        $this->item = $mpayment;
    }

    public function render()
    {
        return view('livewire.pages.m-payment.m-payment-edit')->layout('livewire.layouts.crud-layout',[
            'link' => 'mpayment.index'
        ]);;
    }
}
