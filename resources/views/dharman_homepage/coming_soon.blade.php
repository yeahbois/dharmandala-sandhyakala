<x-layout title="Coming Soon | OSIS MHT">
    <x-slot:metadesc>
        <meta name="description" content="Coming Soon">
    </x-slot:metadesc>

    <div class="flex flex-col justify-center items-center text-center px-4 py-20 min-h-[70vh]">
        <img 
            src="{{ asset('images/web_working.jpg') }}" 
            alt="Coming Soon"
            class="w-48 h-48 mb-8 grayscale opacity-80"
        >

        <h1 class="text-5xl md:text-7xl font-black uppercase tracking-tighter text-on-surface mb-4">Coming Soon</h1>

        <p class="text-base md:text-lg text-on-surface-variant max-w-xl leading-relaxed uppercase tracking-widest font-medium opacity-70">
            Fitur ini akan segera hadir di website OSIS SMAN Unggulan M.H. Thamrin
        </p>

        <a href="/"
           class="mt-12 px-10 py-4 bg-primary text-on-primary text-xs font-bold uppercase tracking-widest rounded-sm shadow-xl hover:opacity-90 transition-all active:scale-95">
            Kembali ke Beranda
        </a>
    </div>
</x-layout>
