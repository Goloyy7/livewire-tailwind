    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <!-- Website Branding Settings -->
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Website Branding</h3>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            Update your website logo and branding information.
                        </p>
                    </div>
                </div>

                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form action="#" method="POST">
                        <div class="px-4 py-5 bg-white dark:bg-gray-800 sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                            <div class="grid grid-cols-6 gap-6">
                                <!-- Website Logo -->
                                <div class="col-span-6">
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-2">
                                        Website Logo
                                    </label>

                                    <div class="flex flex-col items-center">
                                        <!-- Preview Area -->
                                        <div class="w-48 h-48 mb-4 border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg overflow-hidden bg-gray-100 dark:bg-gray-700">
                                            <!-- Preview Image -->
                                            <img src="#" alt="Logo Preview" class="w-full h-full object-contain p-2">
                                        </div>

                                        <!-- Upload Button -->
                                        <div class="flex items-center">
                                            @can('edit_settings')
                                            <button type="button"
                                                class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:text-gray-500 dark:hover:text-gray-400 focus:outline-none focus:border-violet-500 focus:ring focus:ring-violet-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                                                </svg>
                                                Upload New Logo
                                            </button>
                                        </div>
                                        
                                        <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                                            PNG, JPG or GIF up to 2MB
                                        </p>
                                        @endcan
                                    </div>
                                </div>

                                <!-- Website Name -->
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="website_name" class="block font-medium text-sm text-gray-700 dark:text-gray-300">
                                        Website Name
                                    </label>
                                    <input type="text" name="website_name" id="website_name"
                                        placeholder="My Admin"
                                        class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-violet-500 focus:ring-violet-500 rounded-md shadow-sm">
                                    <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                                        This will be displayed in the dashboard header and browser title
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 dark:bg-gray-800 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                            @can('edit_settings')
                            <button type="button"
                                class="inline-flex items-center px-4 py-2 bg-violet-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-violet-700 active:bg-violet-900 focus:outline-none focus:border-violet-900 focus:ring focus:ring-violet-300 disabled:opacity-25 transition">
                                Save Changes
                            </button>
                            @endcan
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>