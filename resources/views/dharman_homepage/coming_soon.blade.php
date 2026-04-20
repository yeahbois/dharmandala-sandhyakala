<x-layout title="Coming Soon | OSIS MHT">
    <x-slot:metadesc>
        <meta name="description" content="Coming Soon">
    </x-slot:metadesc>

    <div class="flex flex-col justify-center items-center text-center px-6 py-20 min-h-screen bg-background">
        <div class="relative mb-12">
            <div class="absolute inset-0 bg-primary/10 blur-3xl rounded-none opacity-50 scale-150"></div>
            <img
                src="{{ asset('images/web_working.jpg') }}"
                alt="Coming Soon"
                class="w-40 md:w-56 h-auto relative z-10 brightness-90 contrast-125 transition-all duration-700"
            >
        </div>

        <h1 class="text-5xl md:text-8xl font-black uppercase tracking-tighter text-on-surface mb-6 leading-none">
            COMING<br/>SOON
        </h1>

        <p class="text-sm md:text-lg text-on-surface-variant max-w-lg leading-relaxed uppercase tracking-[0.2em] font-medium opacity-60 px-4">
            Fitur ini sedang dikembangkan oleh tim IT Dharmandala Sandhyakala. Segera hadir di website ini.
        </p>

        <div class="mt-16 flex flex-col sm:flex-row gap-4">
            <a href="/"
               class="px-10 py-4 bg-primary text-on-primary text-[10px] md:text-xs font-black uppercase tracking-[0.3em] shadow-2xl hover:brightness-110 transition-all active:scale-95 text-center">
                Kembali ke Beranda
            </a>
            <a href="/thamnet"
               class="px-10 py-4 bg-surface-variant text-on-surface-variant text-[10px] md:text-xs font-black uppercase tracking-[0.3em] border border-outline/10 hover:bg-surface transition-all text-center">
                ThamNet Portal
            </a>
        </div>
    </div>
</x-layout>
