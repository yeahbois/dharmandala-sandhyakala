<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{ $metadesc ?? null }}

        <title>{{ $title.' | AGRADAMA NAVALEKSA 2024/2025' ?? 'AGRADAMA NAVALEKSA 2024/2025' }}</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('/images/favicon.ico') }}">

        <!-- Fonts -->
        <link rel="preload" href="https://fonts.bunny.net" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" /></noscript>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-white text-black flex flex-col items-center w-full min-h-screen text-center {{ $extra ?? null }}">
        <!-- Header -->
        <div class="flex justify-center z-10 w-full bg-white">
            <nav class="w-full max-w-[1080px] p-4">
                <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto">
                    <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                        <img src={{ asset('/images/logo/general/ospk64.webp') }} alt="Logo OSPK"/>
                    </a>
                    <button id="hamburger" data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-dropdown" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-8 h-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                        </svg>
                    </button>
                    <div class="hidden w-full lg:block lg:w-auto" id="navbar-dropdown">
                        <ul class="flex flex-col text-xl p-4 lg:p-0 mt-4 rounded-lg lg:space-x-8 rtl:space-x-reverse lg:flex-row lg:mt-0 lg:border-0">
                            <li>
                                <a href="/publikasi-prestasi" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 lg:hover:bg-transparent lg:border-0 lg:hover:text-blue-700 lg:p-0 dark:text-white lg:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent">
                                    Prestasi
                                </a>
                            </li>
                            <li>
                                <a href="/thamnet" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 lg:hover:bg-transparent lg:border-0 lg:hover:text-blue-700 lg:p-0 dark:text-white lg:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent">
                                    ThamNet
                                </a>
                            </li>
                            <li>
                                <a href="/thamrin-wall-of-aspiration" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 lg:hover:bg-transparent lg:border-0 lg:hover:text-blue-700 lg:p-0 dark:text-white lg:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent">
                                    Thalation
                                </a>
                            </li>
                            <li>
                                <a href="/program-kerja" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 lg:hover:bg-transparent lg:border-0 lg:hover:text-blue-700 lg:p-0 dark:text-white lg:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent">
                                    Program Kerja
                                </a>
                            </li>
                            {{-- <li>
                                <a href="/merchandise" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                                    Merchandise
                                </a>
                            </li> --}}
                            <li>
                                <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-center w-full py-2 px-3 text-gray-900 rounded hover:bg-gray-100 lg:hover:bg-transparent lg:border-0 lg:hover:text-blue-700 lg:p-0 lg:w-auto dark:text-white lg:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 lg:dark:hover:bg-transparent">
                                    Kabinet
                                    <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                    </svg>
                                </button>
                                <!-- Dropdown menu -->
                                <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-32 dark:bg-gray-700 dark:divide-gray-600">
                                    <ul class="py-2 text-md text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                                        <li>
                                            <a href="/kabinet/osis" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">OSIS</a>
                                        </li>
                                        <li>
                                            <a href="/kabinet/mpk" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">MPK</a>
                                        </li>
                                        {{-- <li>
                                            <a href="/kabinet/asrama" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Asrama</a>
                                        </li> --}}
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="https://www.smanu-mht.sch.id/" target="_blank" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 lg:hover:bg-transparent lg:border-0 lg:hover:text-blue-700 lg:p-0 dark:text-white lg:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent">
                                    Web Sekolah
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <section id="loading-screen" class="fixed inset-0 flex items-center justify-center bg-white z-50">
            <div class="flex space-x-2">
                <div class="w-4 h-4 bg-gray-500 rounded-full animate-bounce"></div>
                <div class="w-4 h-4 bg-gray-500 rounded-full animate-bounce delay-200"></div>
                <div class="w-4 h-4 bg-gray-500 rounded-full animate-bounce delay-400"></div>
            </div>
        </section>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const loadingScreen = document.getElementById('loading-screen');
                window.addEventListener('load', function() {
                    loadingScreen.style.display = 'none';
                });
            });
        </script>

        {{-- INSERT CUSTOM TEMPLATE HERE --}}
        {{ $slot }}

        <!-- Footer -->
        <footer class="bg-white w-full flex flex-col-reverse justify-center lg:flex-row items-center lg:justify-end min-h-screen p-4 dark:bg-gray-800">
            <div class="lg:mr-4">
                <h1 class="text-black/75 text-6xl sm:text-8xl font-light italic mb-8 sm:mb-12">
                    CONTACT US
                </h1>
                <div class="flex mt-4 space-x-12 items-center justify-center sm:mt-0">
                    <a href="https://wa.me/+6281310370022" target="_blank" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                        <img src={{ asset('icons/whatsapp.webp') }} class="h-12 sm:h-16 grayscale duration-150 hover:grayscale-0 focus:grayscale-0">
                        <span class="sr-only">WhatsApp number</span>
                    </a>
                    <a href="https://x.com/osismpkthamrin" target="_blank" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                        <img src={{ asset('icons/twitter.webp') }} class="h-[64px] sm:h-[90px] grayscale duration-150 hover:grayscale-0 focus:grayscale-0">
                        <span class="sr-only">Twitter page</span>
                    </a>
                    <a href="https://instagram.com/osismpkthamrin" target="_blank" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                        <img src={{ asset('icons/instagram.webp') }} class="h-12 sm:h-16 grayscale duration-150 hover:grayscale-0 focus:grayscale-0">
                        <span class="sr-only">Instagram account</span>
                    </a>
                    <a href="https://www.youtube.com/@OSISMPKSMANUMHTHAMRIN" target="_blank" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                        <img src={{ asset('icons/youtube.webp') }} class="h-12 sm:h-16 grayscale duration-150 hover:grayscale-0 focus:grayscale-0">
                        <span class="sr-only">YouTube account</span>
                    </a>
                </div>
            </div>
            <div class="w-full lg:w-2/3 mb-16">
                <image src="{{ asset('/images/logo/general/eagle_ascii1.png') }}"></image>
            </div>
        </footer>
    </body>
</html>

