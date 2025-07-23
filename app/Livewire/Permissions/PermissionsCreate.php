<?php

namespace App\Livewire\Permissions;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class PermissionsCreate extends Component
{
    public $permission_name;
    public $permission_description = '';  // Initialize with empty string
    public $guard_name = 'web';
    public $module;
    public $access_type;
    public $editMode = false;
    public $permissionId;

    protected $rules = [
        'permission_name' => 'required|min:3',
        'permission_description' => 'nullable',
        'guard_name' => 'required|in:web,api',
        'module' => 'required',
        'access_type' => 'required|in:view,create,edit,delete'
    ];

    protected $messages = [
        'permission_name.required' => 'Nama permission harus diisi',
        'permission_name.min' => 'Nama permission minimal 3 karakter',
        'guard_name.required' => 'Guard name harus dipilih',
        'module.required' => 'Modul harus dipilih',
        'access_type.required' => 'Tipe akses harus dipilih'
    ];

    public function mount($permissionId = null)
    {
        if ($permissionId) {
            $this->editMode = true;
            $this->permissionId = $permissionId;
            $permission = Permission::findById($permissionId);
            $this->permission_name = $permission->name;
            $this->permission_description = $permission->description;
            $this->guard_name = $permission->guard_name;
            
            // Parse permission name to get module and access type
            $parts = explode('_', $permission->name);
            if (count($parts) >= 2) {
                $this->access_type = $parts[0];
                $this->module = implode('_', array_slice($parts, 1));
            }
        }
    }

    public function updatedModuleAndAccessType()
    {
        if ($this->module && $this->access_type) {
            $this->permission_name = $this->access_type . '_' . $this->module;
        }
    }

    public function updatedModule()
    {
        $this->updatedModuleAndAccessType();
    }

    public function updatedAccessType()
    {
        $this->updatedModuleAndAccessType();
    }

    public function save()
    {
        $this->validate();

        try {
            $permissionData = [
                'name' => $this->permission_name,
                'description' => $this->permission_description,
                'guard_name' => $this->guard_name
            ];

            if ($this->editMode) {
                $permission = Permission::findById($this->permissionId);
                $permission->update($permissionData);
            } else {
                Permission::create($permissionData);
            }

            session()->flash('message', $this->editMode ? 'Permission berhasil diperbarui!' : 'Permission berhasil dibuat!');
            
            return redirect()->route('permissions');
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function cancel()
    {
        return redirect()->route('permissions');
    }

    public function render()
    {
        $modules = [
            'users' => 'Users',
            'roles' => 'Roles',
            'permissions' => 'Permissions',
            'settings' => 'Settings'
        ];

        $accessTypes = [
            'view' => 'View',
            'create' => 'Create',
            'edit' => 'Edit',
            'delete' => 'Delete'
        ];

        return view('livewire.permissions.permissions-create', [
            'modules' => $modules,
            'accessTypes' => $accessTypes
        ]);
    }
}
