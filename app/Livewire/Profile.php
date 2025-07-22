<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Profile extends Component
{
    use WithFileUploads;
    
    public $photo;
    public $name;
    public $email;

    public function mount()
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
    }

    public function updateProfile()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . Auth::id()],
            'photo' => ['nullable', 'image', 'max:1024'], // max 1MB
        ]);

        $userId = Auth::id();
        $user = User::find($userId);

        if ($this->photo) {
            // Delete old photo if exists
            if ($user->profile_photo_path) {
                Storage::disk('public')->delete($user->profile_photo_path);
            }

            // Store new photo
            $path = $this->photo->store('profile-photos', 'public');
            $user->profile_photo_path = $path;
        }

        $user->name = $this->name;
        $user->email = $this->email;
        $user->save();

        $this->dispatch('profile-updated');
        $this->reset('photo');

        session()->flash('message', 'Profile updated successfully.');
    }

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
