<div class="flex flex-col col-span-full bg-white dark:bg-gray-800 shadow-xs rounded-xl">
    <div class="px-5 pt-5">
        <header class="flex justify-between items-start mb-2">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Tambah/Edit Pengguna</h2>
        </header>
        <div class="text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase mb-4">
            Isi detail pengguna di bawah ini
        </div>
    </div>

    <div class="p-5">
        <div id="form-message" class="hidden bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3 dark:bg-teal-800 dark:text-teal-100" role="alert">
            <div class="flex">
                <div>
                    <p class="text-sm"></p>
                </div>
            </div>
        </div>

        <form id="user-form">
            <h3 class="text-md font-semibold text-gray-800 dark:text-gray-100 mb-4 border-b border-gray-200 dark:border-gray-700 pb-2">Informasi Dasar</h3>
            <div class="mb-4">
                <label for="form_name" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Nama:</label>
                <input type="text" id="form_name" name="name" placeholder="Masukkan Nama Lengkap"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-100 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline border-gray-200 dark:border-gray-600">
                <p id="error_name" class="text-red-500 text-xs mt-1 hidden"></p>
            </div>
            <div class="mb-4">
                <label for="form_email" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Email:</label>
                <input type="email" id="form_email" name="email" placeholder="Masukkan Alamat Email"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-100 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline border-gray-200 dark:border-gray-600">
                <p id="error_email" class="text-red-500 text-xs mt-1 hidden"></p>
            </div>
            <div class="mb-4">
                <label for="form_password" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Password:</label>
                <input type="password" id="form_password" name="password" placeholder="Kosongkan jika tidak ingin mengubah"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-100 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline border-gray-200 dark:border-gray-600">
                <p id="error_password" class="text-red-500 text-xs mt-1 hidden"></p>
            </div>

            <h3 class="text-md font-semibold text-gray-800 dark:text-gray-100 mb-4 mt-8 border-b border-gray-200 dark:border-gray-700 pb-2">Grup Pengguna</h3>
            <div class="mb-4">
                <label for="form_user_group_id" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Pilih Grup:</label>
                <select id="form_user_group_id" name="user_group_id"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-100 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline border-gray-200 dark:border-gray-600">
                    <option value="">-- Pilih Grup Pengguna --</option>
                    <option value="1">Administrasi</option>
                    <option value="2">Penjualan</option>
                    <option value="3">Support</option>
                    </select>
                <p id="error_user_group_id" class="text-red-500 text-xs mt-1 hidden"></p>
            </div>

            <h3 class="text-md font-semibold text-gray-800 dark:text-gray-100 mb-4 mt-8 border-b border-gray-200 dark:border-gray-700 pb-2">Peran (Roles)</h3>
            <div class="mb-4 grid grid-cols-1 sm:grid-cols-2 gap-4" id="roles-checkboxes">
                <label class="inline-flex items-center text-gray-700 dark:text-gray-300">
                    <input type="checkbox" name="roles[]" value="1" class="form-checkbox h-5 w-5 text-purple-600 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-offset-gray-800">
                    <span class="ml-2">admin</span>
                </label>
                <label class="inline-flex items-center text-gray-700 dark:text-gray-300">
                    <input type="checkbox" name="roles[]" value="2" class="form-checkbox h-5 w-5 text-purple-600 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-offset-gray-800">
                    <span class="ml-2">editor</span>
                </label>
                <label class="inline-flex items-center text-gray-700 dark:text-gray-300">
                    <input type="checkbox" name="roles[]" value="3" class="form-checkbox h-5 w-5 text-purple-600 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-offset-gray-800">
                    <span class="ml-2">viewer</span>
                </label>
                <label class="inline-flex items-center text-gray-700 dark:text-gray-300">
                    <input type="checkbox" name="roles[]" value="4" class="form-checkbox h-5 w-5 text-purple-600 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-offset-gray-800">
                    <span class="ml-2">manage_products</span>
                </label>
                </div>
            <p id="error_roles" class="text-red-500 text-xs mt-1 hidden"></p>

            <div class="mt-8 pt-4 border-t border-gray-200 dark:border-gray-700 flex justify-end space-x-3">
                <button type="button" id="cancel-user-form" wire:click="cancel"
                        class="px-4 py-2 text-base font-semibold text-gray-700 dark:text-gray-300 bg-gray-200 dark:bg-gray-700 rounded-lg shadow-md hover:bg-gray-300 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-gray-200">
                    Batal
                </button>
                <button type="submit" id="submit-user-form"
                        class="px-4 py-2 text-base font-semibold text-white bg-purple-600 rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200">
                    Simpan Pengguna
                </button>
            </div>
        </form>
    </div>
</div>