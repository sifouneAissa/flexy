<?php

namespace App\Http\Livewire\Pages\Providers;

use App\Models\Provider;
use App\Models\User;
use App\Models\UserProvider;
use Livewire\Component;

class ProviderAdd extends Component
{

    public $ausers ;
    public $fusers ;
    public $dpercentage;
    public $percentages = [] ;
    public $search = '';

    protected function rules(){
        $rules = [];
        foreach($this->percentages as $key => $value){
            $rules['percentages.'.$key.'.percentage'] = 'required|numeric|min:0.1|max:'.($this->dpercentage-0.1);
        }

        return array_merge($rules);
    }

    public function updatedSearch(){
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

    public function mount(){
        $this->ausers = User::all();
        foreach ($this->ausers as $user){
            $this->percentages[$user->id] = [
                'user_id' => $user->id,
                'percentage' => 0
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
            $provider = Provider::query()->create(filterRequest($data,Provider::class));
            // add the percentages
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
        return view('livewire.pages.providers.provider-add')->layout('livewire.layouts.crud-layout');
    }
}
