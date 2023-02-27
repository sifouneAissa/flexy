<?php

namespace App\Http\Livewire\Pages\Providers;

use App\Models\Membership;
use App\Models\Provider;
use App\Models\ProviderMembership;
use App\Models\User;
use App\Models\UserProvider;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;

class ProviderAdd extends Component
{
    public $amemberships;
    public $fmemberships;
    public $ausers ;
    public $fusers ;
    public $dpercentage;
    public $percentages = [] ;
    public $mpercentages = [] ;
    public $search = '';
    public $percentageFix = true;
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

    public function mount(){
        // filter users of the authenticated
        $this->ausers = $this->builder()->get();
        $this->amemberships = Membership::orderBy('order','asc')->get();


        foreach ($this->ausers as $user){
            $this->percentages[$user->id] = [
                'user_id' => $user->id,
                'percentage' => 0
            ];
        }
        foreach ($this->amemberships as $membership){
            $this->mpercentages[$membership->id.'-'.$membership->order] = [
                'member_ship_id' => $membership->id,
                'percentage' => 0
            ];
        }

        $this->fusers = $this->ausers;
        $this->fmemberships = $this->amemberships;

//        dd($this->mpercentages);
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
            $provider = Provider::query()->create(filterRequest($data,Provider::class));
            if($data['purl']){
                $photo = imageFromPath($data['purl']);
                $provider->addMedia($photo)->toMediaCollection();
            }
            if($this->percentageFix)
                foreach($this->mpercentages as $percentage)
                    ProviderMembership::query()->create(array_merge(
                        filterRequest($percentage,ProviderMembership::class),
                        ['provider_id' => $provider->id]
                    ));
            else
            foreach($this->percentages as $percentage)
                UserProvider::query()->create(array_merge(
                    filterRequest($percentage,UserProvider::class),
                    ['provider_id' => $provider->id]
                ));

            return $provider;
        });

       return redirect()->route('provider.index');
    }



    public function render()
    {
        return view('livewire.pages.providers.provider-add')->layout('livewire.layouts.crud-layout',[
            'link' => 'provider.index'
        ]);
    }
}
