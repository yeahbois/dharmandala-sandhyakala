<div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <img loading="lazy" class="h-auto w-full rounded-lg" src={{ asset($imglink) }} alt="">
    @if (isset($heading) || isset($caption))
        <div class="p-4">
            @isset($heading)
                <h3 class="font-semibold text-xl">
                    {{ $heading }}
                </h3>
            @endisset
            @isset($caption)
                <p class="text-md text-gray-500">
                    {{ $caption }}
                </p>
            @endisset
        </div>
    @endisset
</div>