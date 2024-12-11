<div class="flex flex-col flex-1 max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
        <img class="h-56 w-full object-cover object-center rounded-t-lg" src="{{ asset($imglink) }}" alt="" />
    </a>
    <div class="p-5">
        <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
            {{ $seksi }}
        </span>
        <a href={{ $href }}>
            <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white capitalize hover:underline">
                {{ $proker }}
            </h2>
        </a>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
            {{ $desc }}
        </p>
    </div>
</div>