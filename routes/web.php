<?php

use App\Livewire\Register;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Livewire\Login;
use App\Livewire\Permissions;
use App\Livewire\PermissionsCreate;
use App\Livewire\Roles;
use App\Livewire\RolesCreate;
use App\Livewire\Users;
use App\Livewire\UsersCreate;
use App\Livewire\UsersGroup;
use App\Livewire\UsersGroupCreate;
use App\Livewire\UsersManagement;

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
    // Dashboard routes
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/analytics', [DashboardController::class, 'analytics'])->name('analytics');
    Route::get('/dashboard/fintech', [DashboardController::class, 'fintech'])->name('fintech');

    // User management routes
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/tables/users',[Users::class, 'render'])->name('users');

        
        
        // Route::get('/tables/users/create',[UsersCreate::class])->name('users-create');
        // Route::get('/tables/users/{id}/edit',[UsersCreate::class])->name('users-edit');
        
        Route::get('/tables/users-group',[UsersGroup::class, 'render'])->name('users-group');
        Route::get('/tables/users-group/create', [UsersGroupCreate::class, 'render'])->name('users-group-create');

        Route::get('/tables/users-management',[UsersManagement::class, 'render'])->name('users-management');
        Route::get('/tables/users-management/create', [UsersCreate::class, 'render'])->name('users-create');

        Route::get('/roles',[Roles::class, 'render'])->name('roles');
        Route::get('/roles/create',[RolesCreate::class, 'render'])->name('roles-create');

        Route::get('/permissions',Permissions::class)->name('permissions');
        Route::get('/permissions/create', PermissionsCreate::class)->name('permissions-create');
        Route::get('/permissions/{permissionId}/edit', PermissionsCreate::class)->name('permissions-edit');
    });

        // Error handling
        Route::fallback(function() {
            return view('pages/utility/404');
        });
    });
