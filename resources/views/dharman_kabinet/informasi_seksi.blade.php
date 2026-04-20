<x-layout :title="$data['name'] . ' | DHARMANDALA SANDHYAKALA'">
    <x-slot:metadesc>
        <meta name="description" content="{{ $data['about'] }}" />
        <meta property="og:title" content="{{ $data['name'] }} - DHARMANDALA SANDHYAKALA">
        <meta property="og:description" content="{{ $data['about'] }}">
    </x-slot:metadesc>

    <style>
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

        .slider-nav-btn {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--theme-surface-variant);
            color: var(--theme-on-surface);
            border: 1px solid color-mix(in srgb, var(--theme-outline) 10%, transparent);
            transition: all 0.3s ease;
        }
        .slider-nav-btn:hover {
            background: var(--theme-primary-600);
            color: var(--theme-on-primary);
        }
    </style>

    <main class="min-h-screen bg-surface" id="detail-page">
        <!-- Section 1: Division Hero -->
        <section class="px-6 md:px-8 py-32 max-w-7xl mx-auto flex flex-col md:flex-row items-center gap-12 md:gap-20">
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
                <div class="inline-flex px-4 py-1.5 bg-primary/10 text-primary font-black text-[10px] tracking-[0.3em] uppercase border border-primary/20">
                    {{ $data['group'] }}
                </div>
                <h1 class="text-6xl md:text-8xl font-black tracking-tighter leading-[0.85] text-on-surface uppercase">
                    {{ $divisi->name ?? $data['name'] }}
                </h1>
                <p class="text-lg md:text-xl text-on-surface-variant leading-relaxed max-w-xl italic font-light opacity-60">
                    "{{ $divisi->about ?? $data['about'] }}"
                </p>
                @if($divisi && $divisi->details)
                <div class="text-sm md:text-base text-on-surface-variant/80 leading-relaxed max-w-xl font-light">
                    {!! $divisi->details !!}
                </div>
                @endif
                <div class="flex justify-center md:justify-start gap-12 pt-4">
                    <div class="flex flex-col">
                        <span class="text-4xl md:text-5xl font-black text-on-surface leading-none tracking-tighter">{{ count($data['members'] ?? []) }}</span>
                        <span class="text-[10px] font-black uppercase tracking-[0.2em] opacity-40 mt-3">Personnel</span>
                    </div>
                    <div class="w-px h-16 bg-outline/10"></div>
                    <div class="flex flex-col">
                        <span class="text-4xl md:text-5xl font-black text-on-surface leading-none tracking-tighter">25/26</span>
                        <span class="text-[10px] font-black uppercase tracking-[0.2em] opacity-40 mt-3">Cycle</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 2: Featured Proker Slider -->
        @if($featured_proker->count() > 0)
        <section class="py-32 px-6 md:px-8 border-t border-outline/5" style="background:var(--theme-surface-variant); opacity:0.98;">
            <div class="max-w-7xl mx-auto">
                <div class="mb-16 flex justify-between items-end gap-6">
                    <div class="text-left">
                        <span class="text-[10px] font-black tracking-[0.4em] text-primary uppercase">Program Kerja</span>
                        <h2 class="text-4xl md:text-5xl font-black tracking-tighter mt-2 uppercase">Program Unggulan</h2>
                    </div>
                    <div class="flex gap-2">
                        <button class="slider-nav-btn" onclick="scrollSlider('sc-feat', -1)"><span class="material-symbols-outlined">chevron_left</span></button>
                        <button class="slider-nav-btn" onclick="scrollSlider('sc-feat', 1)"><span class="material-symbols-outlined">chevron_right</span></button>
                    </div>
                </div>
                
                <div id="sc-feat" class="dp-slider hide-scrollbar">
                    @foreach($featured_proker as $proker)
                    <div class="dp-slide" style="width:clamp(280px, 80vw, 450px); background:var(--theme-surface); border:1px solid color-mix(in srgb, var(--theme-outline) 15%, transparent); overflow:hidden; transition:all 0.5s ease;">
                        <div style="aspect-ratio:16/9; overflow:hidden;">
                            <img src="{{ isset($proker->pictures_urls[0]) ? asset($proker->pictures_urls[0]) : asset('images/logo/osis/akad514.webp') }}" class="w-full h-full object-cover transition-all duration-700">
                        </div>
                        <div style="padding:2rem;">
                            <div class="flex justify-between items-center mb-4">
                                <span class="text-[9px] font-black uppercase tracking-[0.2em] text-primary">Featured Inisiatif</span>
                                <span class="text-[9px] font-bold opacity-40">{{ $proker->date ? \Carbon\Carbon::parse($proker->date)->format('M d, Y') : '' }}</span>
                            </div>
                            <h3 class="text-2xl font-black tracking-tight mb-4 uppercase">{{ $proker->title }}</h3>
                            <p class="text-[11px] text-on-surface-variant leading-relaxed line-clamp-3 mb-8 opacity-70">{{ Str::limit(strip_tags($proker->content), 150) }}</p>
                            <a class="inline-flex items-center gap-2 text-[10px] font-black uppercase tracking-widest text-primary hover:gap-4 transition-all" href="/programkerja/{{ $proker->id }}">
                                Selengkapnya <span class="material-symbols-outlined text-sm">arrow_forward</span>
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
        <section class="py-32 px-6 md:px-8 bg-surface">
            <div class="max-w-7xl mx-auto">
                <div class="mb-16 flex justify-between items-end gap-6">
                    <div class="text-left">
                        <span class="text-[10px] font-black tracking-[0.4em] text-primary uppercase">Direktori</span>
                        <h2 class="text-4xl md:text-5xl font-black tracking-tighter mt-2 uppercase">Daftar Program Kerja</h2>
                    </div>
                    <div class="flex gap-2">
                        <button class="slider-nav-btn" onclick="scrollSlider('sc-all', -1)"><span class="material-symbols-outlined">chevron_left</span></button>
                        <button class="slider-nav-btn" onclick="scrollSlider('sc-all', 1)"><span class="material-symbols-outlined">chevron_right</span></button>
                    </div>
                </div>
                
                <div id="sc-all" class="dp-slider hide-scrollbar">
                    @foreach($all_proker as $proker)
                    <div class="dp-slide" style="width:clamp(240px, 70vw, 360px); background:var(--theme-surface-variant); border:1px solid color-mix(in srgb, var(--theme-outline) 10%, transparent); padding:2rem; display:flex; flex-col; justify-content:space-between; min-h-[320px] transition:all 0.3s ease;">
                        <div>
                            <span class="material-symbols-outlined text-primary mb-8 block text-4xl opacity-50">hub</span>
                            <h4 class="text-xl font-black tracking-tight mb-4 uppercase">{{ $proker->title }}</h4>
                            <p class="text-[11px] text-on-surface-variant leading-relaxed line-clamp-4 opacity-70">{{ Str::limit(strip_tags($proker->content), 120) }}</p>
                        </div>
                        <a href="/programkerja/{{ $proker->id }}" class="mt-8 text-[10px] font-black uppercase tracking-widest text-primary inline-flex items-center gap-2">
                            Details <span class="material-symbols-outlined text-sm">arrow_forward</span>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif

        <!-- Section 4: Members -->
        <section class="py-32 px-6 md:px-8 bg-background text-on-surface overflow-hidden relative border-t border-outline/5">
            <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-primary/5 blur-[150px] -mr-[250px] -mt-[250px] rounded-full"></div>
            <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-primary/5 blur-[150px] -ml-[250px] -mb-[250px] rounded-full"></div>
            
            <div class="max-w-7xl mx-auto relative z-10">
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
