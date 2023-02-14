<?php

namespace App\Http\Livewire\Datatables;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Spatie\Permission\Models\Role;

class RoleTable extends LivewireDatatable
{
    public $hideable = 'inline';
    public $exportable = false;
    public $item =null;
    public $lang;



    public function builder()
    {
        //
        return Role::query();
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
            Column::callback(['id'], function ($id) {
                return view('livewire.table-actions.role-table-actions', ['id' => $id,'item' => $this->builder()->where('id',$id)->first()]);
            })->unsortable()
        ];
    }
}
