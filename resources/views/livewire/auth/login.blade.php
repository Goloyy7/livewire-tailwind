<div>
    <h1 class="text-3xl text-gray-800 dark:text-gray-100 font-bold mt-3">{{ __('Welcome back!') }}</h1>
    @if (session('error'))
        <div class="mb-4 font-medium text-sm text-red-600">
            {{ session('error') }}
        </div>
    @endif   
    <!-- Form -->
    <form wire:submit.prevent="login">
        <div class="space-y-4">
            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" type="email" wire:model="email" required autofocus />                
                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" type="password" wire:model="password" required autocomplete="current-password" />                
                @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex items-center justify-between mt-4">            
            <x-button type="submit" class="w-full">Sign in</x-button>            
        </div>
    </form>
    <x-validation-errors class="mt-4" />   
    <!-- Footer -->
    <div class="pt-5 mt-6 border-t border-gray-100 dark:border-gray-700/60">
        {{-- <!-- Warning -->
        <div class="mt-5">
            <div class="bg-yellow-500/20 text-yellow-700 px-3 py-2 rounded-lg">
                <svg class="inline w-3 h-3 shrink-0 fill-current" viewBox="0 0 12 12">
                    <path d="M10.28 1.28L3.989 7.575 1.695 5.28A1 1 0 00.28 6.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28 1.28z" />
                </svg>
                <span class="text-sm">
                    To support you during the pandemic super pro features are free until March 31st.
                </span>
            </div>
        </div> --}}
    </div>
</div>
