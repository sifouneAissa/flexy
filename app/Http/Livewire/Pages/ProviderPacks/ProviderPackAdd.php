<?php

namespace App\Http\Livewire\Pages\ProviderPacks;

use Livewire\Component;

class ProviderPackAdd extends Component
{
    public function render()
    {
        return view('livewire.pages.provider-packs.provider-pack-add')->layout("livewire.layouts.crud-layout",[
            'link' => 'pack.index'
        ]);
    }
}
