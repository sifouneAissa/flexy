<?php

namespace App\Http\Livewire\Datatables;

use App\Models\Payment;
use App\Models\PaymentMethod;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class MPaymentTable extends LivewireDatatable
{
    public $hideable = 'inline';
    public $exportable = false;
    public $add = true;
    public $add_link = 'mpayment.create';
    public $permission = 'add payment method';
    public function builder()
    {
        //
        return PaymentMethod::query();
    }

    public function columns()
    {
        //

        //
        $columns = [
            Column::checkbox()->label('Select'),
            NumberColumn::name('Id')->label('ID')->filterable(),
            Column::name('name')->searchable(),
            Column::name('provider'),
            Column::name('description')->truncate(30),
            DateColumn::name('created_at')->filterable(),
            Column::callback(['id'], function ($id) {
                return view('livewire.table-actions.m-payment-table-actions', ['id' => $id,'item' => PaymentMethod::find($id)]);
            })->unsortable()
        ];

        return $columns;
    }
}
