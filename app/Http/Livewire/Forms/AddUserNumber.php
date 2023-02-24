<?php

namespace App\Http\Livewire\Forms;

use App\Models\Provider;
use App\Models\UserNumber;
use App\Models\UserProvider;
use App\Rules\PhoneNumber;
use Livewire\Component;

class AddUserNumber extends Component
{
    public $number;
    public $is_personnel = true;
    public $provider_id;
    public $user_id;
    public $providers;

    protected function rules(){
        return [
            'number' => ['required', 'unique:user_numbers', 'max:255',new PhoneNumber],
        ];
    }

    public function mount(){
        $this->providers = Provider::all();
        $f = $this->providers->first();
        $this->provider_id = $f?->id;
        $this->user_id = auth()->user()->id;
        $this->number = $f->code;
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
        UserNumber::query()->create(filterRequest($this->all(),UserNumber::class));
        return redirect()->route('number.index');
    }


    public function render()
    {
        return view('livewire.forms.add-user-number');
    }
}
