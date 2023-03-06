<?php

namespace App\Http\Livewire\Pages\Payments;

use App\Models\Payment;
use App\Models\PaymentMethod;
use Livewire\Component;

class PaymentEdit extends Component
{
    public $item;
    public $buyer;
    public $methods;
    public $statuses;
    public $status;
    public $ostatus;
    public $canSet = true;
    public $badge;
    public $payments;

    public function mount(Payment $payment){
        $this->item = $payment;
        $this->buyer = $this->item->buyer;
        $this->methods = PaymentMethod::query()->get()->map(function ($item){
            $item['selected'] = $this->item->method_payment_id === $item->id;
            $item['webp'] = $item?->getWebp();
            return $item;
        })->toArray();
        $this->statuses = config('default.payment_status');
        $this->status = $this->item->status;
        $this->ostatus = $this->item->status;
        $this->canSet = $this->item->status === 'waiting';
        $this->badge = $this->setBadge();

        $this->payments = Payment::query()->where([
            ['status' , 'waiting'],
            ['buyer_id' , $this->item->buyer_id],
            ['id' ,'!=', $this->item->id]
        ])->get();
    }

    public function updatedStatus(){
        if($this->status!==$this->item->status)
        $this->dispatchBrowserEvent('showM',[
            'status' => true
        ]);
    }

    public function setBadge(){
        return $this->item->status === 'waiting' ? 'bg-warning' : ($this->item->status === 'payed' ? 'bg-success' : 'bg-danger');
    }

    public function save(){
        startTransaction(function (){
             // update status
             $this->item->status = $this->status;
             $this->item->save();
             // update balance of the seller
             $this->buyer->updateCash((double)$this->item->amount,true,(-(double)$this->item->amount));
            // hide model
             $this->dispatchBrowserEvent('showM',[
                'status' => false
            ]);

        });
    }
    public function render()
    {
        return view('livewire.pages.payments.payment-edit')->layout("livewire.layouts.crud-layout",[
            'link' => 'index'
        ]);;
    }
}
