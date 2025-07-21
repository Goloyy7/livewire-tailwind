<div class="flex flex-col col-span-full bg-white dark:bg-gray-800 shadow-xs rounded-xl">
    <div class="px-5 pt-5">
        <header class="flex justify-between items-start mb-2">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                Tambah Izin (Permission)
            </h2>
        </header>
        <div class="text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase mb-4">
            Isi detail izin di bawah ini
        </div>
    </div>

    <div class="p-5">
        <form class="space-y-4">
            <h3 class="text-md font-semibold text-gray-800 dark:text-gray-100 mb-4 border-b border-gray-200 dark:border-gray-700 pb-2">Informasi Izin</h3>
            
            <div class="mb-4">
                <label for="permission_name" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Nama Izin:</label>
                <input type="text" id="permission_name" name="permission_name"
                       placeholder="Contoh: create_users, edit_roles, dll"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-100 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline border-gray-200 dark:border-gray-600">
            </div>

            <div class="mb-4">
                <label for="guard_name" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Guard Name:</label>
                <select id="guard_name" name="guard_name"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-100 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline border-gray-200 dark:border-gray-600">
                    <option value="web">web</option>
                    <option value="api">api</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="permission_description" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Deskripsi:</label>
                <textarea id="permission_description" name="permission_description"
                          rows="3" 
                          placeholder="Jelaskan kegunaan izin ini"
                          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-100 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline border-gray-200 dark:border-gray-600"></textarea>
            </div>

            <h3 class="text-md font-semibold text-gray-800 dark:text-gray-100 mb-4 mt-8 border-b border-gray-200 dark:border-gray-700 pb-2">Modul Terkait</h3>
            
            <div class="mb-4">
                <label for="module" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Pilih Modul:</label>
                <select id="module" name="module"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-100 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline border-gray-200 dark:border-gray-600">
                    <option value="">-- Pilih Modul --</option>
                    <option value="users">Users</option>
                    <option value="roles">Roles</option>
                    <option value="permissions">Permissions</option>
                    <option value="settings">Settings</option>
                </select>
            </div>

            <h3 class="text-md font-semibold text-gray-800 dark:text-gray-100 mb-4 mt-8 border-b border-gray-200 dark:border-gray-700 pb-2">Tipe Akses</h3>
            
            <div class="mb-4 grid grid-cols-2 sm:grid-cols-4 gap-4">
                <label class="inline-flex items-center text-gray-700 dark:text-gray-300">
                    <input type="radio" name="access_type" value="view"
                        class="form-radio h-5 w-5 text-purple-600 dark:bg-gray-700 dark:border-gray-600">
                    <span class="ml-2">View</span>
                </label>
                <label class="inline-flex items-center text-gray-700 dark:text-gray-300">
                    <input type="radio" name="access_type" value="create"
                        class="form-radio h-5 w-5 text-purple-600 dark:bg-gray-700 dark:border-gray-600">
                    <span class="ml-2">Create</span>
                </label>
                <label class="inline-flex items-center text-gray-700 dark:text-gray-300">
                    <input type="radio" name="access_type" value="edit"
                        class="form-radio h-5 w-5 text-purple-600 dark:bg-gray-700 dark:border-gray-600">
                    <span class="ml-2">Edit</span>
                </label>
                <label class="inline-flex items-center text-gray-700 dark:text-gray-300">
                    <input type="radio" name="access_type" value="delete"
                        class="form-radio h-5 w-5 text-purple-600 dark:bg-gray-700 dark:border-gray-600">
                    <span class="ml-2">Delete</span>
                </label>
            </div>

            <div class="mt-8 pt-4 border-t border-gray-200 dark:border-gray-700 flex justify-end space-x-3">
                <button type="button" wire:click="cancel"
                    class="px-4 py-2 text-base font-semibold text-gray-700 dark:text-gray-300 bg-gray-200 dark:bg-gray-700 rounded-lg shadow-md hover:bg-gray-300 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-gray-200">
                    Batal
                </button>
                <button type="submit"
                    class="px-4 py-2 text-base font-semibold text-white bg-purple-600 rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200">
                    Simpan Izin
                </button>
            </div>
        </form>
    </div>
</div>