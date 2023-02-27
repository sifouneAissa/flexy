<?php

namespace App\Http\Livewire\Forms;

use App\Models\Provider;
use App\Models\ProviderPack;
use Livewire\Component;

class EditProviderPackForm extends Component
{
    public $name;
    public $count = 10;
    public $price = 1;
    public $description;
    public $bonus = 0 ;
    public $item;

    public function rules(){
        return [

            'name' => 'required|min:1',
            'price' => 'required|numeric|min:0.1',
            'count' => 'required|numeric|min:1',
            'bonus' => 'nullable|numeric|min:0',
            'description' => 'nullable|max:255',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount(){
        $this->providers = Provider::where('percentage_fix',true)->get();
        $this->name = $this->item->name;
        $this->price = $this->item->price;
        $this->count = $this->item->count;
        $this->bonus = $this->item->bonus;
        $this->description = $this->item->description;

    }

    public function save(){
        $this->validate();
        $this->item->update(filterRequest($this->all(),ProviderPack::class));
        return redirect()->route('pack.index');
    }

    public function render()
    {
        return view('livewire.forms.edit-provider-pack-form');
    }
}
