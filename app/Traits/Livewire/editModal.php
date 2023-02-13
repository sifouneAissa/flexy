<?php

namespace App\Traits\Livewire;

trait editModal {


    public $iid = null;
    public $item = null;
    public $builder = null;


    public function showU($id){

        $this->item = app($this->builder)->where('id',$id)->first();
        $this->dispatchBrowserEvent('showUpdate');
    }


    public function render()
    {

        return view('livewire.modals.base-edit',[
            'item' => $this->item,
            'iid' => $this->iid
        ]);
    }
}
