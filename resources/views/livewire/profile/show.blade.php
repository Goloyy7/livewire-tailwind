<div class="min-h-screen bg-gray-100 dark:bg-gray-900">
    <!-- Page Heading -->
    <header class="bg-white dark:bg-gray-800 shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Profile') }}
            </h2>
        </div>
    </header>

    <!-- Page Content -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="space-y-16"> <!-- Increased spacing -->
                <!-- Profile Information -->
                <div class="bg-white dark:bg-gray-800 shadow-lg sm:rounded-lg overflow-hidden">
                    <div class="p-6 sm:p-8">
                        <div class="max-w-xl mx-auto">
                            @livewire('App\Livewire\Profile\UpdateProfileInformationForm')
                        </div>
                    </div>
                </div>

                <!-- Update Password -->
                <div class="bg-white dark:bg-gray-800 shadow-lg sm:rounded-lg overflow-hidden">
                    <div class="p-6 sm:p-8">
                        <div class="max-w-xl mx-auto">
                            @livewire('App\Livewire\Profile\UpdatePasswordForm')
                        </div>
                    </div>
                </div>

                <!-- Browser Sessions -->
                <div class="bg-white dark:bg-gray-800 shadow-lg sm:rounded-lg overflow-hidden">
                    <div class="p-6 sm:p-8">
                        <div class="max-w-xl mx-auto">
                            @livewire('App\Livewire\Profile\LogoutOtherBrowserSessionForm')
                        </div>
                    </div>
                </div>

                <!-- Delete Account -->
                <div class="bg-white dark:bg-gray-800 shadow-lg sm:rounded-lg overflow-hidden">
                    <div class="p-6 sm:p-8">
                        <div class="max-w-xl mx-auto">
                            @livewire('App\Livewire\Profile\DeleteUserForm')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
