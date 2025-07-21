<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Role as RolesModel;

class Roles extends Component
{
    use WithPagination;
    protected $listeners = ['roleCreated' => '$refresh'];
    public $deleteId = '';
    public $confirmingDelete = false;
    protected $paginationTheme = 'tailwind';

    public function render()
    {
        return view('livewire.roles', [
            'roles' => RolesModel::orderBy('created_at', 'desc')->paginate(10),
        ]);
    }

    public function confirmDelete($id)
    {
        $this->confirmingDelete = true;
        $this->deleteId = $id;
    }

    public function deletePermission()
    {
        if ($this->deleteId) {
            try {
                $roles = RolesModel::find($this->deleteId);
                if ($roles) {
                    $roles->delete();
                    session()->flash('message', 'Izin berhasil dihapus!');
                }
            } catch (\Exception $e) {
                session()->flash('error', 'Gagal menghapus izin.');
            }
        }
        $this->confirmingDelete = false;
        $this->deleteId = '';
    }
}
