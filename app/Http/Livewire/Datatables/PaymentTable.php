<?php

namespace App\Http\Livewire\Datatables;

use App\Models\Payment;
use App\Models\Provider;
use App\Models\ProviderPack;
use App\Models\User;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class PaymentTable extends LivewireDatatable
{
    public $hideable = 'inline';
    public $exportable = false;
    public $add = false;
    public $add_link = 'pack.create';
    public $permission = 'add provider pack';
    public $providers;
    public $users;
    public $isSeller = true;

    public function mount($model = false, $include = [], $exclude = [], $hide = [], $dates = [], $times = [], $searchable = [], $sort = null, $hideHeader = null, $hidePagination = null, $perPage = null, $exportable = false, $hideable = false, $beforeTableSlot = false, $buttonsSlot = false, $afterTableSlot = false, $params = [])
    {
        $user = auth()->user();
        if($user->hasRole('admin'))
            $this->users = User::query()->whereNot('id',$user->id)->whereNull('referred_by')->orWhere('referred_by',$user->affiliate_id)->get();
        else
            $this->users = $user->children;

        $this->providers = Provider::where('is_service_provider',true)->get();
        parent::mount($model, $include, $exclude, $hide, $dates, $times, $searchable, $sort, $hideHeader, $hidePagination, $perPage, $exportable, $hideable, $beforeTableSlot, $buttonsSlot, $afterTableSlot, $params); // TODO: Change the autogenerated stub
    }


    public function builder()
    {
        //
        $builder = Payment::query();
        if($this->isSeller)
            $builder = $builder->where('seller_id',auth()->user()->id);
        else
            $builder = $builder->where('buyer_id',auth()->user()->id);

        return $builder
            ->leftJoin('users', 'users.id', 'payments.buyer_id')
            ->select('users.name as buyer_name','users.id as bid')
            ->groupBy('payments.id');
    }

    public function columns()
    {
        //
        $columns = [
            Column::checkbox(),
            NumberColumn::name('Id')->label('ID')->filterable(),
            Column::name('users.name')->link('/partners/edit/{{bid}}', '{{users.name}}')->searchable()->filterable($this->users->pluck("name")->toArray())->filterOn('users.name'),
            Column::name('method_payment_id')->label('Payment Method'),
            Column::name('amount')->searchable(),
            Column::name('Status')->filterable(config('default.payment_status')),
//            Column::name('providers.name')->label('Provider')->filterable($this->providers->pluck('name')->toArray())->filterOn('providers.name'),
            DateColumn::name('created_at')->filterable(),
            Column::callback(['id'], function ($id) {
                return view('livewire.table-actions.payment-table-actions', ['id' => $id,'item' => Payment::find($id)]);
            })->unsortable()
        ];


        if(!$this->isSeller){
            $columns = array_filter($columns,function ($item){
                return $item->name !=='users.name';
            });
        }

        return $columns;

    }
}
