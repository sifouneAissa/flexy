<?php

namespace App\Http\Livewire\Forms;

use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class AddPaymentForm extends Component
{
    use LivewireAlert;

    public $seller_id;
    public $buyer_id;
    public $method_payment_id = 1;
    public $amount;
    public $status;
    public $sendMoney = false;
    public $isAdmin = false;
    public $methods;
    public $users;
    public $records;
    public $amounts;
    public $totalAmount = 0;

    public function rules(){
        return [
            'amount' => 'required|numeric|min:1',
        ];
    }

    public function save(){
        $this->validate();

        $callback = function ($item){
            return $item['selected'] === true;
        };

        // check if one user is selected
        $selected_users = array_filter($this->amounts,$callback);
        $mselected = array_filter($this->methods,$callback);

        $user = auth()->user();
        if(empty($selected_users) ||empty($mselected) || !$user->checkBalance($this->totalAmount)){
            if(empty($selected_users)){
                $this->addError('selected_users','Please selected one user');
            }

            if(empty($mselected)){
                $this->addError('selected_method_payment','Please selected one method the payment');
            }

            if(!$user->checkBalance($this->totalAmount)){
                $this->addError('total_amount','Amount is greater then your\'s');
            }

            return;
        }

        // start db
        startTransaction(function () use ($selected_users,$mselected,$user){
            $ms = array_shift($mselected);

            foreach($selected_users as $amount){
                Payment::query()->create([
                    'buyer_id' => $amount['user_id'],
                    'seller_id' => $user->id,
                    'method_payment_id' => $ms['id'],
                    'amount' => $amount['amount']
                ]);
                // user
                User::find($amount['user_id'])->updateCash((double)$amount['amount']);
                // buyer

                $user->updateCash(-((double)$amount['amount']),false);
            }



            $this->alert('success','Operation success');
        });
    }

    public function updatedAmount(){
        foreach ($this->amounts as &$amount){
                $amount['amount'] = $this->amount;
        }
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



    public function mount(){
        $user = auth()->user();
        $this->seller_id = $user->id;
        $this->buyer_id = null;
        $this->isAdmin = $user->hasRole('admin');
        $this->sendMoney = $this->isAdmin;
        $this->methods = PaymentMethod::query()->get()->map(function ($item){
            $item['selected'] = false;
            $item['webp'] = $item?->getWebp();
            return $item;
        })->toArray();

        $this->users = getChildren();
        $this->records = $this->users;

        // set up the amounts
        $this->users->map(function ($item){
            $this->amounts[$item->id] = [
                'amount' => 0,
                'selected' => false,
                'user_id' => $item->id,
                'name' => $item->name,
                'profile_photo_url' => $item->profile_photo_url,
                'id' => $item->id
            ];
        });

    }

    public function selectUser($id){
        $this->totalAmount = 0;

        $this->amounts = array_map(function ($item) use ($id){
            if($item['user_id']===$id) {
                $item['selected'] = !$item['selected'];

            }

            if($item['selected'])
                $this->totalAmount = (double)$item['amount'] + $this->totalAmount;

            return $item;
        },$this->amounts);
    }

    public function selectMethod($id){

        $this->methods = array_map(function ($item) use ($id){
            if($item['id']===$id) $item['selected'] = !$item['selected'];
            else $item['selected'] = false;
            return $item;
        },$this->methods);

    }

    public function setSendMoney($value){
        $this->sendMoney = $value;
    }



    public function render()
    {
        return view('livewire.forms.add-payment-form');
    }
}
