<div class="flex flex-col col-span-full bg-white dark:bg-gray-800 shadow-xs rounded-xl">
            <div class="px-5 pt-5">
                <header class="flex justify-between items-start mb-2">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Daftar Grup Pengguna</h2>
                    <div class="relative inline-flex">
                        <button class="px-4 py-2 text-base font-semibold text-white bg-purple-600 rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200">
                            Tambah Grup
                        </button>
                    </div>
                </header>
            </div>

            <div class="p-3 overflow-x-auto">
                <table class="min-w-full leading-normal">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-700 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                Nama Grup
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-700 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                Deskripsi
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-700">
                                <span class="sr-only">Aksi</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm">
                                <p class="text-gray-900 dark:text-gray-100 whitespace-no-wrap">Administrasi</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm">
                                <p class="text-gray-900 dark:text-gray-100 whitespace-no-wrap">Mengelola operasional kantor dan keuangan.</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm text-right">
                                <button class="text-sm font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-300 mr-2">Edit</button>
                                <button class="text-sm font-medium text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-300">Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm">
                                <p class="text-gray-900 dark:text-gray-100 whitespace-no-wrap">Penjualan</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm">
                                <p class="text-gray-900 dark:text-gray-100 whitespace-no-wrap">Bertanggung jawab atas transaksi penjualan dan hubungan pelanggan.</p>
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
                    Menampilkan 1 sampai 2 dari 5 data
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