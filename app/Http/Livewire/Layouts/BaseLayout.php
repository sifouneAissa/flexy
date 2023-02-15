<?php

namespace App\Http\Livewire\Layouts;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class BaseLayout extends Component
{


    public function render()
    {
        return view('livewire.layouts.base-layout');
    }
}
