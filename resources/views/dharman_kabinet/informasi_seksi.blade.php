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
        <section class="px-8 py-20 max-w-7xl mx-auto flex flex-col md:flex-row items-center gap-16">
            <div class="w-full md:w-1/2 relative group">
                <div class="absolute -inset-4 bg-primary/10 blur-3xl rounded-full opacity-50"></div>
                <div class="relative bg-surface-container-lowest p-12 rounded-2xl border border-outline-variant/15 flex items-center justify-center aspect-square shadow-2xl transition-transform duration-500 group-hover:scale-[1.02]">
                    @if(isset($data['logo']) && $data['logo'])
                        <img src="{{ asset($data['logo']) }}" class="w-full h-full object-contain drop-shadow-xl" alt="{{ $data['name'] }}">
                    @else
                        <span class="material-symbols-outlined text-[120px] text-primary">{{ $data['icon'] ?? 'groups' }}</span>
                    @endif
                </div>
            </div>
            <div class="w-full md:w-1/2 space-y-6">
                <div class="inline-block px-3 py-1 bg-primary/10 text-primary font-bold text-[10px] tracking-widest uppercase rounded-full">
                    {{ $data['group'] }}
                </div>
                <h1 class="text-6xl md:text-7xl font-black tracking-tighter leading-[0.9] text-on-surface uppercase">
                    {{ $data['name'] }}
                </h1>
                <p class="text-body-lg text-on-surface-variant leading-relaxed max-w-xl italic opacity-80">
                    "{{ $data['about'] }}"
                </p>
                <div class="flex gap-4 pt-4">
                    <div class="flex flex-col">
                        <span class="text-2xl font-bold text-primary">{{ count($data['members'] ?? []) }}</span>
                        <span class="text-[10px] font-bold uppercase tracking-widest opacity-60">Total Members</span>
                    </div>
                    <div class="w-px h-10 bg-outline-variant/30 mx-4"></div>
                    <div class="flex flex-col">
                        <span class="text-2xl font-bold text-primary">2025</span>
                        <span class="text-[10px] font-bold uppercase tracking-widest opacity-60">Cabinet Year</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 2: Featured Proker -->
        <section class="bg-surface-container-low py-32 px-8">
            <div class="max-w-7xl mx-auto">
                <div class="mb-16 flex justify-between items-end">
                    <div>
                        <span class="text-label-sm font-bold tracking-[0.2em] text-primary uppercase">Signature Programs</span>
                        <h2 class="text-4xl font-bold tracking-tight mt-2">Highlights of the Quarter</h2>
                    </div>
                    <div class="flex gap-2">
                        <button class="p-2 rounded-full border border-primary/20 hover:bg-primary/5 transition-colors">
                            <span class="material-symbols-outlined text-primary">chevron_left</span>
                        </button>
                        <button class="p-2 rounded-full border border-primary/20 hover:bg-primary/5 transition-colors">
                            <span class="material-symbols-outlined text-primary">chevron_right</span>
                        </button>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Featured Card 1 (Placeholder) -->
                    <div class="group relative overflow-hidden rounded-xl bg-surface-container-lowest shadow-sm transition-all hover:shadow-2xl border border-outline-variant/10">
                        <div class="aspect-[16/9] overflow-hidden bg-primary/5">
                            <div class="w-full h-full flex items-center justify-center">
                                <span class="material-symbols-outlined text-6xl text-primary/20">auto_awesome</span>
                            </div>
                        </div>
                        <div class="p-8">
                            <div class="flex items-center gap-2 mb-4">
                                <span class="text-[10px] font-bold text-primary uppercase tracking-widest bg-primary/5 px-2 py-1 rounded">Annual Event</span>
                            </div>
                            <h3 class="text-2xl font-bold mb-4">Strategic Initiative Alpha</h3>
                            <p class="text-on-surface-variant mb-6 line-clamp-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <a class="inline-flex items-center gap-2 text-primary font-bold text-sm uppercase tracking-wider group/link" href="#">
                                View Details
                                <span class="material-symbols-outlined text-sm transition-transform group-hover/link:translate-x-1">arrow_forward</span>
                            </a>
                        </div>
                    </div>
                    <!-- Featured Card 2 (Placeholder) -->
                    <div class="group relative overflow-hidden rounded-xl bg-surface-container-lowest shadow-sm transition-all hover:shadow-2xl border border-outline-variant/10 mt-0 md:mt-12">
                        <div class="aspect-[16/9] overflow-hidden bg-primary/5">
                            <div class="w-full h-full flex items-center justify-center">
                                <span class="material-symbols-outlined text-6xl text-primary/20">shutter_speed</span>
                            </div>
                        </div>
                        <div class="p-8">
                            <div class="flex items-center gap-2 mb-4">
                                <span class="text-[10px] font-bold text-primary uppercase tracking-widest bg-primary/5 px-2 py-1 rounded">Quarterly Goal</span>
                            </div>
                            <h3 class="text-2xl font-bold mb-4">Innovation Pipeline Beta</h3>
                            <p class="text-on-surface-variant mb-6 line-clamp-2">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <a class="inline-flex items-center gap-2 text-primary font-bold text-sm uppercase tracking-wider group/link" href="#">
                                Implementation Guide
                                <span class="material-symbols-outlined text-sm transition-transform group-hover/link:translate-x-1">arrow_forward</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 3: All Proker (Bento Grid) -->
        <section class="py-32 px-8 max-w-7xl mx-auto">
            <div class="flex justify-between items-end mb-16">
                <div>
                    <span class="text-label-sm font-bold tracking-[0.2em] text-primary uppercase">Archive & Pipeline</span>
                    <h2 class="text-4xl font-bold tracking-tight mt-2">Division Initiatives</h2>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @for ($i = 1; $i <= 5; $i++)
                <div class="bg-surface-container border border-outline-variant/15 p-8 rounded-xl hover:bg-surface-container-high transition-all hover:-translate-y-1">
                    <span class="material-symbols-outlined text-primary mb-6 block text-3xl">hub</span>
                    <h4 class="font-bold text-lg mb-2">Program Initiative #{{ $i }}</h4>
                    <p class="text-sm text-on-surface-variant">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                </div>
                @endfor
                
                <div class="bg-primary text-on-primary p-8 rounded-xl flex flex-col justify-between shadow-xl">
                    <div>
                        <h4 class="font-bold text-lg mb-2">Explore Repository</h4>
                        <p class="text-sm opacity-80">Access the full archive of past programs and technical blueprints for future implementations.</p>
                    </div>
                    <button class="mt-8 border border-on-primary/30 hover:bg-on-primary hover:text-primary transition-all px-4 py-2 rounded-lg text-xs font-bold uppercase tracking-widest">
                        Access Archive
                    </button>
                </div>
            </div>
        </section>

        <!-- Section 4: Members -->
        <section class="py-32 px-8 bg-on-surface text-surface overflow-hidden relative">
            <div class="absolute top-0 right-0 w-96 h-96 bg-primary/20 blur-[120px] -mr-48 -mt-48"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-primary/10 blur-[120px] -ml-48 -mb-48"></div>
            
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
