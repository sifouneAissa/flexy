<?php

namespace App\Http\Livewire\Pages;

use App\Models\User;
use Livewire\Component;

class PartnersPage extends Component
{
    public $parent;
    public $user;
    public $children;

    public function mount(){
        $this->user = auth()->user();
        $this->parent  = $this->user->parent;
        $this->children = $this->user->children;
    }
    public function render()
    {
        return view('livewire.pages.partners-page')->layout('livewire.layouts.crud-layout');
    }
}
