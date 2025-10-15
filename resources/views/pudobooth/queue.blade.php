<x-layout title="OSIS MPK MHT">
    <x-slot:metadesc>
        <meta name="description" content="Klik sekarang untuk menemukan kegiatan seru, proyek keren, dan cara ikut berkontribusi!">
        <meta property="og:title" content="Beranda OSIS MPK SMA Negeri Unggulan M. H. Thamrin 2024/2025">
        <meta property="og:description" content="Cari tahu event terbaru OSIS MPK MHT dan ikut berkontribusi dalam kegiatan sekolah!">
        <meta property="og:image" content="https://ospkmhthamrin.com/images/potrait/ospkfull.jpg">
    </x-slot:metadesc>

    <div class="min-h-screen flex items-center justify-center bg-gray-100 font-sans p-6">
        <div class="bg-white w-full max-w-md p-8 rounded-xl shadow-md text-center">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Join the PudoBooth Queue</h1>

            <form action="#" method="POST" class="space-y-5 text-left">
                {{-- @csrf --}}
                <div>
                    <label for="nama" class="block text-sm font-semibold text-gray-700 mb-1">Nama</label>
                    <input type="text" id="nama" name="nama" required
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
                </div>

                <div>
                    <label for="kelas" class="block text-sm font-semibold text-gray-700 mb-1">Kelas</label>
                    <input type="text" id="kelas" name="kelas" required
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
                </div>

                <div>
                    <label for="no_telp" class="block text-sm font-semibold text-gray-700 mb-1">No Telp</label>
                    <input type="tel" id="no_telp" name="no_telp" required
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
                </div>

                <button type="submit"
                    class="w-full bg-green-600 text-white py-3 rounded-md font-semibold text-lg transition-colors duration-300 hover:bg-green-700">
                    Submit
                </button>
            </form>

            <div class="mt-6 text-lg font-semibold text-gray-700">
                Current queue: <span class="text-green-600">0</span>
            </div>
        </div>
    </div>
</x-layout>