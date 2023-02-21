<?php

namespace App\Http\Livewire\Forms;

use Illuminate\Validation\Rule;
use Livewire\Component;

class EditLevelForm extends Component
{
    public $name;
    public $description;
    public $item;

    protected function rules(){
        return [
            'name' => 'required|min:1|'.Rule::unique('levels', 'name')->ignore($this->item->id),
            'description' => 'required|max:255',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save(){
        $state = $this->validate();

        $this->emitTo('pages.levels.level-edit','save',$this->all());

    }

    public function mount(){
        $this->name = $this->item->name;
        $this->description = $this->item->description;
    }


    public function render()
    {
        return view('livewire.forms.edit-level-form');
    }
}
