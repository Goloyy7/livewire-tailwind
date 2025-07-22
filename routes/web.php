<?php

use App\Livewire\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Livewire\Login;
use App\Livewire\Permissions;
use App\Livewire\PermissionsCreate;
use App\Livewire\Profile\Show;
use App\Livewire\Roles;
use App\Livewire\RolesCreate;
use App\Livewire\Settings;
use App\Livewire\Users;
use App\Livewire\UsersGroup;
use App\Livewire\UsersGroupCreate;
use App\Livewire\UsersManagement;
use App\Livewire\UsersManagementCreate;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', 'login');

// Guest routes
Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
});

// Protected routes
Route::middleware(['auth'])->group(function () {
    // Dashboard routes - accessible by all authenticated users
    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    // Admin only routes
    Route::middleware(['auth'])->group(function () {
        Route::get('/users-group', UsersGroup::class)->name('users-group');
        Route::get('/users-group/create', UsersGroupCreate::class)->name('users-group-create');
        Route::get('/users-group/{id}/edit/', UsersGroupCreate::class)->name('users-group-edit');
        
        // Profile routes
        Route::get('/profile', Show::class)->name('profile.show');

        Route::get('/users-management',UsersManagement::class)->name('users-management');
        Route::get('/users-management/create', UsersManagementCreate::class)->name('users-management-create');
        Route::get('/users-management/{id}/edit', UsersManagementCreate::class)->name('users-management-edit');

        Route::get('/roles', Roles::class)->name('roles');
        Route::get('/roles/create', RolesCreate::class)->name('roles-create');
        Route::get('/roles/{roleId}/edit', RolesCreate::class)->name('roles-edit');

        Route::get('/permissions',Permissions::class)->name('permissions');
        Route::get('/permissions/create', PermissionsCreate::class)->name('permissions-create');
        Route::get('/permissions/{permissionId}/edit', PermissionsCreate::class)->name('permissions-edit');

        Route::get('/settings',Settings::class)->name('settings');
    });

        // Error handling
        Route::fallback(function() {
            return view('pages/utility/404');
        });
    });
