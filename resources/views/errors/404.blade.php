<x-layout title="OSIS MPK MHT">
    <x-slot:metadesc>
        <meta name="description" content="Klik sekarang untuk menemukan kegiatan seru, proyek keren, dan cara ikut berkontribusi!">
        <meta property="og:title" content="Beranda OSIS MPK SMA Negeri Unggulan M. H. Thamrin 2024/2025">
        <meta property="og:description" content="Cari tahu event terbaru OSIS MPK MHT dan ikut berkontribusi dalam kegiatan sekolah!">
        <meta property="og:image" content="https://ospkmhthamrin.com/images/potrait/ospkfull.jpg">
    </x-slot:metadesc>
    
        <div class="h-screen w-screen flex flex-col justify-start items-center text-gray-800 bg-gray-100 relative text-center px-4">
            <img src="{{ asset('images/cryemoji.jpg') }}" alt="Not Found" 
                class="w-40 h-40 mb-6 mt-10">

            <h1 class="text-7xl font-extrabold">404</h1>
            <p class="mt-4 text-lg sm:text-xl text-gray-600">
                Maaf. Web Official OSPK MH Thamrin sedang dalam maintenance. URL yang bisa diakses hanya PudoBooth
            </p>

            <a href="{{ url('/pudobooth/queue') }}" 
            class="mt-8 px-8 py-3 bg-blue-600 text-white text-lg rounded-xl shadow-lg hover:bg-blue-700 hover:scale-105 transform transition">
            Daftar PudoBooth!
            </a>
        </div>
</x-layout>