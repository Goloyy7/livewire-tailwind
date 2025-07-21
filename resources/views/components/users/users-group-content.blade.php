<div class="flex flex-col col-span-full bg-white dark:bg-gray-800 shadow-xs rounded-xl">
    @props(['dataGroup'])
            <div class="px-5 pt-5">
                <header class="flex justify-between items-start mb-2">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Daftar Grup Pengguna</h2>
                    <div class="relative inline-flex">
                        <a href="{{ route('users-group-create')}}" class="px-4 py-2 text-base font-semibold text-white bg-purple-600 rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200">
                            Tambah Grup
                        </a>
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
                        @forelse ($dataGroup as $item)
                            <tr>
                            <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm">
                                <p class="text-gray-900 dark:text-gray-100 whitespace-no-wrap">{{ $item->name }}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm">
                                <p class="text-gray-900 dark:text-gray-100 whitespace-no-wrap">{{ $item->description }}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm text-right">
                                <a href="{{ route('users-group-create', $item->id)}}" class="text-sm font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-300 mr-2">Edit</a>
                                <button wire:click="delete({{ $item->id }})" class="text-sm font-medium text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-300">Hapus</button>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-5 py-5 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm text-center">
                                    <p class="text-gray-500 dark:text-gray-400">Tidak ada grup pengguna ditemukan.</p>
                                </td>
                            </tr>
                        @endforelse
                            
                        
                        </tbody>
                </table>
            </div>

            <div class="px-5 py-3 ">
                {{ $dataGroup->links() }}
            </div>
        </div>