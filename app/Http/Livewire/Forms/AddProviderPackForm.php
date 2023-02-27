<?php

namespace App\Http\Livewire\Forms;

use App\Models\Provider;
use App\Models\ProviderPack;
use Livewire\Component;
use function Symfony\Component\HttpFoundation\filter;

class AddProviderPackForm extends Component
{
    public $name;
    public $count = 10;
    public $price = 1;
    public $description;
    public $provider_id;
    public $bonus = 0 ;
    public $providers;

    public function rules(){
        return [

            'name' => 'required|min:1',
            'price' => 'required|numeric|min:0.1',
            'count' => 'required|numeric|min:1',
            'bonus' => 'nullable|numeric|min:0',
            'provider_id' => 'required',
            'description' => 'nullable|max:255',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount(){
        $this->providers = Provider::where('percentage_fix',true)->get();
        $this->provider_id = $this->providers->first()?->id;
    }

    public function save(){
        $this->validate();
        ProviderPack::query()->create(filterRequest($this->all(),ProviderPack::class));
        return redirect()->route('pack.index');
    }

    public function render()
    {
        return view('livewire.forms.add-provider-pack-form');
    }
}
