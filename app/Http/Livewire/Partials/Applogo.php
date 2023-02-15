<?php

namespace App\Http\Livewire\Partials;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Applogo extends Component
{
    public $lang;
    public $mode;

    public function updatedLang(){
        Session::put('lang' , $this->lang);
        $this->dispatchBrowserEvent('setLang', ['lang' => $this->lang]);
    }

    public function setLang(){
        Session::put('lang' , $this->lang);
        $this->dispatchBrowserEvent('setLang', ['lang' => $this->lang]);
        $this->emit('langChanged');
        $this->dispatchBrowserEvent('langChanged');

    }

    public function setMode($mode){
        Session::put('mode' , $mode);
        $this->mode = $mode;
        $this->dispatchBrowserEvent('setMode', ['mode' => $mode]);

    }

    public function mount(){
        $this->lang = Session::get('lang') ? Session::get('lang') : \app()->getLocale();
        $this->mode = Session::get('mode') ? Session::get('mode') : config("app.mode");

        $this->setLang();
        $this->setMode($this->mode);
    }

    public function render()
    {
        return view('livewire.partials.applogo',[
            'lang' => Session::get('lang') ? Session::get('lang') : \app()->getLocale(),
            'mode' => Session::get('mode') ? Session::get('mode') : config("app.mode"),
        ]);
    }
}
