<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Features\SupportPagination\WithPagination as LivewirePagination;
use App\Models\Permission;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class Permissions extends Component
{
    use WithPagination;

    public $search = '';
    public $deleteId = '';
    public $confirmingDelete = false;

    public function updatingSearch()
    {
        $this->resetPage();
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
                $permission = Permission::find($this->deleteId);
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
        return view('livewire.permissions', [
            'permissions' => Permission::when($this->search, function($query) {
                return $query->where('name', 'like', '%' . $this->search . '%')
                           ->orWhere('description', 'like', '%' . $this->search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10),
            'confirmingDelete' => $this->confirmingDelete,
        ]);
    }
}
