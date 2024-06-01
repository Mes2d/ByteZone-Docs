<?php

namespace App\Livewire;

use Livewire\Component;

class Docs extends Component
{

    public $space = null;

    public function render()
    {
        return view('livewire.docs');
    }
}
