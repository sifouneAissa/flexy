<?php

namespace App\Http\Livewire\Partials;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Applogo extends Component
{
    public $lang;

    public function updatedLang(){
        Session::put('lang' , $this->lang);
        $this->dispatchBrowserEvent('setLang', ['lang' => $this->lang]);
    }


    public function render()
    {
        return view('livewire.partials.applogo',[
            'lang' => Session::get('lang') ? Session::get('lang') : \app()->getLocale()
        ]);
    }
}
