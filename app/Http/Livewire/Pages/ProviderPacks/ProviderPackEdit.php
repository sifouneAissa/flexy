<?php

namespace App\Http\Livewire\Pages\ProviderPacks;

use App\Models\ProviderPack;
use Livewire\Component;

class ProviderPackEdit extends Component
{
    public $item;

    public function mount(ProviderPack $providerPack){
        $this->item = $providerPack;
    }
    public function render()
    {
        return view('livewire.pages.provider-packs.provider-pack-edit')->layout("livewire.layouts.crud-layout",[
            'link' => 'pack.index'
        ]);
    }
}
