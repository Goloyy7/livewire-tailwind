<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Profile extends Component
{
    use WithFileUploads;

    public function getRandomColor()
    {
        $colors = [
            'bg-blue-500',
            'bg-green-500',
            'bg-yellow-500',
            'bg-red-500',
            'bg-indigo-500',
            'bg-purple-500',
            'bg-pink-500',
            'bg-teal-500',
        ];

        return $colors[array_rand($colors)];
    }

    public function getInitials($name)
    {
        return Str::upper(Str::substr($name, 0, 2));
    }

    public function render()
    {
        return view('livewire.profile.show');
    }
}
