<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class UpdateProfileInformationForm extends Component
{
    use WithFileUploads;

    public $state = [];
    public $photo;
    public $user;

    protected function rules()
    {
        return [
            'state.name' => ['required', 'string', 'max:255'],
            'state.email' => ['required', 'email', 'max:255', 'unique:users,email,' . Auth::id()],
            'photo' => ['nullable', 'image', 'max:1024'],
        ];
    }

    public function mount()
    {
        $this->user = Auth::user();
        $this->state = [
            'name' => $this->user->name,
            'email' => $this->user->email,
        ];
    }

    public function updateProfileInformation()
    {
        $this->validate();

        if ($this->photo) {
            $path = $this->photo->store('profile-photos', 'public');
            
            if ($this->user->profile_photo_path) {
                Storage::disk('public')->delete($this->user->profile_photo_path);
            }
            
            $this->user->profile_photo_path = $path;
            $this->user->save();
        }

        $this->user->forceFill([
            'name' => $this->state['name'],
            'email' => $this->state['email'],
        ])->save();

        $this->dispatch('profile-updated');
    }

    public function deleteProfilePhoto()
    {
        if ($this->user->profile_photo_path) {
            Storage::disk('public')->delete($this->user->profile_photo_path);
            $this->user->profile_photo_path = null;
            $this->user->save();
        }

        $this->dispatch('profile-photo-deleted');
    }

    public function render()
    {
        return view('livewire.profile.update-profile-information-form');
    }
}
