<div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg border border-gray-200 dark:border-gray-700">
                        <div class="p-6">
                            <div class="md:grid md:grid-cols-3 md:gap-6">
                                <div class="md:col-span-1">
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Profile Information</h3>
                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                        Update your account's profile information and email address.
                                    </p>
                                </div>

                                <div class="mt-8 md:mt-0 md:col-span-2"> {{-- Margin top untuk mobile, dihilangkan di desktop --}}
                                    <form wire:submit.prevent="updateProfileInformation" class="space-y-6"> {{-- Menambah space-y untuk jarak antar grup input --}}
                                        <div class="space-y-2">
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Photo</label>
                                            <div class="flex items-center gap-x-6">
                                                <div class="relative">
                                                    @if ($photo)
                                                        <img src="{{ $photo->temporaryUrl() }}" alt="Preview"
                                                            class="h-20 w-20 rounded-full object-cover ring-2 ring-violet-500 shadow">
                                                    @else
                                                        <img src="{{ Storage::url(auth()->user()->profile_photo_path) }}" alt="{{ auth()->user()->name }}"
                                                            class="h-20 w-20 rounded-full object-cover ring-2 ring-white dark:ring-gray-800 shadow">
                                                    @endif
                                                    <button type="button"
                                                        class="absolute bottom-0 right-0 rounded-full bg-white dark:bg-gray-800 p-1.5 shadow-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200"
                                                        x-on:click="$refs.photo.click()">
                                                        <svg class="h-5 w-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                                <input type="file" class="hidden" 
                                                    wire:model="photo" 
                                                    x-ref="photo"
                                                    accept="image/*">
                                                @error('photo') 
                                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            @if ($photo)
                                                <div class="text-sm text-gray-500 dark:text-gray-400">
                                                    Click 'Save Changes' to update your profile photo
                                                </div>
                                            @endif
                                        </div>

                                        <div>
                                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                                            <input id="name" type="text"
                                                wire:model.defer="state.name"
                                                class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 shadow-sm focus:border-violet-500 focus:ring-violet-500">
                                            @error('state.name') <span class="text-red-400 text-sm mt-1 block">{{ $message }}</span> @enderror
                                        </div>

                                        <div>
                                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                                            <input id="email" type="email"
                                                wire:model.defer="state.email"
                                                class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 shadow-sm focus:border-violet-500 focus:ring-violet-500">
                                            @error('state.email') <span class="text-red-400 text-sm mt-1 block">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="flex justify-end pt-4"> {{-- Padding top untuk tombol, dan justify-end untuk menempatkan tombol di kanan --}}
                                            <button type="submit"
                                                class="inline-flex justify-center rounded-lg bg-violet-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-violet-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-600 dark:hover:bg-violet-500/90 transition-colors duration-150">
                                                Save Changes
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>