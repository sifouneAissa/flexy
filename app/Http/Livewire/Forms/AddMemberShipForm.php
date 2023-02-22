<?php

namespace App\Http\Livewire\Forms;

use Livewire\Component;

class AddMemberShipForm extends Component
{
    public $name;
    public $description;

    protected $rules = [
        'name' => 'required|min:1|unique:member_ships',
        'description' => 'required|max:255',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save(){
        $state = $this->validate();

        $this->emitTo('pages.member-ships.member-ship-add','save',$this->all());

    }


    public function render()
    {
        return view('livewire.forms.add-member-ship-form');
    }
}
