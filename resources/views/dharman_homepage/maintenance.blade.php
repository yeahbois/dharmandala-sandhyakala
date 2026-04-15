<x-layout title="Maintenance | OSIS MHT">
    <x-slot:metadesc>
        <meta name="description" content="Website sedang dalam maintenance">
    </x-slot:metadesc>

    <div class="flex flex-col justify-center items-center text-center px-4 py-20 min-h-[70vh]">
        <img 
            src="{{ asset('images/web_working.jpg') }}" 
            alt="Maintenance"
            class="w-48 h-48 mb-8 grayscale opacity-80"
        >

        <h1 class="text-5xl md:text-7xl font-black uppercase tracking-tighter text-on-surface mb-4">Maintenance</h1>

        <p class="text-base md:text-lg text-on-surface-variant max-w-xl leading-relaxed uppercase tracking-widest font-medium opacity-70">
            Website resmi OSIS SMAN Unggulan M.H. Thamrin sedang dalam proses
            pembaruan. Kami akan segera kembali dengan tampilan dan fitur baru.
        </p>

        <a href="/"
           class="mt-12 px-10 py-4 bg-primary text-on-primary text-xs font-bold uppercase tracking-widest rounded-sm shadow-xl hover:opacity-90 transition-all active:scale-95">
            Kembali ke Beranda
        </a>
    </div>
</x-layout>
