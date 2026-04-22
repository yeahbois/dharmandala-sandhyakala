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
        <!-- Hero Section -->
        <header class="relative w-full h-[60vh] md:h-[70vh] overflow-hidden">
            <img src="{{ $prestasi->pictures_urls[0] ?? 'https://images.unsplash.com/photo-1517842645767-c639042777db?auto=format&fit=crop&w=1600&q=80' }}" 
                class="w-full h-full object-cover" 
                alt="{{ $prestasi->title }}">
            <div class="absolute inset-0 bg-gradient-to-t from-background via-background/40 to-transparent"></div>
            
            <div class="absolute bottom-0 left-0 w-full pb-16 px-8 md:px-20">
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
