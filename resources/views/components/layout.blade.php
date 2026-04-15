<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  {{ $metadesc ?? null }}
  <meta name="copyright" content="© 2025 OSIS MPK SMA Unggulan M. H. Thamrin">
  <meta name="author" content="OSIS MPK SMA Unggulan M. H. Thamrin 2025/2026">
  <meta name="keywords"
    content="OSIS, MPK, MHT, sma, mht, thamrin, smanu, smanu mht, sma unggulan, mht m h thamrin, smanu mh thamrin, program kerja, event sekolah, kegiatan siswa {{ $keywords ?? '' }}">

  <title>{{ $title . ' | DHARMANDALA SANDHYAKALA 2025/2026' ?? 'DHARMANDALA SANDHYAKALA 2025/2026' }}</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('/images/favicon.ico') }}">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap">
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <!-- THEME -->
  <style>
    :root {
      /* Base Neutral Colors (Slate default) */
      --theme-base-50: #f8fafc;
      --theme-base-100: #f1f5f9;
      --theme-base-200: #e2e8f0;
      --theme-base-300: #cbd5e1;
      --theme-base-400: #94a3b8;
      --theme-base-500: #64748b;
      --theme-base-600: #475569;
      --theme-base-700: #334155;
      --theme-base-800: #1e293b;
      --theme-base-900: #0f172a;

      /* These primary variables will be updated by the JS script, default is set to light */
      --theme-primary-600: #001453;
      --theme-on-primary: #ffffff;
      --theme-primary-container: #dde1ff;
      --theme-on-primary-container: #173bab;
      --theme-surface: #f8f9ff;
      --theme-on-surface: #0d1c2f;
      --theme-surface-variant: #d5e3fd;
      --theme-on-surface-variant: #45464d;
      --theme-background: #f8f9ff;
      --theme-outline: #76777d;
      --theme-secondary-600: #006d30;
    }

    * {
      border-radius: 0 !important;
    }

    .ivory-card-shadow {
      box-shadow: 0 10px 30px -10px rgba(13, 28, 47, 0.08);
    }

    .member-photo-aspect {
      aspect-ratio: 1 / 1;
    }

    /* Slider Helper Navigation */
    .slider-nav-btn {
      width: 32px; height: 32px; 
      display: flex; align-items: center; justify-content: center;
      background: rgba(255,255,255,0.05);
      border: 1px solid rgba(255,255,255,0.1);
      color: var(--theme-on-surface);
      transition: all 0.2s;
    }
    .slider-nav-btn:hover { background: rgba(255,255,255,0.15); }
    
    @media (max-width: 1023px) {
        .dp-slide { width: 100% !important; }
    }
  </style>

  <script>
    function scrollSlider(id, direction) {
      const slider = document.getElementById(id);
      const scrollAmount = slider.clientWidth;
      slider.scrollBy({ left: direction * scrollAmount, behavior: 'smooth' });
    }
  </script>

  <script>
    const THEME_STORAGE_KEY = 'dharman-app-theme';

    const appThemes = {
      'light': {
        '--theme-primary-600': '#001453',
        '--theme-on-primary': '#ffffff',
        '--theme-primary-container': '#dde1ff',
        '--theme-on-primary-container': '#173bab',
        '--theme-surface': '#f8f9ff',
        '--theme-on-surface': '#0d1c2f',
        '--theme-surface-variant': '#d5e3fd',
        '--theme-on-surface-variant': '#45464d',
        '--theme-background': '#f8f9ff',
        '--theme-outline': '#76777d',
        '--theme-secondary-600': '#006d30',
      },
      'dark': { /* Discord Dark */
        '--theme-primary-600': '#5865F2',
        '--theme-on-primary': '#ffffff',
        '--theme-primary-container': '#313338',
        '--theme-on-primary-container': '#E3E5E8',
        '--theme-surface': '#2B2D31',
        '--theme-on-surface': '#DBDEE1',
        '--theme-surface-variant': '#1E1F22',
        '--theme-on-surface-variant': '#B5BAC1',
        '--theme-background': '#1E1F22',
        '--theme-outline': '#80848E',
        '--theme-secondary-600': '#23A559',
      },
      'ultradark': { /* Pure Black */
        '--theme-primary-600': '#FFFFFF',
        '--theme-on-primary': '#000000',
        '--theme-primary-container': '#1A1A1A',
        '--theme-on-primary-container': '#CCCCCC',
        '--theme-surface': '#0A0A0A',
        '--theme-on-surface': '#EDEDED',
        '--theme-surface-variant': '#141414',
        '--theme-on-surface-variant': '#A0A0A0',
        '--theme-background': '#000000',
        '--theme-outline': '#333333',
        '--theme-secondary-600': '#222222',
      },
      'pastel-blue-purple': {
        '--theme-primary-600': '#A5B4FC',
        '--theme-on-primary': '#1E1B4B',
        '--theme-primary-container': '#E0E7FF',
        '--theme-on-primary-container': '#312E81',
        '--theme-surface': '#F5F3FF',
        '--theme-on-surface': '#1E1B4B',
        '--theme-surface-variant': '#DDD6FE',
        '--theme-on-surface-variant': '#4C1D95',
        '--theme-background': '#F5F3FF',
        '--theme-outline': '#C4B5FD',
        '--theme-secondary-600': '#818CF8',
      },
      'pastel-pink': {
        '--theme-primary-600': '#FFB6C1',
        '--theme-on-primary': '#4A0E1B',
        '--theme-primary-container': '#FFE4E1',
        '--theme-on-primary-container': '#800020',
        '--theme-surface': '#FFF0F5',
        '--theme-on-surface': '#4A0E1B',
        '--theme-surface-variant': '#F8C8DC',
        '--theme-on-surface-variant': '#5A1828',
        '--theme-background': '#FFF0F5',
        '--theme-outline': '#DDA0DD',
        '--theme-secondary-600': '#FF69B4',
      }
    };

    function setAppTheme(themeName) {
      const theme = appThemes[themeName] || appThemes['light'];
      for (const [key, value] of Object.entries(theme)) {
        document.documentElement.style.setProperty(key, value);
      }
      try {
        localStorage.setItem(THEME_STORAGE_KEY, themeName);
      } catch (e) {
        console.warn('LocalStorage not available', e);
      }
    }

    // Apply immediately to prevent flash
    const savedTheme = localStorage.getItem(THEME_STORAGE_KEY) || 'light';
    setAppTheme(savedTheme);
    window.setAppTheme = setAppTheme; // Export to window so it can be called from anywhere
  </script>


