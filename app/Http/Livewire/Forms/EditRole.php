<?php

namespace App\Http\Livewire\Forms;

use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class EditRole extends Component
{
    public  $item;

    public $name;
    public $permissions;
    public $iteration = 1;

    protected $rules = [
        'name' => 'required|min:6',
        'permissions' => 'required|array'
    ];


    public function showU($id){
        $this->dispatchBrowserEvent('showUpdate',['id' => $id,'selected' => $this->permissions]);
    }

    public function mount(){
        $this->name = $this->item->name;
        $this->permissions = $this->item->permissions->map(fn ($item) => $item->id)->toArray();

    }

    public function save($id){
        $validation = Validator::make([
                'name' => $this->name,
                'permissions' => $this->permissions
        ], $this->rules);

        if($validation->fails()){
            $this->iteration++;
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
