<div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg border border-gray-200 dark:border-gray-700 mt-6">
                        <div class="p-6">
                            <div class="md:grid md:grid-cols-3 md:gap-6">
                                <div class="md:col-span-1">
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Update Password</h3>
                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                        Ensure your account is using a long, random password to stay secure.
                                    </p>
                                </div>

                                <div class="mt-8 md:mt-0 md:col-span-2">
                                    <form wire:submit.prevent="updatePassword" class="space-y-6">
                                        @if($showSuccessMessage)
                                        <div class="rounded-md bg-green-50 dark:bg-green-900/50 p-4 mb-4">
                                            <div class="flex">
                                                <div class="flex-shrink-0">
                                                    <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                                <div class="ml-3">
                                                    <p class="text-sm font-medium text-green-800 dark:text-green-200">
                                                        Password updated successfully!
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                        <div>
                                            <label for="current_password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Current Password</label>
                                            <div class="relative">
                                                <input id="current_password" type="password"
                                                    wire:model.defer="state.current_password"
                                                    class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 shadow-sm focus:border-violet-500 focus:ring-violet-500 pr-12"> {{-- pr-12 untuk memberi ruang pada ikon mata --}}
                                                <button type="button"
                                                    class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-500 dark:text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 focus:outline-none transition-colors duration-150"
                                                    onclick="togglePasswordVisibility('current_password')"> {{-- Function untuk toggle password visibility --}}
                                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                </button>
                                            </div>
                                            @error('state.current_password') <span class="text-red-400 text-sm mt-1 block">{{ $message }}</span> @enderror
                                        </div>

                                        <div>
                                            <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">New Password</label>
                                            <div class="relative">
                                                <input id="password" type="password"
                                                    wire:model.defer="state.password"
                                                    class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 shadow-sm focus:border-violet-500 focus:ring-violet-500 pr-12">
                                                <button type="button"
                                                    class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-500 dark:text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 focus:outline-none transition-colors duration-150"
                                                    onclick="togglePasswordVisibility('password')">
                                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                </button>
                                            </div>
                                            @error('state.password') <span class="text-red-400 text-sm mt-1 block">{{ $message }}</span> @enderror
                                        </div>

                                        <div>
                                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Confirm Password</label>
                                            <div class="relative">
                                                <input id="password_confirmation" type="password"
                                                    wire:model.defer="state.password_confirmation"
                                                    class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 shadow-sm focus:border-violet-500 focus:ring-violet-500 pr-12">
                                                <button type="button"
                                                    class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-500 dark:text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 focus:outline-none transition-colors duration-150"
                                                    onclick="togglePasswordVisibility('password_confirmation')">
                                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                </button>
                                            </div>
                                            @error('state.password_confirmation') <span class="text-red-400 text-sm mt-1 block">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="flex justify-end pt-4">
                                            <button type="submit"
                                                class="inline-flex justify-center rounded-md bg-violet-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-violet-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-600 dark:hover:bg-violet-500">
                                                Save Password
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                         <script>
                            // JavaScript untuk toggle password visibility
                            function togglePasswordVisibility(id) {
                                const input = document.getElementById(id);
                                if (input.type === 'password') {
                                    input.type = 'text';
                                } else {
                                    input.type = 'password';
                                }
                            }
                        </script>
                    </div>