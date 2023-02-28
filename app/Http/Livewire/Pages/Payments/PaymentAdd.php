<?php

namespace App\Http\Livewire\Pages\Payments;

use Livewire\Component;

class PaymentAdd extends Component
{
    public $ausers;
    public $rusers;
    public $search = '';
    public $sendMoney = false;
    public $parent = null;
    public $selected = [];
    public $amount;
    public $amounts;


    public $listeners = [
        'setSendMoney' => 'setSendMoney',
        'setAmount' => 'setAmount',
        'save' => 'save'
    ];

    public function rules(){
        $rules = [];
        foreach ($this->amounts as $key => $value) {
            $rules['amounts.' . $key . '.amount'] = ($value['selected'] ? 'required' : '').'|numeric|min:1';
        }


        return $rules;
    }
    public function setSendMoney($value){
        $this->sendMoney = $value;
    }
    public function setAmount($value){
        $this->amount = $value;
        // set up the amounts
        foreach ($this->amounts as &$amount){
            $amount['amount'] = $this->amount;
        }
    }


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save($data){
        $this->validate();
        $selectedUsers = array_filter($this->amounts,fn ($item) => $item['selected']==='1');
        if(!count($selectedUsers)) $this->addError('selectedErr','At least select on user');
        else {
            dd('check');
        }

    }
    public function mount(){
        $this->parent = auth()->user()->parent;
        $this->ausers = getChildren();
        $this->rusers = $this->ausers;
        $this->sendMoney = auth()->user()->hasRole('admin');

        // set up the amounts
        $this->ausers->map(function ($item){
            $this->amounts[$item->id] = [
                'amount' => 0,
                'selected' => false,
                'user_id' => $item->id
            ];
        });
    }

    public function updatedSearch(){

        $this->rusers = $this->ausers->filter(function ($item){
            $slower = str_contains(strtolower($item->name),$this->search);
            $sbigger = str_contains($item->name,$this->search);
            return $slower || $sbigger;
        });

    }

    public function render()
    {
        return view('livewire.pages.payments.payment-add')->layout("livewire.layouts.crud-layout",[
            'link' => 'pack.index'
        ]);
    }
}
