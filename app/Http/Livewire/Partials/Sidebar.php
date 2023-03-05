<?php

namespace App\Http\Livewire\Partials;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Sidebar extends Component
{
    public $lang;
    public $locales;
    public $items;

    public function mount(){
                $this->items = \App\Models\SNavitem::where('parent_id',null)->orderBy('order')->where('is_active',true)->get();

                $this->lang = Session::has('lang') ? Session::get('lang') : \app()->getLocale();
                $this->setLang();
                $this->locales = config('app.locales');
    }

    public function updatedLang(){
        $this->setLang();
    }



    public function setLang(){
        Session::put('lang' , $this->lang);
        $this->dispatchBrowserEvent('setLang', ['lang' => $this->lang]);
        $this->loginParms();
        $this->dispatchBrowserEvent('langChanged');
    }

    public function loginParms(){

        if($user = auth()->user()){
            $ulang = $this->lang!==$user->lang;
            if($ulang)
                $user->lang = $this->lang;

            if($ulang)
                $user->save();
        }
    }

    public function render()
    {
        return view('livewire.partials.sidebar');
    }
}
