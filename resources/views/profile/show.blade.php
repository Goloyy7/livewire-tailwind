<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="space-y-6">
                @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                    <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                        @livewire('profile.update-profile-information-form')
                    </div>
                @endif

                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                    <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                        @livewire('profile.update-password-form')
                    </div>
                @endif

                <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    @livewire('profile.logout-other-browser-session-form')
                </div>

                @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                    <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                        @livewire('profile.delete-user-form')
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
