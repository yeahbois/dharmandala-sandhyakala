<x-layout title="J V L Y N | Jakarta Festival by Thamrin X">
    <x-slot:metadesc>
        <meta name="description"
            content="Official info portal of JVLYN - Jakarta Festival by Thamrin X: An Intimate Concert, as the closing event of Thamrin Olympiad and Cup X.">
    </x-slot:metadesc>

    <style>
        /* Scoped styles to enhance responsiveness, typography, and specific theme variables */
        #jvlyn-container {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Countdown custom styling to override the default text-slate-700 and make it responsive & theme-aware */
        #countdown {
            color: var(--theme-on-surface) !important;
            display: flex;
            justify-content: space-around;
            width: 100%;
            gap: 1.5rem;
        }

        #countdown>div {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            background: color-mix(in srgb, var(--theme-surface-variant) 40%, transparent);
            padding: 1.25rem 0.5rem;
            border: 1px solid color-mix(in srgb, var(--theme-outline) 15%, transparent);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        #countdown .text-5xl {
            font-size: clamp(1.8rem, 4vw, 3rem);
            font-weight: 950;
            letter-spacing: -0.04em;
            line-height: 1;
            margin-bottom: 0.5rem;
            color: var(--theme-primary-600);
        }

        #countdown .text-lg {
            font-size: clamp(8px, 1.2vw, 11px);
            font-weight: 900;
            letter-spacing: 0.25em;
            color: var(--theme-on-surface-variant);
            opacity: 0.8;
            text-transform: uppercase;
        }

        /* Hero text layout adjustment */
        .hero-banner-overlay {
            background: linear-gradient(to top, var(--theme-background) 0%, rgba(0, 0, 0, 0.4) 60%, rgba(0, 0, 0, 0.85) 100%);
        }

        .artist-card:hover .artist-img {
            transform: scale(1.05);
        }

        .glass-panel {
            background: color-mix(in srgb, var(--theme-surface) 65%, transparent);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid color-mix(in srgb, var(--theme-outline) 10%, transparent);
        }

        /* Colorful Rainbow Glow Effect for Hero Button */
        .btn-rainbow-wrapper {
            position: relative;
            display: inline-flex;
        }

        .btn-rainbow-glow {
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, #ff2a5f, #ff7e40, #ffeb3b, #2bf076, #00f0ff, #3a86ff, #8338ec, #ff2a5f);
            background-size: 200% 200%;
            animation: rainbow-shift 6s ease infinite;
            filter: blur(15px);
            opacity: 0.65;
            transition: opacity 0.3s ease, filter 0.3s ease;
            pointer-events: none;
        }

        .btn-rainbow {
            position: relative;
            background: linear-gradient(90deg, #ff2a5f, #ff7e40, #ffeb3b, #2bf076, #00f0ff, #3a86ff, #8338ec, #ff2a5f);
            background-size: 200% 200%;
            animation: rainbow-shift 6s ease infinite;
            color: #ffffff !important;
            border: none;
            overflow: hidden;
            z-index: 1;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        .btn-rainbow::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 60%;
            height: 100%;
            background: linear-gradient(90deg,
                    rgba(255, 255, 255, 0) 0%,
                    rgba(255, 255, 255, 0.3) 30%,
                    rgba(255, 255, 255, 0.75) 50%,
                    rgba(255, 255, 255, 0.3) 70%,
                    rgba(255, 255, 255, 0) 100%);
            transform: skewX(-20deg);
            animation: shine 4s ease-in-out infinite;
        }

        .btn-rainbow:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.4);
        }

        .btn-rainbow:hover~.btn-rainbow-glow {
            opacity: 0.95;
            filter: blur(20px);
        }

        .btn-rainbow:active {
            transform: translateY(1px);
        }

        @keyframes rainbow-shift {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        @keyframes shine {
            0% {
                left: -100%;
            }

            20% {
                left: 100%;
            }

            100% {
                left: 100%;
            }
        }
    </style>

    <div id="jvlyn-container">

        {{-- HERO SECTION --}}
        <section
            class="relative w-full min-h-[85svh] flex flex-col justify-center items-center text-center overflow-hidden py-16 px-4 md:px-8">
            <div class="absolute inset-0 z-0">
                <img src="{{ asset('images/JVLYNBANNER.JPG') }}" class="w-full h-full object-cover brightness-[0.35]"
                    alt="JVLYN Hero Background">
                <div class="absolute inset-0 hero-banner-overlay"></div>
            </div>

            <div class="relative z-10 max-w-5xl mx-auto flex flex-col items-center">
                <span
                    class="inline-block px-4 py-1.5 bg-primary text-on-primary text-[10px] md:text-xs font-black uppercase tracking-[0.4em] mb-8">
                    THAMRIN OLYMPIAD & CUP 16 CLOSING
                </span>

                <h1
                    class="text-6xl sm:text-8xl md:text-9xl font-black tracking-tighter leading-none text-white uppercase mb-6">
                    J V L Y N X
                </h1>

                <p
                    class="text-base sm:text-xl md:text-2xl text-white/80 max-w-3xl leading-relaxed uppercase tracking-[0.1em] font-light mb-12">
                    Jakarta Festival by Thamrin X:<br />
                    <span class="text-primary font-bold">An Intimate Concert Experience</span>
                </p>

                <div class="flex flex-wrap gap-4 justify-center">
                    <div class="btn-rainbow-wrapper">
                        <div class="btn-rainbow-glow"></div>
                        <a href="/jvlyn/entry_pass" class="btn-base btn-rainbow px-10 py-4">Get Tickets</a>
                    </div>
                    <a href="#about"
                        class="btn-base bg-white/10 hover:bg-white/20 text-white border border-white/20 px-10 py-4 transition-all">
                        Explore Event
                    </a>
                </div>
            </div>
        </section>

        {{-- COUNTDOWN SECTION --}}
        <section class="w-full py-12 px-6 max-w-4xl mx-auto relative z-20 -mt-16 sm:-mt-20">
            <div class="glass-panel p-6 sm:p-10 shadow-2xl relative">
                <div
                    class="absolute -inset-0.5 bg-gradient-to-r from-primary to-secondary-600 opacity-20 blur-xl pointer-events-none">
                </div>
                <div class="relative z-10 flex flex-col items-center">
                    <span
                        class="text-[9px] md:text-[10px] font-black tracking-[0.5em] uppercase text-primary mb-6 text-center">
                        THE SPECTACLE BEGINS IN
                    </span>
                    <x-countdown date="2026-07-18 15:10:00" />
                </div>
            </div>
        </section>

        {{-- ABOUT SECTION --}}
        <section id="about" class="w-full py-20 px-6 max-w-6xl mx-auto flex flex-col lg:flex-row items-center gap-16">
            <div class="w-full lg:w-1/2 text-left">
                <span class="text-[10px] font-black tracking-[0.4em] uppercase text-primary mb-4 block">About the
                    Festival</span>
                <h2 class="text-4xl md:text-5xl font-black tracking-tighter uppercase mb-8 leading-[1]">
                    THE INTENSE PEAK OF<br />
                    <span class="text-primary">THAMRIN OLYMPIAD & CUP</span>
                </h2>
                <div class="space-y-6 text-on-surface-variant leading-relaxed text-sm md:text-base font-light">
                    <p>
                        <strong>JVLYN (Jakarta Festival by Thamrin) X</strong> is the highly anticipated grand finale
                        and closing celebration of the Thamrin Olympiad & Cup X. Bridging the competitive spirit of
                        academics, sports, and arts, JVLYN transforms this energy into an unforgettable night of music,
                        art, and community.
                    </p>
                    <p>
                        This year's theme focuses on creating an <em>Intimate Concert</em> atmosphere—bringing you
                        closer than ever to the artists and performances that define a generation. We welcome students
                        and music enthusiasts from all across Jakarta to join in harmony, celebrate shared passions, and
                        witness outstanding stagecraft.
                    </p>
                </div>
            </div>

            <div class="w-full lg:w-1/2 relative">
                <div class="absolute -inset-2 bg-gradient-to-tr from-primary/10 to-secondary-600/10 blur-2xl"></div>
                <div
                    class="relative aspect-[4/3] w-full bg-surface-variant border border-outline/10 shadow-xl overflow-hidden">
                    <img src="{{ asset('images/JVLYNBANNER.JPG') }}"
                        class="w-full h-full object-cover sepia-[0.2] hover:sepia-0 transition-all duration-700"
                        alt="Concert Atmosphere">
                </div>
            </div>
        </section>

        {{-- ARTIST LINEUP SECTION --}}
        <section class="w-full py-24 bg-surface-variant/30 border-y border-outline/10">
            <div class="max-w-6xl mx-auto px-6 text-center">
                <span class="text-[10px] font-black tracking-[0.4em] uppercase text-primary mb-4 block">GUEST ARTISTS &
                    LINEUP</span>
                <h2 class="text-4xl md:text-5xl font-black tracking-tighter uppercase mb-16">
                    FEATURING GUEST STARS
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    {{-- ARTIST 1 --}}
                    <div
                        class="artist-card flex flex-col bg-surface border border-outline/10 overflow-hidden shadow-sm group">
                        <div class="aspect-square w-full overflow-hidden relative">
                            <img src="{{ asset('images/changcuters.jpg') }}"
                                class="artist-img w-full h-full object-cover transition-transform duration-700"
                                alt="Changcuters">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-80 group-hover:opacity-60 transition-opacity">
                            </div>
                            <div class="absolute bottom-6 left-6 text-left">
                                <span
                                    class="text-[9px] font-bold tracking-[0.3em] uppercase text-primary mb-1 block">Headliner</span>
                                <h3 class="text-2xl font-black tracking-tight text-white uppercase">The Changcuters</h3>
                            </div>
                        </div>
                        <div class="p-6 text-left flex-grow">
                            <p class="text-xs text-on-surface-variant leading-relaxed font-light">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio praesentium reiciendis
                                sapiente, suscipit tenetur consectetur velit! Vitae recusandae excepturi aspernatur
                                laboriosam aut laudantium earum blanditiis, consectetur porro reprehenderit! Cumque,
                                vel.
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur, ea a. Inventore
                                velit odio pariatur culpa eligendi quis, atque repellat deleniti dolorem! Quidem
                                officiis in pariatur iure. Ipsam, quas magni!
                            </p>
                        </div>
                    </div>

                    {{-- ARTIST 2 --}}
                    <div
                        class="artist-card flex flex-col bg-surface border border-outline/10 overflow-hidden shadow-sm group">
                        <div class="aspect-square w-full overflow-hidden relative">
                            <img src="{{ asset('images/rarasudirman.jpg') }}"
                                class="artist-img w-full h-full object-cover transition-transform duration-700"
                                alt="Rara Sudirman">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-80 group-hover:opacity-60 transition-opacity">
                            </div>
                            <div class="absolute bottom-6 left-6 text-left">
                                <span
                                    class="text-[9px] font-bold tracking-[0.3em] uppercase text-primary mb-1 block">Special
                                    Performance</span>
                                <h3 class="text-2xl font-black tracking-tight text-white uppercase">Rara Sudirman</h3>
                            </div>
                        </div>
                        <div class="p-6 text-left flex-grow">
                            <p class="text-xs text-on-surface-variant leading-relaxed font-light">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio praesentium reiciendis
                                sapiente, suscipit tenetur consectetur velit! Vitae recusandae excepturi aspernatur
                                laboriosam aut laudantium earum blanditiis, consectetur porro reprehenderit! Cumque,
                                vel.
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur, ea a. Inventore
                                velit odio pariatur culpa eligendi quis, atque repellat deleniti dolorem! Quidem
                                officiis in pariatur iure. Ipsam, quas magni!
                            </p>
                        </div>
                    </div>

                    {{-- ARTIST 3 --}}
                    <div
                        class="artist-card flex flex-col bg-surface border border-outline/10 overflow-hidden shadow-sm group">
                        <div class="aspect-square w-full overflow-hidden relative">
                            <img src="{{ asset('images/atharalikhwan.jpg') }}"
                                class="artist-img w-full h-full object-cover transition-transform duration-700"
                                alt="Athar Alikhwan">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-80 group-hover:opacity-60 transition-opacity">
                            </div>
                            <div class="absolute bottom-6 left-6 text-left">
                                <span
                                    class="text-[9px] font-bold tracking-[0.3em] uppercase text-primary mb-1 block">Our
                                    MC</span>
                                <h3 class="text-2xl font-black tracking-tight text-white uppercase">Athar Alikhwan</h3>
                            </div>
                        </div>
                        <div class="p-6 text-left flex-grow">
                            <p class="text-xs text-on-surface-variant leading-relaxed font-light">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio praesentium reiciendis
                                sapiente, suscipit tenetur consectetur velit! Vitae recusandae excepturi aspernatur
                                laboriosam aut laudantium earum blanditiis, consectetur porro reprehenderit! Cumque,
                                vel.
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur, ea a. Inventore
                                velit odio pariatur culpa eligendi quis, atque repellat deleniti dolorem! Quidem
                                officiis in pariatur iure. Ipsam, quas magni!
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Opening Acts --}}
                <div class="mt-16 pt-12 border-t border-outline/10 max-w-3xl mx-auto">
                    <h4 class="text-xs font-black tracking-[0.4em] uppercase text-primary mb-6">Also featuring
                        exceptional performances by</h4>
                    <div class="flex flex-wrap justify-center gap-8 md:gap-16 text-center">
                        <div>
                            <span class="text-lg font-black text-on-surface uppercase">Bandfeat 1</span>
                            <span
                                class="text-[9px] block font-bold uppercase tracking-widest text-on-surface-variant opacity-60 mt-1">Bandfeat
                                1</span>
                        </div>
                        <div class="w-px h-10 bg-outline/20 hidden sm:block"></div>
                        <div>
                            <span class="text-lg font-black text-on-surface uppercase">Bandfeat 2</span>
                            <span
                                class="text-[9px] block font-bold uppercase tracking-widest text-on-surface-variant opacity-60 mt-1">Bandfeat
                                2</span>
                        </div>
                        <div class="w-px h-10 bg-outline/20 hidden sm:block"></div>
                        <div>
                            <span class="text-lg font-black text-on-surface uppercase">Bandfeat 3</span>
                            <span
                                class="text-[9px] block font-bold uppercase tracking-widest text-on-surface-variant opacity-60 mt-1">Bandfeat
                                3</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- INFO & LOCATION SECTION --}}
        <section class="w-full py-20 px-6 max-w-6xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">

                {{-- DETAILS GRID --}}
                <div class="text-left">
                    <span class="text-[10px] font-black tracking-[0.4em] uppercase text-primary mb-4 block">Event
                        Details</span>
                    <h2 class="text-3xl md:text-4xl font-black tracking-tighter uppercase mb-10 leading-[1.1]">
                        WHEN & WHERE
                    </h2>

                    <div class="space-y-8">
                        <div class="flex gap-4">
                            <span class="material-symbols-outlined text-3xl text-primary shrink-0">calendar_month</span>
                            <div>
                                <h4
                                    class="text-xs font-black uppercase tracking-widest text-on-surface-variant opacity-50 mb-1">
                                    Date</h4>
                                <p class="text-lg font-black text-on-surface uppercase">Saturday, 18 July 2026</p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <span class="material-symbols-outlined text-3xl text-primary shrink-0">schedule</span>
                            <div>
                                <h4
                                    class="text-xs font-black uppercase tracking-widest text-on-surface-variant opacity-50 mb-1">
                                    Time</h4>
                                <p class="text-lg font-black text-on-surface uppercase">15:10 - 22:30 WIB (Gate opens
                                    15:00)</p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <span class="material-symbols-outlined text-3xl text-primary shrink-0">pin_drop</span>
                            <div>
                                <h4
                                    class="text-xs font-black uppercase tracking-widest text-on-surface-variant opacity-50 mb-1">
                                    Venue</h4>
                                <p class="text-lg font-black text-on-surface uppercase">Lapangan Hijau SMAN Unggulan
                                    M.H. Thamrin</p>
                                <p class="text-sm text-on-surface-variant opacity-80 mt-1">Jl. Bambu Apus Raya No. 17,
                                    Cipayung, East Jakarta</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- VENUE HIGHLIGHT CARD --}}
                <div class="bg-surface border border-outline/10 p-8 text-left shadow-sm relative">
                    <h3 class="text-lg font-black uppercase tracking-tight mb-4">CONCERT ADMISSIONS</h3>
                    <p class="text-xs text-on-surface-variant leading-relaxed font-light mb-8">
                        Make sure to secure your pass before tickets sell out. Standard terms & conditions apply. Keep
                        updated with our official Instagram account for offline ticketing and voucher distributions.
                    </p>

                    <div class="space-y-4 mb-8">
                        <div class="flex justify-between items-center py-3 border-b border-outline/10">
                            <div>
                                <h5 class="text-xs font-black uppercase tracking-wider text-on-surface">Festival</h5>
                                <span
                                    class="text-[9px] text-on-surface-variant font-light uppercase opacity-60">Discount
                                    for alumni and MHT 18 via referral code.</span>
                            </div>
                            <span class="text-sm font-black text-primary uppercase">IDR 150k</span>
                        </div>

                        <div class="flex justify-between items-center py-3 border-b border-outline/10">
                            <div>
                                <h5 class="text-xs font-black uppercase tracking-wider text-on-surface">VIP (Choose
                                    seat)</h5>
                                <span class="text-[9px] text-on-surface-variant font-light uppercase opacity-60">Select
                                    your own seat (available 108 seat)</span>
                            </div>
                            <span class="text-sm font-black text-primary uppercase">IDR 325k</span>
                        </div>

                        <div class="flex justify-between items-center py-3">
                            <div>
                                <h5 class="text-xs font-black uppercase tracking-wider text-on-surface">VIP (Random
                                    seat)</h5>
                                <span class="text-[9px] text-on-surface-variant font-light uppercase opacity-60">No seat
                                    selection available.</span>
                            </div>
                            <span class="text-sm font-black text-primary uppercase">IDR 300k</span>
                        </div>
                    </div>

                    <a href="/jvlyn/entry_pass"
                        class="w-full text-center block bg-primary text-on-primary text-[10px] font-black uppercase tracking-[0.3em] py-4 shadow-md hover:brightness-110 transition-all">
                        Buy Tickets Now
                    </a>
                </div>

            </div>
        </section>

    </div>
</x-layout>