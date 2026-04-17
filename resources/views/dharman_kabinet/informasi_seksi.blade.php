<x-layout :title="$data['name'] . ' | DHARMANDALA SANDHYAKALA'">
    <x-slot:metadesc>
        <meta name="description" content="{{ $data['about'] }}" />
        <meta property="og:title" content="{{ $data['name'] }} - DHARMANDALA SANDHYAKALA">
        <meta property="og:description" content="{{ $data['about'] }}">
    </x-slot:metadesc>

    <style>
        #detail-page {
            @if($theme == 'red')
            --theme-primary-600: #be123c !important; /* brand-red */
            @else
            --theme-primary-600: #3358f4 !important; /* brand-blue */
            @endif
            --theme-on-primary: #ffffff !important;
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>

    <main class="pt-24 min-h-screen bg-surface" id="detail-page">
        <!-- Section 1: Division Hero -->
        <section class="px-6 md:px-8 py-20 max-w-7xl mx-auto flex flex-col md:flex-row items-center gap-12 md:gap-16">
            <div class="w-full md:w-1/2 relative group">
                <div class="absolute -inset-4 bg-primary/10 blur-3xl rounded-none opacity-50"></div>
                <div class="relative bg-surface p-8 md:p-12 border border-outline/10 flex items-center justify-center aspect-square shadow-2xl transition-transform duration-700 group-hover:scale-[1.02]">
                    @if(isset($data['logo']) && $data['logo'])
                        <img src="{{ asset($data['logo']) }}" class="w-full h-full object-contain drop-shadow-xl filter grayscale group-hover:grayscale-0 transition-all duration-700" alt="{{ $data['name'] }}">
                    @else
                        <span class="material-symbols-outlined text-[80px] md:text-[120px] text-primary">{{ $data['icon'] ?? 'groups' }}</span>
                    @endif
                </div>
            </div>
            <div class="w-full md:w-1/2 space-y-6 text-center md:text-left">
                <div class="inline-block px-4 py-1.5 bg-primary/10 text-primary font-black text-[10px] tracking-[0.3em] uppercase rounded-none border border-primary/20">
                    {{ $data['group'] }}
                </div>
                <h1 class="text-5xl md:text-7xl font-black tracking-tighter leading-[0.9] text-on-surface uppercase">
                    {{ $data['name'] }}
                </h1>
                <p class="text-sm md:text-lg text-on-surface-variant leading-relaxed max-w-xl italic opacity-60">
                    "{{ $data['about'] }}"
                </p>
                <div class="flex justify-center md:justify-start gap-8 pt-6">
                    <div class="flex flex-col">
                        <span class="text-3xl md:text-4xl font-black text-on-surface leading-none tracking-tighter">{{ count($data['members'] ?? []) }}</span>
                        <span class="text-[9px] font-black uppercase tracking-[0.2em] opacity-40 mt-2">Total Personnel</span>
                    </div>
                    <div class="w-px h-12 bg-outline/10"></div>
                    <div class="flex flex-col">
                        <span class="text-3xl md:text-4xl font-black text-on-surface leading-none tracking-tighter">25/26</span>
                        <span class="text-[9px] font-black uppercase tracking-[0.2em] opacity-40 mt-2">Cabinet Cycle</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 2: Featured Proker -->
        @if($featured_proker->count() > 0)
        <section class="bg-surface-variant/10 py-32 px-8">
            <div class="max-w-7xl mx-auto">
                <div class="mb-16 flex flex-col md:flex-row justify-between items-start md:items-end gap-6">
                    <div class="text-left">
                        <span class="text-[10px] font-black tracking-[0.4em] text-primary uppercase">Signature Programs</span>
                        <h2 class="text-4xl md:text-5xl font-black tracking-tighter mt-2 uppercase">Highlights of the Quarter</h2>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @foreach($featured_proker as $proker)
                    <div class="group relative overflow-hidden bg-surface-container-lowest shadow-sm transition-all hover:shadow-2xl border border-outline-variant/10">
                        <div class="aspect-[16/9] overflow-hidden bg-primary/5">
                            @if(isset($proker->pictures_urls) && count($proker->pictures_urls) > 0)
                                <img src="{{ asset($proker->pictures_urls[0]) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <span class="material-symbols-outlined text-6xl text-primary/20">auto_awesome</span>
                                </div>
                            @endif
                        </div>
                        <div class="p-8">
                            <div class="flex items-center gap-2 mb-4">
                                <span class="text-[10px] font-bold text-primary uppercase tracking-widest bg-primary/5 px-2 py-1">Featured</span>
                            </div>
                            <h3 class="text-2xl font-bold mb-4">{{ $proker->title }}</h3>
                            <p class="text-on-surface-variant mb-6 line-clamp-2">{{ Str::limit(strip_tags($proker->content), 150) }}</p>
                            <a class="inline-flex items-center gap-2 text-primary font-bold text-sm uppercase tracking-wider group/link" href="/programkerja">
                                View Details
                                <span class="material-symbols-outlined text-sm transition-transform group-hover/link:translate-x-1">arrow_forward</span>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif

        <!-- Section 3: All Proker (Bento Grid) -->
        <section class="py-32 px-8 max-w-7xl mx-auto">
            <div class="flex justify-between items-end mb-16">
                <div>
                    <span class="text-label-sm font-bold tracking-[0.2em] text-primary uppercase">Archive & Pipeline</span>
                    <h2 class="text-4xl font-bold tracking-tight mt-2">Division Initiatives</h2>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($all_proker as $proker)
                <div class="bg-surface-container border border-outline-variant/15 p-8 hover:bg-surface-container-high transition-all hover:-translate-y-1">
                    <span class="material-symbols-outlined text-primary mb-6 block text-3xl">hub</span>
                    <h4 class="font-bold text-lg mb-2">{{ $proker->title }}</h4>
                    <p class="text-sm text-on-surface-variant">{{ Str::limit(strip_tags($proker->content), 100) }}</p>
                </div>
                @endforeach
                
                <div class="bg-primary text-on-primary p-8 flex flex-col justify-between shadow-xl">
                    <div>
                        <h4 class="font-bold text-lg mb-2">Explore Repository</h4>
                        <p class="text-sm opacity-80">Access the full archive of past programs and technical blueprints for future implementations.</p>
                    </div>
                    <button class="mt-8 border border-on-primary/30 hover:bg-on-primary hover:text-primary transition-all px-4 py-2 text-xs font-bold uppercase tracking-widest">
                        Access Archive
                    </button>
                </div>
            </div>
        </section>

        <!-- Section 4: Members -->
        <section class="py-32 px-8 bg-background text-on-surface overflow-hidden relative border-t border-outline-variant/10">
            <div class="absolute top-0 right-0 w-96 h-96 bg-primary/10 blur-[120px] -mr-48 -mt-48"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-primary/5 blur-[120px] -ml-48 -mb-48"></div>
            
            <div class="max-w-7xl mx-auto relative z-10">
                <x-kabinet.seksi :name="$data['name']" :group="'Members of ' . $data['name']" :slug="$slug" :logo="$data['logo']">
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
</x-layout>
