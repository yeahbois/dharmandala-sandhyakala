<x-layout title="Cabinet Members | Dharmandala Sandhyakala"
    keywords="osis mht, pengurus osis mht 2025, osis mh thamrin, osis smanu mh thamrin 2025, osis mht agradama navaleksa, osis mht agradama navaleksa 2025">
    <x-slot:metadesc>
        <meta name="description"
            content="Kenali Pengurus OSIS MHT Agradama Navaleksa 2024/2025! Pemimpin muda yang siap menggerakkan perubahan dan inovasi di sekolah." />
        <meta property="og:title" content="Pengurus OSIS SMA Negeri Unggulan M. H. Thamrin 2024/2025">
        <meta property="og:description"
            content="Kenali Pengurus OSIS MHT Agradama Navaleksa 2024/2025! Pemimpin muda yang siap menggerakkan perubahan dan inovasi di sekolah.">
        <meta property="og:image" content="{{ asset('images/potrait/ospkfull.jpg') }}">
    </x-slot:metadesc>

    <style>
        #osis-page {
            --theme-primary-600: #be123c !important; /* brand-red */
            --theme-on-primary: #ffffff !important;
        }
    </style>

    <main class="w-full" id="osis-page">
        <!-- Hero Section -->
        <header class="min-h-screen flex flex-col justify-center max-w-7xl mx-auto px-8 relative overflow-hidden">
            <div class="absolute -top-24 -right-24 w-96 h-96 bg-primary/5 rounded-full blur-3xl"></div>
            <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-12">
                <div class="text-center md:text-left order-2 md:order-1 max-w-3xl">
                    <span
                        class="inline-block px-3 py-1 bg-primary text-on-primary text-[10px] font-bold tracking-[0.2em] uppercase rounded-sm mb-6">EST.
                        2025</span>
                    <h1 class="text-5xl md:text-8xl font-black tracking-tighter leading-[0.9] mb-8 text-on-surface">
                        Kabinet OSIS:<br />
                        <span class="text-primary uppercase">{{ $data['hero']['title'] }}</span>
                    </h1>
                    <p
                        class="text-body-lg text-on-surface-variant leading-relaxed text-base md:text-lg italic opacity-80">
                        "{{ $data['hero']['slogan'] }}"
                    </p>
                </div>
                <div class="order-1 md:order-2 transition-all duration-700 hover:scale-105">
                    <img src="{{ asset($data['hero']['logo']) }}"
                        class="w-40 h-40 md:w-64 md:h-64 object-contain drop-shadow-2xl" alt="OSIS Logo">
                </div>
            </div>
        </header>

        <div class="max-w-7xl mx-auto px-4 md:px-0">
            @foreach($data['structure'] as $item)
                @if($item['type'] === 'bidang')
                    <x-kabinet.bidang :name="$item['name']" :group="$item['group']" :logo="$item['logo']" :slug="$item['slug']" :type="'osis'">
                        @foreach($item['members'] as $member)
                            <x-kabinet.potrait 
                                :link="$member['link']" 
                                :name="$member['name']" 
                                :ig="$member['ig']" 
                                :role="$member['role']" 
                                :quote="$member['quote']">
                            </x-kabinet.potrait>
                        @endforeach
                    </x-kabinet.bidang>
                @elseif($item['type'] === 'container')
                    <section class="max-w-7xl mx-auto px-8 mb-32">
                        <div class="flex items-end justify-between mb-16 border-b-2 border-primary pb-4">
                            <div class="text-left">
                                <h2 class="text-[10px] font-bold tracking-[0.4em] uppercase text-primary mb-2">{{ $item['group'] }}</h2>
                                <h3 class="text-4xl md:text-5xl font-black tracking-tighter text-on-surface uppercase sm:whitespace-nowrap">
                                    {{ $item['name'] }}
                                </h3>
                            </div>
                        </div>

                        <div class="space-y-24">
                            @foreach($item['sections'] as $seksi)
                                <x-kabinet.seksi :name="$seksi['name']" :group="$seksi['group']" :slug="$seksi['slug']" :logo="$seksi['logo']" :type="'osis'">
                                    @foreach($seksi['members'] as $member)
                                        <x-kabinet.potrait 
                                            :link="$member['link']" 
                                            :name="$member['name']" 
                                            :ig="$member['ig']" 
                                            :role="$member['role']" 
                                            :quote="$member['quote']">
                                        </x-kabinet.potrait>
                                    @endforeach
                                </x-kabinet.seksi>
                            @endforeach
                        </div>
                    </section>
                @endif
            @endforeach
        </div>
    </main>
</x-layout>