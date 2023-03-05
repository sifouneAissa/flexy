<?php

namespace App\Http\Livewire\Forms;

use App\Models\Payment;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class AddReceivePaymentForm extends Component
{
    use LivewireAlert;

    public $seller_id;
    public $buyer_id;
    public $method_payment_id = 1;
    public $ramount;
    public $status;
    public $sendMoney = false;
    public $isAdmin = false;
    public $methods;
    public $users;
    public $records;
    public $amounts;
    public $totalAmount = 0;
    public $parent;

    public function rules(){
        return [
            'ramount' => 'required|numeric|min:1',
        ];
    }

    public function saver(){
        $this->validate();

        $callback = function ($item){
            return $item['selected'] === true;
        };
        $mselected = array_filter($this->methods,$callback);

        if(empty($mselected)){
                $this->addError('rselected_method_payment','Please selected one method the payment');
            return;
        }

        // start db
        startTransaction(function () use ($mselected){
            $ms = array_shift($mselected);

                Payment::query()->create([
                    'buyer_id' => $this->buyer_id,
                    'seller_id' => $this->seller_id,
                    'method_payment_id' => $ms['id'],
                    'amount' => $this->ramount
                ]);

            $this->alert('success','Operation success');
        });
    }

    public function updatedAmount(){
    }



    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }



    public function mount(){
        $user = auth()->user();
        $this->parent = $user->parent;
        $this->buyer_id = $user->id;
        $this->seller_id = $user->parent->id;

        $this->methods = [
            [
                'name' => 'CCP',
                'description' => 'Use your ccp account',
                'provider' => 'Bank',
                'id' => 1,
                'selected' => false,
            ],
            [
                'name' => 'Cash on hand',
                'description' => 'Cash on hand',
                'provider' => 'Hand by hand',
                'id' => 2,
                'selected' => false
            ],
            [
                'name' => 'By Check',
                'description' => 'Cash by check',
                'provider' => 'Bank',
                'id' => 3,
                'selected' => false,
            ]
        ];


    }


    public function selectMethod($id){

        $this->methods = array_map(function ($item) use ($id){
            if($item['id']===$id) $item['selected'] = !$item['selected'];
            else $item['selected'] = false;
            return $item;
        },$this->methods);

    }



    public function render()
    {
        return view('livewire.forms.add-receive-payment-form');
    }
}
