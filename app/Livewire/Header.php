<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;

class Header extends Component
{
    public $variant = 'v1';

    protected $colors = [
        'bg-blue-500',
        'bg-green-500',
        'bg-yellow-500',
        'bg-red-500',
        'bg-indigo-500',
        'bg-purple-500',
        'bg-pink-500',
        'bg-teal-500',
    ];

    protected $listeners = [
        'profile-photo-updated' => '$refresh',
        'refresh-navigation-menu' => '$refresh'
    ];

    public function mount($variant = 'v1')
    {
        $this->variant = $variant;
    }

    public function getInitials($name)
    {
        return Str::upper(Str::substr($name, 0, 2));
    }

    public function getRandomColor()
    {
        return $this->colors[array_rand($this->colors)];
    }

    public function render()
    {
        return view('livewire.header');
    }
}
