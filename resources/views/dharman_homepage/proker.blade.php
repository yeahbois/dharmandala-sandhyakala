<x-layout title="Program Kerja | Dharmandala Sandhyakala" keywords="program kerja, osis, mpk, sman mh thamrin">
    <x-slot:metadesc>
        <meta name="description" content="Kumpulan Program Kerja OSIS & MPK SMAN Unggulan M.H. Thamrin" />
    </x-slot:metadesc>

    <style>
        #proker-page {
            --theme-primary-600: #3358f4 !important; /* brand-blue */
            --theme-on-primary: #ffffff !important;
        }
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        .dp-slider {
            display: flex;
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            gap: 1.25rem;
            padding-bottom: 1.5rem;
            width: 100%;
            -webkit-overflow-scrolling: touch;
        }
        .dp-slide {
            scroll-snap-align: start;
            flex-shrink: 0;
        }
    </style>

    <main class="w-full bg-surface" id="proker-page">
        <!-- Hero Section -->
        <header class="min-h-screen flex flex-col justify-center max-w-7xl mx-auto px-8 relative overflow-hidden">
            <div class="absolute -top-24 -right-24 w-96 h-96 bg-primary/5 rounded-full blur-3xl"></div>
            <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-12">
                <div class="text-center md:text-left order-2 md:order-1 max-w-3xl">
                    <span class="inline-block px-3 py-1 bg-primary text-on-primary text-[10px] font-bold tracking-[0.2em] uppercase rounded-sm mb-6">
                        EST. 2025
                    </span>
                    <h1 class="text-5xl md:text-8xl font-black tracking-tighter leading-[0.9] mb-8 text-on-surface">
                        PROGRAM KERJA<br />
                        <span class="text-primary uppercase">KABINET</span>
                    </h1>
                    <p class="text-body-lg text-on-surface-variant leading-relaxed text-base md:text-lg italic opacity-80">
                        Total {{ $total_prokers }} Program Kerja di Dharmandala Sandhyakala
                    </p>
                </div>
                <div class="order-1 md:order-2 flex gap-4 transition-all duration-700 hover:scale-105 justify-center">
                    <img src="{{ asset('images/logo/general/osis514.webp') }}" class="w-24 h-24 md:w-48 md:h-48 object-contain drop-shadow-2xl" alt="OSIS Logo">
                    <img src="{{ asset('images/logo/general/mpk514.webp') }}" class="w-24 h-24 md:w-48 md:h-48 object-contain drop-shadow-2xl" alt="MPK Logo">
                </div>
            </div>
        </header>

        <div class="max-w-7xl mx-auto px-4 md:px-0">
            <!-- OSIS SECTION -->
            <section class="max-w-7xl mx-auto px-8 mb-32">
                <div class="flex items-end justify-between mb-16 border-b-2 border-primary pb-4">
                    <div class="text-left">
                        <h2 class="text-[10px] font-bold tracking-[0.4em] uppercase text-primary mb-2">OSIS</h2>
                        <h3 class="text-4xl md:text-5xl font-black tracking-tighter text-on-surface uppercase sm:whitespace-nowrap">
                            DIVISI OSIS
                        </h3>
                    </div>
                </div>

                <div class="space-y-24">
                    @foreach($osis_divisis as $divisi)
                        @if($divisi->programKerjas->count() > 0)
                        <div>
                            <div class="flex justify-between items-end mb-10 gap-4">
                                <div class="text-left w-full md:w-auto">
                                    <span class="text-[10px] font-bold tracking-[0.4em] uppercase text-primary mb-2" style="color:var(--theme-primary-600);">{{ $divisi->group }}</span>
                                    <h2 class="text-3xl md:text-4xl font-black tracking-tighter uppercase">{{ $divisi->name }}</h2>
                                </div>
                                <div class="flex gap-2">
                                    <button class="w-10 h-10 flex items-center justify-center bg-surface-variant/50 hover:bg-primary hover:text-on-primary transition-all cursor-pointer rounded-sm" onclick="document.getElementById('sc-proker-{{ $divisi->id }}').scrollBy({left: -400, behavior: 'smooth'})"><span class="material-symbols-outlined">chevron_left</span></button>
                                    <button class="w-10 h-10 flex items-center justify-center bg-surface-variant/50 hover:bg-primary hover:text-on-primary transition-all cursor-pointer rounded-sm" onclick="document.getElementById('sc-proker-{{ $divisi->id }}').scrollBy({left: 400, behavior: 'smooth'})"><span class="material-symbols-outlined">chevron_right</span></button>
                                </div>
                            </div>
                            
                            <div id="sc-proker-{{ $divisi->id }}" class="dp-slider hide-scrollbar">
                                @foreach($divisi->programKerjas as $proker)
                                <div class="dp-slide" style="width:clamp(260px, 75vw, 420px); background:var(--theme-background); border:1px solid color-mix(in srgb, var(--theme-outline) 15%, transparent);">
                                    <div style="aspect-ratio:16/9; overflow:hidden;">
                                        <img src="{{ isset($proker->pictures_urls[0]) ? asset($proker->pictures_urls[0]) : asset('images/logo/osis/akad514.webp') }}" class="w-full h-full object-cover transition-all duration-500">
                                    </div>
                                    <div style="padding:1.5rem;">
                                        <div class="flex justify-between items-center mb-4">
                                            <span style="color:var(--theme-primary-600); margin:0; font-size:7px; font-weight:900; letter-spacing:0.4em; text-transform:uppercase;">{{ $proker->divisi->name ?? '' }}</span>
                                            <span style="font-size:9px; font-weight:700; opacity:0.4;">{{ $proker->date ? \Carbon\Carbon::parse($proker->date)->format('M d') : '' }}</span>
                                        </div>
                                        <h3 style="font-size:clamp(1.1rem, 2vw, 1.4rem); font-weight:950; margin-bottom:8px; letter-spacing:-0.02em;">{{ $proker->title }}</h3>
                                        <p class="text-[10px] opacity-60 mb-6 leading-relaxed line-clamp-3">{{ Str::limit(strip_tags($proker->content), 120) }}</p>
                                        <a href="/programkerja/{{ $proker->id }}" class="inline-flex items-center gap-2 text-[9px] font-black uppercase tracking-widest" style="color:var(--theme-primary-600);">Details <span class="material-symbols-outlined text-sm">arrow_forward</span></a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
            </section>

            <!-- MPK SECTION -->
            <section class="max-w-7xl mx-auto px-8 mb-32">
                <div class="flex items-end justify-between mb-16 border-b-2 border-primary pb-4">
                    <div class="text-left">
                        <h2 class="text-[10px] font-bold tracking-[0.4em] uppercase text-primary mb-2">MPK</h2>
                        <h3 class="text-4xl md:text-5xl font-black tracking-tighter text-on-surface uppercase sm:whitespace-nowrap">
                            KOMISI MPK
                        </h3>
                    </div>
                </div>

                <div class="space-y-24">
                    @foreach($mpk_divisis as $divisi)
                        @if($divisi->programKerjas->count() > 0)
                        <div>
                            <div class="flex justify-between items-end mb-10 gap-4">
                                <div class="text-left w-full md:w-auto">
                                    <span class="text-[10px] font-bold tracking-[0.4em] uppercase text-primary mb-2" style="color:var(--theme-primary-600);">{{ $divisi->group }}</span>
                                    <h2 class="text-3xl md:text-4xl font-black tracking-tighter uppercase">{{ $divisi->name }}</h2>
                                </div>
                                <div class="flex gap-2">
                                    <button class="w-10 h-10 flex items-center justify-center bg-surface-variant/50 hover:bg-primary hover:text-on-primary transition-all cursor-pointer rounded-sm" onclick="document.getElementById('sc-proker-{{ $divisi->id }}').scrollBy({left: -400, behavior: 'smooth'})"><span class="material-symbols-outlined">chevron_left</span></button>
                                    <button class="w-10 h-10 flex items-center justify-center bg-surface-variant/50 hover:bg-primary hover:text-on-primary transition-all cursor-pointer rounded-sm" onclick="document.getElementById('sc-proker-{{ $divisi->id }}').scrollBy({left: 400, behavior: 'smooth'})"><span class="material-symbols-outlined">chevron_right</span></button>
                                </div>
                            </div>
                            
                            <div id="sc-proker-{{ $divisi->id }}" class="dp-slider hide-scrollbar">
                                @foreach($divisi->programKerjas as $proker)
                                <div class="dp-slide" style="width:clamp(260px, 75vw, 420px); background:var(--theme-background); border:1px solid color-mix(in srgb, var(--theme-outline) 15%, transparent);">
                                    <div style="aspect-ratio:16/9; overflow:hidden;">
                                        <img src="{{ isset($proker->pictures_urls[0]) ? asset($proker->pictures_urls[0]) : asset('images/logo/osis/akad514.webp') }}" class="w-full h-full object-cover transition-all duration-500">
                                    </div>
                                    <div style="padding:1.5rem;">
                                        <div class="flex justify-between items-center mb-4">
                                            <span style="color:var(--theme-primary-600); margin:0; font-size:7px; font-weight:900; letter-spacing:0.4em; text-transform:uppercase;">{{ $proker->divisi->name ?? '' }}</span>
                                            <span style="font-size:9px; font-weight:700; opacity:0.4;">{{ $proker->date ? \Carbon\Carbon::parse($proker->date)->format('M d') : '' }}</span>
                                        </div>
                                        <h3 style="font-size:clamp(1.1rem, 2vw, 1.4rem); font-weight:950; margin-bottom:8px; letter-spacing:-0.02em;">{{ $proker->title }}</h3>
                                        <p class="text-[10px] opacity-60 mb-6 leading-relaxed line-clamp-3">{{ Str::limit(strip_tags($proker->content), 120) }}</p>
                                        <a href="/programkerja/{{ $proker->id }}" class="inline-flex items-center gap-2 text-[9px] font-black uppercase tracking-widest" style="color:var(--theme-primary-600);">Details <span class="material-symbols-outlined text-sm">arrow_forward</span></a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
            </section>
        </div>
    </main>
</x-layout>
