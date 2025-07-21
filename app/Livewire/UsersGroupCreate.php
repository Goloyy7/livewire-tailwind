<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\UserGroup as UsersGroupModel;

class UsersGroupCreate extends Component
{
    public $groupId;
    public $name;
    public $description;

    public function mount($id = null)
    {
        $this->groupId = $id;
        if ($id) {
            $group = UsersGroupModel::findOrFail($id);
            $this->name = $group->name;
            $this->description = $group->description;
        }
    }


    public function store()
    {
        $rules = [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ];
        $pesan = [
            'name.required' => 'Nama grup pengguna harus diisi.',
            'name.string' => 'Nama grup pengguna harus berupa teks.',
            'name.max' => 'Nama grup pengguna tidak boleh lebih dari 255 karakter.',
            'description.string' => 'Deskripsi harus berupa teks.',
            'description.max' => 'Deskripsi tidak boleh lebih dari 1000 karakter.',
        ];
        $validated = $this->validate($rules, $pesan);

        if ($this->groupId) {
            // Update
            $group = UsersGroupModel::findOrFail($this->groupId);
            $group->update($validated);
            session()->flash('message', 'User group updated successfully.');
        } else {
        UsersGroupModel::create($validated);
        session()->flash('message', 'User group created successfully.');
    }
        return redirect()->route('users-group');
    }

    public function render()
    {
        return view('livewire.users-group-create');
    }

    public function cancel()
    {
        return redirect()->route('users-group');
    }

    
}
