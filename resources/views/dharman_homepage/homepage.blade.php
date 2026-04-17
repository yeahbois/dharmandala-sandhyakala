<x-layout title="DHARMANDALA SANDHYAKALA 2025/2026">
    <x-slot:metadesc>
        <meta name="description" content="Official student council portal of SMA Unggulan M. H. Thamrin">
        <meta property="og:title" content="DHARMANDALA SANDHYAKALA" />
        <meta property="og:url" content="https://ospkmhthamrin.com" />
        <meta property="og:image" content="{{ asset('images/potrait/ospkfull.jpg') }}">
    </x-slot:metadesc>

    <style>
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
        .pillar-card {
            width: clamp(160px, 45vw, 220px);
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
        }
        @media (min-width: 768px) {
            .pillar-grid {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                gap: 2rem;
            }
            .pillar-card { width: clamp(180px, 20vw, 220px); }
        }
        @media (min-width: 1024px) {
            .pillar-grid {
                display: grid;
                grid-template-columns: repeat(3, 16rem);
                justify-content: center;
                gap: 3rem;
            }
            .pillar-card { width: 100%; }
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
        }
        .btn-pri { background: #fff; color: #000; }
        .btn-pri:hover { background: #eee; }
        .btn-sec { background: rgba(255,255,255,0.08); border-color: rgba(255,255,255,0.25); color: #fff; }
        .btn-sec:hover { background: rgba(255,255,255,0.15); }
    </style>

    <div style="width:100%; align-self:stretch; display:flex; flex-direction:column; overflow-x: hidden;">

    {{-- SECTION 1: HERO --}}
    <section class="dp-section">
        <div style="position:absolute; inset:0; z-index:0;">
            <img src="{{ asset('images/potrait/ospkfull.jpg') }}" class="w-full h-full object-cover brightness-[0.32]">
            {{-- Dual scale gradient for text readability --}}
            <div style="position:absolute; inset:0; background: linear-gradient(to right, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0.4) 50%, transparent 100%);"></div>
            <div style="position:absolute; inset:0; background: linear-gradient(to top, rgba(0,0,0,0.6) 0%, transparent 40%);"></div>
        </div>
        <div class="dp-inner items-start text-left" style="z-index:1; min-height:100svh; justify-content:center;">
            <p class="dp-label" style="color:white;">Kabinet 2025/2026</p>
            <h1 class="dp-h1 text-white mb-6 md:mb-8">DHARMANDALA<br>SANDHYAKALA</h1>
            <p class="dp-body text-white/70 max-w-[85vw] md:max-w-xl mb-10 leading-relaxed font-light mt-4 md:mt-0 text-inherit mobile-line-wrap text-left">
                <span class="block md:inline">Selamat Datang di Portal</span> 
                <span class="block md:inline">Resmi OSIS Sekolah</span> 
                <span class="text-white font-medium">SMAN Unggulan M.H. Thamrin</span>.
            </p>
            <div style="display:flex; flex-wrap:wrap; gap:0.75rem; justify-content:flex-start;">
                <a href="/programkerja" class="btn-base btn-pri">Program Kerja</a>
                <a href="/publikasiprestasi" class="btn-base btn-sec">Publikasi Prestasi</a>
            </div>
        </div>
    </section>

    {{-- SECTION 2: PILLARS --}}
    <section id="pillars" class="dp-section" style="background:var(--theme-surface); color:var(--theme-on-surface); border-top:1px solid color-mix(in srgb, var(--theme-outline) 15%, transparent);">
        <div class="dp-inner">
            <div class="flex justify-between items-end mb-10 md:mb-14">
                <div class="mobile-center-stack w-full md:w-auto">
                    <span class="dp-label" style="color:var(--theme-secondary-600);">Kepemimpinan</span>
                    <h2 class="dp-h2">KATA SAMBUTAN</h2>
                </div>
                <div class="flex md:hidden gap-2">
                    <button class="slider-nav-btn" onclick="scrollSlider('pillar-slider', -1)"><span class="material-symbols-outlined">chevron_left</span></button>
                    <button class="slider-nav-btn" onclick="scrollSlider('pillar-slider', 1)"><span class="material-symbols-outlined">chevron_right</span></button>
                </div>
            </div>
            
            {{-- Cards are UNIFORM - no special middle border --}}
            <div id="pillar-slider" class="dp-slider pillar-grid hide-scrollbar">
                @foreach([
                    ['PEMBINA OSIS', 'Ika Rahayu Afriniani', 'https://lh3.googleusercontent.com/aida-public/AB6AXuAJY9rrwRnC5qO0RMjHxfErG-5VlD0TTkbjHA_8WmHthAQmmtPTp4dCMmKLqP5NLKVwRg2h08J9Mk45EIshiVRHEAxnKi_mR9LLaS-ZzbYt6Wmtd1IaaVHV_hcUhjQDZlllGkGcmZdjfl4Sw6YCft2_w6WjhFJyjnIe5YrEtuezucx39mqNMY_iKtsfpO0m1a0VL_9eIdSgz2xEN0IsC-XWQvz_FM7uD2TlaBIrtx0DURnmAP3aoKY6hb1fkOR5svZYWHn2u9b4KsE', 'The foundational values of the tower begin with leadership and academic integrity. 1'],
                    ['KETUA OSIS', 'Rafif Shafy Safaraz Indratno', 'https://lh3.googleusercontent.com/aida-public/AB6AXuBj0KfS1h4VoNMQCn5yi0Hw9Q4HtlC0qxSxX7A_mw_mPp5OXnWLtIqMU2lVkBYtG_wFAJaTXU3A98KmiaP0dEj3AmObCOx6e6N_kZbNWu5y9eEEAXTHMkdImxmdzH2XwU4hpSQ-02D40dyK0kXF-wosDuF_0wX_RlU0MENx8WKjd6MZ33NSt9GaXibambP8ymB3Ind7S0cCiNd-BOfKwXvdwEDvp2QzGvwRgTuxO6ScNmvJwbY1Nm3ev_-er2SZRHh76S3cr3K0Mz8', 'The foundational values of the tower begin with leadership and academic integrity. 2'],
                    ['KETUA MPK', 'Gisella Frizy Putri Valianda', 'https://lh3.googleusercontent.com/aida-public/AB6AXuBCpQHV0yq30oSYBDafnNAYFsog9qL7CEKsiSa34Zk7mPqlZ-PRZGyoP6Fur1JXzjt_1CMFGNyX9nj-DoXzXjxmlxq6kg0CE4fJ4oPeerXUtvwFH2VMXkNq5fCde9BMvAhrwhooOROyRzBCdCyOudvilCGazuXOuCX92YqA7Dz-FOCbZsi7u_enGX1f662vzdQw4_mA3yYpz2yqMe8z28lg1viHXV7uMWilXoivi5NVlZ0H_CS9iLqkxIoNg_uwB2il7o76ARxKE4Y', 'The foundational values of the tower begin with leadership and academic integrity. 3']
                ] as [$title, $name, $img, $text])
                <div class="dp-slide pillar-card" style="background:var(--theme-surface-variant); border:1px solid color-mix(in srgb, var(--theme-outline) 15%, transparent); padding:min(1rem, 3vw);">
                    <div style="aspect-ratio:3/4.8; overflow:hidden; margin-bottom:1rem;">
                        <img src="{{ $img }}" class="w-full h-full object-cover filter grayscale hover:grayscale-0 transition-all duration-700">
                    </div>
                    <p class="dp-label" style="color:var(--theme-secondary-600); font-size:7px; margin-bottom:4px; letter-spacing:0.25em;">{{ $title }}</p>
                    <h3 style="font-size:clamp(0.85rem, 1.5vw, 1rem); font-weight:950; margin-bottom:6px; letter-spacing:-0.01em;">{{ $name }}</h3>
                    <p class="line-clamp-3 text-[9px] opacity-60 leading-relaxed font-light">{{ $text }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- SECTION 3: HERALDIC (EXPANDED) --}}
    <section class="dp-section" style="background:var(--theme-background); color:var(--theme-on-surface); border-top:1px solid color-mix(in srgb, var(--theme-outline) 10%, transparent);">
        <div class="dp-inner">
            <div class="flex flex-col md:flex-row gap-12 lg:gap-24 items-center">
                {{-- Logo: BIGGER on desktop --}}
                <div style="display:flex; justify-content:center; position:relative; flex-shrink:0;">
                    <div style="position:absolute; inset:0; background:var(--theme-primary-600); opacity:0.12; filter:blur(60px); border-radius:100% !important;"></div>
                    <img src="{{ asset('images/logo/general/ospk514.webp') }}" class="w-56 h-56 md:w-[22rem] md:h-[22rem] lg:w-[28rem] lg:h-[28rem] object-contain relative transition-transform duration-1000 hover:scale-105">
                </div>
                
                {{-- Points: 6 TOTAL --}}
                <div class="w-full">
                    <span class="dp-label" style="color:var(--theme-primary-600);">Identitas Kami</span>
                    <h2 class="dp-h2 mb-10 md:mb-14">MAKNA LOGO</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-3 md:gap-4 justify-items-center">
                        @foreach([
                            ['shield','The Golden Shield','Protection of student interests.'],
                            ['auto_stories','The Open Codex','Commitment to academic legacy.'],
                            ['stars','The Twin Stars','Growth and synergy.'],
                            ['diamond','Resilience','Unbreakable Thamrin spirit.'],
                            ['balance','Justice','Integrity within governance.'],
                            ['hub','Connectivity','Bridging digital frontiers.']
                        ] as [$icon, $title, $desc])
                        <div style="display:flex; gap:1rem; padding:1.25rem; background:color-mix(in srgb, var(--theme-surface-variant) 45%, transparent); border:1px solid color-mix(in srgb, var(--theme-outline) 15%, transparent); width:100%; max-width:320px;">
                            <span class="material-symbols-outlined shrink-0" style="color:var(--theme-primary-600); font-size:1.6rem;">{{ $icon }}</span>
                            <div>
                                <h4 style="font-size:13px; md:font-size:11px; font-weight:950; margin-bottom:3px; letter-spacing:-0.01em;">{{ $title }}</h4>
                                <p style="font-size:11px; md:font-size:10px; opacity:0.8; line-height:1.4;">{{ $desc }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION 4: PROGRAMS (MOBILE SLIDER) --}}
    <section class="dp-section" style="background:var(--theme-surface); color:var(--theme-on-surface); border-top:1px solid color-mix(in srgb, var(--theme-outline) 10%, transparent);">
        <div class="dp-inner">
            <div class="flex justify-between items-end mb-10 gap-4">
                <div class="mobile-center-stack w-full md:w-auto">
                    <span class="dp-label" style="color:var(--theme-primary-600);">Inisiatif</span>
                    <h2 class="dp-h2">Program Kerja Unggulan</h2>
                </div>
                <div class="flex gap-2">
                    <button class="slider-nav-btn" onclick="scrollSlider('sc-prv', -1)"><span class="material-symbols-outlined">chevron_left</span></button>
                    <button class="slider-nav-btn" onclick="scrollSlider('sc-prv', 1)"><span class="material-symbols-outlined">chevron_right</span></button>
                </div>
            </div>
            <div id="sc-prv" class="dp-slider hide-scrollbar">
                @foreach([
                    ['Academic','OCT 20','Thamrin Summit 4.0','Inter-school competition focused on digital diplomacy.'],
                    ['Culture','NOV 12','Digital Ivory Radio','Monthly podcast exploring traditional values.'],
                    ['Society','DEC 05','Dharmandala Care','Bridging school and community through social-tech.']
                ] as [$cat, $date, $name, $desc])
                <div class="dp-slide" style="width:clamp(260px, 75vw, 420px); background:var(--theme-background); border:1px solid color-mix(in srgb, var(--theme-outline) 15%, transparent);">
                    <div style="aspect-ratio:16/9; overflow:hidden;">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCWJ2UiE2dvcBE77JDYlDyacz6rdS07NHuMEnIsB-VY1K1G3WVD-X2xSkfMxw3SUzwzy4gzQRAJZ3HjRyKkRWIARQ6Ob3BLRGlgxJsiEaAR6QDdgYWFFY3s5S7Ca0Ca6gi3adRGgsC-sYnsiYLy1lbJXUCo-UUnxVrdWs10vAtYpD_gcHExUrpm9Ub5eR85CfVkTa-cxj0ieXkR7cpplpdjHgFhoLY29DmjBkytkLGWiCVRcU--HD8VO9mDSbQWbTZ9vcx2ZGqojFo" class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-500">
                    </div>
                    <div style="padding:1.5rem;">
                        <div class="flex justify-between items-center mb-4">
                            <span class="dp-label" style="color:var(--theme-primary-600); margin:0; font-size:7px;">{{ $cat }}</span>
                            <span style="font-size:9px; font-weight:700; opacity:0.4;">{{ $date }}</span>
                        </div>
                        <h3 style="font-size:clamp(1.1rem, 2vw, 1.4rem); font-weight:950; margin-bottom:8px; letter-spacing:-0.02em;">{{ $name }}</h3>
                        <p class="text-[10px] opacity-60 mb-6 leading-relaxed">{{ $desc }}</p>
                        <a href="#" class="inline-flex items-center gap-2 text-[9px] font-black uppercase tracking-widest text-theme-primary">Details <span class="material-symbols-outlined text-sm">arrow_forward</span></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- SECTION 5: REELS --}}
    <section class="dp-section" style="background:var(--theme-surface-variant); color:var(--theme-on-surface); border-top:1px solid color-mix(in srgb, var(--theme-outline) 10%, transparent);">
        <div class="dp-inner">
            <div class="flex justify-between items-end mb-10 gap-4">
                <div class="mobile-center-stack w-full md:w-auto">
                    <span class="dp-label" style="color:var(--theme-primary-600); opacity:0.75;">Multimedia</span>
                    <h2 class="dp-h2">Video Kami</h2>
                </div>
                <div class="flex gap-2">
                    <button class="slider-nav-btn" onclick="scrollSlider('sc-rlx', -1)"><span class="material-symbols-outlined">chevron_left</span></button>
                    <button class="slider-nav-btn" onclick="scrollSlider('sc-rlx', 1)"><span class="material-symbols-outlined">chevron_right</span></button>
                </div>
            </div>
            <div id="sc-rlx" class="dp-slider hide-scrollbar">
                @foreach (['qGhGDXOk0pY', 'wCqFYdHKIdo', 'wCqFYdHKIdo'] as $vid)
                <div class="dp-slide" style="width:clamp(140px, 22vw, 210px); aspect-ratio:9/16; background:#000; overflow:hidden; border:1px solid rgba(255,255,255,0.05);">
                    <iframe src="https://www.youtube.com/embed/{{ $vid }}?controls=1&modestbranding=1" class="w-full h-full"></iframe>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- SECTION 6: THAMNET (MOBILE STACK) --}}
    <section class="dp-section" style="background:var(--theme-surface); color:var(--theme-on-surface); border-top:1px solid color-mix(in srgb, var(--theme-outline) 15%, transparent); max-height:100svh;">
        <div class="dp-inner h-full py-6 md:py-12">
            <div class="flex flex-col md:flex-row gap-6 md:gap-16 items-center h-full justify-center">
                {{-- Main Text: TOP on mobile --}}
                <div class="mobile-center-stack w-full md:w-1/2 flex-shrink-0">
                    <span class="dp-label" style="color:var(--theme-primary-600);">Inovasi</span>
                    <h2 class="dp-h2 mb-4 md:mb-6" style="line-height:0.87;">THAMNET:<br>REALISASI DIGITALISASI</h2>
                    <p class="dp-body opacity-60 mb-6 md:mb-10 max-w-lg leading-relaxed font-light line-clamp-2 md:line-clamp-none">
                        Platform intranet siswa yang dirancang untuk menyederhanakan tata kelola, mengotomatisasi pelacakan sumber daya akademik, dan meningkatkan keterlibatan siswa.
                    </p>
                    <div class="flex flex-wrap gap-2 md:gap-3 justify-center md:justify-start">
                        <a href="/thamnet" class="btn-base btn-pri px-4 py-2 md:px-8 md:py-4" style="background:var(--theme-primary-600); color:var(--theme-on-primary);">Cek Thamnet</a>
                        <a href="/thamnet" class="btn-base btn-sec px-4 py-2 md:px-8 md:py-4" style="background:var(--theme-surface-variant); border-color:transparent;">Baca Detail</a>
                    </div>
                </div>
                
                {{-- Card: BOTTOM on mobile --}}
                <div class="w-full md:w-1/2 overflow-hidden flex flex-col" style="background:var(--theme-background); border:1px solid color-mix(in srgb, var(--theme-outline) 10%, transparent); position:relative;">
                    <div style="aspect-ratio:16/9; overflow:hidden;" class="flex-shrink">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuB9RUJekgSiw5S6tCXqlHvZ3HI8gFb-4-i611Y0_4CTEtGrSAiXPifuv8Djmu5Wu9hroeGqfBjrXiv1udllfPAE4H_wXUD4yRPYbe0cwIMBiWW-NjJb1CZqM3Ewr4YmipUtG6rCWTRXgfUQY9mmsCs05o_OPh5YoZTMrx7E1eSHTo2eW7_6IQnmtTL3EtWZ2mn3d0hL30Uf5tqH6nzFhHuXx4OfwaeycHHZS7AygtJbmEu5v2TGs_B2S3j17i2D9XMeSRiaOOBUdVI" class="w-full h-full object-cover filter transition-transform duration-700 hover:scale-105">
                    </div>
                    <div style="padding:1rem;" class="flex-grow flex flex-col justify-center">
                        <span class="dp-label" style="color:var(--theme-secondary-600); font-size:7px; margin-bottom:4px;">Featured Insight</span>
                        <h4 style="font-size:1rem; md:font-size:1.1rem; font-weight:950; margin-bottom:2px; letter-spacing:-0.02em;">Digital Diplomacy 101</h4>
                        <p class="text-[9px] md:text-[10px] opacity-60 leading-relaxed font-light line-clamp-2">Bridge the gap between tradition and digital speed within the cabinet's internal workflow.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION 7: ACHIEVEMENTS (MOBILE SLIDER) --}}
    <section class="dp-section" style="background:var(--theme-background); color:var(--theme-on-surface); border-top:1px solid color-mix(in srgb, var(--theme-outline) 10%, transparent);">
        <div class="dp-inner">
            <div class="flex justify-between items-end mb-10 gap-4">
                <div class="mobile-center-stack w-full md:w-auto">
                    <span class="dp-label" style="color:var(--theme-on-primary-container);">Legasi Pemenang</span>
                    <h2 class="dp-h2">PRESTASI KAMI</h2>
                </div>
                <div class="flex gap-2">
                    <button class="slider-nav-btn" onclick="scrollSlider('sc-achx', -1)"><span class="material-symbols-outlined">chevron_left</span></button>
                    <button class="slider-nav-btn" onclick="scrollSlider('sc-achx', 1)"><span class="material-symbols-outlined">chevron_right</span></button>
                </div>
            </div>
            
            <div id="sc-achx" class="dp-slider hide-scrollbar">
                @foreach([
                    ['Sep 2025','1st Place National Robotics','Gold medal in Surabaya sets new record for autonomous fleet navigation.'],
                    ['Aug 2025','Best Delegate — Global MUN','Diplomacy awards in Singapore represent cabinet excellence.'],
                    ['Jul 2025','Ivy League Admissions','Class of 2025 achieves record-breaking admission rates.']
                ] as [$date, $name, $desc])
                <div class="dp-slide" style="width:clamp(240px, 78vw, 400px); background:var(--theme-surface); border:1px solid color-mix(in srgb, var(--theme-outline) 12%, transparent); overflow:hidden;">
                    {{-- LANDSCAPE 16:9 CARD --}}
                    <div style="aspect-ratio:16/9; overflow:hidden;">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDLWG-f1T_yXJ1d3WzYjnOzL7BMCsQQ7Jp3mzu23IsiqJtZMLyQd2e0MoE88W1-Cx-FA3MOa70C467Oce4qdkdnO1iyQZ5g_5OTHJuE4kDPe2pGiNOzXzGPi2N4KtZPibEp4Iz9FtIU-WMo-MbZGxmoa0MC2OL57lAzTRlC5zQWFEPHxFCk0rc34N5ftqJJqhZd0DabphN9IM2aJZY8ukI6cYgWO-qUB1p3Ad0dkSqf-SBqOz1NOiQ6siCFZ2qHfeTob1BfAlBAAd0" class="w-full h-full object-cover sepia-[0.3] hover:sepia-0 transition-all duration-700">
                    </div>
                    <div style="padding:1.25rem;">
                        <h4 style="font-size:9px; font-weight:900; color:var(--theme-primary-600); margin-bottom:6px; font-style:italic;">{{ $date }}</h4>
                        <h3 style="font-size:clamp(1rem, 1.8vw, 1.25rem); font-weight:950; margin-bottom:6px; letter-spacing:-0.03em;">{{ $name }}</h3>
                        <p class="text-[10px] opacity-60 leading-relaxed font-light line-clamp-2">{{ $desc }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    </div>
</x-layout>