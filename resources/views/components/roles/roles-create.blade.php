<div class="flex flex-col col-span-full bg-white dark:bg-gray-800 shadow-xs rounded-xl">
    <div class="px-5 pt-5">
        <header class="flex justify-between items-start mb-2">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                Tambah Peran (Role)
            </h2>
        </header>
        <div class="text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase mb-4">
            Isi detail peran di bawah ini
        </div>
    </div>

    <div class="p-5">
        <form class="space-y-4">
            <h3 class="text-md font-semibold text-gray-800 dark:text-gray-100 mb-4 border-b border-gray-200 dark:border-gray-700 pb-2">Informasi Peran</h3>
            
            <div class="mb-4">
                <label for="role_name" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Nama Peran:</label>
                <input type="text" id="role_name" name="role_name"
                       placeholder="Masukkan Nama Peran"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-100 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline border-gray-200 dark:border-gray-600">
            </div>

            <div class="mb-4">
                <label for="role_description" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Deskripsi:</label>
                <textarea id="role_description" name="role_description"
                          rows="3" 
                          placeholder="Masukkan deskripsi peran"
                          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-100 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline border-gray-200 dark:border-gray-600"></textarea>
            </div>

            <h3 class="text-md font-semibold text-gray-800 dark:text-gray-100 mb-4 mt-8 border-b border-gray-200 dark:border-gray-700 pb-2">Hak Akses</h3>
            
            <div class="mb-4 grid grid-cols-1 sm:grid-cols-3 gap-4">
                <!-- Module Users -->
                <div class="p-4 border border-gray-200 dark:border-gray-700 rounded-lg">
                    <h4 class="font-semibold text-gray-800 dark:text-gray-100 mb-3">Users</h4>
                    <div class="space-y-2">
                        <label class="inline-flex items-center text-gray-700 dark:text-gray-300">
                            <input type="checkbox" name="permissions[]" value="view_users"
                                class="form-checkbox h-5 w-5 text-purple-600 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-offset-gray-800">
                            <span class="ml-2">View Users</span>
                        </label>
                        <br>
                        <label class="inline-flex items-center text-gray-700 dark:text-gray-300">
                            <input type="checkbox" name="permissions[]" value="create_users"
                                class="form-checkbox h-5 w-5 text-purple-600 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-offset-gray-800">
                            <span class="ml-2">Create Users</span>
                        </label>
                        <br>
                        <label class="inline-flex items-center text-gray-700 dark:text-gray-300">
                            <input type="checkbox" name="permissions[]" value="edit_users"
                                class="form-checkbox h-5 w-5 text-purple-600 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-offset-gray-800">
                            <span class="ml-2">Edit Users</span>
                        </label>
                        <br>
                        <label class="inline-flex items-center text-gray-700 dark:text-gray-300">
                            <input type="checkbox" name="permissions[]" value="delete_users"
                                class="form-checkbox h-5 w-5 text-purple-600 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-offset-gray-800">
                            <span class="ml-2">Delete Users</span>
                        </label>
                    </div>
                </div>

                <!-- Module Roles -->
                <div class="p-4 border border-gray-200 dark:border-gray-700 rounded-lg">
                    <h4 class="font-semibold text-gray-800 dark:text-gray-100 mb-3">Roles</h4>
                    <div class="space-y-2">
                        <label class="inline-flex items-center text-gray-700 dark:text-gray-300">
                            <input type="checkbox" name="permissions[]" value="view_roles"
                                class="form-checkbox h-5 w-5 text-purple-600 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-offset-gray-800">
                            <span class="ml-2">View Roles</span>
                        </label>
                        <br>
                        <label class="inline-flex items-center text-gray-700 dark:text-gray-300">
                            <input type="checkbox" name="permissions[]" value="create_roles"
                                class="form-checkbox h-5 w-5 text-purple-600 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-offset-gray-800">
                            <span class="ml-2">Create Roles</span>
                        </label>
                        <br>
                        <label class="inline-flex items-center text-gray-700 dark:text-gray-300">
                            <input type="checkbox" name="permissions[]" value="edit_roles"
                                class="form-checkbox h-5 w-5 text-purple-600 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-offset-gray-800">
                            <span class="ml-2">Edit Roles</span>
                        </label>
                        <br>
                        <label class="inline-flex items-center text-gray-700 dark:text-gray-300">
                            <input type="checkbox" name="permissions[]" value="delete_roles"
                                class="form-checkbox h-5 w-5 text-purple-600 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-offset-gray-800">
                            <span class="ml-2">Delete Roles</span>
                        </label>
                    </div>
                </div>

                <!-- Module Settings -->
                <div class="p-4 border border-gray-200 dark:border-gray-700 rounded-lg">
                    <h4 class="font-semibold text-gray-800 dark:text-gray-100 mb-3">Settings</h4>
                    <div class="space-y-2">
                        <label class="inline-flex items-center text-gray-700 dark:text-gray-300">
                            <input type="checkbox" name="permissions[]" value="view_settings"
                                class="form-checkbox h-5 w-5 text-purple-600 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-offset-gray-800">
                            <span class="ml-2">View Settings</span>
                        </label>
                        <br>
                        <label class="inline-flex items-center text-gray-700 dark:text-gray-300">
                            <input type="checkbox" name="permissions[]" value="edit_settings"
                                class="form-checkbox h-5 w-5 text-purple-600 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-offset-gray-800">
                            <span class="ml-2">Edit Settings</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="mt-8 pt-4 border-t border-gray-200 dark:border-gray-700 flex justify-end space-x-3">
                <button type="button" wire:click="cancel"
                    class="px-4 py-2 text-base font-semibold text-gray-700 dark:text-gray-300 bg-gray-200 dark:bg-gray-700 rounded-lg shadow-md hover:bg-gray-300 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-gray-200">
                    Batal
                </button>
                <button type="submit"
                    class="px-4 py-2 text-base font-semibold text-white bg-purple-600 rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200">
                    Simpan Peran
                </button>
            </div>
        </form>
    </div>
</div>