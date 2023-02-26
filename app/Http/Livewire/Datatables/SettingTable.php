<?php

namespace App\Http\Livewire\Datatables;

use App\Models\Setting;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class SettingTable extends LivewireDatatable
{

    public $hideable = 'inline';
    public $exportable = false;
    public $add = false;

    public function builder()
    {
        //
        return Setting::query();
    }

    public function setModal($id){
        $this->emitTo('pages.setting-page','setModal',$id);
    }

    public function columns()
    {
        //
        return[
            Column::checkbox(),
            NumberColumn::name('id')
                ->label('ID')->filterable(),
            Column::name('name')
                ->searchable(),
            Column::name('content')->truncate(30),
            DateColumn::name('created_at')->filterable(),
            Column::callback(['id','name'], function ($id,$name) {
                return view('livewire.table-actions.setting-table-actions', ['id' => $id,'item' => $this->builder()->where('id',$id)->first()]);
            })->unsortable()
        ];
    }
}
