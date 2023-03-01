<?php

namespace App\Http\Livewire\Pages;

use App\Models\Provider;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class FlexyDetailPage extends Component
{

    public $amount;
    public $providerP;
    public $user;
    public $offers;
    public $searchOf = false;
    public $loading = false;

    public $listeners = [
        'setAmount' => 'setAmount',
        'setProvider' => 'setProvider'
    ];

    public function setAmount($value){
        $this->amount = $value;
    }

    public function setProvider($value){
        $this->loading = true;
        $p = Provider::where("code",$value)->first();
        $this->providerP = $this->user->cPer($p->id);
        $this->offers = null;
        $this->setOffres();
    }

    public function setOffres(){
        $http = Http::withOptions(['verify' => false])->get('https://dummyjson.com/products/1', [
            'name' => 'Taylor',
            'page' => 1
        ]);

        $this->offers= $http->json();

        if($this->offers)  $this->loading = false;

    }

    public function mount(){
        $this->user = auth()->user();


    }


    public function render()
    {
        return view('livewire.pages.flexy-detail-page')->layout('livewire.layouts.base-layout');
    }
}
