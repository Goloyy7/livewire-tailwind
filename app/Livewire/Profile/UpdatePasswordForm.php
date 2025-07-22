<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UpdatePasswordForm extends Component
{
     public $state = [
        'current_password' => '',
        'password' => '',
        'password_confirmation' => ''
    ];

    public $showSuccessMessage = false;

    protected function rules()
    {
        return [
            'state.current_password' => ['required', 'string', 'current_password'],
            'state.password' => ['required', 'string', Password::defaults(), 'confirmed'],
            'state.password_confirmation' => ['required', 'string'],
        ];
    }

    protected $messages = [
        'state.current_password.required' => 'Current password is required.',
        'state.current_password.current_password' => 'The provided password does not match your current password.',
        'state.password.required' => 'New password is required.',
        'state.password.confirmed' => 'Password confirmation does not match.',
        'state.password_confirmation.required' => 'Password confirmation is required.',
    ];

    public function updatePassword()
    {
        $this->validate();

        $user = Auth::user();

        $user->password = Hash::make($this->state['password']);
        $user->save();

        $this->reset('state');
        $this->showSuccessMessage = true;
    }

    public function render()
    {
        return view('livewire.profile.update-password-form');
    }
}
