<?php

namespace App\Http\Livewire\Pages\Index;

use App\Models\Provider;
use App\Models\ProviderType;
use Livewire\Component;

class ProvidersSection extends Component
{

    public $types;

    public function mount(){
        $this->types = ProviderType::query()->where('active',true)->orderBy('order')->get();
    }
    public function render()
    {
        return view('livewire.pages.index.providers-section');
    }
}
