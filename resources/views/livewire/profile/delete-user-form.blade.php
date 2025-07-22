<div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg border border-gray-200 dark:border-gray-700 mt-6">
    <div class="p-6">
                            <div class="md:grid md:grid-cols-3 md:gap-6">
                                <div class="md:col-span-1">
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Delete Account</h3>
                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                        Permanently delete your account.
                                    </p>
                                </div>

                                <div class="mt-8 md:mt-0 md:col-span-2">
                                    <div class="space-y-6"> {{-- Menambah space-y untuk jarak antar paragraf dan tombol --}}
                                        <p class="text-sm text-gray-500 dark:text-gray-400 leading-relaxed">
                                            Once your account is deleted, all of its resources and data will be permanently deleted.
                                            Before deleting your account, please download any data or information that you wish to retain.
                                        </p>

                                        <div>
                                            <button type="button" wire:click="confirmDelete({{ $item->id }})" class="inline-flex justify-center rounded-lg bg-red-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600 dark:hover:bg-red-500/90 transition-colors duration-150">
                                                <span wire:loading.remove wire:target="confirmDelete({{ $item->id }})">Delete Account</span>
                                                <span wire:loading wire:target="confirmDelete({{ $item->id }})" class="inline-flex items-center px-[0.72rem]">
                                                    <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                                    </svg>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
    </div>
    <!-- Delete Modal -->
        @if($confirmingDelete)
        <div class="relative z-50" 
             aria-labelledby="modal-title" 
             role="dialog" 
             aria-modal="true">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
            <div class="fixed inset-0 z-50 overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div class="relative transform overflow-hidden rounded-lg bg-white dark:bg-gray-800 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                        <div class="bg-white dark:bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 dark:bg-red-900/20 sm:mx-0 sm:h-10 sm:w-10">
                                    <svg class="h-6 w-6 text-red-600 dark:text-red-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                    </svg>
                                </div>
                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                    <h3 class="text-base font-semibold leading-6 text-gray-900 dark:text-gray-100" id="modal-title">
                                        Delete Account
                                    </h3>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500 dark:text-gray-400">
                                            Are you sure you want to delete your account? This action cannot be undone.
                                        </p>
                                        <div class="mt-4">
                                            <input type="password"
                                                wire:model="password"
                                                class="block w-full rounded-lg border-0 bg-white py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-violet-600 dark:bg-gray-900 dark:text-gray-100 dark:ring-gray-700 dark:placeholder:text-gray-500 dark:focus:ring-violet-500 sm:text-sm sm:leading-6"
                                                placeholder="Enter your password to confirm">
                                            @error('password') 
                                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-700 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                            <button wire:click="deleteUser" type="button" class="inline-flex w-full justify-center rounded-lg bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">
                                <span wire:loading.remove wire:target="deleteUser">Delete Account</span>
                                <span wire:loading wire:target="deleteUser" class="inline-flex items-center">
                                    <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    Processing...
                                </span>
                            </button>
                            <button wire:click="$set('confirmingDelete', false)" type="button" class="mt-3 inline-flex w-full justify-center rounded-lg bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto dark:bg-gray-800 dark:text-gray-100 dark:ring-gray-600 dark:hover:bg-gray-700/50">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
                    </div>
                </div>
            </div>
        </div>
</div>