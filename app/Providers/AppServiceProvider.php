<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use App\Livewire\Profile\UpdateProfileInformationForm;
use App\Livewire\Profile\UpdatePasswordForm;
use App\Livewire\Profile\DeleteUserForm;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Livewire::component('profile.update-profile-information-form', UpdateProfileInformationForm::class);
        Livewire::component('profile.update-password-form', UpdatePasswordForm::class);
        Livewire::component('profile.delete-user-form', DeleteUserForm::class);
    }
}
