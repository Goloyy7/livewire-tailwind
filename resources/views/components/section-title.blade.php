<div class="md:col-span-1">
    <div class="px-4 sm:px-0">
        <h3 class="text-base font-semibold leading-6 text-gray-900 dark:text-gray-100">
            {{ $title }}
        </h3>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ $description }}
        </p>
    </div>

    @isset($aside)
    <div class="px-4 sm:px-0">
        {{ $aside }}
    </div>
    @endisset
</div>
