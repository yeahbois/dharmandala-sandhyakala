<div>
    <div class="flex flex-col items-center md:items-start my-8">
        @if(empty($group))
            {{-- nothing --}}
        @else
            <span class="bg-gray-100 text-gray-500 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">
                {{ $group }}
            </span>
        @endif
        <h2 class="inline text-center text-3xl font-semibold">
            {{ $name }}
        </h2>
    </div>
    <div class="grid gap-8 [grid-template-columns:repeat(auto-fit,minmax(150px,1fr))] md:[grid-template-columns:repeat(auto-fit,minmax(200px,1fr))]">
        {{ $slot }}
    </div>
</div>