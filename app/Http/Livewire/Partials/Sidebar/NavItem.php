<?php

namespace App\Http\Livewire\Partials\Sidebar;

use Livewire\Component;

class NavItem extends Component
{
    public $item;

    public function render()
    {

        return view('livewire.partials.sidebar.nav-item',[
            'item' => $this->item
        ]);
    }
}
