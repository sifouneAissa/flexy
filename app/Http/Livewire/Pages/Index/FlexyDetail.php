<?php

namespace App\Http\Livewire\Pages\Index;

use App\Models\Client;
use App\Models\ClientTransaction;
use App\Models\Provider;
use App\Rules\PhoneNumber;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use function Symfony\Component\Finder\size;

class FlexyDetail extends Component
{
    use LivewireAlert;

    public $codeIcons = [
        'info' => '/images/info.svg',
    ];
    public $code = null;
    public $codes;
    public $cicon;
    public $phone_number;
    public $clients;
    public $records;
    public $amount;
    public $name;
    public $client_phone;
    public $nexist = false;
    public $client = null;


    public function rules(){
        $rules =  [
            'phone_number' => ['required',new PhoneNumber()],
            'amount' => 'required|numeric|min:40|max:5000'
        ];

        return $rules;
    }

    public function clientRules(){
        return [
            'client_phone' => ['required',new PhoneNumber()],
            'name' => ['required']
        ];
    }

    public function select(Client $client){
        $this->dispatchBrowserEvent('btnClick');
        $this->phone_number = $client->phone;
        $this->client = $client;
        $this->search();
        $this->updated('phone_number');
    }


    public function setOffres(){

        $http = Http::withOptions(['verify' => false])->get('https://dummyjson.com/products/1', [
            'name' => 'Taylor',
            'page' => 1
        ]);

        $this->offers= $http->json();

        if($this->offers)  $this->loading = false;

    }



    public function search(){
        if($this->phone_number==='') $this->records = $this->clients;
        else $this->records = $this->clients->filter(fn ($item) => str_contains($item->phone,$this->phone_number));
    }



    public function updated($propertyName)
    {
        $this->code = substr($this->phone_number, 0, 2);

        if($propertyName==='phone_number')
            $this->vProvider();

        if($this->code!=='info')  $this->validateOnly($propertyName);

    }


    public function save(){

        $this->validate();


        startTransaction(function (){
            // creating the client if phone not exist
            $client = Client::where("phone",$this->phone_number)->first();

            // create the transaction
            ClientTransaction::query()->create([
                'client_id' => $client?->id,
                'amount' => $this->amount
            ]);


            $this->alert('success', 'Operation success',[
                'position' => 'center'
            ]);

            $this->clients = auth()->user()->clients;

        });
    }


    public function mount(){
           $this->codes = Provider::query()->where('is_service_provider',false)->get(['id','name','code']);

           $this->codes->map(function ($item){
                $this->codeIcons[$item->code] = '/images/'.$item->code.'.svg';
           });
           $this->cicon = $this->codeIcons['info'];
           $this->clients = auth()->user()->clients;
           $this->records = $this->clients;
    }

    public function saveClient(){
        $res = Validator::make([
            'client_phone' => $this->phone_number,
            'name' => $this->name
        ],$this->clientRules());

        if($res->fails()){
            if($res->getMessageBag()->has('client_name'))
            $this->addError('client_phone',$res->getMessageBag()->get('client_phone'));

            if($res->getMessageBag()->has('name'))
            $this->addError('name',$res->getMessageBag()->get('name'));
            return ;
        }

        // save the client
        $this->client = Client::query()->create([
            'name' => $this->name,
            'phone' => $this->phone_number,
            'user_id' => auth()->user()->id
        ]);

        $this->clients = auth()->user()->clients;

        $this->dispatchBrowserEvent('setM',[
            'id' => 'add-to-favorite',
            'state' => false
        ]);

        $this->search();
    }


    public function updatedPhoneNumber(){

        $this->vProvider();

        if($this->code!=='info') {
            $this->setOffres();
            $this->client_phone = $this->phone_number;
            $this->nexist = $this->clients->contains(fn($item) => $item->phone === $this->phone_number);
            $this->dispatchBrowserEvent('btnClick');
        }
    }

    public function vProvider(){

//            $this->code = substr($this->phone_number, 0, 2);

            if (!$this->codes->contains(fn($item) => $item->code === $this->code)) {
                $this->addError('phone_number_code', __('validation.Invalid provider.'));
                $this->code = 'info';
            }

            $this->cicon = $this->codeIcons[$this->code];

    }




    public function render()
    {
        return view('livewire.pages.index.flexy-detail');
    }
}
