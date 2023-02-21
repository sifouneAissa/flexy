<?php

namespace App\Http\Livewire\Datatables;

use App\Models\Level;
use App\Models\Provider;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class LevelTable extends LivewireDatatable
{
    public $hideable = 'inline';
    public $exportable = false;
    public $add = true;
    public $add_link = 'level.create';
    public $permission = 'view provider';


    public function builder()
    {
        //
        return Level::query();
    }

    public function columns()
    {
        //
        return [

            Column::checkbox(),
            NumberColumn::name('id')
                ->label('ID')->filterable(),
            Column::name('name')
                ->searchable(),
            Column::name('description'),
            DateColumn::name('created_at')->filterable(),
            Column::callback(['id','name'], function ($id,$name) {
                return view('livewire.table-actions.level-table-actions', ['id' => $id,'item' => $this->builder()->where('id',$id)->first()]);
            })->unsortable()
        ];
    }
}
