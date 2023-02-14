<?php

namespace App\Http\Livewire\Pages;

use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class RolePage extends Component
{

    public $name;
    public $permissions = [];
    public $iteration = 1;
    public $rules = [
        'name' => 'required|unique:roles',
        'permissions' => 'required'
    ];


    public function save(){

        $validation = Validator::make([
            'name' => $this->name,
            'permissions' => $this->permissions
        ], $this->rules);
        if($validation->fails()){
            $this->iteration++;
            $errors = $validation->getMessageBag();
            $this->setErrorBag($errors);
            $this->showA();
        }
        else{

            // update the role here
            $item = Role::query()->create([
                'name' => $this->name,
                'guard' => 'web'
            ]);

            $item->permissions()->sync($this->permissions);
            $this->dispatchBrowserEvent('hideAddModal');
            // to refresh datatable
            $this->emit('refreshLivewireDatatable');
        }
    }


    public function showA(){
        $this->dispatchBrowserEvent('showAdd',[
            'selected' => $this->permissions
        ]);
    }

    public function render()
    {
        return view('livewire.pages.role-page')->layout('livewire.layouts.base-layout');
    }

}
