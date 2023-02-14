<?php

namespace App\Http\Livewire\Forms;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\Component;

class EditRole extends Component
{
    public  $item;

    public $name;
    public $permissions;
    public $iteration = 1;

    protected function rules(){
            return [
                'name' => 'required|'. Rule::unique('roles', 'name')->ignore($this->item->id),
                'permissions' => 'required'
            ];
    }


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
        ], $this->rules());

        if($validation->fails()){
            $this->iteration++;
            $errors = $validation->getMessageBag();
            $this->setErrorBag($errors);
            $this->showU($id);
        }else {

            // update the role here
            $this->item->update([
                'name' => $this->name
            ]);
            $this->item->permissions()->sync($this->permissions);
            $this->dispatchBrowserEvent('hideModal',['id' => $id]);
            $this->setMount();
            // to refresh datatable
            $this->emit('refreshLivewireDatatable');
        }

    }

    public function render()
    {
        return view('livewire.forms.edit-role',[
            'item' => $this->item
        ]);
    }

    public function setMount(){
        $this->item->load('permissions');
        $this->name = $this->item->name;
        $this->permissions = $this->item->permissions->map(fn ($item) => $item->id)->toArray();
    }
}
