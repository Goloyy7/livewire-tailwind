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

    public $photo;
    public $state = [];
    public $user;

    protected $listeners = [
        'refresh-profile-form' => '$refresh'
    ];

    public function mount()
    {
        $this->user = Auth::user();
        $this->state = [
            'name' => $this->user->name,
            'email' => $this->user->email,
        ];
    }

    protected function rules()
    {
        return [
            'state.name' => ['required', 'string', 'max:255'],
            'state.email' => ['required', 'email', 'max:255', 'unique:users,email,' . Auth::id()],
            'photo' => ['nullable', 'image', 'max:1024'],
        ];
    }

    public function updateProfileInformation()
    {
        $this->validate();

        try {
            if ($this->photo) {
                $path = $this->photo->store('profile-photos', 'public');
                
                if ($this->user->profile_photo_path) {
                    Storage::disk('public')->delete($this->user->profile_photo_path);
                }
                
                $this->user->forceFill([
                    'profile_photo_path' => $path,
                ])->save();

                $this->photo = null;
                
                // Dispatch events for updates
                $this->dispatch('profile-photo-updated');
                $this->dispatch('refresh-profile-form');
            }

            $this->user->forceFill([
                'name' => $this->state['name'],
                'email' => $this->state['email'],
            ])->save();

            $this->dispatch('notify-success', 'Profile information updated successfully!');
            
            // Refresh the component
            $this->mount();

        } catch (\Exception $e) {
            $this->dispatch('notify-error', 'An error occurred while updating profile.');
        }
    }

    public function render()
    {
        return view('livewire.profile.update-profile-information-form');
    }
}
