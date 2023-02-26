<?php

namespace App\Http\Livewire\Pages\Providers;

use App\Models\Membership;
use App\Models\Provider;
use App\Models\ProviderMembership;
use App\Models\User;
use App\Models\UserProvider;
use Livewire\Component;

class ProviderEdit extends Component
{
    public $amemberships;
    public $fmemberships;
    public $ausers ;
    public $fusers ;
    public $dpercentage;
    public $percentages = [] ;
    public $search = '';
    public $item = null;
    public $percentageFix = false;
    public $mpercentages = [] ;
    public $increment = 0.1;

    protected function rules(){
        $rules = [];
        if(!$this->percentageFix)
            foreach($this->percentages as $key => $value){
                $rules['percentages.'.$key.'.percentage'] = 'required|numeric|min:'.$this->increment.'|max:'.($this->dpercentage-$this->increment);
            }
        else {

            $f = $this->dpercentage - $this->increment;

            foreach ($this->mpercentages as $key => $value) {
                $rules['mpercentages.' . $key . '.percentage'] = 'required|numeric|min:'.$this->increment.'|max:' . ($f);
                $f = (float)$value['percentage'] - $this->increment;
            }
        }

        return array_merge($rules);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Builder
     * get the builder according to the authenticated user
     */
    public function builder(){
        // general conditions for all users
        $wheres = [
            ['id' ,'!=', auth()->user()->id],
            ['referred_by' , auth()->user()->affiliate_id],
        ];
        // if this one is an admin then do this
        if(auth()->user()->hasRole('admin'))
            return User::query()->whereIn('referred_by',[
                null,auth()->user()->affiliate_id
            ])->whereNot('id', auth()->user()->id);

        return User::query()->where($wheres);

    }

    public function updatedSearch(){
        $callback = function ($item) {
            $slower = str_contains(strtolower($item->name),$this->search);
            $sbigger = str_contains($item->name,$this->search);
            return $slower || $sbigger;
        };
        if(!$this->percentageFix)
            // once the search var updated filter the users array
            $this->fusers = $this->ausers->filter($callback);
        else $this->fmemberships = $this->amemberships->filter($callback);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    protected $listeners = [
        'setPercentage' => 'setPercentage',
        'savePercentages' => 'savePercentages',
        'setPercentageFix' => 'setPercentageFix'
    ];


    public function setPercentageFix($value){
        $this->percentageFix = $value;
    }

    public function mount(Provider $provider){
        $this->item = $provider;
        // filter users of the authenticated
        $this->ausers = $this->builder()->get();
        $this->amemberships = Membership::orderBy('order','asc')->get();

        $this->dpercentage = $provider->percentage;
        $this->percentageFix = $provider->percentage_fix;


        foreach ($this->ausers as $user){
            // get the old provider percentage value
            $per = $user->user_providers()->where("user_providers.provider_id",$provider->id)->first();

            $this->percentages[$user->id] = [
                'user_id' => $user->id,
                'percentage' => $per?->percentage,
                'id' => $per?->id
            ];
        }

        foreach ($this->amemberships as $membership){

            $per = $membership->cPer($provider->id);

            $this->mpercentages[$membership->id.'-'.$membership->order] = [
                'member_ship_id' =>  $membership->id,
                'percentage' => $per?->percentage,
                'id' => $per?->id
            ];
        }


        $this->fusers = $this->ausers;
        $this->fmemberships = $this->amemberships;
    }

    public function setPercentage($value){

        $value = (float)$value['value'];
        $this->dpercentage = $value;

        foreach ($this->percentages as &$per){
            $per['percentage'] = $this->dpercentage / 2;
        }


        $f = $this->dpercentage - 1;

        foreach ($this->mpercentages as &$per){
            $per['percentage'] = $f;
            $f = $f-1;
        }

        $this->rules();
    }

    public function savePercentages($data){

        $this->validate();

        // create the provider
        startTransaction(function () use ($data){

            $this->item->update(filterRequest($data,Provider::class));
            if($data['purl']){
                // delete the old photo
                if($f = $this->item->fimage()) $f->delete();
                $photo = imageFromPath($data['purl']);
                $this->item->addMedia($photo)->toMediaCollection();
            }

            if($this->percentageFix)
                foreach($this->mpercentages as $percentage) {
                    if($percentage['id'])
                        ProviderMembership::find($percentage['id'])->update(array_merge(
                                filterRequest($percentage, ProviderMembership::class))
                        );
                    else
                        ProviderMembership::query()->create(array_merge(
                            filterRequest($percentage, ProviderMembership::class),
                            ['provider_id' => $this->item->id]
                        ));
                }
            else
            // add the percentages
            foreach($this->percentages as $percentage) {
                if($percentage['id'])
                    UserProvider::find($percentage['id'])->update(array_merge(
                        filterRequest($percentage, UserProvider::class))
                    );
                else
                UserProvider::query()->create(array_merge(
                    filterRequest($percentage, UserProvider::class),
                    ['provider_id' => $this->item->id]
                ));
            }

            return true;
        });

        return redirect()->route('provider.index');
    }


    public function render()
    {
        return view('livewire.pages.providers.provider-edit')->layout('livewire.layouts.crud-layout',[
            'link' => 'provider.index'
        ]);
    }
}
