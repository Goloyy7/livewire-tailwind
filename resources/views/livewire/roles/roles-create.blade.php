<div>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Dashboard actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-8">

            

            <!-- Right: Actions -->
            <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">

                
                
            </div>

        </div>
        
        <!-- Content -->
        <div class="flex flex-col col-span-full bg-white dark:bg-gray-800 shadow-xs rounded-xl">
            <div class="px-5 pt-5">
                <header class="flex justify-between items-start mb-2">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                        {{ $editMode ? 'Edit Role' : 'Create New Role' }}
                    </h2>
                </header>
                <div class="text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase mb-4">
                    Isi detail peran di bawah ini
                </div>
            </div>

            <div class="p-5">
                <form wire:submit.prevent="save" class="space-y-4">
                    @if (session()->has('message'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">Success!</strong>
                            <span class="block sm:inline">{{ session('message') }}</span>
                        </div>
                    @endif

                    @if (session()->has('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">Error!</strong>
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif

                    <h3 class="text-md font-semibold text-gray-800 dark:text-gray-100 mb-4 border-b border-gray-200 dark:border-gray-700 pb-2">Informasi Peran</h3>
                    
                    <div class="mb-4">
                        <label for="role_name" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Nama Role:</label>
                        <input type="text" id="role_name" wire:model="role_name"
                            placeholder="Masukkan Nama Role"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-100 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline border-gray-200 dark:border-gray-600">
                        @error('role_name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="role_description" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Deskripsi:</label>
                        <textarea id="role_description" wire:model="role_description"
                                rows="3" 
                                placeholder="Masukkan deskripsi peran"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-100 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline border-gray-200 dark:border-gray-600"></textarea>
                        @error('role_description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <h3 class="text-md font-semibold text-gray-800 dark:text-gray-100 mb-4 mt-8 border-b border-gray-200 dark:border-gray-700 pb-2">Hak Akses</h3>
                    
                    <div class="mb-4 grid grid-cols-1 sm:grid-cols-3 gap-4">
                        @foreach($permissions as $module => $modulePermissions)
                        <div class="p-4 border border-gray-200 dark:border-gray-700 rounded-lg">
                            <h4 class="font-semibold text-gray-800 dark:text-gray-100 mb-3">{{ ucfirst($module) }}</h4>
                            <div class="space-y-2">
                                @foreach($modulePermissions as $permission)
                                    <label class="inline-flex items-center text-gray-700 dark:text-gray-300">
                                        <input type="checkbox" 
                                            wire:model="selectedPermissions" 
                                            value="{{ $permission->name }}"
                                            class="form-checkbox h-5 w-5 text-purple-600 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-offset-gray-800">
                                        <span class="ml-2">{{ ucfirst(str_replace('_', ' ', $permission->name)) }}</span>
                                    </label>
                                    <br>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>

                    @error('selectedPermissions') 
                        <div class="text-red-500 text-xs mt-2">{{ $message }}</div> 
                    @enderror

                    <div class="mt-8 pt-4 border-t border-gray-200 dark:border-gray-700 flex justify-end space-x-3">
                        <button type="button" wire:click="cancel"
                            class="px-4 py-2 text-base font-semibold text-gray-700 dark:text-gray-300 bg-gray-200 dark:bg-gray-700 rounded-lg shadow-md hover:bg-gray-300 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-gray-200">
                            Batal
                        </button>
                        <button type="submit"
                            class="px-4 py-2 text-base font-semibold text-white bg-purple-600 rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200">
                            {{ $editMode ? 'Update Peran' : 'Simpan Peran' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
