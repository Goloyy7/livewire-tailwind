<div>
    <x-form-section submit="updateProfileInformation">
        <x-slot name="title">
            {{ __('Profile Information') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Update your account\'s profile information and email address.') }}
        </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" id="photo" class="hidden"
                            wire:model.live="photo"
                            x-ref="photo"
                            accept="image/*"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-label for="photo" value="{{ __('Photo') }}" class="mb-2" />

                <div class="mt-2 flex items-center space-x-4">
                    <!-- Current Profile Photo -->
                    <div x-show="! photoPreview" class="relative group">
                        <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" 
                            class="rounded-full h-20 w-20 object-cover ring-2 ring-white dark:ring-gray-700 shadow-lg transition duration-150 ease-in-out group-hover:shadow-xl">
                        <div class="absolute inset-0 rounded-full bg-gray-900 bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                            <button type="button" x-on:click.prevent="$refs.photo.click()" class="text-white">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- New Profile Photo Preview -->
                    <div x-show="photoPreview" style="display: none;" class="relative">
                        <span class="block rounded-full h-20 w-20 bg-cover bg-no-repeat bg-center ring-2 ring-white dark:ring-gray-700 shadow-lg"
                              x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                        </span>
                        <button type="button" class="absolute bottom-0 right-0 -mb-1 -mr-1 p-1 rounded-full bg-red-500 text-white shadow-lg hover:bg-red-600 transition-colors duration-150"
                                wire:click="deleteProfilePhoto">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <div class="flex flex-col space-y-2">
                        <x-secondary-button type="button" x-on:click.prevent="$refs.photo.click()" class="whitespace-nowrap">
                            {{ __('Change Photo') }}
                        </x-secondary-button>

                        @if ($this->user->profile_photo_path)
                            <x-danger-button type="button" wire:click="deleteProfilePhoto" class="whitespace-nowrap">
                                {{ __('Remove Photo') }}
                            </x-danger-button>
                        @endif
                    </div>
                </div>
            </div>
        @endif

                <x-input-error for="photo" class="mt-2" />
            </div>

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Name') }}" />
            <div class="relative">
                <x-input id="name" 
                    type="text" 
                    class="mt-1 block w-full pl-10" 
                    wire:model.live="state.name" 
                    required 
                    autocomplete="name" />
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
            </div>
            <x-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="{{ __('Email') }}" />
            <div class="relative">
                <x-input id="email" 
                    type="email" 
                    class="mt-1 block w-full pl-10" 
                    wire:model.live="state.email" 
                    required 
                    autocomplete="username" />
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                    </svg>
                </div>
            </div>
            <x-input-error for="email" class="mt-2" />

            <!-- Success Message -->
            <div x-data="{ show: false }"
                x-show="show"
                x-on:profile-updated.window="
                    show = true;
                    setTimeout(() => show = false, 2000);
                "
                style="display: none;"
                class="mt-4 py-3 px-4 rounded-md bg-green-50 dark:bg-green-900/50">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-green-700 dark:text-green-200">
                            {{ __('Profile information has been updated successfully.') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>

</div>
