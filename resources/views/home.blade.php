<x-layout title="OSIS MPK MHT" :alert="$alert" :alertForward="$alertForward">
    <x-slot:metadesc>
        <meta name="description" content="Klik sekarang untuk menemukan kegiatan seru, proyek keren, dan cara ikut berkontribusi!">
        <meta property="og:title" content="Beranda OSIS MPK SMA Negeri Unggulan M. H. Thamrin 2024/2025">
        <meta property="og:description" content="Cari tahu event terbaru OSIS MPK MHT dan ikut berkontribusi dalam kegiatan sekolah!">
        <meta property="og:image" content="https://ospkmhthamrin.com/images/potrait/ospkfull.jpg">
    </x-slot:metadesc>

  <style>
    html, body {
      scroll-behavior: smooth;
      height: 100%;
    }
    body {
      scroll-snap-type: y mandatory; /* snap each section */
      overflow-y: scroll;
    }
    section {
      scroll-snap-align: start;
    }
  </style>

    <section id="home" 
    style="background-image: url('{{ asset('images/potrait/darkened_ospkfull.jpg') }}')" 
    class="grid grid-cols-1 md:grid-cols-2 md:h-screen w-screen text-white relative p-4 sm:p-8 bg-center bg-cover">

    <!-- Logo -->
    <div class="flex justify-center h-auto">
        <img class="mt-12 md:mt-32 w-24 h-24 md:w-72 md:h-72" 
             src="{{ asset('images/logo/general/ospk514.webp') }}" 
             alt="Logo">
    </div>

    <!-- Text -->
    <div class="flex flex-col items-center justify-start text-center mb-32 md:mb-48">
        <h1 class="mt-6 md:mt-32 text-4xl md:text-8xl font-bold">Welcome.</h1>
        <p class="text-sm md:text-2xl mt-2 md:mt-4">
            OSIS/MPK SMAN Unggulan M.H. Thamrin Official Website
        </p>
        <button onclick="location.href='/thamnet';" 
            type="button" 
            class="px-5 py-2 md:px-10 md:py-5 text-sm md:text-2xl text-white 
                   bg-gradient-to-r from-cyan-500 to-blue-500 
                   hover:bg-gradient-to-bl focus:ring-4 focus:outline-none 
                   focus:ring-cyan-300 dark:focus:ring-cyan-800 
                   font-medium rounded-lg mt-3 md:mt-6">
            THAMRIN'S OPEN HOUSE
        </button>
    </div>

    <x-divider type="cloud" color="#F2EBE2"/>
    </section>

    <section id="kepsekpembina" class="relative w-screen min-h-screen md:h-screen flex flex-col text-gray-800 bg-[#F2EBE2]">
        <div class="flex-1 flex flex-col pb-20 md:pb-0">
            <div class="text-lg sm:text-2xl md:text-3xl font-bold text-center pt-3 sm:pt-4 md:pt-2 pb-3 sm:pb-6">
                SAMBUTAN KEPALA SEKOLAH DAN PEMBINA OSIS
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 w-full h-full divide-y md:divide-y-0 md:divide-x divide-black/50">
                <!-- Kepala Sekolah -->
                <div class="flex flex-col md:flex-row items-center md:items-start justify-center p-2 sm:p-4 gap-2 sm:gap-4">
                    <img src="{{ asset('images/jon.png') }}" alt="Kepala Sekolah" 
                        class="flex-shrink-0 w-36 h-36 sm:w-44 sm:h-44 md:w-64 md:h-64 object-contain">
                    <p class="flex-1 text-justify leading-relaxed max-w-md text-xs sm:text-sm md:text-base">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam eligendi aspernatur ab aut impedit quis minima laborum corporis quibusdam quidem placeat expedita quasi assumenda vitae, maxime obcaecati adipisci molestias libero? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum, assumenda illo. Illo quisquam eaque omnis consectetur provident blanditiis eos. Voluptatem quia ratione ipsa, in commodi corrupti laborum ipsam excepturi nam!
                    </p>
                </div>
                <!-- Pembina OSIS -->
                <div class="flex flex-col md:flex-row-reverse items-center md:items-start justify-center p-2 sm:p-4 gap-2 sm:gap-4">
                    <img src="{{ asset('images/jon.png') }}" alt="Pembina OSIS" 
                        class="flex-shrink-0 w-36 h-36 sm:w-44 sm:h-44 md:w-64 md:h-64 object-contain">
                    <p class="flex-1 text-justify leading-relaxed max-w-md text-xs sm:text-sm md:text-base">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam eligendi aspernatur ab aut impedit quis minima laborum corporis quibusdam quidem placeat expedita quasi assumenda vitae, maxime obcaecati adipisci molestias libero? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum, assumenda illo. Illo quisquam eaque omnis consectetur provident blanditiis eos. Voluptatem quia ratione ipsa, in commodi corrupti laborum ipsam excepturi nam!
                    </p>
                </div>
            </div>
        </div>
        <!-- Divider -->
        <div class="absolute bottom-0 left-0 w-full scale-y-75">
            <x-divider type="wave" color="#c52c2b"/>
        </div>
    </section>

    <section id="osis" class="min-h-screen w-screen flex flex-col items-center justify-center relative overflow-hidden bg-[#c52c2b] text-white">
        <div class="flex-1 flex flex-col">
            <!-- Title -->
            <div class="text-lg sm:text-2xl md:text-3xl font-bold text-center py-4">
            OSIS
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 w-full">
            <!-- Subsection Foto + Teks -->
            <div class="flex flex-col md:flex-row items-center justify-center p-4 gap-4">
                <img src="{{ asset('images/jon.png') }}" alt="Kepala Sekolah" 
                    class="w-32 h-32 sm:w-44 sm:h-44 md:w-64 md:h-64 object-contain">
                <p class="flex-1 text-justify leading-relaxed max-w-md text-xs sm:text-sm md:text-base">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam eligendi aspernatur ab aut impedit quis minima laborum corporis quidem placeat expedita quasi assumenda vitae.
                </p>
            </div>

            <!-- Subsection Card -->
            <div class="p-4 flex items-start justify-center">
                <div class="grid grid-cols-2 md:grid-cols-3 gap-2 w-full">
                <!-- BPH full row -->
                <a href="#" class="relative rounded-lg overflow-hidden shadow-md col-span-2 md:col-span-3 group h-20 sm:h-24 md:h-32">
                    <img src="{{ asset('images/jon.png') }}" alt="BPH" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-white/20 group-hover:bg-white/10 transition flex items-center justify-center">
                    <h3 class="text-sm sm:text-base md:text-lg font-bold text-black">BADAN PENGURUS HARIAN</h3>
                    </div>
                </a>

                <!-- Seksi -->
                <a href="#" class="relative rounded-lg overflow-hidden shadow-md group h-16 sm:h-20 md:h-28">
                    <img src="{{ asset('images/jon.png') }}" alt="K3OR" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-white/20 group-hover:bg-white/10 transition flex items-center justify-center">
                    <h3 class="text-xs sm:text-sm font-bold text-black">SEKSI K3OR</h3>
                    </div>
                </a>
                <a href="#" class="relative rounded-lg overflow-hidden shadow-md group h-16 sm:h-20 md:h-28">
                    <img src="{{ asset('images/jon.png') }}" alt="SASBUD" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-white/20 group-hover:bg-white/10 transition flex items-center justify-center">
                    <h3 class="text-xs sm:text-sm font-bold text-black">SEKSI SASBUD</h3>
                    </div>
                </a>
                <a href="#" class="relative rounded-lg overflow-hidden shadow-md group h-16 sm:h-20 md:h-28">
                    <img src="{{ asset('images/jon.png') }}" alt="PUBDOG" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-white/20 group-hover:bg-white/10 transition flex items-center justify-center">
                    <h3 class="text-xs sm:text-sm font-bold text-black">SEKSI PUBDOG</h3>
                    </div>
                </a>
                <a href="#" class="relative rounded-lg overflow-hidden shadow-md group h-16 sm:h-20 md:h-28">
                    <img src="{{ asset('images/jon.png') }}" alt="AKADEMIS" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-white/20 group-hover:bg-white/10 transition flex items-center justify-center">
                    <h3 class="text-xs sm:text-sm font-bold text-black">SEKSI AKADEMIS</h3>
                    </div>
                </a>
                <a href="#" class="relative rounded-lg overflow-hidden shadow-md group h-16 sm:h-20 md:h-28">
                    <img src="{{ asset('images/jon.png') }}" alt="DHL" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-white/20 group-hover:bg-white/10 transition flex items-center justify-center">
                    <h3 class="text-xs sm:text-sm font-bold text-black">SEKSI DHL</h3>
                    </div>
                </a>
                <a href="#" class="relative rounded-lg overflow-hidden shadow-md group h-16 sm:h-20 md:h-28">
                    <img src="{{ asset('images/jon.png') }}" alt="ROHANI" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-white/20 group-hover:bg-white/10 transition flex items-center justify-center">
                    <h3 class="text-xs sm:text-sm font-bold text-black">SEKSI ROHANI</h3>
                    </div>
                </a>
                </div>
            </div>
            </div>
        </div>

        <div class="absolute bottom-0 left-0 w-full scale-y-75">
            <x-divider type="wave" color="#456191"/>
        </div>
    </section>

    <section id="mpk" class="min-h-screen w-screen flex flex-col items-center justify-center relative overflow-hidden bg-[#456191] text-white">
        <div class="flex-1 flex flex-col">
            <!-- Title -->
            <div class="text-lg sm:text-2xl md:text-3xl font-bold text-center py-4">
            MPK
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 w-full">
            <!-- Foto + Teks -->
            <div class="flex flex-col md:flex-row items-center justify-center p-4 gap-4">
                <img src="{{ asset('images/jon.png') }}" alt="Ketua MPK" 
                    class="w-32 h-32 sm:w-44 sm:h-44 md:w-64 md:h-64 object-contain">
                <p class="flex-1 text-justify leading-relaxed max-w-md text-xs sm:text-sm md:text-base">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam eligendi aspernatur ab aut impedit quis minima laborum corporis quidem placeat expedita quasi assumenda vitae.
                </p>
            </div>

            <!-- Card -->
            <div class="p-4 flex items-start justify-center">
                <div class="grid grid-cols-2 md:grid-cols-3 gap-2 w-full">
                <!-- BPH -->
                <a href="#" class="relative rounded-lg overflow-hidden shadow-md col-span-2 md:col-span-3 group h-20 sm:h-24 md:h-32">
                    <img src="{{ asset('images/jon.png') }}" alt="BPH MPK" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-white/20 group-hover:bg-white/10 transition flex items-center justify-center">
                    <h3 class="text-sm sm:text-base md:text-lg font-bold text-black">BADAN PENGURUS HARIAN</h3>
                    </div>
                </a>

                <!-- Komisi -->
                <a href="#" class="relative rounded-lg overflow-hidden shadow-md group h-16 sm:h-20 md:h-28">
                    <img src="{{ asset('images/jon.png') }}" alt="Komisi A" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-white/20 group-hover:bg-white/10 transition flex items-center justify-center">
                    <h3 class="text-xs sm:text-sm font-bold text-black">KOMISI A</h3>
                    </div>
                </a>
                <a href="#" class="relative rounded-lg overflow-hidden shadow-md group h-16 sm:h-20 md:h-28">
                    <img src="{{ asset('images/jon.png') }}" alt="Komisi B" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-white/20 group-hover:bg-white/10 transition flex items-center justify-center">
                    <h3 class="text-xs sm:text-sm font-bold text-black">KOMISI B</h3>
                    </div>
                </a>
                <a href="#" class="relative rounded-lg overflow-hidden shadow-md group h-16 sm:h-20 md:h-28">
                    <img src="{{ asset('images/jon.png') }}" alt="Komisi C" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-white/20 group-hover:bg-white/10 transition flex items-center justify-center">
                    <h3 class="text-xs sm:text-sm font-bold text-black">KOMISI C</h3>
                    </div>
                </a>
                </div>
            </div>
            </div>
        </div>

        <div class="absolute bottom-0 left-0 w-full scale-y-75">
            <x-divider type="wave" color="#d238f4ff"/>
        </div>
    </section>

    <section id="proker" style="background-color:#d238f4ff;" class="h-screen w-screen flex flex-col items-start text-gray-800 relative">
        <div class="pb-40 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-4">Program Kerja</h1>
            <p class="text-base md:text-lg text-center px-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facere error quaerat animi. Quod aperiam ducimus error quibusdam voluptatibus non vero sequi natus libero id dolorum reiciendis, amet iusto in molestiae?</p>
        </div>
        <!-- X-PROKER -->
        <x-divider type="oval" color="#0febffff"/>
    </section>

    <section id="logo" style="background-color:#0febffff;" class="h-screen w-screen flex flex-col items-start text-gray-800 relative">
        <div class="pb-40 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-4">Logo</h1>
            <p class="text-base md:text-lg text-center px-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facere error quaerat animi. Quod aperiam ducimus error quibusdam voluptatibus non vero sequi natus libero id dolorum reiciendis, amet iusto in molestiae?</p>
        </div>
        <x-divider type="cloud" color="#f1f1f1ff"/>
    </section>

    <section id="merch" style="background-color:#f1f1f1ff;" class="h-screen w-screen flex flex-col items-start text-gray-800 relative">
        <div class="pb-40 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-4">Merchandise</h1>
            <p class="text-base md:text-lg text-center px-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facere error quaerat animi. Quod aperiam ducimus error quibusdam voluptatibus non vero sequi natus libero id dolorum reiciendis, amet iusto in molestiae?</p>
        </div>
        <x-divider type="cloud" color="#f1f1f1ff"/>
    </section>

    <section id="findus" style="background-color:#f1f1f1ff;" class="h-screen w-screen flex flex-col items-start text-gray-800 relative">
        <div class="pb-40 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-4">Karya Kami</h1>
            <p class="text-base md:text-lg text-center px-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facere error quaerat animi. Quod aperiam ducimus error quibusdam voluptatibus non vero sequi natus libero id dolorum reiciendis, amet iusto in molestiae?</p>
        </div>
    </section>

</x-layout>