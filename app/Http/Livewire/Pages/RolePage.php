<?php

namespace App\Http\Livewire\Pages;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class RolePage extends Component
{

    public $name;
    public $permissions = [];
    public $iteration = 1;
    public $to_update = false;
    public $role = null;

    public $listeners = [
        'setItem' => 'setItem',
        'setItemD' => 'showD'
    ];


    protected function rules(){
        $rules = [
            'name' => 'required|unique:roles',
            'permissions' => 'required'
        ];

        if($this->to_update) {
            $rules['name'] = 'required|' . Rule::unique('roles', 'name')->ignore($this->role->id);
        }
        return $rules;

    }

    public function setItem(Role $role){
        $this->name = $role->name;
        $this->permissions = $role->permissions->pluck('id')->toArray();
        $this->to_update = true;
        $this->role = $role;
        $this->showA();
        $this->iteration++;

    }


    public function save(){

        $validation = Validator::make([
            'name' => $this->name,
            'permissions' => $this->permissions
        ], $this->rules());

        if($validation->fails()){
            $this->iteration++;
            $errors = $validation->getMessageBag();
            $this->setErrorBag($errors);
            $this->showA();
        }
        else{

            if(!$this->to_update)
            {

                // update the role here
                $item = Role::query()->create([
                    'name' => $this->name,
                    'guard' => 'web'
                ]);

                $item->permissions()->sync($this->permissions);

            }
            else {
                $this->role->update([
                    'name' => $this->name,
                    'guard' => 'web'
                ]);

                $this->role->permissions()->sync($this->permissions);
            }

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
        return view('livewire.pages.role-page',[
            'dir' => isRtl(app()->getLocale())
        ])->layout('livewire.layouts.base-layout');
    }

}
