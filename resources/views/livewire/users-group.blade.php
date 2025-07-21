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
                {{-- Flash Message --}}
            @if (session()->has('message'))
                <div class="px-5 pt-5">
                    <div class="mb-4 rounded-lg bg-green-100 border border-green-400 text-green-700 px-4 py-3">
                        {{ session('message') }}
                    </div>
                </div>
            @endif
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
                                <a href="{{ route('users-group-edit', $item->id)}}" class="text-sm font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-300 mr-2">Edit</a>
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

            <div class="px-5 py-3">
                <div class="div flex-justify-center">
                {{ $dataGroup->links('vendor.livewire.tailwind') }}
                </div>
            </div>
        </div>
            
            
        </div>
</div>