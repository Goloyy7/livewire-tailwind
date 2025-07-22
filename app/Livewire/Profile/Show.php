<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Show extends Component
{
    public function render()
    {
        return view('livewire.profile.show')
            ->layout('layouts.app');
    }
}