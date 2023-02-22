<?php

namespace App\Http\Livewire\Pages\MemberShips;

use App\Models\Level;
use App\Models\Membership;
use Livewire\Component;

class MemberShipEdit extends Component
{
    public $item ;


    public $search = '';
    public $fmodels = [];
    public $omodels = [];
    public $selected = [];


    protected $listeners = [
        'save' => 'save'
    ];


    public function mount(Membership $membership){
        $this->item = $membership;

        $this->omodels = Level::all();
        $this->fmodels = $this->omodels;
        $this->selected = $this->item->levels->pluck('id')->toArray();
    }

    public function updatedSearch(){
        // once the search var updated filter the users array
        $this->fmodels = $this->omodels->filter(function ($item) {
            return str_contains($item->name,$this->search);
        });

    }

    public function save($data){

        startTransaction(function () use ($data){
            $this->item->update(filterRequest($data,Membership::class));

            if(count($this->selected))
                $this->item->levels()->sync($this->selected,true);
        });

        return redirect()->route('membership.index');
    }

    public function render()
    {
        return view('livewire.pages.member-ships.member-ship-edit')->layout("livewire.layouts.crud-layout",[
            'link' => 'membership.index'
        ]);
    }
}
