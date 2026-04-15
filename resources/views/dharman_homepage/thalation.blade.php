<x-layout title="Thalation | OSIS MHT">
    <x-slot:metadesc>
        <meta name="description" content="Thalation OSIS SMAN Unggulan M.H. Thamrin">
        <meta property="og:title" content="Thalation | Dharmandala Sandhyakala" />
        <meta property="og:url" content="https://osis-mht.vercel.app/thalation" />
        <meta property="og:image" content="{{ asset('images/logo/general/mpk514.webp') }}">
    </x-slot:metadesc>

    <!-- Hero Section -->
    <section
        class="relative min-h-screen flex flex-col items-center justify-center text-center px-6 overflow-hidden w-full">
        <div class="absolute inset-0 bg-gradient-to-br from-surface to-surface-container-low -z-10"></div>
        <div class="mb-12 transition-all duration-700 w-full flex flex-col items-center">
            <img class="w-24 h-24 md:w-32 md:h-32 mx-auto mb-8 grayscale hover:grayscale-0 transition-all duration-500"
                src="{{ asset('images/logo/general/mpk514.webp') }}" alt="MPK Logo" />
            <h1 class="text-6xl md:text-9xl font-black tracking-tighter text-primary mb-6 leading-none uppercase">
                THALATION
            </h1>
            <p
                class="text-base md:text-xl text-on-surface-variant max-w-2xl mx-auto tracking-wide font-light uppercase tracking-[0.2em] opacity-80">
                Welcome to MPK's Thamrin Wall of Aspiration! <br class="hidden md:block" />
                A digital gateway for intellectual growth and student governance.
            </p>
        </div>
        <div class="w-full max-w-[1px] h-24 bg-gradient-to-b from-primary/20 to-transparent"></div>
    </section>

    <!-- MPK Functions Grid -->
    <section class="py-24 px-8 max-w-7xl mx-auto w-full text-left min-h-screen flex flex-col justify-center">
        <div class="flex flex-col md:flex-row items-baseline justify-between mb-16 border-b border-outline/10 pb-8">
            <h2 class="text-[10px] md:text-xs uppercase tracking-[0.4em] font-black text-primary mb-4 md:mb-0">CORE
                MANDATES</h2>
            <span class="text-on-surface-variant/40 text-[10px] font-black tracking-widest uppercase">EST.
                2025/2026</span>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-12 gap-y-16">
            <!-- Aspirasi -->
            <div class="group">
                <span class="material-symbols-outlined text-4xl mb-6 text-primary">forum</span>
                <h3 class="text-2xl font-black mb-4 tracking-tighter uppercase">Aspirasi</h3>
                <p class="text-on-surface-variant text-sm leading-relaxed font-medium">Serving as the voice of the
                    student body, ensuring every perspective is documented and addressed by the administration.</p>
            </div>
            <!-- Legislasi -->
            <div class="group">
                <span class="material-symbols-outlined text-4xl mb-6 text-primary">gavel</span>
                <h3 class="text-2xl font-black mb-4 tracking-tighter uppercase">Legislasi</h3>
                <p class="text-on-surface-variant text-sm leading-relaxed font-medium">Crafting and refining the
                    regulations that govern our student body to maintain order and academic excellence.</p>
            </div>
            <!-- Koreksi -->
            <div class="group">
                <span class="material-symbols-outlined text-4xl mb-6 text-primary">rule</span>
                <h3 class="text-2xl font-black mb-4 tracking-tighter uppercase">Koreksi</h3>
                <p class="text-on-surface-variant text-sm leading-relaxed font-medium">Constructive feedback mechanism
                    for ongoing cabinet projects, ensuring high-quality execution of all student programs.</p>
            </div>
            <!-- Supervisi -->
            <div class="group">
                <span class="material-symbols-outlined text-4xl mb-6 text-primary">visibility</span>
                <h3 class="text-2xl font-black mb-4 tracking-tighter uppercase">Supervisi</h3>
                <p class="text-on-surface-variant text-sm leading-relaxed font-medium">Maintaining oversight of cabinet
                    activities to ensure transparency and accountability in all financial and organizational matters.
                </p>
            </div>
            <!-- Advisi -->
            <div class="group">
                <span class="material-symbols-outlined text-4xl mb-6 text-primary">lightbulb</span>
                <h3 class="text-2xl font-black mb-4 tracking-tighter uppercase">Advisi</h3>
                <p class="text-on-surface-variant text-sm leading-relaxed font-medium">Providing strategic counsel to
                    the student council, bridging the gap between student innovation and institutional tradition.</p>
            </div>
        </div>
    </section>

    <!-- MPK Role Execution -->
    <section
        class="bg-surface-variant/20 py-24 md:py-32 px-8 w-full border-y border-outline/5 min-h-screen flex flex-col justify-center">
        <div class="max-w-7xl mx-auto w-full">
            <div class="mb-20 text-center md:text-left">
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-black tracking-tighter mb-6 uppercase">Execution
                    Methodology</h2>
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
                    <p class="text-xs text-on-surface-variant font-medium leading-relaxed">The central database of
                        student feedback.</p>
                </div>
                <!-- Tanya MPK -->
                <div
                    class="bg-surface p-8 rounded-sm shadow-sm hover:shadow-xl transition-all duration-300 border border-outline/5 group hover:-translate-y-1">
                    <span class="material-symbols-outlined text-primary mb-4 text-3xl">quiz</span>
                    <h4 class="font-black text-sm uppercase tracking-wider mb-2">Tanya MPK</h4>
                    <p class="text-xs text-on-surface-variant font-medium leading-relaxed">Direct Q&A channel for
                        administrative clarity.</p>
                </div>
                <!-- #MPKepo -->
                <div
                    class="bg-surface p-8 rounded-sm shadow-sm hover:shadow-xl transition-all duration-300 border border-outline/5 group hover:-translate-y-1">
                    <span class="material-symbols-outlined text-primary mb-4 text-3xl">explore</span>
                    <h4 class="font-black text-sm uppercase tracking-wider mb-2">#MPKepo</h4>
                    <p class="text-xs text-on-surface-variant font-medium leading-relaxed">Transparent insights into
                        legislative inner workings.</p>
                </div>
                <!-- MPK Legislasi -->
                <div
                    class="bg-surface p-8 rounded-sm shadow-sm hover:shadow-xl transition-all duration-300 border border-outline/5 group hover:-translate-y-1">
                    <span class="material-symbols-outlined text-primary mb-4 text-3xl">history_edu</span>
                    <h4 class="font-black text-sm uppercase tracking-wider mb-2">Legislasi</h4>
                    <p class="text-xs text-on-surface-variant font-medium leading-relaxed">Archive of official student
                        bylaws and acts.</p>
                </div>
                <!-- MACAPI -->
                <div
                    class="bg-surface p-8 rounded-sm shadow-sm hover:shadow-xl transition-all duration-300 border border-outline/5 group hover:-translate-y-1">
                    <span class="material-symbols-outlined text-primary mb-4 text-3xl">nights_stay</span>
                    <h4 class="font-black text-sm uppercase tracking-wider mb-2">MACAPI</h4>
                    <p class="text-xs text-on-surface-variant font-medium leading-relaxed">Malam Chat Aspirasi:
                        Interactive feedback nights.</p>
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
                    class="inline-block px-4 py-1.5 bg-on-primary-container/10 rounded-full text-[10px] font-black tracking-widest mb-8 border border-on-primary-container/20 uppercase">
                    LIVE STATUS: ACTIVE
                </div>
                <h2 class="text-5xl md:text-7xl lg:text-8xl font-black tracking-tighter mb-8 uppercase leading-none">
                    Mantra MPK Wall</h2>
                <p class="text-lg md:text-xl opacity-80 mb-10 leading-relaxed font-medium uppercase tracking-wide">
                    Your voice, digitized. Review all ongoing aspirations, monitor their status, and see how the Student
                    Council responds in real-time.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                    <a href="https://forms.gle/xgKaiVkChv7sPXQH7" target="_blank"
                        class="bg-on-primary-container text-primary-container px-10 py-4 rounded-sm font-black text-xs uppercase tracking-[0.2em] shadow-2xl hover:brightness-110 transition-all active:scale-95 text-center">
                        Aspirasi Sekarang
                    </a>
                </div>
            </div>
            <div
                class="lg:w-1/2 w-full aspect-video bg-on-primary-container/5 backdrop-blur-xl rounded-sm border border-on-primary-container/10 flex items-center justify-center p-2 shadow-inner">
                <div class="w-full h-full bg-surface shadow-2xl rounded-sm flex flex-col overflow-hidden">
                    <div class="h-10 bg-surface-variant flex items-center px-4 gap-2 border-b border-outline/10">
                        <div class="w-2.5 h-2.5 rounded-full bg-red-400"></div>
                        <div class="w-2.5 h-2.5 rounded-full bg-yellow-400"></div>
                        <div class="w-2.5 h-2.5 rounded-full bg-green-400"></div>
                        <span class="ml-4 text-[10px] font-black uppercase tracking-widest opacity-40">Aspiration
                            Stream</span>
                    </div>
                    <div class="flex-1 overflow-hidden relative">
                        <!-- Unified Loader -->
                        <div class="absolute inset-0 bg-surface flex items-center justify-center animate-pulse z-0">
                            <span class="material-symbols-outlined text-primary/20 text-4xl">database</span>
                        </div>
                        <iframe class="relative z-10 w-full h-full border-none"
                            src="https://docs.google.com/spreadsheets/d/e/2PACX-1vRywDcq9Kgb9DCv1ycIdgpkG3VR1CRURsn30DNpBDY9DDu4n2co3IBlPzMm-M0XeAnNcP0RR83ei8OM/pubhtml?gid=0&amp;single=true&amp;widget=false&amp;headers=false&amp;range=B2:F17&amp;chrome=false"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="absolute top-0 right-0 w-[500px] h-[500px] bg-on-primary-container/5 rounded-full blur-[120px] -translate-y-1/2 translate-x-1/2">
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
                    <img class="w-full h-[500px] md:h-[600px] object-cover rounded-sm shadow-2xl relative z-10 grayscale hover:grayscale-0 transition-all duration-1000"
                        src="{{ asset('images/oa_line.webp') }}" alt="MACAPI Discussion" />
                </div>
            </div>
            <div class="lg:w-1/2 order-1 lg:order-2 text-center lg:text-left">
                <h2 class="text-[10px] md:text-xs uppercase tracking-[0.4em] font-black text-primary mb-6">EVENT
                    SPOTLIGHT</h2>
                <h3 class="text-5xl md:text-7xl font-black tracking-tighter mb-8 leading-none uppercase">Malam
                    Chat<br />Aspirasi</h3>
                <p
                    class="text-on-surface-variant text-base md:text-lg mb-12 leading-relaxed font-medium uppercase tracking-wide opacity-80">
                    Join our quarterly open forum. Connect directly with cabinet heads through our dedicated LINE OA
                    channel. No filters, just pure dialogue.
                </p>

                <div class="mb-12">
                    <p class="text-[10px] font-black uppercase tracking-[0.3em] mb-4 opacity-40">Waktu Hingga Sesi
                        Selanjutnya</p>
                    <div class="flex justify-center lg:justify-start">
                        <x-countdown date="2025-02-22 20:00:00" />
                    </div>
                </div>

                <a class="inline-flex items-center gap-6 bg-surface text-on-surface border border-outline/20 px-10 py-5 rounded-sm font-black text-xs tracking-[0.2em] uppercase hover:bg-primary hover:text-on-primary hover:border-primary transition-all shadow-xl active:scale-95"
                    href="https://linevoom.line.me/user/_dXN731XnZF7XszfAy8omILGBZ7zWxk3-gbubMJs" target="_blank">
                    LINE OA OFFICIAL
                    <span class="material-symbols-outlined text-sm">arrow_forward</span>
                </a>
            </div>
        </div>
    </section>

</x-layout>