<?php

namespace App\Http\Livewire\Pages;

use App\Models\Level;
use App\Models\Membership;
use App\Models\Provider;
use App\Models\User;
use Livewire\Component;

class PartnersPage extends Component
{
    public $parent;
    public $user;
    public $children;
    public $users = [] ;
    public $memberships;
    public $levels;
    public $level_id;
    public $member_ship_id;

    protected $listeners = [
        'setModal' => 'setModal'
    ];

    public function setModal($data){
        // get users selected
        $this->users = User::whereIn('id',$data['items'])->get();
        // dispatch event to the js passing data needed
        $this->dispatchBrowserEvent('setModal',[
            'id' => $data['id'],
            'state' => true
        ]);
    }

    // save the membership_id
    public function saveM(){
        $this->users->map(function ($item){
            $item->member_ship_id = $this->member_ship_id;
            $item->save();
        });

        $this->dispatchBrowserEvent('removeModal');
        $this->emit('refreshLivewireDatatable');
    }
    // save the level_id
    public function saveL(){
        $this->users->map(function ($item){
            $item->level_id = $this->level_id;
            $item->save();
        });
        $this->dispatchBrowserEvent('removeModal');
        $this->emit('refreshLivewireDatatable');

    }



    public function mount(){
        $this->user = auth()->user();
        $this->parent  = $this->user->parent;
        $this->children = $this->user->children;

        $this->providers = Provider::all();

        $auth = auth()->user();
        // if admin get all
        if($auth->hasRole('admin')) {
            $this->levels = Level::orderBy('order')->get();
            $this->memberships = Membership::orderBy('order')->get();
        }
        // if not filter
        else {

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
    }
    public function render()
    {
        return view('livewire.pages.partners-page')->layout('livewire.layouts.base-layout');
    }
}
