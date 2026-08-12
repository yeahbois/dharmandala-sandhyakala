<x-layout title="Arsip Kabinet Dharmakala"
    keywords="arsip kabinet, dharmakala, osis mht, mpk mht, smanu mh thamrin">
    <x-slot:metadesc>
        <meta name="description"
            content="Arsip Pengurus OSIS & MPK SMANU M.H. Thamrin Kabinet Dharmandala Sandhyakala 2025/2026." />
        <meta property="og:title" content="Arsip Kabinet Dharmakala - OSIS MPK SMA Negeri Unggulan M. H. Thamrin">
        <meta property="og:description"
            content="Arsip Pengurus OSIS & MPK SMANU M.H. Thamrin Kabinet Dharmandala Sandhyakala 2025/2026.">
        <meta property="og:image" content="{{ asset('images/potrait/ospkfull.jpg') }}">
    </x-slot:metadesc>

    <style>
        #archive-page {
            --theme-primary-600: #be123c !important; /* Default red */
            --theme-on-primary: #ffffff !important;
        }
    </style>

    <main class="w-full flex flex-col items-center" id="archive-page">
        <!-- Tab Switching Bar -->
        <div class="w-full max-w-7xl mx-auto px-8 pt-8 flex flex-col md:flex-row justify-between items-center border-b border-outline/10 pb-6 gap-4">
            <div>
                <h1 class="text-3xl font-black tracking-tight text-on-surface uppercase">Cabinet Archive</h1>
                <p class="text-xs text-on-surface-variant tracking-wider">KABINET DHARMANDALA SANDHYAKALA 2025/2026</p>
            </div>
            <div class="flex gap-4">
                <button id="btn-osis" onclick="switchCabinet('osis')" class="px-6 py-2 bg-primary text-on-primary font-bold uppercase tracking-widest text-[10px] transition-all border border-primary">
                    OSIS
                </button>
                <button id="btn-mpk" onclick="switchCabinet('mpk')" class="px-6 py-2 bg-transparent text-on-surface font-bold uppercase tracking-widest text-[10px] transition-all border border-outline/30">
                    MPK
                </button>
            </div>
        </div>

        <!-- OSIS Container -->
        <div id="osis-container" class="w-full">
            <!-- Hero Section -->
            <header class="min-h-[70vh] flex flex-col justify-center max-w-7xl mx-auto px-8 relative overflow-hidden">
                <div class="absolute -top-24 -right-24 w-96 h-96 bg-primary/5 rounded-full blur-3xl"></div>
                <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-12">
                    <div class="text-center md:text-left order-2 md:order-1 max-w-3xl">
                        <span
                            class="inline-block px-3 py-1 bg-primary text-on-primary text-[10px] font-bold tracking-[0.2em] uppercase rounded-sm mb-6">EST.
                            2025</span>
                        <h1 class="text-5xl md:text-8xl font-black tracking-tighter leading-[0.9] mb-8 text-on-surface">
                            Kabinet OSIS:<br />
                            <span class="text-primary uppercase">{{ $osis['hero']['title'] }}</span>
                        </h1>
                        <p
                            class="text-body-lg text-on-surface-variant leading-relaxed text-base md:text-lg italic opacity-80">
                            "{{ $osis['hero']['slogan'] }}"
                        </p>
                    </div>
                    <div class="order-1 md:order-2 transition-all duration-700 hover:scale-105">
                        <img src="{{ asset($osis['hero']['logo']) }}"
                            class="w-40 h-40 md:w-64 md:h-64 object-contain drop-shadow-2xl" alt="OSIS Logo">
                    </div>
                </div>
            </header>

            <div class="max-w-7xl mx-auto px-4 md:px-0">
                @foreach($osis['structure'] as $item)
                    @if($item['type'] === 'bidang')
                        <x-kabinet.bidang :name="$item['name']" :group="$item['group']" :logo="$item['logo']" :slug="null" :type="'osis'">
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
                                    <x-kabinet.seksi :name="$seksi['name']" :group="$seksi['group']" :slug="null" :logo="$seksi['logo']" :type="'osis'">
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
        </div>

        <!-- MPK Container -->
        <div id="mpk-container" class="w-full hidden">
            <!-- Hero Section -->
            <header class="min-h-[70vh] flex flex-col justify-center max-w-7xl mx-auto px-8 relative overflow-hidden">
                <div class="absolute -top-24 -right-24 w-96 h-96 bg-primary/5 rounded-full blur-3xl"></div>
                <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-12">
                    <div class="text-center md:text-left order-2 md:order-1 max-w-3xl">
                        <span
                            class="inline-block px-3 py-1 bg-primary text-on-primary text-[10px] font-bold tracking-[0.2em] uppercase rounded-sm mb-6">EST.
                            2025</span>
                        <h1 class="text-5xl md:text-8xl font-black tracking-tighter leading-[0.9] mb-8 text-on-surface uppercase">
                            {{ explode(' ', $mpk['hero']['title'])[0] }}<br />
                            <span class="text-primary uppercase">{{ implode(' ', array_slice(explode(' ', $mpk['hero']['title']), 1)) }}</span>
                        </h1>
                        <p
                            class="text-body-lg text-on-surface-variant leading-relaxed text-base md:text-lg italic opacity-80">
                            "{{ $mpk['hero']['slogan'] }}"
                        </p>
                    </div>
                    <div class="order-1 md:order-2 transition-all duration-700 hover:scale-105">
                        <img src="{{ asset($mpk['hero']['logo']) }}"
                            class="w-40 h-40 md:w-64 md:h-64 object-contain drop-shadow-2xl" alt="MPK Logo">
                    </div>
                </div>
            </header>

            <div class="max-w-7xl mx-auto px-4 md:px-0">
                @foreach($mpk['structure'] as $item)
                    @if($item['type'] === 'bidang')
                        <x-kabinet.bidang :name="$item['name']" :group="$item['group']" :logo="$item['logo']" :slug="null" :type="'mpk'">
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
                        <div class="space-y-48 mb-32 px-8">
                            @foreach($item['sections'] as $seksi)
                                <x-kabinet.seksi :name="$seksi['name']" :group="$seksi['group']" :slug="null" :logo="$seksi['logo']" :type="'mpk'">
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
                    @endif
                @endforeach
            </div>
        </div>
    </main>

    <script>
        function switchCabinet(type) {
            const page = document.getElementById('archive-page');
            const osisContainer = document.getElementById('osis-container');
            const mpkContainer = document.getElementById('mpk-container');
            const btnOsis = document.getElementById('btn-osis');
            const btnMpk = document.getElementById('btn-mpk');

            if (type === 'osis') {
                page.style.setProperty('--theme-primary-600', '#be123c', 'important');
                osisContainer.classList.remove('hidden');
                mpkContainer.classList.add('hidden');

                btnOsis.className = "px-6 py-2 bg-primary text-on-primary font-bold uppercase tracking-widest text-[10px] transition-all border border-primary";
                btnMpk.className = "px-6 py-2 bg-transparent text-on-surface font-bold uppercase tracking-widest text-[10px] transition-all border border-outline/30";
                window.location.hash = 'osis';
            } else {
                page.style.setProperty('--theme-primary-600', '#3358f4', 'important');
                osisContainer.classList.add('hidden');
                mpkContainer.classList.remove('hidden');

                btnMpk.className = "px-6 py-2 bg-primary text-on-primary font-bold uppercase tracking-widest text-[10px] transition-all border border-primary";
                btnOsis.className = "px-6 py-2 bg-transparent text-on-surface font-bold uppercase tracking-widest text-[10px] transition-all border border-outline/30";
                window.location.hash = 'mpk';
            }
        }

        window.addEventListener('DOMContentLoaded', () => {
            if (window.location.hash === '#mpk') {
                switchCabinet('mpk');
            } else {
                switchCabinet('osis');
            }
        });
    </script>
</x-layout>
