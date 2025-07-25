<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @php
            $websiteSettings = App\Models\WebSetting::first();
            $title = $websiteSettings ? $websiteSettings->getName() : config('app.name');
            $favicon = $websiteSettings && $websiteSettings->getLogo() ? asset('storage/' . $websiteSettings->getLogo()) : asset('favicon.ico');
        @endphp

        <title>{{ $title }}</title>
        <link rel="icon" type="image/x-icon" href="{{ $favicon }}">
        <script>
            document.addEventListener('livewire:init', () => {
                Livewire.on('settings-updated', () => {
                    // Force reload the page to update title and favicon
                    window.location.reload();
                });
            });
        </script>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400..700&display=swap" rel="stylesheet" />

        <script>
            document.addEventListener('livewire:init', () => {
                Livewire.on('settings-updated', () => {
                    window.location.reload();
                });
                Livewire.on('logo-updated', () => {
                    window.location.reload();
                });
            });

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles        

        <script>
            if (localStorage.getItem('dark-mode') === 'false' || !('dark-mode' in localStorage)) {
                document.querySelector('html').classList.remove('dark');
                document.querySelector('html').style.colorScheme = 'light';
            } else {
                document.querySelector('html').classList.add('dark');
                document.querySelector('html').style.colorScheme = 'dark';
            }
        </script>
    </head>
    <body
        class="font-inter antialiased bg-gray-100 dark:bg-gray-900 text-gray-600 dark:text-gray-400"
        :class="{ 'sidebar-expanded': sidebarExpanded }"
        x-data="{ sidebarOpen: false, sidebarExpanded: localStorage.getItem('sidebar-expanded') == 'true' }"
        x-init="$watch('sidebarExpanded', value => localStorage.setItem('sidebar-expanded', value))"    
    >

        <script>
            if (localStorage.getItem('sidebar-expanded') == 'true') {
                document.querySelector('body').classList.add('sidebar-expanded');
            } else {
                document.querySelector('body').classList.remove('sidebar-expanded');
            }
        </script>

        <!-- Page wrapper -->
        <div class="flex h-[100dvh] overflow-hidden">

            <livewire:sidebar :variant="$attributes['sidebarVariant']" />

            <!-- Content area -->
            <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden @if($attributes['background']){{ $attributes['background'] }}@endif" x-ref="contentarea">

                <livewire:header :variant="$attributes['headerVariant']" />

                <main class="grow">
                    {{ $slot }}
                </main>

            </div>

        </div>

        @livewireScriptConfig

        <script>
            document.addEventListener('livewire:initialized', () => {
                Livewire.on('profile-photo-updated', () => {
                    // Force refresh of header component
                    Livewire.dispatch('refresh-navigation-menu');
                });
            });
        </script>
    </body>
</html>
