<?php

namespace App\Http\Livewire\Pages;

use App\Models\Provider;
use Livewire\Component;

class OperationPage extends Component
{
    public $sproviders;
    public $providers;
    public $pupercentages;
    public $spupercentages;

    public function mount(){
        $this->sproviders = Provider::where('is_service_provider',true)->get();
        $this->providers = Provider::where('is_service_provider',false)->get();
        $user = auth()->user();
        $isAdmin = $user->hasRole('admin');
        $this->pupercentages = $this->providers->map(function ($item) use ($user){
                return [
                    'percentage' => $user->cPer($item->id)?->percentage,
                    'provider_name' => $item->name
                ];
        });

        $this->spupercentages = $this->sproviders->map(function ($item) use ($user,$isAdmin){

            $percentage = $isAdmin ? $item->percentage : $user->membership->cPer($item->id)?->percentage;

            return [
                'percentage' => $percentage,
                'provider_name' => $item->name,
                'img' => $item->getWebP()
            ];
        });
    }

    public function render()
    {
        return view('livewire.pages.operation-page')->layout('livewire.layouts.base-layout');
    }
}
