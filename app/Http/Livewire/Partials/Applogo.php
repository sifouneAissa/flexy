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

    public function updatedLang(){
        Session::put('lang' , $this->lang);
        $this->dispatchBrowserEvent('setLang', ['lang' => $this->lang]);
    }

    public function setLang(){

        Session::put('lang' , $this->lang);
        $this->dispatchBrowserEvent('setLang', ['lang' => $this->lang]);
        $this->emit('langChanged');
        $this->loginParms();
        $this->dispatchBrowserEvent('langChanged');

    }

    public function setMode($mode){
        Session::put('mode' , $mode);
        $this->mode = $mode;
        $this->loginParms();
        $this->dispatchBrowserEvent('setMode', ['mode' => $mode]);
    }

    public function loginParms(){

        if($user = auth()->user()){
            $ulang = $this->lang!==$user->lang;
            $umode = $this->mode!==$user->mode;
            if($ulang)
            $user->lang = $this->lang;
            if($umode)
            $user->mode = $this->mode;

            if($ulang || $umode)
            $user->save();
        }
    }
    public function mount($isBase=true){

        $this->lang = Session::has('lang') ? Session::get('lang') : \app()->getLocale();
        $this->mode = Session::has('mode') ? Session::get('mode') : config("app.mode");

        $this->isBase = $isBase;
        $this->setLang();
        $this->setMode($this->mode);
        $this->showP = auth()->user() && !(\Illuminate\Support\Facades\Route::getCurrentRoute()->getName()==='user.profile');

    }

    public function render()
    {
        return view('livewire.partials.applogo',[
            'lang' => Session::get('lang') ? Session::get('lang') : \app()->getLocale(),
            'mode' => Session::get('mode') ? Session::get('mode') : config("app.mode")
        ]);
    }
}
