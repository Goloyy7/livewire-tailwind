<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Dashboard actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-8">

            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Tables</h1>
            </div>

            <!-- Right: Actions -->
            <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">

                <!-- Filter button -->
                <x-dropdown-filter align="right" />

                <!-- Datepicker built with flatpickr -->
                <x-datepicker />

                <!-- Add view button -->
                <button class="btn bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white">
                    <svg class="fill-current shrink-0 xs:hidden" width="16" height="16" viewBox="0 0 16 16">
                        <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                  </svg>
                  <span class="max-xs:sr-only">Add View</span>
                </button>
                
            </div>

        </div>
        
        <!-- Content -->
        <div class="flex flex-col col-span-full bg-white dark:bg-gray-800 shadow-xs rounded-xl">
            <div class="px-5 pt-5">
                <header class="flex justify-between items-start mb-2">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Daftar Peran (Roles)</h2>
                    <div class="relative inline-flex">
                        <button class="px-4 py-2 text-base font-semibold text-white bg-purple-600 rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200">
                            Tambah Peran
                        </button>
                    </div>
                </header>
                <div class="text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase mb-4">Kelola peran pengguna</div>
            </div>

            <div class="p-5 overflow-x-auto">
                <table class="min-w-full leading-normal">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-700 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                Nama Peran
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-700 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                Tanggal Dibuat
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-700">
                                <span class="sr-only">Aksi</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm">
                                <p class="text-gray-900 dark:text-gray-100 whitespace-no-wrap">admin</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm">
                                <p class="text-gray-900 dark:text-gray-100 whitespace-no-wrap">2025-01-15</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm text-right">
                                <button class="text-sm font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-300 mr-2">Edit</button>
                                <button class="text-sm font-medium text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-300">Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm">
                                <p class="text-gray-900 dark:text-gray-100 whitespace-no-wrap">editor</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm">
                                <p class="text-gray-900 dark:text-gray-100 whitespace-no-wrap">2025-01-15</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm text-right">
                                <button class="text-sm font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-300 mr-2">Edit</button>
                                <button class="text-sm font-medium text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-300">Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm">
                                <p class="text-gray-900 dark:text-gray-100 whitespace-no-wrap">viewer</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm">
                                <p class="text-gray-900 dark:text-gray-100 whitespace-no-wrap">2025-01-15</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm text-right">
                                <button class="text-sm font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-300 mr-2">Edit</button>
                                <button class="text-sm font-medium text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-300">Hapus</button>
                            </td>
                        </tr>
                        </tbody>
                </table>
            </div>

            <div class="px-5 py-3 bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 flex flex-col sm:flex-row items-center justify-between">
                <span class="text-xs sm:text-sm text-gray-900 dark:text-gray-100">
                    Menampilkan 1 sampai 3 dari 3 data
                </span>
                <div class="inline-flex mt-2 sm:mt-0">
                    <button class="text-sm bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 text-gray-800 dark:text-gray-100 font-semibold py-2 px-4 rounded-l">
                        Prev
                    </button>
                    <button class="text-sm bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 text-gray-800 dark:text-gray-100 font-semibold py-2 px-4 rounded-r">
                        Next
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
