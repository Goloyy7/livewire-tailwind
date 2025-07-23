<?php

namespace App\Livewire\Users;

use Spatie\Permission\Models\Role;
use Livewire\Component;
use App\Models\User as UserModel;
use App\Models\UserGroup;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;
    public $deleteId = '';
    public $confirmingDelete = false;

    protected $paginationTheme = 'tailwind';

    
    public function confirmDelete($id)
    {
        $this->confirmingDelete = true;
        $this->deleteId = $id;
    }

    public function deletePermission()
    {
        if ($this->deleteId) {
            try {
                $permission = UserModel::find($this->deleteId);
                if ($permission) {
                    $permission->delete();
                    session()->flash('message', 'Izin berhasil dihapus!');
                }
            } catch (\Exception $e) {
                session()->flash('error', 'Gagal menghapus izin.');
            }
        }
        $this->confirmingDelete = false;
        $this->deleteId = '';
    }
    public function render()
    {
        return view('livewire.users.users', [
            'roles' => Role::all(),
            'userGroups' => UserGroup::all(),
            'users' => UserModel::with(['roles', 'userGroup'])
            ->orderBy('created_at', 'desc')
            ->paginate(10)
        ]);
    }
}
