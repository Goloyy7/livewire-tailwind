<div>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Dashboard actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-8">

            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Dashboard</h1>
            </div>

            <!-- Right: Actions -->
            <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">
                
            </div>

        </div>
        
        <!-- Cards -->
        <div class="grid grid-cols-12 gap-6">

            <!-- Stats Cards -->
            @can('view_users')
            <div class="col-span-12 sm:col-span-6 xl:col-span-4">
                <div class="flex flex-col bg-white dark:bg-gray-800 shadow-lg rounded-lg border border-gray-200 dark:border-gray-700 transform transition-all duration-300 hover:scale-105">
                    <div class="px-5 py-5">
                        <div class="flex items-center justify-between">
                            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Total Users</h2>
                            <div class="p-3 rounded-full bg-blue-500/10">
                                <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="text-3xl font-bold text-gray-800 dark:text-gray-100">{{ $totalUsers }}</div>
                            <div class="flex items-center mt-2">
                                <div class="text-sm text-gray-500 dark:text-gray-400">Active users in the system</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endcan

            @can('view_roles')
            <div class="col-span-12 sm:col-span-6 xl:col-span-4">
                <div class="flex flex-col bg-white dark:bg-gray-800 shadow-lg rounded-lg border border-gray-200 dark:border-gray-700 transform transition-all duration-300 hover:scale-105">
                    <div class="px-5 py-5">
                        <div class="flex items-center justify-between">
                            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Total Roles</h2>
                            <div class="p-3 rounded-full bg-purple-500/10">
                                <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="text-3xl font-bold text-gray-800 dark:text-gray-100">{{ $totalRoles }}</div>
                            <div class="flex items-center mt-2">
                                <div class="text-sm text-gray-500 dark:text-gray-400">User roles defined</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endcan

            @can('view_permissions')
            <div class="col-span-12 sm:col-span-6 xl:col-span-4">
                <div class="flex flex-col bg-white dark:bg-gray-800 shadow-lg rounded-lg border border-gray-200 dark:border-gray-700 transform transition-all duration-300 hover:scale-105">
                    <div class="px-5 py-5">
                        <div class="flex items-center justify-between">
                            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Total Permissions</h2>
                            <div class="p-3 rounded-full bg-green-500/10">
                                <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="text-3xl font-bold text-gray-800 dark:text-gray-100">{{ $totalPermissions }}</div>
                            <div class="flex items-center mt-2">
                                <div class="text-sm text-gray-500 dark:text-gray-400">System permissions</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endcan

            <!-- Recent Users Table -->
            @can('view_dashboard')
            <div class="col-span-12 xl:col-span-6">
                <div class="flex flex-col bg-white dark:bg-gray-800 shadow-lg rounded-lg border border-gray-200 dark:border-gray-700 h-[600px]">
                    <header class="px-5 py-4 border-b border-gray-100 dark:border-gray-700">
                        <div class="flex items-center justify-between">
                            <h2 class="font-semibold text-gray-800 dark:text-gray-100">Recent Users</h2>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-800 dark:text-blue-100">
                                Last 5 Users
                            </span>
                        </div>
                    </header>
                    <div class="p-3 flex-grow overflow-hidden">
                        <div class="overflow-x-auto h-full">
                            <table class="table-auto w-full">
                                <thead class="text-xs font-semibold uppercase text-gray-400 dark:text-gray-500 bg-gray-50 dark:bg-gray-800/50 sticky top-0">
                                    <tr>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-left">Name</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-left">Email</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-left">Role</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm divide-y divide-gray-100 dark:divide-gray-700">
                                    @foreach($recentUsers as $user)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="w-8 h-8 rounded-full flex items-center justify-center text-sm font-medium text-white mr-3 bg-blue-500">
                                                    {{ strtoupper(substr($user->name, 0, 2)) }}
                                                </div>
                                                <div class="text-gray-800 dark:text-gray-100 font-medium">{{ $user->name }}</div>
                                            </div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-gray-500 dark:text-gray-400">{{ $user->email }}</div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $user->roles->first() ? 'bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100' : 'bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-100' }}">
                                                {{ $user->roles->first()?->name ?? 'No Role' }}
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @endcan

            <!-- Role Distribution Chart -->
            @can('view_roles')
            <div class="col-span-12 xl:col-span-6">
                <div class="flex flex-col bg-white dark:bg-gray-800 shadow-lg rounded-lg border border-gray-200 dark:border-gray-700 h-[600px]">
                    <header class="px-5 py-4 border-b border-gray-100 dark:border-gray-700">
                        <div class="flex items-center justify-between">
                            <h2 class="font-semibold text-gray-800 dark:text-gray-100">Role Distribution</h2>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800 dark:bg-purple-800 dark:text-purple-100">
                                User Roles
                            </span>
                        </div>
                    </header>
                    <div class="p-6 flex-grow">
                        <div class="flex flex-col h-full space-y-6">
                            @foreach($roleDistribution as $role)
                            <div class="flex flex-col">
                                <div class="flex items-center justify-between mb-2">
                                    <div class="flex items-center">
                                        <div class="w-3 h-3 rounded-full bg-purple-500 mr-2"></div>
                                        <div class="text-sm font-medium text-gray-800 dark:text-gray-100">{{ $role['name'] }}</div>
                                    </div>
                                    <div class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                        {{ $role['count'] }} {{ Str::plural('user', $role['count']) }}
                                        @if($totalUsers > 0)
                                            ({{ round(($role['count'] / $totalUsers) * 100) }}%)
                                        @endif
                                    </div>
                                </div>
                                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2 overflow-hidden">
                                    @if($totalUsers > 0)
                                    <div 
                                        class="h-full bg-purple-500 rounded-full transition-all duration-500 ease-out"
                                        style="width: {{ ($role['count'] / $totalUsers) * 100 }}%"
                                    ></div>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endcan

        </div>

    </div>
</div>
