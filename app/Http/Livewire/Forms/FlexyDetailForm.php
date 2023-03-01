<?php

namespace App\Http\Livewire\Forms;

use App\Models\Client;
use App\Models\ClientTransaction;
use App\Models\Provider;
use App\Models\User;
use App\Rules\PhoneNumber;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class FlexyDetailForm extends Component
{
    use LivewireAlert;
    public $client_name;
    public $phone_number;
    public $amount;
    public $codes;
    public $code;
    public $records;

    public $clients;


    public function rules(){
        return [
            'client_name' => 'required|min:1',
            'phone_number' => ['required',new PhoneNumber()],
            'amount' => 'required|numeric|min:1|max:5000'
        ];
    }


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updatedPhoneNumber(){

        $this->code = substr($this->phone_number, 0, 2);

        if(!in_array($this->code,$this->codes)){
            $this->addError('phone_number',__('validation.The number format is invalid.'));
            return;
        }

        $this->emitTo('pages.flexy-detail-page','setProvider',$this->code);

    }

    public function updatedClientName(){

    }

    public function search(){
        if($this->client_name==='') $this->records = null;
        else
        $this->records = $this->clients->filter(fn ($item) => str_contains($item->name,$this->client_name));

    }

    public function selectUser($id){
            $user = Client::find($id);
            $this->client_name = $user->name;
            $this->phone_number = $user->phone;
            $this->records = null;
            $this->updatedPhoneNumber();
            $this->updatedClientName();
    }

    public function updatedAmount(){
        $this->emitTo('pages.flexy-detail-page','setAmount',$this->amount);
    }


    public function save(){
        $this->validate();

        if(!in_array($this->code,$this->codes)){
            $this->addError('phone_number',__('validation.The number format is invalid.'));
            return;
        }

        // start
        startTransaction(function (){
            // creating the client if phone not exist
            $client = Client::where("phone",$this->phone_number)->first();
            if(!$client)
                $client = Client::query()->create([
                    'name' =>  $this->client_name,
                    'phone' => $this->phone_number,
                    'user_id' => auth()->user()->id
                ]);

            // create the transaction
            ClientTransaction::query()->create([
                'client_id' => $client->id,
                'amount' => $this->amount
            ]);


            $this->alert('success', 'Operation success',[
                'position' => 'center'
            ]);

            $this->clients = auth()->user()->clients;

        });
    }

    public function mount(){
        $this->codes = Provider::where('percentage_fix',false)->get(['code'])->map(fn ($item) => $item->code)->toArray();
        $this->clients = auth()->user()->clients;
 }

    public function render()
    {
        return view('livewire.forms.flexy-detail-form');
    }
}
