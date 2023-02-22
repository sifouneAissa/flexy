<?php

namespace App\Http\Livewire\Datatables;

use App\Models\Level;
use App\Models\Membership;
use Mediconesystems\LivewireDatatables\Action;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class MemberShipTable extends LivewireDatatable
{
    public $hideable = 'inline';
    public $exportable = false;
    public $add = true;
    public $add_link = 'membership.create';
    public $permission = 'add level';


    public function builder()
    {
        //
        return Membership::query();
    }

    public function columns()
    {
        //
        return [
            Column::checkbox(),
            NumberColumn::name('order')
                ->defaultSort('asc')
                ->label('ORDER')->filterable(),
            Column::name('name')
                ->searchable(),
            Column::name('description'),
            DateColumn::name('created_at')->filterable(),
            Column::callback(['id','name'], function ($id,$name) {
                return view('livewire.table-actions.member-ship-table-actions', ['id' => $id,'item' => $this->builder()->where('id',$id)->first()]);
            })->unsortable()
        ];
    }


    public function buildActions()
    {
        return [

            Action::value('Order')->label('Order')->callback(function ($mode, $items) {
                // $items contains an array with the primary keys of the selected items
                if($this->builder()->count() === count($items))
                    foreach($items as $key => $value){
                        $model = $this->builder()->find($value);
                        $model->order = $key + 1;
                        $model->save();
                    }
            }),

        ];
    }
}
