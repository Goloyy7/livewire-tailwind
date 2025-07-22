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
                                                    @elseif ($user->profile_photo_path)
                                                        <img src="{{ Storage::url($user->profile_photo_path) }}" alt="{{ $user->name }}"
                                                            class="h-20 w-20 rounded-full object-cover ring-2 ring-white dark:ring-gray-800 shadow">
                                                    @else
                                                        <div class="h-20 w-20 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                                                            <span class="text-2xl font-medium text-gray-600 dark:text-gray-300">
                                                                {{ $this->getInitials($user->name) }}
                                                            </span>
                                                        </div>
                                                    @endif
                                                </div>
                                                
                                                <!-- Upload Button -->
                                                <div class="flex items-center">
                                                    <input type="file" id="photo" wire:model="photo" class="hidden" accept="image/*">
                                                    <button type="button"
                                                        onclick="document.getElementById('photo').click()"
                                                        class="px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:text-gray-500 dark:hover:text-gray-400 focus:outline-none focus:border-violet-500 focus:ring focus:ring-violet-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition">
                                                        <div class="flex items-center">
                                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                                                            </svg>
                                                            <span wire:loading.remove wire:target="photo">Upload Photo</span>
                                                            <span wire:loading wire:target="photo">Uploading...</span>
                                                        </div>
                                                    </button>
                                                </div>
                                            </div>

                                            <!-- Error Message -->
                                            @error('photo') 
                                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                            @enderror

                                            <!-- Help Text -->
                                            <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                                                JPG, GIF or PNG. Max size of 2MB.
                                            </p>
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