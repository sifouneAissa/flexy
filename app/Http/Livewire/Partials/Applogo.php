<?php

namespace App\Http\Livewire\Partials;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Applogo extends Component
{
    public $lang;
    public $mode;
    public $isBase = true;
    public $showP = true;
    public $link = null;
    public $listeners = [
        'setLang' => 'setLang'
    ];

    public function updatedLang(){
        Session::put('lang' , $this->lang);
        $this->dispatchBrowserEvent('setLang', ['lang' => $this->lang]);
    }

    public function dispatch(){
        $this->dispatchBrowserEvent('langChanged');
    }

    public function setLang(){

        Session::put('lang' , $this->lang);
        $this->dispatchBrowserEvent('setLang', ['lang' => $this->lang]);
        $this->emit('langChanged');
        $this->loginParms();
//        $this->dispatchBrowserEvent('langChanged');

    }

    public function setMode($first=false){
        if(!$first)
        $this->mode =  $this->mode !== 'light-mode' ? 'light-mode' : 'dark-mode';
        Session::put('mode' , $this->mode);
        // if the user is authenticated
        $this->loginParms();
        $this->dispatchBrowserEvent('setMode', ['mode' => $this->mode]);
    }

    public function loginParms(){

        if($user = auth()->user()){
//            $ulang = $this->lang!==$user->lang;
            $umode = $this->mode!==$user->mode;

//            if($ulang)
//            $user->lang = $this->lang;
            if($umode)
            $user->mode = $this->mode;

            if(
//                $ulang ||
                $umode)
            $user->save();
        }
    }
    public function mount($isBase=true){

//        $this->lang = Session::has('lang') ? Session::get('lang') : \app()->getLocale();
        $this->mode = Session::has('mode') ? Session::get('mode') : config("app.mode");
        $this->isBase = $isBase;
//        $this->setLang();
        $this->setMode(true);
        $this->showP = auth()->user() && !(\Illuminate\Support\Facades\Route::getCurrentRoute()->getName()==='profile.show');

    }

    public function render()
    {
        return view('livewire.partials.applogo',[
            'lang' => Session::get('lang') ? Session::get('lang') : \app()->getLocale(),
            'mode' => Session::get('mode') ? Session::get('mode') : config("app.mode")
        ]);
    }
}
