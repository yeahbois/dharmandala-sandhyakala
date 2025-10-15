<x-layout title="OSIS MPK MHT">
    <x-slot:metadesc>
        <meta name="description" content="Klik sekarang untuk menemukan kegiatan seru, proyek keren, dan cara ikut berkontribusi!">
        <meta property="og:title" content="Beranda OSIS MPK SMA Negeri Unggulan M. H. Thamrin 2024/2025">
        <meta property="og:description" content="Cari tahu event terbaru OSIS MPK MHT dan ikut berkontribusi dalam kegiatan sekolah!">
        <meta property="og:image" content="https://ospkmhthamrin.com/images/potrait/ospkfull.jpg">
    </x-slot:metadesc>

    <div class="min-h-screen bg-gray-100 font-sans p-6">
        <header class="text-center mb-10">
            <h1 class="text-3xl font-bold text-gray-800">PudoBooth Admin Dashboard</h1>
        </header>

        {{-- Render the queue component --}}
        <x-pudobooth.queue-admin/>
    </div>
</x-layout>