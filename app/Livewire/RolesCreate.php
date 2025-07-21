<?php

namespace App\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesCreate extends Component
{
    public $role_name;
    public $role_description;
    public $selectedPermissions = [];
    public $editMode = false;
    public $roleId;
    
    protected $rules = [
        'role_name' => 'required|min:3',
        'role_description' => 'nullable',
        'selectedPermissions' => 'required|array|min:1'
    ];

    protected $messages = [
        'role_name.required' => 'Nama role harus diisi',
        'role_name.min' => 'Nama role minimal 3 karakter',
        'selectedPermissions.required' => 'Pilih minimal satu permission',
        'selectedPermissions.min' => 'Pilih minimal satu permission'
    ];

    public function mount($roleId = null)
    {
        if ($roleId) {
            $this->editMode = true;
            $this->roleId = $roleId;
            $role = Role::findById($roleId);
            $this->role_name = $role->name;
            $this->role_description = $role->description;
            $this->selectedPermissions = $role->permissions->pluck('name')->toArray();
        }
    }

    public function save()
    {
        $this->validate();

        try {
            if ($this->editMode) {
                $role = Role::findById($this->roleId);
                $role->update([
                    'name' => $this->role_name,
                    'description' => $this->role_description
                ]);
            } else {
                $role = Role::create([
                    'name' => $this->role_name,
                    'description' => $this->role_description,
                    'guard_name' => 'web'
                ]);
            }

            $permissions = Permission::whereIn('name', $this->selectedPermissions)->get();
            $role->syncPermissions($permissions);

            session()->flash('message', $this->editMode ? 'Role berhasil diperbarui!' : 'Role berhasil dibuat!');
            
            return redirect()->route('roles');
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function cancel()
    {
        return redirect()->route('roles');
    }

    public function render()
    {
        $permissions = Permission::all()->groupBy(function($permission) {
            return explode('_', $permission->name)[1] ?? 'other';
        });
        
        return view('livewire.roles-create', [
            'permissions' => $permissions
        ]);
    }
}
