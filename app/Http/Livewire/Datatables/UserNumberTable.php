<?php

namespace App\Http\Livewire\Datatables;

use App\Models\Level;
use App\Models\Provider;
use App\Models\UserNumber;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class UserNumberTable extends LivewireDatatable
{
    public $hideable = 'inline';
    public $exportable = false;
    public $add = true;
    public $add_link = 'number.create';
    public $permission = 'add level';

    public function builder()
    {
        //
        return UserNumber::query()
            ->where('user_numbers.user_id',auth()->user()->id)
            ->leftJoin('providers', 'providers.id', 'user_numbers.provider_id')
            ->select('providers.name as provider_name')
            ->groupBy('user_numbers.id');
    }

    public function columns()
    {
//
        return [

            Column::checkbox(),
            NumberColumn::name('id')
                ->label('ID')->filterable(),
            Column::name('number')
                ->searchable(),
            Column::name('providers.name')->label('Provider')->filterable(Provider::all()->pluck('name')->toArray())->filterOn('providers.name'),
            DateColumn::name('created_at')->filterable(),
            Column::callback('id', function ($id) {
                return view('livewire.table-actions.user-number-table-actions', ['id' => $id,'item' => UserNumber::find($id)->first()]);
            })->unsortable()
        ];
    }
}
