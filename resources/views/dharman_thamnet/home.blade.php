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
        .glass-panel {
            backdrop-filter: blur(20px);
            background-color: var(--theme-surface);
            opacity: 0.8;
        }

        .video-container iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        /* Hide scrollbar for carousel */
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>

    <div class="w-full bg-background text-on-surface selection:bg-primary-container selection:text-on-primary-container" id="thamnet-page">
        <!-- Section 1: Welcome to ThamNet Hero -->
        <section class="relative min-h-[70vh] md:min-h-[850px] flex items-center justify-center overflow-hidden bg-gradient-to-br from-surface via-surface-variant/10 to-surface px-6">
            <!-- Abstract Decorative Elements -->
            <div class="absolute top-0 left-0 w-full h-full opacity-20 pointer-events-none">
                <div class="absolute top-[-10%] right-[-5%] w-[300px] md:w-[500px] h-[300px] md:h-[500px] rounded-full bg-primary/10 blur-[80px] md:blur-[120px]"></div>
                <div class="absolute bottom-[-10%] left-[-5%] w-[250px] md:w-[400px] h-[250px] md:h-[400px] rounded-full bg-on-tertiary-container/10 blur-[70px] md:blur-[100px]"></div>
            </div>
            <div class="relative z-10 max-w-7xl mx-auto py-20 text-center">
                <div class="flex items-center justify-center gap-6 md:gap-12 mb-8 md:mb-12 scale-90 md:scale-100">
                    <img alt="OSIS Emblem" class="h-16 w-16 md:h-24 md:w-24 object-contain grayscale hover:grayscale-0 transition-all duration-500"
                        src="{{ asset('images/logo/general/osis514.webp') }}">
                    <img alt="Seksi Akad Logo" class="h-16 w-16 md:h-24 md:w-24 object-contain grayscale hover:grayscale-0 transition-all duration-500"
                        src="{{ asset('images/logo/osis/akad514.webp') }}">
                </div>
                <h1 class="text-5xl sm:text-6xl md:text-8xl lg:text-9xl font-black tracking-tighter text-on-surface mb-6 leading-[0.9]">
                    WELCOME TO<br/>THAMNET
                </h1>
                <p class="max-w-2xl mx-auto text-base md:text-xl text-on-surface-variant font-medium leading-relaxed mb-10 px-4">
                    The digital heartbeat of Dharmandala Sandhyakala. A curated ecosystem for the elite minds of M.H. Thamrin.
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="/login" class="w-full sm:w-auto px-10 py-4 bg-primary text-on-primary text-[10px] md:text-xs font-black uppercase tracking-[0.3em] rounded-xl hover:opacity-90 transition-all duration-300 shadow-xl shadow-primary/10">
                        Access Portal
                    </a>
                    <a href="{{ route('thamnet.editor') }}" class="w-full sm:w-auto px-10 py-4 bg-surface-variant text-on-surface-variant text-[10px] md:text-xs font-black uppercase tracking-[0.3em] rounded-xl border border-outline/15 hover:bg-surface transition-all duration-300 backdrop-blur-sm">
                        Compose Legacy
                    </a>
                </div>
            </div>
        </section>

        <!-- Section 2: Newest Media -->
        <section class="py-20 md:py-32 bg-surface">
            <div class="max-w-7xl mx-auto px-6 md:px-8">
                <div class="flex flex-col md:flex-row items-start md:items-end justify-between mb-12 border-b border-outline/10 pb-8 gap-6">
                    <div class="text-left">
                        <span class="text-[10px] md:text-xs font-black tracking-[0.4em] text-secondary uppercase block mb-2">Multimedia Feed</span>
                        <h2 class="text-3xl md:text-5xl font-black tracking-tighter text-on-surface uppercase leading-none">Newest Media</h2>
                    </div>
                    <div class="flex gap-3">
                        <button onclick="document.getElementById('media-scroll').scrollBy({left: -400, behavior: 'smooth'})" 
                            class="p-4 rounded-full bg-surface-variant/30 text-on-surface hover:bg-primary hover:text-on-primary transition-all duration-300">
                            <span class="material-symbols-outlined">arrow_back</span>
                        </button>
                        <button onclick="document.getElementById('media-scroll').scrollBy({left: 400, behavior: 'smooth'})"
                            class="p-4 rounded-full bg-surface-variant/30 text-on-surface hover:bg-primary hover:text-on-primary transition-all duration-300">
                            <span class="material-symbols-outlined">arrow_forward</span>
                        </button>
                    </div>
                </div>
                <div id="media-scroll" class="flex gap-6 md:gap-10 overflow-x-auto snap-x snap-mandatory scrollbar-hide pb-8">
                    @php
                        $media = [
                            ['type' => 'Shorts', 'title' => 'Student Life: Cabinet Election Behind the Scenes', 'id' => 'gK6_vhwo_Cw'],
                            ['type' => 'Shorts', 'title' => 'Aesthetics of Excellence: The New Library Wing', 'id' => 'gK6_vhwo_Cw'],
                            ['type' => 'Shorts', 'title' => 'Documentary: The Legacy of M.H. Thamrin', 'id' => 'gK6_vhwo_Cw'],
                            ['type' => 'Shorts', 'title' => 'Campus Tour: Digital Ivory Tower', 'id' => 'gK6_vhwo_Cw'],
                        ];
                    @endphp

                    @foreach($media as $item)
                        <div class="flex-none w-[280px] md:w-[350px] snap-center">
                            <div class="group relative aspect-[9/16] bg-surface-variant/20 rounded-2xl overflow-hidden shadow-2xl border border-outline/5">
                                <div class="video-container w-full h-full">
                                    <iframe 
                                        src="https://www.youtube.com/embed/{{ $item['id'] }}?autoplay=0&controls=0&rel=0&loop=1&playlist={{ $item['id'] }}&modestbranding=1" 
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                        allowfullscreen>
                                    </iframe>
                                </div>
                                <div class="absolute inset-x-0 bottom-0 p-6 bg-gradient-to-t from-black/90 via-black/40 to-transparent pointer-events-none">
                                    <div class="flex items-center gap-2 text-white/70 mb-2">
                                        <span class="material-symbols-outlined text-sm">play_circle</span>
                                        <span class="text-[9px] font-black tracking-[0.2em] uppercase">{{ $item['type'] }}</span>
                                    </div>
                                    <p class="text-white font-black text-lg leading-tight">{{ $item['title'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Section 3: Featured Entry -->
        <section class="py-20 md:py-32 bg-surface-variant/10">
            <div class="max-w-7xl mx-auto px-6 md:px-8">
                <div class="flex flex-col lg:flex-row items-center gap-12 md:gap-20">
                    @if($featuredPost)
                    <div class="w-full lg:w-3/5">
                        <div class="relative rounded-3xl overflow-hidden shadow-2xl group border border-outline/10">
                            <img class="w-full aspect-[16/10] object-cover group-hover:scale-105 transition-transform duration-1000" 
                                src="{{ $featuredPost->image_url ?? 'https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=1200&q=80' }}" 
                                alt="{{ $featuredPost->title }}">
                            <div class="absolute top-6 left-6">
                                <span class="px-5 py-2 bg-on-tertiary-container text-white text-[10px] font-black uppercase tracking-[0.3em] rounded-full shadow-lg">
                                    Editorial Choice
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="w-full lg:w-2/5 space-y-8 text-left">
                        <div class="space-y-4">
                            <span class="text-[10px] md:text-xs font-black tracking-[0.3em] text-secondary uppercase block">{{ $featuredPost->category }}</span>
                            <h2 class="text-4xl md:text-6xl font-black tracking-tighter text-on-surface leading-[0.9] uppercase">
                                {{ $featuredPost->title }}
                            </h2>
                        </div>
                        <p class="text-base md:text-lg text-on-surface-variant leading-relaxed font-medium">
                            {{ Str::limit(strip_tags($featuredPost->content), 200) }}
                        </p>
                        <div class="flex items-center gap-4 pt-4 border-t border-outline/10">
                            <div class="w-12 h-12 rounded-full bg-primary-container flex items-center justify-center text-on-primary-container font-black">
                                {{ strtoupper(substr($featuredPost->author, 0, 1)) }}
                            </div>
                            <div>
                                <p class="text-sm font-black text-on-surface uppercase">{{ $featuredPost->author }}</p>
                                <p class="text-[10px] text-on-surface-variant font-bold uppercase tracking-widest mt-1">
                                    {{ $featuredPost->created_at->format('M d, Y') }} • {{ ceil(str_word_count(strip_tags($featuredPost->content)) / 200) }} min read
                                </p>
                            </div>
                        </div>
                        <a href="{{ route('thamnet.show', $featuredPost->slug) }}" class="group flex items-center gap-4 text-primary font-black uppercase tracking-[0.3em] text-[10px] pt-4">
                            Engage Article
                            <span class="material-symbols-outlined group-hover:translate-x-3 transition-transform">arrow_right_alt</span>
                        </a>
                    </div>
                    @else
                    <div class="w-full text-center py-20 bg-surface-variant/20 rounded-3xl border border-dashed border-outline/30">
                        <p class="text-on-surface-variant font-bold uppercase tracking-widest">No featured entries currently spotlighted.</p>
                    </div>
                    @endif
                </div>
            </div>
        </section>

        <!-- Section 4: The Archive -->
        <section class="py-20 md:py-32 bg-surface">
            <div class="max-w-7xl mx-auto px-6 md:px-8">
                <div class="flex flex-col md:flex-row items-start md:items-end justify-between mb-12 border-b border-outline/10 pb-8 gap-6">
                    <div class="text-left">
                        <span class="text-[10px] md:text-xs font-black tracking-[0.4em] text-primary uppercase block mb-2">Chronicles archive</span>
                        <h2 class="text-3xl md:text-5xl font-black tracking-tighter text-on-surface uppercase leading-none">The Archive</h2>
                    </div>
                    <div class="flex gap-3">
                        <button onclick="document.getElementById('archive-scroll').scrollBy({left: -400, behavior: 'smooth'})" 
                            class="p-4 rounded-full bg-surface-variant/30 text-on-surface hover:bg-primary hover:text-on-primary transition-all duration-300">
                            <span class="material-symbols-outlined">arrow_back</span>
                        </button>
                        <button onclick="document.getElementById('archive-scroll').scrollBy({left: 400, behavior: 'smooth'})"
                            class="p-4 rounded-full bg-surface-variant/30 text-on-surface hover:bg-primary hover:text-on-primary transition-all duration-300">
                            <span class="material-symbols-outlined">arrow_forward</span>
                        </button>
                    </div>
                </div>
                
                <div id="archive-scroll" class="flex gap-6 md:gap-8 overflow-x-auto snap-x snap-mandatory scrollbar-hide pb-8 items-stretch">
                    @forelse($posts as $post)
                        <x-thamnet.card :post="$post" />
                    @empty
                        <div class="w-full text-center py-20 bg-surface-variant/10 rounded-3xl border border-dashed border-outline/20 col-span-full">
                            <p class="text-on-surface-variant font-bold uppercase tracking-widest opacity-50">Archive is currently evolving. Check back soon.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </div>
</x-layout>