<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\WebSetting;
use Illuminate\Support\Facades\Storage;

class Sidebar extends Component
{
    public $variant = 'v1';
    public $sidebarOpen = false;
    public $sidebarExpanded = false;

    protected $listeners = [
        'toggleSidebar' => 'toggle',
        'settings-updated' => '$refresh',
        'logo-updated' => '$refresh'
    ];

    public function mount($variant = 'v1')
    {
        $this->variant = $variant;
    }

    public function toggle()
    {
        $this->sidebarOpen = !$this->sidebarOpen;
    }

    public function getCurrentLogo()
    {
        $websiteSettings = WebSetting::first();
        if (!$websiteSettings || empty($websiteSettings->getLogo())) {
            return asset('images/default-logo.png');
        }
        return asset('storage/' . $websiteSettings->getLogo());
    }

    public function render()
    {
        $websiteSettings = WebSetting::first();
        return view('livewire.sidebar')
            ->with([
                'currentLogo' => $this->getCurrentLogo(),
                'websiteSettings' => $websiteSettings,
            ]);
    }
}
