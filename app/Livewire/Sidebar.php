<?php

namespace App\Livewire;

use Livewire\Component;

class Sidebar extends Component
{
    public $variant = 'v1';
    public $sidebarOpen = false;
    public $sidebarExpanded = false;

    protected $listeners = ['toggleSidebar' => 'toggle'];

    public function mount($variant = 'v1')
    {
        $this->variant = $variant;
    }

    public function toggle()
    {
        $this->sidebarOpen = !$this->sidebarOpen;
    }

    public function render()
    {
        return view('livewire.sidebar');
    }
}
