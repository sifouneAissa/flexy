<?php

namespace App\Http\Livewire\Pages\Partners;

use App\Models\Level;
use App\Models\Membership;
use App\Models\Provider;
use App\Models\User;
use App\Models\UserProvider;
use Livewire\Component;

class PartnerEdit extends Component
{
    public $item;
    public $providers;
    public $memberships;
    public $levels;
    public $user_providers;
    public $member_ship_id;
    public $level_id;


    public function rules(){

        $rules = [];

        foreach($this->providers as $key => $provider){
            $rules['user_providers.'.$key.'.percentage'] = 'required|numeric|min:0.1|max:'.auth()->user()->cPer($provider->id)?->percentage - 0.1;
        }

        return array_merge($rules);

    }


    public function mount(User $user){
        $this->item = $user;
        $this->providers = Provider::all();

        if(auth()->user()->hasRole('admin')) {
            $this->levels = Level::all();
            $this->memberships = Membership::all();
        }
        else {
            $this->levels = Level::whereHas('memberships',function ($builder){
                $builder->where('member_ships.id',auth()->user()->member_ship_id);
            })->get();

            $this->memberships = Membership::whereHas('levels',function ($builder){
                $builder->where('levels.id',auth()->user()->level_id);
            })->get();
        }


        //
        $this->level_id = $user->level_id ? $user->level_id : $this->levels->first()?->id;
        $this->member_ship_id = $user->member_ship_id ? $user->member_ship_id : $this->memberships->first()?->id;

        $this->user_providers = $this->providers->map(function ($item){
            $up = $this->item->cPer($item->id);
            return [
                   'provider_id' => $item->id,
                   'percentage' => $up?->percentage,
                    'id' => $up?->id,
                    'user_id' => $this->item->id
               ];
        })->toArray();

    }

    public function save(){

        $this->validate();

        // create the provider
        startTransaction(function (){
            // add the percentages
            foreach($this->user_providers as $percentage) {
                if($percentage['id'])
                    UserProvider::find($percentage['id'])->update(array_merge(
                            filterRequest($percentage, UserProvider::class))
                    );
                else {
//                    dd($percentage);
                    UserProvider::query()->create(filterRequest($percentage, UserProvider::class));
                }
            }

            return true;
        });
    }

    public function saveE(){

        $this->validate([
            'member_ship_id' => 'required',
            'level_id' => 'required'
        ]);
        // update the user
        $this->item->update(filterRequest($this->all(),User::class));
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.pages.partners.partner-edit')->layout('livewire.layouts.crud-layout',[
            'link' => 'partner.index'
        ]);
    }
}
