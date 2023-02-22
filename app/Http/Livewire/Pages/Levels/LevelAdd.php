<?php

namespace App\Http\Livewire\Pages\Levels;

use App\Models\Level;
use App\Models\MemberShip;
use Livewire\Component;

class LevelAdd extends Component
{

    public $search = '';
    public $fmodels = [];
    public $omodels = [];
    public $selected = [];


    protected $listeners = [
        'save' => 'save'
    ];


    public function mount(){
        $this->omodels = MemberShip::all();
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
            $model = Level::query()->create(array_merge(
                filterRequest($data,Level::class),
                [
                    'order' => Level::count()+1
                ]
            ));
            // add the percentages
            if(count($this->selected))
            $model->memberships()->sync($this->selected,true);
        });

        return redirect()->route('level.index');
    }

    public function render()
    {
        return view('livewire.pages.levels.level-add')->layout('livewire.layouts.crud-layout',[
            'link' => 'level.index'
        ]);
    }
}
