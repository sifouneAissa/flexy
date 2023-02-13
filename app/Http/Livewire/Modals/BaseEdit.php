<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;

class BaseEdit extends Component
{
    public $item = null;
    public $iid = null;
    public $builder = null;


    public function showU($id){

        $this->item = app($this->builder)->where('id',$id)->first();
        $this->dispatchBrowserEvent('showUpdate');
    }

    public function mount(){
        $this->item = app($this->builder)->where('id',$this->iid)->first();
    }

    public function render()
    {

        return view('livewire.modals.base-edit',[
            'item' => $this->item,
            'iid' => $this->iid
        ]);
    }
}
