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

    public $listeners = [
        'profilePhotoDeleted' => 'deleteProfilePhoto',
        'profileUpdated' => '$refresh',
    ];

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

        try {
            if ($this->photo) {
                $path = $this->photo->store('profile-photos', 'public');
                
                if ($this->user->profile_photo_path) {
                    Storage::disk('public')->delete($this->user->profile_photo_path);
                }
                
                $this->user->forceFill([
                    'profile_photo_path' => $path,
                ])->save();

                $this->photo = null; // Reset photo after successful upload
            }

            $this->user->forceFill([
                'name' => $this->state['name'],
                'email' => $this->state['email'],
            ])->save();

            $this->dispatch('notify-success', 'Profile information updated successfully!');
            $this->dispatch('profile-updated');
            
            // Refresh data user
            $this->user = $this->user->fresh();
            
            // Update state dengan data terbaru
            $this->state = [
                'name' => $this->user->name,
                'email' => $this->user->email,
            ];

            // Tampilkan notifikasi sukses
            session()->flash('message', 'Profile updated successfully!');
            
            // Emit event untuk update header jika diperlukan
            $this->dispatch('refresh-navigation-menu');

        } catch (\Exception $e) {
            $this->dispatch('notify-error', 'An error occurred while updating profile.');
        }
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
