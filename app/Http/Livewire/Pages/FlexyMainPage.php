<?php

namespace App\Http\Livewire\Pages;

use App\Models\Provider;
use App\Models\Setting;
use Livewire\Component;

class FlexyMainPage extends Component
{
    public $cards;
    public $routes = [
        'flexy_end_to_end' => 'flexy-detail.index',
        'flexy_wholesaler' => 'flexy-detail.index'
    ];
    public $codes = [
        'flexy_end_to_end',
        'flexy_wholesaler'
    ];

    public function mount(){

        $this->cards = Setting::whereIn('code',$this->codes)->get();

    }

    public function render()
    {
        return view('livewire.pages.flexy-main-page')->layout('livewire.layouts.base-layout');
    }
}
