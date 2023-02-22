<?php

namespace App\Http\Livewire\Pages\Levels;

use App\Models\Level;
use App\Models\MemberShip;
use Livewire\Component;

class LevelEdit extends Component
{
    public $item ;


    public $search = '';
    public $fmodels = [];
    public $omodels = [];
    public $selected = [];


    protected $listeners = [
        'save' => 'save'
    ];


    public function mount(Level $level){
        $this->item = $level;
        $this->omodels = MemberShip::all();
        $this->fmodels = $this->omodels;
        $this->selected = $this->item->memberships->pluck('id')->toArray();
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
            $this->item->update(filterRequest($data,Level::class));
            // add the percentages
            if(count($this->selected))
                $this->item->memberships()->sync($this->selected,true);
        });

        return redirect()->route('level.index');
    }


    public function render()
    {
        return view('livewire.pages.levels.level-edit')->layout("livewire.layouts.crud-layout",[
            'link' => 'level.index'
        ]);
    }
}
