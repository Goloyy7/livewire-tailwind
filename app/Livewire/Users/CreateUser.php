<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Models\User;

class CreateUser extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $selectedRoles = [];
    public $selectedGroups = [];

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|confirmed',
        'selectedRoles' => 'array',
        'selectedGroups' => 'array'
    ];

    public function render()
    {
        return view('livewire.users.users-management-form');
    }

    public function save()
    {
        $this->validate();
        // Logic untuk menyimpan user akan ditambahkan nanti
    }

    public function cancel()
    {
        return redirect()->route('users');
    }
}
