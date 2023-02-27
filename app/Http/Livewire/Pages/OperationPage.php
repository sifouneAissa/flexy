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
    public $f_img = '/images/flexy.webp';
    public $m_h = 286;
    public $m_w = 286;

    public function mount(){
        // get the image from the setting
        if($media = getSetting('flexy_photo')->fimage())
            $this->f_img = $media->getUrl("webp");

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
