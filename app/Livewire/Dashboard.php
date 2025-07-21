<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Dashboard extends Component
{
    public $totalUsers;
    public $totalRoles;
    public $totalPermissions;
    public $recentUsers;
    public $roleDistribution;

    public function mount()
    {
        $this->loadDashboardData();
    }

    public function loadDashboardData()
    {
        // Get total counts
        $this->totalUsers = User::count();
        $this->totalRoles = Role::count();
        $this->totalPermissions = Permission::count();

        // Get recent users with their roles
        $this->recentUsers = User::with('roles')
            ->latest()
            ->take(5)
            ->get();

        // Get role distribution
        $this->roleDistribution = Role::withCount('users')
            ->get()
            ->map(function($role) {
                return [
                    'name' => $role->name,
                    'count' => $role->users_count,
                ];
            });
    }

    public function render()
    {
        return view('livewire.dashboard')
            ->layout('layouts.app');
    }
}
