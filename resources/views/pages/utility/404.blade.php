

    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400..700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles        

    </head>
    <body>
        <!-- Page wrapper -->
        <div class="flex h-[100dvh] overflow-hidden">


            <!-- Content area -->
            <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden " x-ref="contentarea">



                <main class="grow">
                    
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <div class="max-w-2xl m-auto mt-16">

            <div class="text-center px-4">
                <div class="inline-flex mb-8">
                    <img class="dark:hidden" src="{{ asset('images/404-illustration.svg') }}" width="176" height="176" alt="404 illustration" />
                    <img class="hidden dark:block" src="{{ asset('images/404-illustration-dark.svg') }}" width="176" height="176" alt="404 illustration dark" />                        
                </div>
                <div class="mb-6">Hmm...this page doesn't exist. Try searching for something else!</div>
                <a href="{{ route('dashboard') }}" class="btn bg-indigo-500 hover:bg-indigo-600 text-white">Back To Dashboard</a>
            </div>

        </div>

    </div>
                </main>

            </div>

        </div>

        @livewireScriptConfig
    </body>
</html>