</head>

<body data-barba="wrapper" class="relative page-transition flex flex-1 w-full">
  <main id="main" data-barba="container"
    class="relative bg-background text-on-surface flex flex-col items-center w-full min-h-screen text-center {{ $extra ?? null }}">
    <div id="nav_prestasi_circle" class="opacity-0 absolute z-10 top-0 left-0 w-[10px] h-[10px] rounded-full bg-white">
    </div>

    <!-- Header -->
    <header class="flex justify-center z-50 w-full">
      <nav id="navbar"
        class="fixed w-full top-0 start-0 bg-surface/80 backdrop-blur-2xl transition-colors duration-500">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
          <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('images/logo/general/ospk384.webp') }}" class="h-8 md:h-10" alt="Dharmakala Logo">
            <span
              class="self-center text-2xl font-black tracking-tighter whitespace-nowrap text-on-surface">Dharmakala</span>
          </a>

          <div class="flex flex-col space-y-2 md:flex-row md:space-y-0 md:space-x-3 md:order-2 rtl:space-x-reverse">

            <!-- Open House Button -->
            <button onclick="window.location.href='/thamnet';" type="button"
              class="text-on-primary bg-primary hover:opacity-90 focus:ring-4 focus:outline-none focus:ring-primary/30 font-bold uppercase tracking-widest rounded-sm text-[10px] px-6 py-2.5 text-center transition-all">
              ThamNet
            </button>
            <!-- Hamburger Button -->
            <button data-collapse-toggle="navbar-sticky" type="button"
              class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
              aria-controls="navbar-sticky" aria-expanded="false">
              <span class="sr-only">Buka Menu</span>
              <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M1 1h15M1 7h15M1 13h15" />
              </svg>
            </button>
          </div>
          <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1 md:text-left text-center"
            id="navbar-sticky">
            <ul
              class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-outline/10 rounded-xl bg-surface md:bg-transparent md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 text-on-surface">
              <li>
                <a href="/publikasiprestasi"
                  class="block py-2 px-3 rounded-sm hover:bg-surface-variant/50 md:hover:bg-transparent md:hover:text-primary transition-colors md:p-0">Prestasi</a>
              </li>
              <li>
                <a href="/thalation"
                  class="block py-2 px-3 rounded-sm hover:bg-surface-variant/50 md:hover:bg-transparent md:hover:text-primary transition-colors md:p-0">Thalation</a>
              </li>
              <li>
                <a href="/programkerja" data-barba-prevent="self"
                  class="block py-2 px-3 rounded-sm hover:bg-surface-variant/50 md:hover:bg-transparent md:hover:text-primary transition-colors md:p-0">Program
                  Kerja</a>
              </li>
              <li>
                <a href="/merchandise" data-barba-prevent="self"
                  class="block py-2 px-3 rounded-sm hover:bg-surface-variant/50 md:hover:bg-transparent md:hover:text-primary transition-colors md:p-0">Merchandise</a>
              </li>

              <li>
                <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbarKabinet" class="block w-full py-2 px-3 rounded-sm
                          hover:bg-surface-variant/50 md:hover:bg-transparent md:border-0 md:hover:text-primary
                          md:p-0 md:w-auto transition-colors flex items-center justify-center md:justify-between">
                  <!-- Text -->
                  <span class="text-center">Kabinet</span>
                  <!-- Arrow -->
                  <svg class="w-4 h-4 ml-2 flex-shrink-0" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="m1 1 4 4 4-4" />
                  </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdownNavbarKabinet"
                  class="z-10 hidden font-normal bg-surface divide-y divide-outline/10 rounded-lg shadow-sm w-44 border border-outline/10">
                  <ul class="py-2 text-sm text-on-surface" aria-labelledby="dropdownLargeButton">
                    <li>
                      <a href="/kabinet/osis" data-barba-prevent="self"
                        class="block px-4 py-2 hover:bg-surface-variant/50">OSIS</a>
                    </li>
                    <li>
                      <a href="/kabinet/mpk" data-barba-prevent="self"
                        class="block px-4 py-2 hover:bg-surface-variant/50">MPK</a>
                    </li>
                  </ul>
                  <div class="py-1">
                    <a href="#"
                      class="block px-4 py-2 text-sm text-on-surface-variant hover:bg-surface-variant/50">Arsip
                      2024/2025</a>
                  </div>
                </div>
              </li>

              <li>
                <a href="https://smanu-mht.sch.id"
                  class="block py-2 px-3 rounded-sm hover:bg-surface-variant/50 md:hover:bg-transparent md:hover:text-primary transition-colors md:p-0">Web
                  Sekolah</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <div id="content" class="pt-16 md:pt-20 lg:pt-24">

      @if(session()->has('success') || isset($alert))
        <x-alert :alert="session('success') ?? ($alert ?? '')" :forwardLink="$alertForward ?? '/'" />
      @endif

      {{ $slot }}
    </div>

    <!-- Footer -->
    <footer class="w-full bg-surface shadow-sm border-t border-outline/10 text-on-surface">
      <div class="w-full max-w-screen-xl mx-auto px-4 py-12 md:py-16">
        <!-- Theme Selector -->
        <div class="mb-16 flex flex-col items-center">
          <h4
            class="text-[9px] md:text-[10px] font-black tracking-[0.5em] uppercase mb-8 md:mb-10 opacity-30 text-center">
            Theme Selector</h4>
          <div class="flex gap-4 md:gap-8 lg:gap-10 flex-wrap justify-center">
            <button onclick="setAppTheme('light')" class="flex flex-col items-center group">
              <div
                class="w-10 h-10 md:w-12 md:h-12 bg-[#173bab] shadow-xl ring-offset-2 ring-2 ring-transparent group-hover:ring-[#173bab] transition-all">
              </div>
              <span
                class="text-[8px] md:text-[9px] mt-3 font-black uppercase tracking-[0.2em] text-[#173bab] opacity-60 group-hover:opacity-100 transition-opacity">Default</span>
            </button>
            <button onclick="setAppTheme('dark')" class="flex flex-col items-center group">
              <div
                class="w-10 h-10 md:w-12 md:h-12 bg-[#5865F2] shadow-xl ring-offset-2 ring-2 ring-transparent group-hover:ring-[#5865F2] transition-all">
              </div>
              <span
                class="text-[8px] md:text-[9px] mt-3 font-black uppercase tracking-[0.2em] text-[#5865F2] opacity-60 group-hover:opacity-100 transition-opacity">Dark</span>
            </button>
            <button onclick="setAppTheme('ultradark')" class="flex flex-col items-center group">
              <div
                class="w-10 h-10 md:w-12 md:h-12 bg-[#313338] shadow-xl ring-offset-2 ring-2 ring-transparent group-hover:ring-[#FFFFFF] transition-all border border-outline/20">
              </div>
              <span
                class="text-[8px] md:text-[9px] mt-3 font-black uppercase tracking-[0.2em] text-on-surface opacity-40 group-hover:opacity-100 transition-opacity whitespace-nowrap">Ultra Dark</span>
            </button>
            <button onclick="setAppTheme('pastel-blue-purple')" class="flex flex-col items-center group">
              <div
                class="w-10 h-10 md:w-12 md:h-12 bg-[#A5B4FC] shadow-xl ring-offset-2 ring-2 ring-transparent group-hover:ring-[#A5B4FC] transition-all">
              </div>
              <span
                class="text-[8px] md:text-[9px] mt-3 font-black uppercase tracking-[0.2em] text-[#818CF8] opacity-60 group-hover:opacity-100 transition-opacity">MPK</span>
            </button>
            <button onclick="setAppTheme('pastel-pink')" class="flex flex-col items-center group">
              <div
                class="w-10 h-10 md:w-12 md:h-12 bg-[#FFB6C1] shadow-xl ring-offset-2 ring-2 ring-transparent group-hover:ring-[#FFB6C1] transition-all">
              </div>
              <span
                class="text-[8px] md:text-[9px] mt-3 font-black uppercase tracking-[0.2em] text-[#FF69B4] opacity-60 group-hover:opacity-100 transition-opacity">OSIS</span>
            </button>

          </div>
        </div>

        <div class="flex flex-col items-center sm:flex-row sm:justify-between sm:items-center">
          <!-- Logo + Title aligned left/center on mobile -->
          <a href="/" class="flex items-center mb-8 sm:mb-0 space-x-3 rtl:space-x-reverse text-center sm:text-left">
            <img src="{{ asset('images/logo/general/ospk384.webp') }}" class="h-8 md:h-10" alt="Dharmakala Logo" />
            <span
              class="self-center text-2xl font-black tracking-tighter whitespace-nowrap text-on-surface">Dharmakala</span>
          </a>
          <!-- Menu aligned right -->
          <ul
            class="flex flex-wrap items-center justify-center sm:justify-end gap-x-8 gap-y-4 text-[10px] font-black uppercase tracking-[0.2em] text-on-surface-variant">
            <li><a href="#" class="hover:text-primary transition-colors">WhatsApp</a></li>
            <li><a href="#" class="hover:text-primary transition-colors">Twitter</a></li>
            <li><a href="#" class="hover:text-primary transition-colors">Instagram</a></li>
            <li><a href="#" class="hover:text-primary transition-colors">Youtube</a></li>
          </ul>
        </div>
        <hr class="my-8 border-outline/10 lg:my-10" />
        <span class="block text-[10px] md:text-xs font-medium tracking-wide text-on-surface-variant sm:text-center">
          © 2026 <a href="/#" class="hover:text-primary transition-colors">Dharmandala Sandhyakala</a>. All Rights
          Reserved.
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