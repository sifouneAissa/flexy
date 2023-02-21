<?php

namespace App\Http\Livewire\Forms;

use App\Models\Provider;
use Illuminate\Validation\Rule;
use Livewire\Component;

class EditProviderForm extends Component
{
    public $name;
    public $code;
    public $percentage;
    public $item;



    protected function rules(){
        return [
            'name' => 'required|min:1|'. Rule::unique('providers', 'name')->ignore($this->item->id),
            'code' => 'required|digits_between:2,5',
            'percentage' => 'required|numeric|between:0.01,99.99',
        ];
    }

    public function mount(){
        $this->code = $this->item->code;
        $this->name = $this->item->name;
        $this->percentage = $this->item->percentage;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updatedPercentage(){
        $this->emitTo('pages.providers.provider-edit','setPercentage',['value' => $this->percentage]);
    }

    public function save(){
        $state = $this->validate();
        $this->emitTo('pages.providers.provider-edit','savePercentages',$this->all());

//        $provider = Provider::query()->create(filterRequest($this->all(),Provider::class));

//        return redirect()->route('provider.index');
    }


    public function render()
    {
        return view('livewire.forms.edit-provider-form');
    }
}
