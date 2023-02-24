<?php

namespace App\Http\Livewire\Forms;

use App\Models\Provider;
use App\Models\UserNumber;
use App\Rules\PhoneNumber;
use Illuminate\Validation\Rule;
use Livewire\Component;

class EditUserNumberForm extends Component
{
    public $number;
    public $is_personnel = true;
    public $provider_id;
    public $providers;
    public $item;

    protected function rules(){
        return [
            'number' => ['required', Rule::unique('user_numbers', 'number')->ignore($this->item->id), 'max:255',new PhoneNumber],
        ];
    }

    public function mount(){
        $this->providers = Provider::all();
        $this->provider_id = $this->item->provider_id;
        $this->number = $this->item->number;
        $this->is_personnel = $this->item->is_personnel;
    }


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updatedProviderId(){
        $this->number = Provider::find($this->provider_id)?->code;
    }

    public function save(){
        $this->validate();
        $this->item->update(filterRequest($this->all(),UserNumber::class));
        return redirect()->route('number.index');
    }



    public function render()
    {
        return view('livewire.forms.edit-user-number-form');
    }
}
