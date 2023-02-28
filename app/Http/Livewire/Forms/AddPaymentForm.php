<?php

namespace App\Http\Livewire\Forms;

use Livewire\Component;

class AddPaymentForm extends Component
{
    public $seller_id;
    public $buyer_id;
    public $method_payment_id = 1;
    public $amount;
    public $status;
    public $sendMoney = false;
    public $isAdmin = false;

    public function rules(){
        return [
            'amount' => 'required|numeric|min:1'
        ];
    }

    public function save(){
        $this->validate();
        $this->emitTo('pages.payments.payment-add','save',$this->all());

    }

    public function updatedSendMoney(){
        if($this->sendMoney){
            $this->seller_id = auth()->user()->id;
            $this->buyer_id = null;
        }
        else {
            $this->buyer_id = auth()->user()->id;
            $this->seller_id = auth()->user()->parent?->id;
        }

        $this->emitTo('pages.payments.payment-add','setSendMoney',$this->sendMoney);
    }


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }



    public function updatedAmount(){

        $this->emitTo('pages.payments.payment-add','setAmount',$this->amount);
    }

    public function mount(){
        $user = auth()->user();
        $this->seller_id = $user->id;
        $this->buyer_id = null;
        $this->isAdmin = $user->hasRole('admin');
        $this->sendMoney = $this->isAdmin;
    }


    public function render()
    {
        return view('livewire.forms.add-payment-form');
    }
}
