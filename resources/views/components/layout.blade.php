<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{ $metadesc ?? null }}
        <meta name="copyright" content="© 2025 OSIS MPK SMA Unggulan M. H. Thamrin">
        <meta name="author" content="OSIS MPK SMA Unggulan M. H. Thamrin 2025/2026">
        <meta name="keywords" content="OSIS, MPK, MHT, sma, mht, thamrin, smanu, smanu mht, sma unggulan, mht m h thamrin, smanu mh thamrin, program kerja, event sekolah, kegiatan siswa {{ $keywords ?? '' }}">

        <title>{{ $title.' | DHARMANDALA SANDHYAKALA 2025/2026' ?? 'DHARMANDALA SANDHYAKALA 2025/2026' }}</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('/images/favicon.ico') }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body data-barba="wrapper" class="relative page-transition flex flex-1 w-full">
        <main id="main" data-barba="container" class="relative bg-white text-black flex flex-col items-center w-full min-h-screen text-center {{ $extra ?? null }}">
            <div id="nav_prestasi_circle" class="opacity-0 absolute z-10 top-0 left-0 w-[10px] h-[10px] rounded-full bg-white"></div>
            
            <!-- Header -->
            <div class="flex justify-center z-20 w-full bg-white">
            <nav id="navbar" class="z-50 fixed bg-white dark:bg-gray-900 fixed w-full top-0 start-0 border-b border-gray-200 dark:border-gray-600">
              <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
              <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                  <img src="{{ asset('images/logo/general/ospk384.webp') }}" class="h-8" alt="Flowbite Logo">
                  <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Dharmakala</span>
              </a>

              <div class="flex flex-col space-y-2 md:flex-row md:space-y-0 md:space-x-3 md:order-2 rtl:space-x-reverse">
              <!-- Open House Button -->
              <button onclick="window.location.href='/thamnet';" 
                      type="button" 
                      class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                ThamNet
              </button>
              <!-- Hamburger Button -->
              <button data-collapse-toggle="navbar-sticky" 
                      type="button" 
                      class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" 
                      aria-controls="navbar-sticky" 
                      aria-expanded="false">
                <span class="sr-only">Buka Menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                        d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
              </button>
            </div>
              <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1 md:text-left text-center" id="navbar-sticky">
                <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                  <li>
                    <a href="/publikasiprestasi" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Prestasi</a>
                  </li>
                  <li>
                    <a href="/thalation" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Thalation</a>
                  </li>
                  <li>
                    <a href="/programkerja" data-barba-prevent="self" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Program Kerja</a>
                  </li>
                  <li>
                    <a href="/merchandise" data-barba-prevent="self" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Merchandise</a>
                  </li>

                  <li>
            <button id="dropdownNavbarLink" 
                    data-dropdown-toggle="dropdownNavbarKabinet" 
                    class="block w-full py-2 px-3 text-gray-900 rounded-sm
                          hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700
                          md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500
                          dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700
                          md:dark:hover:bg-transparent flex items-center justify-center md:justify-between">
              <!-- Text -->
              <span class="text-center w-full md:w-auto">Kabinet</span>
              <!-- Arrow -->
              <svg class="w-4 h-4 ml-2 flex-shrink-0 absolute right-4 md:static md:ml-2" 
                  aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" 
                  viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="m1 1 4 4 4-4"/>
              </svg>
            </button>
            <!-- Dropdown menu -->
            <div id="dropdownNavbarKabinet" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700 dark:divide-gray-600">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                  <li>
                    <a href="/kabinet/osis" data-barba-prevent="self" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">OSIS</a>
                  </li>
                  <li>
                    <a href="/kabinet/mpk" data-barba-prevent="self" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">MPK</a>
                  </li>
                </ul>
                <div class="py-1">
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Arsip 2024/2025</a>
                </div>
            </div>
        </li>

                  <li>
                    <a href="https://smanu-mht.sch.id" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Web Sekolah</a>
                  </li>
                </ul>
              </div>
              </div>
            </nav>
            </div>

            <div id="content" class="pt-16 md:pt-20 lg:pt-24">

              @isset($alert)
              <x-alert :alert="$alert" :forwardLink="$alertForward"/>
              @endisset

              {{ $slot }}
            </div>

            <!-- Footer -->
            <footer class="w-full bg-white dark:bg-gray-900 shadow-sm">
              <div class="w-full max-w-screen-xl mx-auto px-4 md:py-8">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                  <!-- Logo + Title aligned left -->
                  <a href="/" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                    <img src="{{ asset('images/logo/general/ospk384.webp') }}" class="h-8" alt="Flowbite Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Dharmakala</span>
                  </a>
                  <!-- Menu aligned right -->
                  <ul class="flex flex-wrap items-center text-sm font-medium text-gray-500 dark:text-gray-400">
                    <li><a href="#" class="hover:underline me-4 md:me-6">WhatsApp</a></li>
                    <li><a href="#" class="hover:underline me-4 md:me-6">Twitter</a></li>
                    <li><a href="#" class="hover:underline me-4 md:me-6">Instagram</a></li>
                    <li><a href="#" class="hover:underline">Youtube</a></li>
                  </ul>
                </div>
                <hr class="my-6 border-gray-200 dark:border-gray-700 lg:my-8" />
                <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">
                  © 2026 <a href="/#" class="hover:underline">Dharmandala Sandhyakala</a>. All Rights Reserved.
                </span>
              </div>
            </footer>
        </main>
    </body>

<script>
  const navbar = document.getElementById('navbar');
  const content = document.getElementById('content');
  function adjustPadding() {
    content.style.paddingTop = navbar.offsetHeight + 'px';
  }
  window.addEventListener('resize', adjustPadding);
  window.addEventListener('load', adjustPadding);
</script>

</html>

