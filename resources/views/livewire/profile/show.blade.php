    <div>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <!-- Page header -->
        <div class="sm:flex sm:justify-between sm:items-center mb-8">
            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Profile Account</h1>
            </div>

            <!-- Right: Actions -->
            <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">
            </div>
        </div>

        <!-- Cards -->
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12"> {{-- Menggunakan grid yang sama dengan dashboard --}}
                    @livewire('profile.update-profile-information-form')

                    @livewire('profile.update-password-form')

                    @livewire('profile.delete-user-form')
                </div>
            </main>
   
    </div>
</div>