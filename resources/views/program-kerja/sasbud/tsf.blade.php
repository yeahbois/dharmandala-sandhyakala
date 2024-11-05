<x-layout title="TSF">
    <main class="flex flex-col px-4 flex-grow w-full max-w-[1080px] h-full">
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
                            Sastra Budaya
                        </a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">
                            Thamrin Sastra Fair
                        </span>
                    </div>
                </li>
            </ol>
        </nav>
        <section class="py-8 w-full flex flex-col items-start space-y-16">
            <div class="py-4 flex flex-col w-full items-center">
                <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
                    Sasbud
                </span>
                <h1 class="font-bold text-6xl text-center w-full">
                    Thamrin Sastra Fair
                </h1>
                <p class="text-gray-500 py-2 max-w-[75ch]">
                    Festival budaya dalam rangka memperingati Hari Batik Nasional, Bulan Bahasa, dan Hari Sumpah Pemuda yang dilaksanakan oleh SMA Negeri Unggulan M.H. Thamrin dengan mengundang pembicara literasi, serta diadakannya perlombaan-perlombaan menarik seputar sastra dan bahasa untuk meningkatkan minat literasi peserta didik.
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
                        <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <img loading="lazy" class="h-auto max-w-full rounded-lg" src={{ asset('/images/proker/sasbud/tsf/2016_1103_11100600514600.webp') }} alt="">
                        </div>
                        <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <img loading="lazy" class="h-auto max-w-full rounded-lg" src={{ asset('/images/proker/sasbud/tsf/2016_1103_11304700514600.webp') }} alt="">
                        </div>
                        <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <img loading="lazy" class="h-auto max-w-full rounded-lg" src={{ asset('/images/proker/sasbud/tsf/2016_1103_11481900514600.webp') }} alt="">
                        </div>
                    </div>
                    <div class="flex flex-col space-y-4">
                        <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <img loading="lazy" class="h-auto max-w-full rounded-lg" src={{ asset('/images/proker/sasbud/tsf/2016_1103_13301800514600.webp') }} alt="">
                        </div>
                        <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <img loading="lazy" class="h-auto max-w-full rounded-lg" src={{ asset('/images/proker/sasbud/tsf/2016_1103_13341100514600.webp') }} alt="">
                        </div>
                        <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <img loading="lazy" class="h-auto max-w-full rounded-lg" src={{ asset('/images/proker/sasbud/tsf/2016_1103_13444600514600.webp') }} alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-layout>
