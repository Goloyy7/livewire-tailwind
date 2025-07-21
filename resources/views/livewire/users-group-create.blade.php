<div>
        <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

            <!-- Dashboard actions -->
            <div class="sm:flex sm:justify-between sm:items-center mb-8">
                
                <!-- Left: Title -->
                <div class="mb-4 sm:mb-0">
                    <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Tables</h1>
                </div>
                
                <!-- Right: Actions -->
                <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">
                    
                   
                    
                </div>
                
            </div>
            
            <!-- Content -->
            <div class="flex flex-col col-span-full bg-white dark:bg-gray-800 shadow-xs rounded-xl">
                <div class="px-5 pt-5">
                    <header class="flex justify-between items-start mb-2">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                            Tambah Grup Pengguna
                        </h2>
                    </header>
                    <div class="text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase mb-4">
                        Isi detail grup pengguna di bawah ini
                    </div>
                </div>

                <div class="p-5">
                    <form class="space-y-4" wire:submit.prevent="store">
                        <h3 class="text-md font-semibold text-gray-800 dark:text-gray-100 mb-4 border-b border-gray-200 dark:border-gray-700 pb-2">Informasi Grup</h3>
                        
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Nama Grup:</label>
                            <input type="text" id="name" name="name" wire:model="name"
                                placeholder="Masukkan Nama Grup"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-100 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline border-gray-200 dark:border-gray-600">
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Deskripsi:</label>
                            <textarea id="description" name="description"  wire:model="description"
                                    rows="3" 
                                    placeholder="Masukkan deskripsi grup"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-100 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline border-gray-200 dark:border-gray-600"></textarea>
                        </div>

                        <div class="mt-8 pt-4 border-t border-gray-200 dark:border-gray-700 flex justify-end space-x-3">
                            <button type="button" wire:click="cancel"
                                class="px-4 py-2 text-base font-semibold text-gray-700 dark:text-gray-300 bg-gray-200 dark:bg-gray-700 rounded-lg shadow-md hover:bg-gray-300 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-gray-200">
                                Batal
                            </button>
                            <button type="submit" 
                                class="px-4 py-2 text-base font-semibold text-white bg-purple-600 rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200">
                                 {{ $groupId ? 'Update Grup' : 'Simpan Grup' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            
        </div>
</div>
