<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\WebSetting;

class AppLayout extends Component
{
    public $settings;

    protected $listeners = [
        'settings-updated' => '$refresh',
        'logo-updated' => '$refresh'
    ];

    public function mount()
    {
        $this->settings = WebSetting::first();
    }

    public function render()
    {
        return view('layouts.app');
    }
}
