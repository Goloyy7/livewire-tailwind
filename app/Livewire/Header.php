<?php

namespace App\Livewire;

use Livewire\Component;

class Header extends Component
{
    public $variant = 'v1';

    public function mount($variant = 'v1')
    {
        $this->variant = $variant;
    }

    public function render()
    {
        return view('livewire.header');
    }
}
