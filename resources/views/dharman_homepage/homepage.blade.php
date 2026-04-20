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
        .btn-pri { 
            background: var(--theme-primary-600); 
            color: var(--theme-on-primary); 
        }
        .btn-pri:hover { 
            opacity: 0.95;
            filter: brightness(1.1);
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

        /* Expandable Text Styles */
        .truncate-text {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        .expanded .truncate-text {
            display: block;
            -webkit-line-clamp: unset;
        }
        .read-more-btn {
            font-size: 8px;
            font-weight: 950;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: var(--theme-primary-600);
            margin-top: 8px;
            cursor: pointer;
            background: none;
            border: none;
            padding: 0;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }
        .read-more-btn::after {
            content: 'expand_more';
            font-family: 'Material Symbols Outlined';
            font-size: 12px;
        }
        .expanded .read-more-btn::after {
            content: 'expand_less';
        }

        /* Logo Grid Expansion */
        .logo-item.is-hidden {
            display: none !important;
        }
        .logo-desc {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        .expanded-logos .logo-desc {
            display: block;
            -webkit-line-clamp: unset;
        }
        .expanded-logos .logo-item.is-hidden {
            display: flex !important;
        }

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
                    ['PEMBINA OSIS', 'Ika Rahayu Afriniani', asset('images/potrait/osis/rohani/toreno.webp'), 
                        "Kepemimpinan di lingkungan sekolah bukan sekadar tentang memberikan perintah, melainkan tentang bagaimana kita mampu menginspirasi dan memberdayakan setiap individu untuk mencapai potensi terbaik mereka. Sebagai pembina, saya melihat OSIS sebagai wadah krusial bagi siswa untuk mengasah karakter, integritas, dan semangat pengabdian.\n\nKami berkomitmen untuk terus mendampingi Dharmandala Sandhyakala dalam mewujudkan visi-visi inovatif mereka, memastikan bahwa setiap program kerja tidak hanya sukses secara eksekusi, tetapi juga memberikan dampak nyata bagi pengembangan soft skills dan kemajuan akademik seluruh siswa. Kepemimpinan di lingkungan sekolah bukan sekadar tentang memberikan perintah, melainkan tentang bagaimana kita mampu menginspirasi dan memberdayakan setiap individu untuk mencapai potensi terbaik mereka. Sebagai pembina, saya melihat OSIS sebagai wadah krusial bagi siswa untuk mengasah karakter, integritas, dan semangat pengabdian.\n\nKami berkomitmen untuk terus mendampingi Dharmandala Sandhyakala dalam mewujudkan visi-visi inovatif mereka, memastikan bahwa setiap program kerja tidak hanya sukses secara eksekusi, tetapi juga memberikan dampak nyata bagi pengembangan soft skills dan kemajuan akademik seluruh siswa. Kepemimpinan di lingkungan sekolah bukan sekadar tentang memberikan perintah, melainkan tentang bagaimana kita mampu menginspirasi dan memberdayakan setiap individu untuk mencapai potensi terbaik mereka. Sebagai pembina, saya melihat OSIS sebagai wadah krusial bagi siswa untuk mengasah karakter, integritas, dan semangat pengabdian.\n\nKami berkomitmen untuk terus mendampingi Dharmandala Sandhyakala dalam mewujudkan visi-visi inovatif mereka, memastikan bahwa setiap program kerja tidak hanya sukses secara eksekusi, tetapi juga memberikan dampak nyata bagi pengembangan soft skills dan kemajuan akademik seluruh siswa."],
                    ['KETUA OSIS', 'Rafif Shafy Safaraz Indratno', asset('images/potrait/osis/rohani/toreno.webp'), 
                        "Dharmandala Sandhyakala lahir dari semangat untuk menjembatani tradisi keunggulan dengan inovasi digital yang relevan. Kami percaya bahwa OSIS harus menjadi lebih dari sekadar pelaksana kegiatan; kami harus menjadi pendorong perubahan yang transformatif bagi seluruh keluarga besar M.H. Thamrin.\n\nFokus utama kami adalah menciptakan ekosistem sekolah yang kolaboratif dan transparan, di mana setiap suara siswa dihargai and setiap bakat didukung penuh. Mari kita berjalan bersama dalam harmoni untuk menciptakan legasi yang tak terlupakan bagi sekolah tercinta kita."],
                    ['KETUA MPK', 'Gisella Frizy Putri Valianda', asset('images/potrait/osis/rohani/toreno.webp'), 
                        "Sebagai badan legislatif siswa, MPK memegang tanggung jawab besar dalam memastikan tata kelola organisasi yang sehat dan akuntabel. Kami berfungsi sebagai pengawas sekaligus mitra strategis bagi OSIS, memastikan bahwa setiap aspirasi siswa disalurkan dengan tepat dan setiap kebijakan diambil demi kepentingan bersama.\n\nIntegritas dan transparansi adalah pilar utama kerja kami tahun ini. Kami berupaya membangun sistem komunikasi yang lebih efektif antara siswa dan sekolah, sehingga sinergi yang tercipta dapat membawa kita menuju pencapaian yang lebih tinggi lagi dalam berbagai bidang."]
                ] as [$title, $name, $img, $text])
                <div class="dp-slide pillar-card" style="background:var(--theme-surface-variant); border:1px solid color-mix(in srgb, var(--theme-outline) 15%, transparent); padding:min(1rem, 3vw);">
                    <div style="aspect-ratio:3/4.8; overflow:hidden; margin-bottom:1rem;">
                        <img src="{{ $img }}" class="w-full h-full object-cover transition-all duration-700">
                    </div>
                    <p class="dp-label" style="color:var(--theme-secondary-600); font-size:7px; margin-bottom:4px; letter-spacing:0.25em;">{{ $title }}</p>
                    <h3 style="font-size:clamp(0.85rem, 1.5vw, 1rem); font-weight:950; margin-bottom:6px; letter-spacing:-0.01em;">{{ $name }}</h3>
                    <div class="expandable-container">
                        <p class="truncate-text text-[9px] opacity-60 leading-relaxed font-light whitespace-pre-line">{{ $text }}</p>
                        <button onclick="toggleText(this)" class="read-more-btn">Read More</button>
                    </div>
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
                            ['shield','Palu','Palu sidang melambangkan MPK sebagai badan legislatif yang memiliki peran penting dalam musyawarah, pengambilan keputusan, serta pengawasan terhadap kinerja OSIS. Simbol ini menunjukkan kewibawaan, keadilan, serta ketegasan dalam menjalankan fungsi pengawasan dan evaluasi.'],
                            ['auto_stories','Kompas','Kompas dengan arah utara sebagai sanggaan melambangkan arah dan pedoman bagi MPK dalam menegakkan aturan, mengambil keputusan, and memastikan organisasi berjalan sesuai dengan visi dan misi yang telah ditentukan.'],
                            ['stars','Timbangan','Timbangan menjadi simbol keadilan dan keseimbangan, yang menggambarkan MPK dalam menyalurkan aspirasi siswa serta menilai kebijakan OSIS secara objektif, tidak berat sebelah, and mengutamakan kepentingan bersama.'],
                            ['diamond','Perisai di Dada','Perisai menunjukkan perlindungan, kekuatan, and tanggung jawab. Letaknya di dada burung elang menandakan bahwa MPK berfungsi menjaga kesejahteraan siswa dengan penuh integritas, sekaligus menjadi benteng bagi keberlangsungan organisasi.'],
                            ['balance','Matahari dan Garis Panjang ke Bawah','Matahari menjadi sumber energi and kehidupan, dengan garis panjang ke bawah yang melambangkan Badan Pengurus Harian MPK sebagai fondasi utama organisasi. Garis ini menegaskan bahwa BPH adalah penghubung yang menjaga sinergi antara MPK.'],
                            ['hub','Tiga Bintang','Tiga bintang di atas perisai merepresentasikan tiga komisi dalam MPK, masing-masing memiliki fokus and tanggung jawab berbeda namun tetap bekerja sama demi tujuan yang sama. Keterangan Logo: menegaskan bahwa BPH adalah penghubung yang menjaga sinergi antara MPK. Selain itu, bintang juga menjadi simbol harapan and cita-cita yang ingin dicapai oleh MPK.']
                        ] as [$icon, $title, $desc])
                        <div class="logo-item @if($loop->index >= 4) is-hidden @endif" style="display:flex; gap:1rem; padding:1.25rem; background:color-mix(in srgb, var(--theme-surface-variant) 45%, transparent); border:1px solid color-mix(in srgb, var(--theme-outline) 15%, transparent); width:100%; max-width:320px;">
                            <span class="material-symbols-outlined shrink-0" style="color:var(--theme-primary-600); font-size:1.6rem;">{{ $icon }}</span>
                            <div>
                                <h4 style="font-size:13px; md:font-size:11px; font-weight:950; margin-bottom:3px; letter-spacing:-0.01em;">{{ $title }}</h4>
                                <p class="logo-desc" style="font-size:11px; md:font-size:10px; opacity:0.8; line-height:1.4;">{{ $desc }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="flex justify-center mt-8">
                        <button id="show-all-logos" onclick="toggleLogos(this)" class="btn-base btn-sec">Lihat Semua</button>
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
                @foreach($featuredProkers as $proker)
                <div class="dp-slide" style="width:clamp(260px, 75vw, 420px); background:var(--theme-background); border:1px solid color-mix(in srgb, var(--theme-outline) 15%, transparent);">
                    <div style="aspect-ratio:16/9; overflow:hidden;">
                        <img src="{{ isset($proker->pictures_urls[0]) ? asset($proker->pictures_urls[0]) : asset('images/logo/osis/akad514.webp') }}" class="w-full h-full object-cover transition-all duration-500">
                    </div>
                    <div style="padding:1.5rem;">
                        <div class="flex justify-between items-center mb-4">
                            <span class="dp-label" style="color:var(--theme-primary-600); margin:0; font-size:7px;">{{ $proker->division }}</span>
                            <span style="font-size:9px; font-weight:700; opacity:0.4;">{{ $proker->date ? \Carbon\Carbon::parse($proker->date)->format('M d') : '' }}</span>
                        </div>
                        <h3 style="font-size:clamp(1.1rem, 2vw, 1.4rem); font-weight:950; margin-bottom:8px; letter-spacing:-0.02em;">{{ $proker->title }}</h3>
                        <p class="text-[10px] opacity-60 mb-6 leading-relaxed">{{ Str::limit(strip_tags($proker->content), 120) }}</p>
                        <a href="/programkerja" class="inline-flex items-center gap-2 text-[9px] font-black uppercase tracking-widest text-theme-primary">Details <span class="material-symbols-outlined text-sm">arrow_forward</span></a>
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
                @foreach ($multimedias as $media)
                <div class="dp-slide" style="width:clamp(140px, 22vw, 210px); aspect-ratio:9/16; background:#000; overflow:hidden; border:1px solid rgba(255,255,255,0.05);">
                    <iframe src="{{ str_replace('watch?v=', 'embed/', $media->url) }}?controls=1&modestbranding=1" class="w-full h-full"></iframe>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- SECTION 6: THAMNET (MOBILE STACK) --}}
    <section class="dp-section" style="background:var(--theme-surface); color:var(--theme-on-surface); border-top:1px solid color-mix(in srgb, var(--theme-outline) 15%, transparent);">
        <div class="dp-inner py-6 md:py-12">
            <div class="flex flex-col md:flex-row gap-6 md:gap-16 items-center justify-center">
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
                @if($featuredPost)
                    <x-thamnet.card :post="$featuredPost" />
                @else
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
                @endif
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
                @foreach($prestasis as $prestasi)
                <div class="dp-slide" style="width:clamp(240px, 78vw, 400px); background:var(--theme-surface); border:1px solid color-mix(in srgb, var(--theme-outline) 12%, transparent); overflow:hidden;">
                    {{-- LANDSCAPE 16:9 CARD --}}
                    <div style="aspect-ratio:16/9; overflow:hidden;">
                        <img src="{{ $prestasi->pictures_urls[0] ?? 'https://lh3.googleusercontent.com/aida-public/AB6AXuDLWG-f1T_yXJ1d3WzYjnOzL7BMCsQQ7Jp3mzu23IsiqJtZMLyQd2e0MoE88W1-Cx-FA3MOa70C467Oce4qdkdnO1iyQZ5g_5OTHJuE4kDPe2pGiNOzXzGPi2N4KtZPibEp4Iz9FtIU-WMo-MbZGxmoa0MC2OL57lAzTRlC5zQWFEPHxFCk0rc34N5ftqJJqhZd0DabphN9IM2aJZY8ukI6cYgWO-qUB1p3Ad0dkSqf-SBqOz1NOiQ6siCFZ2qHfeTob1BfAlBAAd0' }}" class="w-full h-full object-cover sepia-[0.3] hover:sepia-0 transition-all duration-700">
                    </div>
                    <div style="padding:1.25rem;">
                        <h4 style="font-size:9px; font-weight:900; color:var(--theme-primary-600); margin-bottom:6px; font-style:italic;">{{ $prestasi->date ? \Carbon\Carbon::parse($prestasi->date)->format('M Y') : '' }}</h4>
                        <h3 style="font-size:clamp(1rem, 1.8vw, 1.25rem); font-weight:950; margin-bottom:6px; letter-spacing:-0.03em;">{{ $prestasi->title }}</h3>
                        <p class="text-[10px] opacity-60 leading-relaxed font-light line-clamp-2">{{ Str::limit(strip_tags($prestasi->content), 120) }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    </div>

    <script>
        function toggleText(btn) {
            const container = btn.parentElement;
            container.classList.toggle('expanded');
            btn.textContent = container.classList.contains('expanded') ? 'Read Less' : 'Read More';
        }

        function toggleLogos(btn) {
            const inner = btn.closest('.dp-inner');
            inner.classList.toggle('expanded-logos');
            const isExpanded = inner.classList.contains('expanded-logos');
            btn.textContent = isExpanded ? 'Sembunyikan' : 'Lihat Semua';
        }

        function scrollSlider(id, dir) {
            const el = document.getElementById(id);
            const scrollAmt = el.offsetWidth * 0.8;
            el.scrollBy({ left: scrollAmt * dir, behavior: 'smooth' });
        }
    </script>
</x-layout>