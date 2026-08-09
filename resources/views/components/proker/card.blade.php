<div class="flex flex-col flex-1 max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <a href={{ $href }}>
        <img class="h-auto sm:h-56 w-full object-cover object-center rounded-t-lg" src="{{ asset($imglink) }}" alt="" />
    </a>
    <div class="p-5">
        @empty($badge)
            <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
                {{ $seksi }}
            </span>
            <a href={{ $href }}>
                <h2 class="mt-1 mb-0.5 text-2xl font-bold tracking-tight text-gray-900 dark:text-white capitalize hover:underline">
                    {{ $proker }}
                </h2>
            </a>
        @else
            <a href={{ $href }}>
                <h2 class="mb-0.5 text-2xl font-bold tracking-tight text-gray-900 dark:text-white capitalize hover:underline">
                    {{ $proker }}
                </h2>
            </a>
        @endempty
        @isset($desc)
            <p class="mb-1 font-normal text-gray-500 dark:text-gray-400">
                {{ $desc }}
            </p>
        @endisset
    </div>
</div>