<x-layout title="Open House 2026 | Cek Tiket">
    <x-slot:metadesc>
        <meta name="description" content="Open House SMAN Unggulan M.H. Thamrin 2026">
        <meta property="og:title" content="Open House SMAN Unggulan M.H. Thamrin 2026">
        <meta property="og:image" content="{{ asset('images/potrait/ospkfull.jpg') }}">
    </x-slot:metadesc>

    <h1>
        Check ticket
    </h1>

    <form action="/oh/ticket/data" method="GET" class="mt-6">
        <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap:</label>
        <input type="text" name="name" id="name" required
               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm
                      focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
        <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
        <input type="email" name="email" id="email" required
               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm
                      focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
        <button type="submit"
                class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700
                       focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            Cek Tiket
        </button>
    </form>

</x-layout>