    <div>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <!-- Content -->
        <div class="flex flex-col col-span-full bg-white dark:bg-gray-800 shadow-xs rounded-xl">
            <div class="px-5 pt-5">
                <header class="flex justify-between items-start mb-2">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                        {{ $userId ? 'Edit Pengguna' : 'Tambah Pengguna' }}
                    </h2>
                </header>
                <div class="text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase mb-4">
                    Isi detail pengguna di bawah ini
                </div>
            </div>

            <div class="p-5">
                <form class="space-y-4" wire:submit.prevent="store">
                    <h3 class="text-md font-semibold text-gray-800 dark:text-gray-100 mb-4 border-b border-gray-200 dark:border-gray-700 pb-2">Informasi Pengguna</h3>
                    
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Nama:</label>
                        <input type="text" id="name" wire:model="name"
                            placeholder="Masukkan Nama"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-100 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline border-gray-200 dark:border-gray-600">
                        @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Email:</label>
                        <input type="email" id="email" wire:model="email"
                            placeholder="Masukkan Email"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-100 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline border-gray-200 dark:border-gray-600">
                        @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Password:</label>
                        <input type="password" id="password" wire:model="password"
                            placeholder="{{ $userId ? 'Biarkan kosong jika tidak ingin mengubah password' : 'Masukkan Password' }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-100 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline border-gray-200 dark:border-gray-600">
                        @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="role" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Role:</label>
                        <select id="role" wire:model="role"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-100 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline border-gray-200 dark:border-gray-600">
                            <option value="">Pilih Role</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        @error('role') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    {{-- Tambahkan field User Group di sini --}}
                    <div class="mb-4">
                        <label for="user_group" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Grup Pengguna:</label>
                        <select id="user_group" wire:model="userGroup"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-100 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline border-gray-200 dark:border-gray-600">
                            <option value="">Pilih Grup Pengguna</option>
                            @foreach($userGroups as $group)
                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                            @endforeach
                        </select>
                        @error('userGroup') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    
                    <div class="mt-8 pt-4 border-t border-gray-200 dark:border-gray-700 flex justify-end space-x-3">
                        <button type="button" wire:click="cancel"
                            class="px-4 py-2 text-base font-semibold text-gray-700 dark:text-gray-300 bg-gray-200 dark:bg-gray-700 rounded-lg shadow-md hover:bg-gray-300 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-gray-200">
                            Batal
                        </button>
                        <button type="submit" 
                            class="px-4 py-2 text-base font-semibold text-white bg-purple-600 rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200">
                            {{ $userId ? 'Update Pengguna' : 'Simpan Pengguna' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
