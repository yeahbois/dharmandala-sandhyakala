<x-layout title="OSIS SMAN Unggulan M.H. Thamrin">
    <x-slot:metadesc>
        <meta name="description" content="OSIS SMAN Unggulan M.H. Thamrin - Open House 2026">
        <meta property="og:title" content="OSIS SMAN Unggulan M.H. Thamrin">
        <meta property="og:description" content="Promosi Open House 2026 SMAN Unggulan M.H. Thamrin">
        <meta property="og:image" content="{{ asset('images/potrait/ospkfull.jpg') }}">
    </x-slot:metadesc>

    <div class="min-h-dvh w-screen flex flex-col justify-center items-center text-center bg-gray-100 px-4">
        <img 
            src="{{ asset('images/logo/general/ospk514.webp') }}" 
            alt="OSIS Logo"
            class="w-24 h-24 md:w-32 md:h-32 mb-6"
        >

        <h1 class="text-3xl md:text-6xl font-extrabold text-gray-800">
            OSIS SMAN UNGGULAN<br>M.H. THAMRIN
        </h1>

        <p class="mt-4 text-lg md:text-2xl font-semibold text-gray-600">
            OPEN HOUSE 2026
        </p>

        <div class="mt-10 flex flex-col sm:flex-row gap-4">
            <a href="/openhouse26"
               class="px-8 py-4 bg-blue-600 text-white text-lg font-semibold rounded-xl shadow-lg hover:bg-blue-700 transition">
                DAFTAR SEKARANG
            </a>

            <a href="/oh/ticket"
               class="px-8 py-4 bg-gray-800 text-white text-lg font-semibold rounded-xl shadow-lg hover:bg-gray-900 transition">
                CHECK TICKET
            </a>
        </div>
    </div>
</x-layout>
