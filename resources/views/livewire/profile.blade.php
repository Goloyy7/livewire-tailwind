<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ session('status') }}
        </div>
    @endif

    <!-- Profile Photo -->
    <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6 mb-6">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Profile Photo</h2>
        <div class="mt-4 flex items-center">
            <div class="mr-4">
                @if(Auth::user()->profile_photo_path)
                    <img class="h-20 w-20 rounded-full object-cover" src="{{ Storage::url(Auth::user()->profile_photo_path) }}" alt="{{ Auth::user()->name }}" />
                @else
                    <div class="h-20 w-20 rounded-full flex items-center justify-center text-xl font-medium text-white {{ $this->getRandomColor() }}">
                        {{ $this->getInitials(Auth::user()->name) }}
                    </div>
                @endif
            </div>
            <div class="flex-1">
                <input type="file" wire:model="photo" class="hidden" id="photo" />
                <label for="photo" class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:text-gray-500 dark:hover:text-gray-400 focus:outline-none focus:border-gray-300 dark:focus:border-gray-600 focus:ring focus:ring-gray-200 dark:focus:ring-gray-700 active:text-gray-800 dark:active:text-gray-200 disabled:opacity-25 transition cursor-pointer">
                    Select A New Photo
                </label>
                @if(Auth::user()->profile_photo_path)
                    <button wire:click="deleteProfilePhoto" type="button" class="ml-2 inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md font-semibold text-xs text-red-500 uppercase tracking-widest shadow-sm hover:text-red-400 focus:outline-none focus:border-red-300 focus:ring focus:ring-red-200 active:text-red-800 disabled:opacity-25 transition">
                        Remove Photo
                    </button>
                @endif
            </div>
        </div>
        @error('photo') <span class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</span> @enderror
    </div>

    <!-- Profile Information -->
    <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6 mb-6">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Profile Information</h2>
        <form wire:submit.prevent="updateProfile">
            <!-- Name -->
            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Name</label>
                <input wire:model="name" type="text" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-violet-500 dark:focus:border-violet-600 focus:ring-violet-500 dark:focus:ring-violet-600 rounded-md shadow-sm" />
                @error('name') <span class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</span> @enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Email</label>
                <input wire:model="email" type="email" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-violet-500 dark:focus:border-violet-600 focus:ring-violet-500 dark:focus:ring-violet-600 rounded-md shadow-sm" />
                @error('email') <span class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="inline-flex items-center px-4 py-2 bg-violet-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-violet-700 active:bg-violet-900 focus:outline-none focus:border-violet-900 focus:ring focus:ring-violet-300 disabled:opacity-25 transition">
                Save
            </button>
        </form>
    </div>

    <!-- Update Password -->
    <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Update Password</h2>
        <form wire:submit.prevent="updatePassword">
            <!-- Current Password -->
            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Current Password</label>
                <input wire:model="current_password" type="password" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-violet-500 dark:focus:border-violet-600 focus:ring-violet-500 dark:focus:ring-violet-600 rounded-md shadow-sm" />
                @error('current_password') <span class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</span> @enderror
            </div>

            <!-- New Password -->
            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">New Password</label>
                <input wire:model="password" type="password" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-violet-500 dark:focus:border-violet-600 focus:ring-violet-500 dark:focus:ring-violet-600 rounded-md shadow-sm" />
                @error('password') <span class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</span> @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Confirm Password</label>
                <input wire:model="password_confirmation" type="password" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-violet-500 dark:focus:border-violet-600 focus:ring-violet-500 dark:focus:ring-violet-600 rounded-md shadow-sm" />
            </div>

            <button type="submit" class="inline-flex items-center px-4 py-2 bg-violet-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-violet-700 active:bg-violet-900 focus:outline-none focus:border-violet-900 focus:ring focus:ring-violet-300 disabled:opacity-25 transition">
                Save
            </button>
        </form>
    </div>
</div>
