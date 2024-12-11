<x-layout>
    <x-slot:title>
        {{ $title }}
    </x-slot>
    <main class="flex flex-col px-4 flex-grow w-full max-w-[1080px] h-full">
        <x-proker.breadcrumb>
            <x-slot:seksi>
                {{ $seksi }}
            </x-slot>
            <x-slot:proker>
                {{ $proker }}
            </x-slot>
        </x-proker.breadcrumb>
        <section class="py-8 w-full flex flex-col items-start space-y-16">
            <div class="py-4 flex flex-col w-full items-center">
                <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Akademis</span>
                <h1 class="font-bold text-6xl text-center w-full">
                    {{ $proker }}
                </h1>
                <p class="text-gray-500 py-2 max-w-[75ch]">
                    {{ $desc }}
                </p>
            </div>
            <div>
                <div class="flex flex-row justify-between pb-4 items-end">
                    <h3 class="text-2xl text-left">
                        Highlights
                    </h3>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="flex flex-col space-y-4">
                        {{ $imgcol1 }}
                    </div>
                    <div class="flex flex-col space-y-4">
                        {{ $imgcol2 }}
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-layout>
