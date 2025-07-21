<?php

namespace App\Livewire\Users;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersManagement extends Component
{
    use WithPagination;

    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $user_id;
    public $isOpen = false;
    public $isEditMode = false;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|confirmed',
    ];

    public function render()
    {
        return view('livewire.users.users-management', [
            'users' => User::paginate(10)
        ]);
    }

    public function create()
    {
        $this->resetInputFields();
        $this->isOpen = true;
        $this->isEditMode = false;
    }

    public function store()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        session()->flash('message', 'User berhasil dibuat.');
        $this->resetInputFields();
        $this->isOpen = false;
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->isOpen = true;
        $this->isEditMode = true;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,'.$this->user_id,
        ]);

        if (!empty($this->password)) {
            $this->validate(['password' => 'min:8|confirmed']);
        }

        $user = User::find($this->user_id);
        $updateData = [
            'name' => $this->name,
            'email' => $this->email,
        ];

        if (!empty($this->password)) {
            $updateData['password'] = Hash::make($this->password);
        }

        $user->update($updateData);

        session()->flash('message', 'User berhasil diupdate.');
        $this->resetInputFields();
        $this->isOpen = false;
    }

    public function delete($id)
    {
        User::find($id)->delete();
        session()->flash('message', 'User berhasil dihapus.');
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';
        $this->user_id = null;
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->resetInputFields();
    }
}
