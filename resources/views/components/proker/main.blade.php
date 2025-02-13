<x-layout>
    <x-slot:title>
        {{ $title }}
    </x-slot>
    <main class="flex flex-col px-4 flex-grow w-full max-w-[1080px] h-full">
        @empty($pubpres)
            <x-proker.breadcrumb>
                <x-slot:seksi>
                    {{ $seksi }}
                </x-slot>
                <x-slot:proker>
                    {{ $proker }}
                </x-slot>
            </x-proker.breadcrumb>
        @else
            <nav class="flex mt-4" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="/program-kerja" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                            </svg>
                            Program Kerja
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">
                                Akademis
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <a href="/publikasi-prestasi" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">
                                Publikasi Prestasi
                            </a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">
                                {{ $date }}
                            </span>
                        </div>
                    </li>
                </ol>
            </nav>
        @endisset
        @if (@isset($imgcol1) && @isset($imgcol2))
            <section class="py-8 w-full flex flex-col items-start space-y-16">
                <div class="py-4 flex flex-col w-full items-center">
                    <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
                        {{ $seksi }}
                    </span>
                    <h1 class="mt-2 font-bold text-6xl text-center w-full">
                        {{ $proker }}
                    </h1>
                    @isset($desc)
                        <p class="text-gray-500 py-2 max-w-[75ch]">
                            {{ $desc }}
                        </p>
                    @endisset
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
        @else
            <section class="py-8 w-full flex flex-col items-start space-y-16">
                <div class="py-4 flex flex-col w-full items-center">
                    <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
                        {{ $seksi }}
                    </span>
                    <h1 class="mt-2 font-bold text-6xl sm:text-8xl text-center w-full">
                        {{ $proker }}
                    </h1>
                    @isset($desc)
                        <p class="text-gray-500 py-2 max-w-[75ch]">
                            {{ $desc }}
                        </p>
                    @endisset
                </div>
                {{ $custom }}
            </section>
        @endif
    </main>
</x-layout>
