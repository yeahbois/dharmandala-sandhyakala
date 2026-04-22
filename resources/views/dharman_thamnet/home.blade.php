<x-layout title="ThamNet - Beranda" keywords="thamnet, blog, akademis">
    <x-slot:metadesc>
        <meta name="description"
            content="The digital heartbeat of Dharmandala Sandhyakala. A curated ecosystem for the elite minds of M.H. Thamrin." />
        <meta property="og:title" content="ThamNet - Dharmandala Sandhyakala">
        <meta property="og:description"
            content="The digital heartbeat of Dharmandala Sandhyakala. A curated ecosystem for the elite minds of M.H. Thamrin.">
        <meta property="og:image" content="{{ asset('images/logo/osis/akad514.webp') }}">
    </x-slot:metadesc>

    <style>
        /* Shared Styles from Homepage */
        * { border-radius: 0 !important; }
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        iframe { border: none; }
        .dp-section {
            align-self: stretch;
            width: 100%;
            min-height: 100svh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }
        .dp-inner {
            width: 100%;
            max-width: 1536px;
            margin: 0 auto;
            padding: clamp(2rem, 8vh, 5rem) clamp(1rem, 6vw, 4.5rem);
            display: flex;
            flex-direction: column;
        }
        .dp-h1 {
            font-size: clamp(2rem, 10vw, 8.5rem);
            font-weight: 900;
            line-height: 0.85;
            letter-spacing: -0.05em;
            text-transform: uppercase;
            word-break: break-word;
            overflow-wrap: break-word;
        }
        .dp-h2 {
            font-size: clamp(1.6rem, 6vw, 5rem);
            font-weight: 950;
            line-height: 1;
            letter-spacing: -0.04em;
            text-transform: uppercase;
            word-break: break-word;
            overflow-wrap: break-word;
        }
        .dp-label {
            font-size: clamp(8px, 1.25vw, 12px);
            font-weight: 900;
            letter-spacing: 0.45em;
            text-transform: uppercase;
            display: block;
            margin-bottom: 0.5rem;
        }
        .dp-body {
            font-size: clamp(0.85rem, 1.6vw, 1.15rem);
            line-height: 1.6;
            font-weight: 300;
        }
        .dp-slider {
            display: flex;
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            gap: 1.25rem;
            padding-bottom: 1.5rem;
            width: 100%;
            -webkit-overflow-scrolling: touch;
        }
        .dp-slider::-webkit-scrollbar { display: none; }
        .dp-slider { -ms-overflow-style: none; scrollbar-width: none; }
        @media (min-width: 1024px) {
            .dp-slider {
                margin: 0; padding: 0;
                overflow-x: auto;
                flex-wrap: nowrap;
            }
        }
        .dp-slide {
            scroll-snap-align: start;
            flex-shrink: 0;
        }
        .mobile-center-stack { text-align: center; align-items: center; }
        @media (min-width: 1024px) {
            .mobile-center-stack { text-align: left; align-items: flex-start; }
        }
        .btn-base {
            padding: 0.9rem 2.2rem; font-size: 9px; font-weight: 950; 
            letter-spacing: 0.25em; text-transform: uppercase; transition: all 0.3s;
            display: inline-flex; align-items:center; justify-content:center;
            border: 1px solid transparent;
            cursor: pointer;
        }
        .btn-pri { background: #fff; color: #000; }
        .btn-pri:hover { background: #eee; }
        .btn-sec { background: rgba(255,255,255,0.08); border-color: rgba(255,255,255,0.25); color: #fff; }
        .btn-sec:hover { background: rgba(255,255,255,0.15); }
        .btn-pri-theme { background: var(--theme-primary-600); color: var(--theme-on-primary); }
        .btn-pri-theme:hover { filter: brightness(1.1); }
        .btn-sec-theme { background: var(--theme-surface-variant); color: var(--theme-on-surface); border-color: color-mix(in srgb, var(--theme-outline) 15%, transparent); }
        .btn-sec-theme:hover { background: var(--theme-surface); }
        .slider-nav-btn {
            width: 2.5rem; height: 2.5rem;
            display: flex; align-items: center; justify-content: center;
            background: color-mix(in srgb, var(--theme-surface-variant) 50%, transparent);
            color: var(--theme-on-surface);
            transition: all 0.3s;
            cursor: pointer;
        }
        .slider-nav-btn:hover { background: var(--theme-primary-600); color: var(--theme-on-primary); }
    </style>

    <div style="width:100%; align-self:stretch; display:flex; flex-direction:column; overflow-x: hidden;">

        {{-- SECTION 1: HERO --}}
        <section class="dp-section" style="background:var(--theme-surface); color:var(--theme-on-surface);">
            <div class="dp-inner items-start text-left" style="z-index:1; min-height:100svh; justify-content:center;">
                <div class="flex items-center justify-start gap-4 mb-6 md:mb-8">
                    <img alt="OSIS Emblem" class="h-10 w-10 md:h-14 md:w-14 object-contain transition-all duration-500" src="{{ asset('images/logo/general/osis514.webp') }}">
                    <img alt="Seksi Akad Logo" class="h-10 w-10 md:h-14 md:w-14 object-contain transition-all duration-500" src="{{ asset('images/logo/osis/akad514.webp') }}">
                </div>
                <p class="dp-label" style="color:var(--theme-secondary-600);">Home Thamnet</p>
                <h1 class="dp-h1 mb-6 md:mb-8 text-on-surface">WELCOME TO<br>THAMNET</h1>
                <p class="dp-body text-on-surface-variant max-w-[85vw] md:max-w-xl mb-10 leading-relaxed font-light mt-4 md:mt-0 mobile-line-wrap text-left">
                    Thamnet adalah platform media sosial berbasis blog/artikel untuk semua orang.
                </p>
                <div style="display:flex; flex-wrap:wrap; gap:0.75rem; justify-content:flex-start;">
                    @guest
                        <a href="/login" class="btn-base btn-pri-theme">Login</a>
                    @else
                        <a href="{{ route('dashboard') }}" class="btn-base btn-pri-theme">Access Dashboard</a>
                    @endguest
                    <a href="{{ route('thamnet.editor') }}" class="btn-base btn-sec-theme">Create a Blog</a>
                </div>
            </div>
        </section>

        {{-- SECTION 2: NEWEST MEDIA --}}
        <section class="dp-section" style="background:var(--theme-surface-variant); color:var(--theme-on-surface); border-top:1px solid color-mix(in srgb, var(--theme-outline) 10%, transparent);">
            <div class="dp-inner">
                <div class="flex justify-between items-end mb-10 gap-4">
                    <div class="mobile-center-stack w-full md:w-auto">
                        <span class="dp-label" style="color:var(--theme-primary-600); opacity:0.75;">Multimedia Feed</span>
                        <h2 class="dp-h2">NEWEST MEDIA</h2>
                    </div>
                    <div class="flex gap-2">
                        <button class="slider-nav-btn" onclick="document.getElementById('sc-media').scrollBy({left: -400, behavior: 'smooth'})"><span class="material-symbols-outlined">chevron_left</span></button>
                        <button class="slider-nav-btn" onclick="document.getElementById('sc-media').scrollBy({left: 400, behavior: 'smooth'})"><span class="material-symbols-outlined">chevron_right</span></button>
                    </div>
                </div>
                <div id="sc-media" class="dp-slider hide-scrollbar">
                    @foreach($multimedias as $item)
                    <div class="dp-slide" style="width:clamp(200px, 60vw, 300px); background:var(--theme-surface); border:1px solid color-mix(in srgb, var(--theme-outline) 12%, transparent); overflow:hidden; position:relative;">
                        <div style="aspect-ratio:9/16; overflow:hidden;" class="w-full">
                            <iframe 
                                src="{{ str_replace('watch?v=', 'embed/', $item->url) }}?controls=1&modestbranding=1" 
                                class="w-full h-full pointer-events-auto"
                                allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- SECTION 3: FEATURED ENTRY (SPLIT STACK) --}}
        <section class="dp-section" style="background:var(--theme-background); color:var(--theme-on-surface); border-top:1px solid color-mix(in srgb, var(--theme-outline) 10%, transparent); max-height:100svh;">
            <div class="dp-inner h-full py-6 md:py-12">
                <div class="flex flex-col md:flex-row gap-6 md:gap-16 items-center h-full justify-center">
                    @if($featuredPost)
                    <div class="w-full md:w-1/2 overflow-hidden flex flex-col" style="background:var(--theme-surface); border:1px solid color-mix(in srgb, var(--theme-outline) 10%, transparent); position:relative;">
                        <div style="aspect-ratio:16/9; md:aspect-ratio:16/10; overflow:hidden;" class="flex-shrink">
                            <img src="{{ $featuredPost->image_url ?? 'https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=1200&q=80' }}" class="w-full h-full object-cover filter transition-transform duration-700 hover:scale-105">
                            <div style="position:absolute; top:1rem; left:1rem;">
                                <span style="padding:0.4rem 1rem; background:var(--theme-on-tertiary-container); color:var(--theme-tertiary-container); font-size:7px; font-weight:900; text-transform:uppercase; letter-spacing:0.3em;">
                                    Editorial Choice
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mobile-center-stack w-full md:w-1/2 flex-shrink-0">
                        <span class="dp-label" style="color:var(--theme-secondary-600);">{{ $featuredPost->category }}</span>
                        <h2 class="dp-h2 mb-4 md:mb-6" style="line-height:0.87;">{{ $featuredPost->title }}</h2>
                        <p class="dp-body opacity-60 mb-6 md:mb-8 max-w-lg leading-relaxed font-light line-clamp-3 md:line-clamp-4 text-left">
                            {{ Str::limit(strip_tags($featuredPost->content), 200) }}
                        </p>
                        
                        <div class="flex items-center gap-4 pt-4 border-t w-full" style="border-color:color-mix(in srgb, var(--theme-outline) 15%, transparent); justify-content:inherit;">
                            <div style="width:3rem; height:3rem; background:var(--theme-primary-container); color:var(--theme-on-primary-container); display:flex; align-items:center; justify-content:center; font-weight:900; border-radius:0;">
                                {{ strtoupper(substr($featuredPost->author, 0, 1)) }}
                            </div>
                            <div class="text-left">
                                <p style="font-size:12px; font-weight:900; text-transform:uppercase;">{{ $featuredPost->author }}</p>
                                <p style="font-size:9px; opacity:0.6; font-weight:700; text-transform:uppercase; letter-spacing:0.1em; margin-top:2px;">
                                    {{ $featuredPost->created_at->format('M d, Y') }} • {{ ceil(str_word_count(strip_tags($featuredPost->content)) / 200) }} min
                                </p>
                            </div>
                        </div>
                        <div class="mt-6 w-full text-left md:text-left text-center">
                            <a href="{{ route('thamnet.show', $featuredPost->slug) }}" class="btn-base btn-sec-theme" style="width:100%;">
                                Engage Article
                            </a>
                        </div>
                    </div>
                    @else
                    <div class="w-full text-center py-20 bg-surface-variant/20 border border-dashed border-outline/30">
                        <p class="text-on-surface-variant font-bold uppercase tracking-widest">No featured entries currently spotlighted.</p>
                    </div>
                    @endif
                </div>
            </div>
        </section>

        {{-- SECTION 4: THE ARCHIVE (MOBILE SLIDER) --}}
        <section class="dp-section" style="background:var(--theme-surface); color:var(--theme-on-surface); border-top:1px solid color-mix(in srgb, var(--theme-outline) 10%, transparent);">
            <div class="dp-inner">
                <div class="flex justify-between items-end mb-10 gap-4">
                    <div class="mobile-center-stack w-full md:w-auto">
                        <span class="dp-label" style="color:var(--theme-primary-600);">Chronicles</span>
                        <h2 class="dp-h2">THE ARCHIVE</h2>
                    </div>
                    <div class="flex gap-2">
                        <button class="slider-nav-btn" onclick="document.getElementById('sc-arch').scrollBy({left: -400, behavior: 'smooth'})"><span class="material-symbols-outlined">chevron_left</span></button>
                        <button class="slider-nav-btn" onclick="document.getElementById('sc-arch').scrollBy({left: 400, behavior: 'smooth'})"><span class="material-symbols-outlined">chevron_right</span></button>
                    </div>
                </div>
                
                <div id="sc-arch" class="dp-slider hide-scrollbar">
                    @forelse($posts as $post)
                    <div class="dp-slide" style="width:clamp(260px, 75vw, 420px);">
                        <x-thamnet.card :post="$post" />
                    </div>
                    @empty
                    <div class="w-full text-center py-20 bg-surface-variant/10 border border-dashed border-outline/20 col-span-full">
                        <p class="text-on-surface-variant font-bold uppercase tracking-widest opacity-50">Archive is currently evolving. Check back soon.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </section>

    </div>
</x-layout>