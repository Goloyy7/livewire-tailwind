<?php

namespace App\Livewire\Profile;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class DeleteUserForm extends Component
{
    public $deleteId = '';
    public $confirmingDelete = false;
    public $password = '';

    protected $rules = [
        'password' => 'required'
    ];


    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->confirmingDelete = true;
    }

    public function deleteUser()
    {
        $this->validate();
            
        $user = Auth::user();

        if (!Hash::check($this->password, $user->password)) {
            $this->addError('password', 'Password yang dimasukkan salah.');
            return;
        }

        Auth::logout();
        
        $user->delete();

        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.profile.delete-user-form'
        )->with([
            'item' => Auth::user(),
        ]);
    }
}
