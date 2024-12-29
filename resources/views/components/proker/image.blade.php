<div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <img loading="lazy" class="h-auto max-w-full rounded-lg" src={{ asset($imglink) }} alt="">
    @isset($heading)
        <div class="p-4">
            <h3 class="font-semibold text-xl">
                {{ $heading }}
            </h3>
            @isset($caption)
                <p class="text-sm text-gray-500">
                    {{ $caption }}
                </p>
            @endisset
        </div>
    @endisset
</div>