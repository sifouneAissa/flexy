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
        $this->providers = Provider::where('is_service_provider',false)->get();

        $auth = auth()->user();
        // if admin get all
        if($auth->hasRole('admin')) {
            $this->levels = Level::orderBy('order')->get();
            $this->memberships = Membership::orderBy('order')->get();
        }
        // if not filter
        else {
            if(!($auth->level && $auth->membership))
                return abort(404);

            $this->levels = $auth->membership->levels()->whereNot('level_id',$auth->level_id)->orderBy('order','desc')->get();
            $this->memberships = $auth->level->memberships()->whereNot('member_ship_id',$auth->member_ship_id)->orderBy('order','desc')->get();

            // sort by order
            $this->levels = $this->levels->filter(function ($item) use ($auth){
                return $auth->level->order < $item->order;
            });

            $this->memberships = $this->memberships->filter(function ($item) use ($auth){
                return    $auth->membership->order < $item->order;
            });


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
