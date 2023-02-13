<?php

namespace App\Http\Livewire\Forms;

use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class EditRole extends Component
{
    public  $item;

    public $name;

    protected $rules = [
        'name' => 'required|min:6',
    ];



    public function showU($id){
        $this->dispatchBrowserEvent('showUpdate',['id' => $id]);
    }

    public function mount(){
        $this->name = $this->item->name;
    }



    public function save($id){
        $validation = Validator::make([
                'name' => $this->name
        ], $this->rules);

        if($validation->fails()){
            $errors = $validation->getMessageBag();
            $this->setErrorBag($errors);
            $this->showU($id);
        }else {
            dd("check");
        }
    }

    public function render()
    {
        return view('livewire.forms.edit-role',[
            'item' => $this->item
        ]);
    }
}
