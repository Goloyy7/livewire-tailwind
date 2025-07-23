<?php

namespace App\Livewire\UsersGroup;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\UserGroup as UsersGroupModel; 

class UsersGroup extends Component
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
                $permission = UsersGroupModel::find($this->deleteId);
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
        return view('livewire.users-group.users-group', [
            'dataGroup' => UsersGroupModel::orderBy('created_at', 'desc')->paginate(3)
        ]);
    }

    public function delete($id)
    {
        UsersGroupModel::findOrFail($id)->delete();
        session()->flash('message', 'Grup berhasil dihapus.');
    }
}
