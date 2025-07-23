<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use App\Models\UserGroup;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UsersCreate extends Component
{
    public $userId;
    public $name;
    public $email;
    public $password;
    public $role;
    public $userGroup;

    protected function rules()
    {
        return [
            'name' => 'required|min:3',
            'email' => ['required', 'email', $this->userId ? 'unique:users,email,'.$this->userId : 'unique:users'],
            'password' => $this->userId ? 'nullable|min:6' : 'required|min:6',
            'role' => 'required',
            'userGroup' => 'nullable'
        ];
    }

    protected $messages = [
        'name.required' => 'Nama pengguna harus diisi',
        'name.min' => 'Nama pengguna minimal 3 karakter',
        'email.required' => 'Email harus diisi',
        'email.email' => 'Format email tidak valid',
        'email.unique' => 'Email sudah terdaftar',
        'password.required' => 'Password harus diisi',
        'password.min' => 'Password minimal 6 karakter',
        'role.required' => 'Role harus dipilih',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $this->userId = $id;
            $user = User::findOrFail($id);
            $this->name = $user->name;
            $this->email = $user->email;
            $this->role = $user->roles->first()->id ?? null;
            $this->userGroup = $user->user_group_id;
        }
    }

    public function store()
    {
        $this->validate();

        try {
            $data = [
                'name' => $this->name,
                'email' => $this->email,
                'user_group_id' => $this->userGroup
            ];

            if ($this->userId) {
                $user = User::findOrFail($this->userId);
                if ($this->password) {
                    $data['password'] = Hash::make($this->password);
                }
                $user->update($data);
            } else {
                $data['password'] = Hash::make($this->password);
                $user = User::create($data);
            }

            if ($this->role) {
                $role = Role::findById($this->role);
                $user->syncRoles([$role]);
            }

            session()->flash('message', $this->userId ? 'Pengguna berhasil diperbarui!' : 'Pengguna berhasil dibuat!');
            return redirect()->route('users-management');
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.users.users-create', [
            'roles' => Role::all(),
            'userGroups' => UserGroup::all()
        ]);
    }
    public function cancel()
    {
        return redirect()->route('users-management');
    }
}