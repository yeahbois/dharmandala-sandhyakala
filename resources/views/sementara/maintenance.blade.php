<x-layout title="Maintenance | OSIS MHT">
    <x-slot:metadesc>
        <meta name="description" content="Website sedang dalam maintenance">
    </x-slot:metadesc>

    <div class="min-h-dvh w-screen flex flex-col justify-center items-center text-center bg-gray-100 px-4">
        <img 
            src="{{ asset('images/web_working.jpg') }}" 
            alt="Maintenance"
            class="w-40 h-40 mb-6"
        >

        <h1 class="text-6xl font-extrabold text-gray-800">Maintenance</h1>

        <p class="mt-4 text-lg md:text-xl text-gray-600 max-w-xl">
            Website resmi OSIS SMAN Unggulan M.H. Thamrin sedang dalam proses
            pembaruan. Kami akan segera kembali dengan tampilan dan fitur baru.
        </p>

        <a href="/"
           class="mt-8 px-8 py-3 bg-blue-600 text-white text-lg rounded-xl shadow hover:bg-blue-700 transition">
            Kembali ke Beranda
        </a>
    </div>
</x-layout>
