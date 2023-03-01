<?php

namespace App\Http\Livewire\Datatables;

use App\Models\Client;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class ClientTable extends LivewireDatatable
{
    public $hideable = 'inline';
    public $exportable = false;
    public $add = true;
    public $permission = 'add user';
    public $add_link = 'user.create';

    public function builder()
    {
        //
        // only users has roles
        return Client::query()->where('user_id',auth()->user()->id);
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
            Column::name('phone')
                ->searchable(),
            DateColumn::name('created_at')->filterable(),
            Column::callback(['id','name'], function ($id,$name) {
                return view('livewire.table-actions.client-table-actions', ['id' => $id,'item' => $this->builder()->where('id',$id)->first()]);
            })->unsortable()
        ];
    }

}
