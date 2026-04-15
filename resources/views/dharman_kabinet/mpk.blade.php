<x-layout title="MPK Members | Dharmandala Sandhyakala"
    keywords="mpk, pengurus mpk mht 2024/2025, mpk mht, mpk mht 2024/2025, mpk mht agradama navaleksa, mpk mht agradama navaleksa 2024/2025">
    <x-slot:metadesc>
        <meta name="description"
            content="Kenali lebih dekat Pengurus MPK MHT Agradama Navaleksa 2024/2025! Inilah para pemimpin siswa yang siap mengawal aspirasi dan perubahan." />
        <meta property="og:title" content="Pengurus MPK SMA Negeri Unggulan M. H. Thamrin 2024/2025">
        <meta property="og:description"
            content="Kenali lebih dekat Pengurus MPK MHT Agradama Navaleksa 2024/2025! Inilah para pemimpin siswa yang siap mengawal aspirasi dan perubahan.">
        <meta property="og:image" content="{{ asset('images/potrait/ospkfull.jpg') }}">
    </x-slot:metadesc>

    <style>
        #mpk-page {
            --theme-primary-600: #3358f4 !important; /* brand-blue */
            --theme-on-primary: #ffffff !important;
        }
    </style>

    <main class="w-full" id="mpk-page">
        <!-- Hero Section -->
        <header class="min-h-screen flex flex-col justify-center max-w-7xl mx-auto px-8 relative overflow-hidden">
            <div class="absolute -top-24 -right-24 w-96 h-96 bg-primary/5 rounded-full blur-3xl"></div>
            <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-12">
                <div class="text-center md:text-left order-2 md:order-1 max-w-3xl">
                    <span
                        class="inline-block px-3 py-1 bg-primary text-on-primary text-[10px] font-bold tracking-[0.2em] uppercase rounded-sm mb-6">EST.
                        2025</span>
                    <h1 class="text-5xl md:text-8xl font-black tracking-tighter leading-[0.9] mb-8 text-on-surface uppercase">
                        {{ explode(' ', $data['hero']['title'])[0] }}<br />
                        <span class="text-primary uppercase">{{ implode(' ', array_slice(explode(' ', $data['hero']['title']), 1)) }}</span>
                    </h1>
                    <p
                        class="text-body-lg text-on-surface-variant leading-relaxed text-base md:text-lg italic opacity-80">
                        "{{ $data['hero']['slogan'] }}"
                    </p>
                </div>
                <div class="order-1 md:order-2 transition-all duration-700 hover:scale-105">
                    <img src="{{ asset($data['hero']['logo']) }}"
                        class="w-40 h-40 md:w-64 md:h-64 object-contain drop-shadow-2xl" alt="MPK Logo">
                </div>
            </div>
        </header>

        <div class="max-w-7xl mx-auto px-8">
            @foreach($data['structure'] as $item)
                @if($item['type'] === 'bidang')
                    <x-kabinet.bidang :name="$item['name']" :group="$item['group']" :logo="$item['logo']" :slug="$item['slug']" :type="'mpk'">
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
                    <div class="space-y-48 mb-32">
                        @foreach($item['sections'] as $seksi)
                            <x-kabinet.seksi :name="$seksi['name']" :group="$seksi['group']" :slug="$seksi['slug']" :logo="$seksi['logo']" :type="'mpk'">
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
    </main>
</x-layout>
