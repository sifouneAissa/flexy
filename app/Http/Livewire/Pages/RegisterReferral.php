<?php

namespace App\Http\Livewire\Pages;

use App\Models\User;
use Illuminate\Http\Request;
use Livewire\Component;

class RegisterReferral extends Component
{
    public $referBy;

    public function mount(Request $request){
        $this->referBy = User::where("affiliate_id",$request->input('ref'))->first();
    }

    public function render()
    {
        return view('livewire.pages.register-referral')->layout('livewire.layouts.login-base-layout');
    }
}
