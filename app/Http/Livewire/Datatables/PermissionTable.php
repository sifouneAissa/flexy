<?php

namespace App\Http\Livewire\Datatables;

use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Spatie\Permission\Models\Permission;

class PermissionTable extends LivewireDatatable
{

    public $hideable = 'inline';
    public $exportable = false;
    public $add = false;


    public function builder()
    {
        //
        return Permission::query();
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
            DateColumn::name('created_at')->filterable(),
        ];
    }
}
