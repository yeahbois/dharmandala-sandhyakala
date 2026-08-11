<x-layout title="Thalation | OSIS MHT">
    <x-slot:metadesc>
        <meta name="description" content="Thalation OSIS SMAN Unggulan M.H. Thamrin">
        <meta property="og:title" content="Thalation | Dharmandala Sandhyakala" />
        <meta property="og:url" content="https://ospkmhthamrin.com/thalation" />
        <meta property="og:image" content="{{ asset('images/logo/general/mpk514.webp') }}">
    </x-slot:metadesc>

    <!-- Hero Section -->
    <section
        class="relative min-h-screen flex flex-col items-center justify-center text-center px-6 overflow-hidden w-full bg-background">
        <div class="absolute inset-0 bg-gradient-to-br from-surface to-surface-variant/10 -z-10"></div>
        <div class="absolute top-0 left-0 w-full h-full opacity-30 pointer-events-none">
            <div
                class="absolute top-[-10%] right-[-10%] w-[300px] md:w-[600px] h-[300px] md:h-[600px] bg-primary/5 blur-[120px]">
            </div>
            <div
                class="absolute bottom-[-10%] left-[-10%] w-[250px] md:w-[500px] h-[250px] md:h-[500px] bg-secondary/5 blur-[100px]">
            </div>
        </div>

        <div class="relative z-10 mb-12 transition-all duration-700 w-full flex flex-col items-center">
            <img class="w-20 h-20 md:w-32 md:h-32 mx-auto mb-10 hover:scale-110 transition-all duration-700"
                src="{{ asset('images/logo/general/mpk514.webp') }}" alt="MPK Logo" />
            <h1
                class="text-6xl sm:text-7xl md:text-9xl font-black tracking-tighter text-on-surface mb-8 leading-[0.85] uppercase">
                T H A L A T I O N
            </h1>
            <p
                class="text-xs md:text-xl text-on-surface-variant max-w-2xl mx-auto font-medium uppercase tracking-[0.3em] opacity-60 leading-relaxed px-4">
                Thamrin Wall of Aspiration. <br class="hidden md:block" />
                Gerbang digital untuk pertumbuhan intelektual dan tata kelola siswa.
            </p>
        </div>
        <div class="relative z-10 w-full max-w-[1px] h-24 bg-gradient-to-b from-primary/30 to-transparent mt-12"></div>
    </section>

    <!-- MPK Functions Grid -->
    <section class="py-24 px-8 max-w-7xl mx-auto w-full text-left min-h-screen flex flex-col justify-center">
        <div class="flex flex-col md:flex-row items-baseline justify-between mb-16 border-b border-outline/10 pb-8">
            <h2 class="text-[10px] md:text-xs uppercase tracking-[0.4em] font-black text-primary mb-4 md:mb-0">FUNGSI
                KABINET</h2>
            <span class="text-on-surface-variant/40 text-[10px] font-black tracking-widest uppercase">EST.
                2025/2026</span>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-12 gap-y-16">
            <!-- Aspirasi -->
            <div class="group">
                <span class="material-symbols-outlined text-4xl mb-6 text-primary">forum</span>
                <h3 class="text-2xl font-black mb-4 tracking-tighter uppercase">Aspirasi</h3>
                <p class="text-on-surface-variant text-sm leading-relaxed font-medium">Menjadi wadah penyalur aspirasi
                    antar seluruh komponen SMA Negeri Unggulan M. H. Thamrin.</p>
            </div>
            <!-- Legislasi -->
            <div class="group">
                <span class="material-symbols-outlined text-4xl mb-6 text-primary">gavel</span>
                <h3 class="text-2xl font-black mb-4 tracking-tighter uppercase">Legislasi</h3>
                <p class="text-on-surface-variant text-sm leading-relaxed font-medium">Merancang, mengubah, dan
                    menetapkan AD/ART OSIS MPK dalam Sidang Paripurna di awal masa jabatan.</p>
            </div>
            <!-- Koreksi -->
            <div class="group">
                <span class="material-symbols-outlined text-4xl mb-6 text-primary">rule</span>
                <h3 class="text-2xl font-black mb-4 tracking-tighter uppercase">Koreksi</h3>
                <p class="text-on-surface-variant text-sm leading-relaxed font-medium">Mengevaluasi atau memberikan
                    penilaian terhadap program kerja OSIS.</p>
            </div>
            <!-- Supervisi -->
            <div class="group">
                <span class="material-symbols-outlined text-4xl mb-6 text-primary">visibility</span>
                <h3 class="text-2xl font-black mb-4 tracking-tighter uppercase">Supervisi</h3>
                <p class="text-on-surface-variant text-sm leading-relaxed font-medium">Mengawasi jalannya AD/ART OSIS
                    MPK serta program kerja pengurus OSIS.
                </p>
            </div>
            <!-- Advisi -->
            <div class="group">
                <span class="material-symbols-outlined text-4xl mb-6 text-primary">lightbulb</span>
                <h3 class="text-2xl font-black mb-4 tracking-tighter uppercase">Advisi</h3>
                <p class="text-on-surface-variant text-sm leading-relaxed font-medium">Memberi saran selama perancangan
                    dan perencanaan program kerja OSIS serta apabila terjadi kendala pada pelaksanaannya.</p>
            </div>
        </div>
    </section>

    <!-- MPK Role Execution -->
    <section
        class="bg-surface-variant/20 py-24 md:py-32 px-8 w-full border-y border-outline/5 min-h-screen flex flex-col justify-center">
        <div class="max-w-7xl mx-auto w-full">
            <div class="mb-20 text-center md:text-left">
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-black tracking-tighter mb-6 uppercase">METODOLOGI
                    EKSEKUSI</h2>
                <div class="w-20 h-1 bg-primary mb-6 mx-auto md:mx-0"></div>
                <p class="text-on-surface-variant text-xs md:text-sm font-bold uppercase tracking-[0.3em]">Bagaimana
                    cara MPK mengeksekusi perannya?</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                <!-- Mantra MPK -->
                <div
                    class="bg-surface p-8 rounded-sm shadow-sm hover:shadow-xl transition-all duration-300 border border-outline/5 group hover:-translate-y-1">
                    <span class="material-symbols-outlined text-primary mb-4 text-3xl">auto_awesome</span>
                    <h4 class="font-black text-sm uppercase tracking-wider mb-2">Mantra MPK</h4>
                    <p class="text-xs text-on-surface-variant font-medium leading-relaxed">MANTRA MPK (Masukan, Kritik,
                        Saran, Evaluasi, dan Aspirasi) adalah wadah bagi siswa/i SMAN Unggulan M.H. Thamrin untuk
                        menyalurkan aspirasinya dimanapun dan kapanpun melalui Thamrin Wall of Aspiration!</p>
                </div>
                <!-- Tanya MPK -->
                <div
                    class="bg-surface p-8 rounded-sm shadow-sm hover:shadow-xl transition-all duration-300 border border-outline/5 group hover:-translate-y-1">
                    <span class="material-symbols-outlined text-primary mb-4 text-3xl">quiz</span>
                    <h4 class="font-black text-sm uppercase tracking-wider mb-2">Tanya MPK</h4>
                    <p class="text-xs text-on-surface-variant font-medium leading-relaxed">Tanya MPK merupakan program
                        kerja dimana semua warga sekolah dapat bertanya kepada MPK sebagai perantara dengan pihak
                        sekolah. Pertanyaan akan dijawab oleh pihak sekolah agar aspirasi melalui wadah MPK lebih
                        terdengar.</p>
                </div>
                <!-- #MPKepo -->
                <div
                    class="bg-surface p-8 rounded-sm shadow-sm hover:shadow-xl transition-all duration-300 border border-outline/5 group hover:-translate-y-1">
                    <span class="material-symbols-outlined text-primary mb-4 text-3xl">explore</span>
                    <h4 class="font-black text-sm uppercase tracking-wider mb-2">#MPKepo</h4>
                    <p class="text-xs text-on-surface-variant font-medium leading-relaxed">Kegiatan membuat konten di
                        media sosial bertanya kepada warga SMAN Unggulan M. H. Thamrin mengenai situasi dan kondisi saat
                        ini atau kegiatan yang berlangsung.</p>
                </div>
                <!-- MPK Legislasi -->
                <div
                    class="bg-surface p-8 rounded-sm shadow-sm hover:shadow-xl transition-all duration-300 border border-outline/5 group hover:-translate-y-1">
                    <span class="material-symbols-outlined text-primary mb-4 text-3xl">history_edu</span>
                    <h4 class="font-black text-sm uppercase tracking-wider mb-2">Legislasi</h4>
                    <p class="text-xs text-on-surface-variant font-medium leading-relaxed">MPK Legislasi merupakan
                        program kerja MPK dimana seluruh anggota OSIS dan MPK SMAN Unggulan M. H. Thamrin berkesempatan
                        untuk menerima materi dan pengalaman dalam bidang legislatif secara langsung oleh lembaga
                        pemerintahan.</p>
                </div>
                <!-- MACAPI -->
                <div
                    class="bg-surface p-8 rounded-sm shadow-sm hover:shadow-xl transition-all duration-300 border border-outline/5 group hover:-translate-y-1">
                    <span class="material-symbols-outlined text-primary mb-4 text-3xl">nights_stay</span>
                    <h4 class="font-black text-sm uppercase tracking-wider mb-2">MACAPI</h4>
                    <p class="text-xs text-on-surface-variant font-medium leading-relaxed">MACAPI atau Malam Chat
                        Aspirasi dilakukan melalui OA Line MPK yang dikelola oleh BPH MPK. Pada MACAPI siswa/i
                        bercengkrama melalui OA Line MPK dan akan dibalas oleh BPH MPK.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Mantra MPK Wall -->
    <section id="mantra"
        class="py-24 px-8 bg-primary-container text-on-primary-container overflow-hidden w-full relative min-h-screen flex flex-col justify-center">
        <div class="max-w-7xl mx-auto flex flex-col lg:flex-row items-center gap-16 relative z-10 w-full">
            <div class="lg:w-1/2 text-center lg:text-left">
                <div
                    class="inline-block px-4 py-1.5 bg-on-primary-container/10 rounded-none text-[10px] font-black tracking-widest mb-8 border border-on-primary-container/20 uppercase">
                    LIVE STATUS: ACTIVE
                </div>
                <h2 class="text-5xl md:text-7xl lg:text-8xl font-black tracking-tighter mb-8 uppercase leading-none">
                    Mantra MPK Wall</h2>
                <p class="text-lg md:text-xl opacity-80 mb-10 leading-relaxed font-medium uppercase tracking-wide">
                    Suaramu, terdigitalisasi. Tinjau aspirasi yang ada, monitor statusnya, dan lihat eksekusinya.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                    <a href="https://bit.ly/MantraMPK" target="_blank"
                        class="bg-on-primary-container text-primary-container px-10 py-4 rounded-sm font-black text-xs uppercase tracking-[0.2em] shadow-2xl hover:brightness-110 transition-all active:scale-95 text-center">
                        Aspirasi Sekarang
                    </a>
                </div>
            </div>
            <div
                class="lg:w-1/2 w-full aspect-video bg-on-primary-container/5 backdrop-blur-xl rounded-sm border border-on-primary-container/10 flex items-center justify-center p-2 shadow-inner">
                <div class="w-full h-full bg-surface shadow-2xl rounded-none flex flex-col overflow-hidden">
                    <div class="h-10 bg-surface-variant flex items-center px-4 gap-2 border-b border-outline/10">
                        <div class="w-2.5 h-2.5 rounded-none bg-red-400"></div>
                        <div class="w-2.5 h-2.5 rounded-none bg-yellow-400"></div>
                        <div class="w-2.5 h-2.5 rounded-none bg-green-400"></div>
                        <span class="ml-4 text-[10px] font-black uppercase tracking-widest opacity-40">STREAM
                            ASPIRASI</span>
                    </div>
                    <div class="flex-1 overflow-hidden relative">
                        <!-- Unified Loader -->
                        <div class="absolute inset-0 bg-surface flex items-center justify-center animate-pulse z-0">
                            <span class="material-symbols-outlined text-primary/20 text-4xl">database</span>
                        </div>
                        <iframe class="relative z-10 w-full h-full border-none"
                            src="https://docs.google.com/spreadsheets/d/e/2PACX-1vRywDcq9Kgb9DCv1ycIdgpkG3VR1CRURsn30DNpBDY9DDu4n2co3IBlPzMm-M0XeAnNcP0RR83ei8OM/pubhtml?gid=0&amp;single=true&amp;widget=false&amp;headers=false&amp;range=B2:F100&amp;chrome=false"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="absolute top-0 right-0 w-[500px] h-[500px] bg-on-primary-container/5 rounded-none blur-[120px] -translate-y-1/2 translate-x-1/2">
        </div>
    </section>

    <!-- MACAPI Section -->
    <section id="macapi"
        class="py-24 md:py-32 lg:py-48 px-8 max-w-7xl mx-auto w-full min-h-screen flex flex-col justify-center">
        <div class="flex flex-col lg:flex-row gap-16 lg:gap-24 items-center">
            <div class="lg:w-1/2 order-2 lg:order-1 relative">
                <div class="relative group">
                    <div
                        class="absolute -inset-4 bg-primary/5 rounded-sm group-hover:bg-primary/10 transition-all duration-700">
                    </div>
                    <img class="w-full h-[500px] md:h-[600px] object-cover rounded-sm shadow-2xl relative z-10 transition-all duration-1000"
                        src="{{ asset('images/macapi_poster.jpeg') }}" alt="MACAPI Discussion" />
                </div>
            </div>
            <div class="lg:w-1/2 order-1 lg:order-2 text-center lg:text-left">
                <h2 class="text-[10px] md:text-xs uppercase tracking-[0.4em] font-black text-primary mb-6">Acara Sorotan
                </h2>
                <h3 class="text-5xl md:text-7xl font-black tracking-tighter mb-8 leading-none uppercase">Malam
                    Chat<br />Aspirasi</h3>
                <p
                    class="text-on-surface-variant text-base md:text-lg mb-12 leading-relaxed font-medium uppercase tracking-wide opacity-80">
                    MACAPI dilaksanakan dua minggu sekali pada hari Minggu. Jangan lewatkan kesempatan selanjutnya ya!
                </p>

                <div class="mb-12">
                    <p class="text-[10px] font-black uppercase tracking-[0.3em] mb-4 opacity-40">Waktu Hingga Sesi
                        Selanjutnya</p>
                    <div class="flex justify-center lg:justify-start">
                        <x-countdown date="{{ $thalation->next_macapi }}" />
                    </div>
                </div>

                <a class="inline-flex items-center gap-6 bg-surface text-on-surface border border-outline/20 px-10 py-5 rounded-sm font-black text-xs tracking-[0.2em] uppercase hover:bg-primary hover:text-on-primary hover:border-primary transition-all shadow-xl active:scale-95"
                    href="https://liff.line.me/1645278921-kWRPP32q/?accountId=oyw9031z" target="_blank">
                    LINE OA OFFICIAL
                    <span class="material-symbols-outlined text-sm">arrow_forward</span>
                </a>
                <a class="inline-flex items-center gap-6 bg-surface text-on-surface border border-outline/20 px-10 py-5 rounded-sm font-black text-xs tracking-[0.2em] uppercase hover:bg-primary hover:text-on-primary hover:border-primary transition-all shadow-xl active:scale-95"
                    href="https://t.me/mpkthamrinbot" target="_blank">
                    TELEGRAM
                    <span class="material-symbols-outlined text-sm">arrow_forward</span>
                </a>
            </div>
        </div>
    </section>

</x-layout>