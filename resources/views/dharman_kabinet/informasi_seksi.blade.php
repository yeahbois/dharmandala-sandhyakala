<x-layout :title="$data['name'] . ' | DHARMANDALA SANDHYAKALA'">
    <x-slot:metadesc>
        <meta name="description" content="{{ $data['about'] }}" />
        <meta property="og:title" content="{{ $data['name'] }} - DHARMANDALA SANDHYAKALA">
        <meta property="og:description" content="{{ $data['about'] }}">
    </x-slot:metadesc>

    <style>
        * { border-radius: 0 !important; }
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        
        .dp-section {
            align-self: stretch;
            width: 100%;
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
        }
        .dp-h2 {
            font-size: clamp(1.6rem, 6vw, 5rem);
            font-weight: 950;
            line-height: 1;
            letter-spacing: -0.04em;
            text-transform: uppercase;
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

        .slider-nav-btn {
            width: 32px; height: 32px; 
            display: flex; align-items: center; justify-content: center;
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1);
            color: var(--theme-on-surface);
            transition: all 0.2s;
        }
        .slider-nav-btn:hover { background: rgba(255,255,255,0.15); }

        .btn-base {
            padding: 0.9rem 2.2rem; font-size: 9px; font-weight: 950; 
            letter-spacing: 0.25em; text-transform: uppercase; transition: all 0.3s;
            display: inline-flex; align-items:center; justify-content:center;
            border: 1px solid transparent;
        }
        .btn-sec { 
            background: var(--theme-surface-variant); 
            border-color: color-mix(in srgb, var(--theme-outline) 20%, transparent); 
            color: var(--theme-on-surface); 
        }
        .btn-sec:hover { 
            background: var(--theme-primary-container); 
            color: var(--theme-on-primary-container);
            border-color: transparent;
        }
    </style>

    <main class="min-h-screen bg-surface" id="detail-page">
        <!-- Section 1: Division Hero -->
        <section class="dp-section">
            <div class="dp-inner flex-col md:flex-row items-center gap-12 md:gap-20">
                <div class="w-full md:w-1/2 relative group">
                    <div class="absolute -inset-10 bg-primary/10 blur-[100px] rounded-full opacity-50"></div>
                    <div class="relative bg-surface p-12 md:p-16 border border-outline/10 flex items-center justify-center aspect-square shadow-2xl transition-all duration-700 group-hover:scale-[1.02] overflow-hidden">
                        @if(isset($data['logo']) && $data['logo'])
                            <img src="{{ asset($data['logo']) }}" class="w-full h-full object-contain drop-shadow-2xl transition-all duration-700" alt="{{ $data['name'] }}">
                        @else
                            <span class="material-symbols-outlined text-[100px] md:text-[140px] text-primary/40 group-hover:text-primary transition-colors duration-700">{{ $data['icon'] ?? 'groups' }}</span>
                        @endif
                    </div>
                </div>
                <div class="w-full md:w-1/2 space-y-8 text-center md:text-left">
                    <span class="dp-label" style="color:var(--theme-primary-600);">{{ $data['group'] }}</span>
                    <h1 class="dp-h1 text-on-surface">
                        {{ $divisi->name ?? $data['name'] }}
                    </h1>
                    <p class="dp-body text-on-surface-variant italic opacity-60">
                        "{{ $divisi->about ?? $data['about'] }}"
                    </p>
                    @if($divisi && $divisi->details)
                    <div class="dp-body text-on-surface-variant/80">
                        {!! $divisi->details !!}
                    </div>
                    @endif
                    <div class="flex justify-center md:justify-start gap-12 pt-4">
                        <div class="flex flex-col">
                            <span class="text-4xl md:text-5xl font-black text-on-surface leading-none tracking-tighter">{{ count($data['members'] ?? []) }}</span>
                            <span class="dp-label" style="margin-top:0.75rem; opacity:0.4;">Personnel</span>
                        </div>
                        <div class="w-px h-16 bg-outline/10"></div>
                        <div class="flex flex-col">
                            <span class="text-4xl md:text-5xl font-black text-on-surface leading-none tracking-tighter">25/26</span>
                            <span class="dp-label" style="margin-top:0.75rem; opacity:0.4;">Cycle</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 2: Featured Proker Slider -->
        @if($featured_proker->count() > 0)
        <section class="dp-section" style="background:var(--theme-surface-variant); border-top:1px solid color-mix(in srgb, var(--theme-outline) 10%, transparent);">
            <div class="dp-inner">
                <div class="mb-16 flex justify-between items-end gap-6">
                    <div class="text-left">
                        <span class="dp-label" style="color:var(--theme-primary-600);">Program Kerja</span>
                        <h2 class="dp-h2">Program Unggulan</h2>
                    </div>
                    <div class="flex gap-2">
                        <button class="slider-nav-btn" onclick="scrollSlider('sc-feat', -1)"><span class="material-symbols-outlined">chevron_left</span></button>
                        <button class="slider-nav-btn" onclick="scrollSlider('sc-feat', 1)"><span class="material-symbols-outlined">chevron_right</span></button>
                    </div>
                </div>
                
                <div id="sc-feat" class="dp-slider hide-scrollbar">
                    @foreach($featured_proker as $proker)
                    <div class="dp-slide" style="width:clamp(260px, 75vw, 420px); background:var(--theme-surface); border:1px solid color-mix(in srgb, var(--theme-outline) 15%, transparent); overflow:hidden; transition:all 0.5s ease;">
                        <div style="aspect-ratio:16/9; overflow:hidden;">
                            <img src="{{ isset($proker->pictures_urls[0]) ? asset($proker->pictures_urls[0]) : asset('images/logo/osis/akad514.webp') }}" class="w-full h-full object-cover transition-all duration-700">
                        </div>
                        <div style="padding:1.5rem;">
                            <div class="flex justify-between items-center mb-4">
                                <span class="dp-label" style="color:var(--theme-primary-600); margin:0; font-size:7px;">Featured Inisiatif</span>
                                <span style="font-size:9px; font-weight:700; opacity:0.4;">{{ $proker->date ? \Carbon\Carbon::parse($proker->date)->format('M d') : '' }}</span>
                            </div>
                            <h3 style="font-size:clamp(1.1rem, 2vw, 1.4rem); font-weight:950; margin-bottom:8px; letter-spacing:-0.02em; text-transform: uppercase;">{{ $proker->title }}</h3>
                            <p class="text-[10px] text-on-surface-variant leading-relaxed line-clamp-3 mb-6 opacity-70">{{ Str::limit(strip_tags($proker->content), 150) }}</p>
                            <a class="btn-base btn-sec" href="/programkerja/{{ $proker->id }}">
                                Selengkapnya
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif

        <!-- Section 3: All Proker Slider -->
        @if($all_proker->count() > 0)
        <section class="dp-section" style="background:var(--theme-surface); border-top:1px solid color-mix(in srgb, var(--theme-outline) 10%, transparent);">
            <div class="dp-inner">
                <div class="mb-16 flex justify-between items-end gap-6">
                    <div class="text-left">
                        <span class="dp-label" style="color:var(--theme-primary-600);">Direktori</span>
                        <h2 class="dp-h2">Daftar Program Kerja</h2>
                    </div>
                    <div class="flex gap-2">
                        <button class="slider-nav-btn" onclick="scrollSlider('sc-all', -1)"><span class="material-symbols-outlined">chevron_left</span></button>
                        <button class="slider-nav-btn" onclick="scrollSlider('sc-all', 1)"><span class="material-symbols-outlined">chevron_right</span></button>
                    </div>
                </div>
                
                <div id="sc-all" class="dp-slider hide-scrollbar">
                    @foreach($all_proker as $proker)
                    <div class="dp-slide" style="width:clamp(220px, 65vw, 340px); background:var(--theme-surface-variant); border:1px solid color-mix(in srgb, var(--theme-outline) 10%, transparent); padding:1.5rem; display:flex; flex-direction:column; justify-content:space-between; min-height:300px; transition:all 0.3s ease;">
                        <div>
                            <span class="material-symbols-outlined text-primary mb-6 block text-3xl opacity-50">hub</span>
                            <h4 style="font-size:clamp(1rem, 1.5vw, 1.2rem); font-weight:950; margin-bottom:8px; letter-spacing:-0.01em; text-transform: uppercase;">{{ $proker->title }}</h4>
                            <p class="text-[10px] text-on-surface-variant leading-relaxed line-clamp-4 opacity-70">{{ Str::limit(strip_tags($proker->content), 120) }}</p>
                        </div>
                        <a href="/programkerja/{{ $proker->id }}" class="btn-base btn-sec" style="padding:0.6rem 1.5rem; width:fit-content; margin-top:2rem;">
                            Details
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif

        <!-- Section 4: Members -->
        <section class="dp-section" style="background:var(--theme-background); border-top:1px solid color-mix(in srgb, var(--theme-outline) 10%, transparent);">
            <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-primary/5 blur-[150px] -mr-[250px] -mt-[250px] rounded-full"></div>
            <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-primary/5 blur-[150px] -ml-[250px] -mb-[250px] rounded-full"></div>
            
            <div class="dp-inner relative z-10">
                <x-kabinet.seksi :name="$data['name']" :group="'Struktur Personalia'" :slug="$slug" :logo="$data['logo']">
                    @foreach($data['members'] as $member)
                        <x-kabinet.potrait 
                            :link="$member['link']" 
                            :name="$member['name']" 
                            :ig="$member['ig']" 
                            :role="$member['role']" 
                            :quote="$member['quote']">
                        </x-kabinet.potrait>
                    @endforeach
                </x-kabinet.seksi>
            </div>
        </section>
    </main>

    <script>
        function scrollSlider(id, dir) {
            const el = document.getElementById(id);
            const scrollAmt = el.offsetWidth * 0.8;
            el.scrollBy({ left: scrollAmt * dir, behavior: 'smooth' });
        }
    </script>
</x-layout>
