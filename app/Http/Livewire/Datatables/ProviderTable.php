<?php

namespace App\Http\Livewire\Datatables;

use App\Models\Provider;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Spatie\Permission\Models\Permission;

class ProviderTable extends LivewireDatatable
{
    public $hideable = 'inline';
    public $exportable = false;
    public $add = true;
    public $add_link = 'provider.create';
    public $permission = 'view role';


    public function builder()
    {
        //
        return Provider::query();
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
            Column::name('percentage')->label('Percentage(%)')
                ->searchable(),
            DateColumn::name('created_at')->filterable(),
            Column::callback(['id','name'], function ($id,$name) {
                return view('livewire.table-actions.provider-table-actions', ['id' => $id,'item' => $this->builder()->where('id',$id)->first()]);
            })->unsortable()
        ];
    }
}
