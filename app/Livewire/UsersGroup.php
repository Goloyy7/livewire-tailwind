<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\UserGroup as UsersGroupModel; 

class UsersGroup extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public function render()
    {
        return view('livewire.users-group', [
            'dataGroup' => UsersGroupModel::orderBy('created_at', 'desc')->paginate(3)
        ]);
    }

    public function delete($id)
    {
        UsersGroupModel::findOrFail($id)->delete();
        session()->flash('message', 'Grup berhasil dihapus.');
    }
}
