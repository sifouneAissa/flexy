<?php

namespace App\Http\Livewire\Pages\Providers;

use App\Models\Provider;
use App\Models\User;
use App\Models\UserProvider;
use Livewire\Component;

class ProviderEdit extends Component
{
    public $ausers ;
    public $fusers ;
    public $dpercentage;
    public $percentages = [] ;
    public $search = '';
    public $item = null;

    protected function rules(){
        $rules = [];
        foreach($this->percentages as $key => $value){
            $rules['percentages.'.$key.'.percentage'] = 'required|numeric|min:0.1|max:'.($this->dpercentage-0.1);
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
        // once the search var updated filter the users array
        $this->fusers = $this->ausers->filter(function ($item) {
            return str_contains($item->name,$this->search);
        });
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    protected $listeners = [
        'setPercentage' => 'setPercentage',
        'savePercentages' => 'savePercentages'
    ];

    public function mount(Provider $provider){
        $this->item = $provider;
        // filter users of the authenticated
        $this->ausers = $this->builder()->get();

        $this->dpercentage = $provider->percentage;

        foreach ($this->ausers as $user){
            // get the old provider percentage value
            $per = $user->user_providers()->where("user_providers.provider_id",$provider->id)->first();

            $this->percentages[$user->id] = [
                'user_id' => $user->id,
                'percentage' => $per?->percentage,
                'id' => $per?->id
            ];
        }


        $this->fusers = $this->ausers;
    }

    public function setPercentage($value){

        $value = $value['value'];
        $this->dpercentage = $value;

        foreach ($this->percentages as &$per){
            $per['percentage'] = $this->dpercentage / 2;
        }
        $this->rules();
    }

    public function savePercentages($data){
        $this->validate();

        // create the provider
        startTransaction(function () use ($data){
            $this->item->update(filterRequest($data,Provider::class));
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
        return view('livewire.pages.providers.provider-edit')->layout('livewire.layouts.crud-layout');
    }
}
