<?php

namespace App\Http\Livewire\Pages\MemberShips;

use App\Models\Level;
use App\Models\Membership;
use Livewire\Component;

class MemberShipAdd extends Component
{
    public $search = '';
    public $fmodels = [];
    public $omodels = [];
    public $selected = [];


    protected $listeners = [
        'save' => 'save'
    ];


    public function mount(){
        $this->omodels = Level::all();
        $this->fmodels = $this->omodels;
    }

    public function updatedSearch(){
        // once the search var updated filter the users array
        $this->fmodels = $this->omodels->filter(function ($item) {
            return str_contains($item->name,$this->search);
        });

    }

    public function save($data){

        // create the provider
        startTransaction(function () use ($data){
            $model = Membership::query()->create(array_merge(
                filterRequest($data,Membership::class),
                [
                    'order' => Membership::count() + 1
                ]
            ));

            // add the percentages
            if(count($this->selected))
                $model->levels()->sync($this->selected,true);
        });

        return redirect()->route('membership.index');
    }

    public function render()
    {
        return view('livewire.pages.member-ships.member-ship-add')->layout('livewire.layouts.crud-layout');
    }
}
