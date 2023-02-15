<?php

namespace App\Http\Livewire\Datatables;

use App\Models\User;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Spatie\Permission\Models\Role;

class UserTable extends LivewireDatatable
{

    public $hideable = 'inline';
    public $exportable = false;
    public $add = true;
    public $permission = 'add role';
    public $add_link = 'user.create';

    public function builder()
    {
        //
        return User::query();
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
            Column::name('email')
                ->searchable(),
            Column::callback(['id'], function ($id) {
                return User::query()->find($id)->roles->first()->name;
            })->label('Role'),
            DateColumn::name('created_at')->filterable(),
//            Column::callback(['id'], function ($id) {
//                return view('livewire.table-actions.role-table-actions', ['id' => $id,'item' => $this->builder()->where('id',$id)->first()]);
//            })->unsortable()
        ];
    }
}
