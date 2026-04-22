<x-layout title="{{ $prestasi->title }} - Dharmandala Sandhyakala" keywords="prestasi, sman mh thamrin">
    <x-slot:metadesc>
        <meta name="description" content="{{ Str::limit(strip_tags($prestasi->content), 160) }}" />
        <meta property="og:title" content="{{ $prestasi->title }}">
        <meta property="og:description" content="{{ Str::limit(strip_tags($prestasi->content), 160) }}">
        <meta property="og:image" content="{{ $prestasi->pictures_urls[0] ?? asset('images/logo/osis/akad514.webp') }}">
    </x-slot:metadesc>

    <style>
        .prose h1, .prose h2, .prose h3 {
            color: var(--theme-on-surface);
            font-weight: 800;
            margin-top: 2.5rem;
            margin-bottom: 1.25rem;
            line-height: 1.2;
        }
        .prose p {
            color: var(--theme-on-surface-variant);
            line-height: 1.8;
            margin-bottom: 1.5rem;
            font-size: 1.125rem;
        }
        .prose blockquote {
            border-left: 4px solid var(--theme-primary-600);
            padding-left: 1.5rem;
            font-style: italic;
            color: var(--theme-on-surface-variant);
            margin: 2rem 0;
            background: var(--theme-surface-variant);
            padding: 1rem 1.5rem;
        }
        .article-gradient {
            background: linear-gradient(to bottom, var(--theme-surface), var(--theme-background));
        }
        /* Custom prose styles for common tags */
        .prose ul { list-style-type: disc; padding-left: 1.5rem; margin-bottom: 1.5rem; }
        .prose ol { list-style-type: decimal; padding-left: 1.5rem; margin-bottom: 1.5rem; }
        .prose strong { color: var(--theme-on-surface); font-weight: 700; }
    </style>

    <article class="w-full article-gradient min-h-screen text-left" id="prestasi-detail-page">
        <script>
            function scrollSlider(id, direction) {
                const slider = document.getElementById(id);
                const scrollAmount = slider.clientWidth;
                slider.scrollBy({
                    left: direction * scrollAmount,
                    behavior: 'smooth'
                });
            }

            function updateDots() {
                const slider = document.getElementById('prestasi-carousel');
                if (!slider) return;
                const index = Math.round(slider.scrollLeft / slider.clientWidth);
                const dots = document.querySelectorAll('.indicator-dot');
                dots.forEach((dot, i) => {
                    if (i === index) {
                        dot.classList.remove('bg-white/30');
                        dot.classList.add('bg-white');
                    } else {
                        dot.classList.remove('bg-white');
                        dot.classList.add('bg-white/30');
                    }
                });
            }

            function scrollToSlide(index) {
                const slider = document.getElementById('prestasi-carousel');
                slider.scrollTo({
                    left: index * slider.clientWidth,
                    behavior: 'smooth'
                });
            }
        </script>

        <!-- Hero Section / Carousel -->
        <header class="relative w-full h-[60vh] md:h-[80vh] overflow-hidden bg-black">
            @if(isset($prestasi->pictures_urls) && count($prestasi->pictures_urls) > 0)
                <div id="prestasi-carousel" onscroll="updateDots()" class="flex w-full h-full overflow-x-auto snap-x snap-mandatory hide-scrollbar">
                    @foreach($prestasi->pictures_urls as $url)
                        <div class="flex-shrink-0 w-full h-full snap-start">
                            <img src="{{ $url }}" class="w-full h-full object-cover" alt="{{ $prestasi->title }}">
                        </div>
                    @endforeach
                </div>

                @if(count($prestasi->pictures_urls) > 1)
                    <!-- Navigation Buttons -->
                    <div class="absolute inset-y-0 left-4 md:left-8 flex items-center z-20">
                        <button onclick="scrollSlider('prestasi-carousel', -1)" class="w-10 h-10 md:w-12 md:h-12 bg-white/10 backdrop-blur-md text-white flex items-center justify-center hover:bg-white/20 transition-all">
                            <span class="material-symbols-outlined">chevron_left</span>
                        </button>
                    </div>
                    <div class="absolute inset-y-0 right-4 md:right-8 flex items-center z-20">
                        <button onclick="scrollSlider('prestasi-carousel', 1)" class="w-10 h-10 md:w-12 md:h-12 bg-white/10 backdrop-blur-md text-white flex items-center justify-center hover:bg-white/20 transition-all">
                            <span class="material-symbols-outlined">chevron_right</span>
                        </button>
                    </div>

                    <!-- Indicator dots -->
                    <div class="absolute bottom-32 md:bottom-40 left-0 w-full flex justify-center gap-2 z-20">
                        @foreach($prestasi->pictures_urls as $index => $url)
                            <button onclick="scrollToSlide({{ $index }})" class="indicator-dot w-1.5 h-1.5 {{ $index === 0 ? 'bg-white' : 'bg-white/30' }} rounded-full transition-all hover:scale-125"></button>
                        @endforeach
                    </div>
                @endif
            @else
                <img src="https://images.unsplash.com/photo-1517842645767-c639042777db?auto=format&fit=crop&w=1600&q=80"
                    class="w-full h-full object-cover"
                    alt="{{ $prestasi->title }}">
            @endif

            <div class="absolute inset-0 bg-gradient-to-t from-background via-background/40 to-transparent z-10 pointer-events-none"></div>
            
            <div class="absolute bottom-0 left-0 w-full pb-16 px-8 md:px-20 z-20 pointer-events-none">
                <div class="max-w-4xl mx-auto space-y-6">
                    <span class="px-4 py-2 bg-primary text-on-primary text-xs font-black uppercase tracking-widest">
                        PRESTASI
                    </span>
                    <h1 class="text-4xl md:text-7xl font-black tracking-tighter text-on-surface leading-tight">
                        {{ $prestasi->title }}
                    </h1>
                    <div class="flex items-center gap-6 pt-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-primary-container flex items-center justify-center text-on-primary-container font-bold text-sm">
                                DS
                            </div>
                            <div class="text-left">
                                <p class="text-sm font-bold text-on-surface">Dharmandala Sandhyakala</p>
                                <p class="text-xs text-on-surface-variant font-medium">{{ $prestasi->date ? \Carbon\Carbon::parse($prestasi->date)->format('M d, Y') : '' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Content Section -->
        <main class="max-w-4xl mx-auto px-8 py-20">
            <div class="prose max-w-none">
                {!! $prestasi->content !!}
            </div>

            <!-- Footer Meta -->
            <footer class="mt-24 pt-12 border-t border-outline/10">
                <div class="flex flex-col md:flex-row justify-between items-center gap-8">
                    <div class="flex items-center gap-4">
                        <img src="{{ asset('images/logo/general/ospk384.webp') }}" class="h-10 opacity-50" alt="Footer Logo">
                        <p class="text-xs text-on-surface-variant font-medium">Shared via OSIS M.H. Thamrin</p>
                    </div>
                    <div class="flex gap-4">
                        <button class="px-6 py-2 border border-outline/20 text-on-surface-variant text-xs font-bold hover:bg-surface-variant transition-colors" onclick="navigator.clipboard.writeText(window.location.href); alert('Link copied!')">
                            Copy Link
                        </button>
                    </div>
                </div>
            </footer>
        </main>
    </article>
</x-layout>
