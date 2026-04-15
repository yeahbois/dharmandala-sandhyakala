<x-layout title="{{ $post->title }} - ThamNet" keywords="{{ $post->category }}, blog, thamrin">
    <x-slot:metadesc>
        <meta name="description" content="{{ Str::limit(strip_tags($post->content), 160) }}" />
        <meta property="og:title" content="{{ $post->title }}">
        <meta property="og:description" content="{{ Str::limit(strip_tags($post->content), 160) }}">
        <meta property="og:image" content="{{ $post->image_url ?? asset('images/logo/osis/akad514.webp') }}">
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
            border-radius: 0 0.5rem 0.5rem 0;
        }
        .article-gradient {
            background: linear-gradient(to bottom, var(--theme-surface), var(--theme-background));
        }
        /* Custom prose styles for common tags */
        .prose ul { list-style-type: disc; padding-left: 1.5rem; margin-bottom: 1.5rem; }
        .prose ol { list-style-type: decimal; padding-left: 1.5rem; margin-bottom: 1.5rem; }
        .prose strong { color: var(--theme-on-surface); font-weight: 700; }
    </style>

    <article class="w-full article-gradient min-h-screen text-left" id="blog-post-page">
        <!-- Hero Section -->
        <header class="relative w-full h-[60vh] md:h-[70vh] overflow-hidden">
            <img src="{{ $post->image_url ?? 'https://images.unsplash.com/photo-1517842645767-c639042777db?auto=format&fit=crop&w=1600&q=80' }}" 
                class="w-full h-full object-cover" 
                alt="{{ $post->title }}">
            <div class="absolute inset-0 bg-gradient-to-t from-background via-background/40 to-transparent"></div>
            
            <div class="absolute bottom-0 left-0 w-full pb-16 px-8 md:px-20">
                <div class="max-w-4xl mx-auto space-y-6">
                    <span class="px-4 py-2 bg-primary text-on-primary text-xs font-black uppercase tracking-widest rounded-full">
                        {{ $post->category }}
                    </span>
                    <h1 class="text-4xl md:text-7xl font-black tracking-tighter text-on-surface leading-tight">
                        {{ $post->title }}
                    </h1>
                    <div class="flex items-center gap-6 pt-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-primary-container flex items-center justify-center text-on-primary-container font-bold text-sm">
                                {{ strtoupper(substr($post->author, 0, 1)) }}
                            </div>
                            <div class="text-left">
                                <p class="text-sm font-bold text-on-surface">{{ $post->author }}</p>
                                <p class="text-xs text-on-surface-variant font-medium">{{ $post->created_at->format('M d, Y') }} • {{ ceil(str_word_count(strip_tags($post->content)) / 200) }} min read</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Content Section -->
        <main class="max-w-4xl mx-auto px-8 py-20">
            <div class="prose max-w-none">
                {!! $post->content !!}
            </div>

            <!-- Footer Meta -->
            <footer class="mt-24 pt-12 border-t border-outline/10">
                <div class="flex flex-col md:flex-row justify-between items-center gap-8">
                    <div class="flex items-center gap-4">
                        <img src="{{ asset('images/logo/general/ospk384.webp') }}" class="h-10 opacity-50" alt="Footer Logo">
                        <p class="text-xs text-on-surface-variant font-medium">Shared via ThamNet • The Digital Ivory Tower</p>
                    </div>
                    <div class="flex gap-4">
                        <button class="px-6 py-2 rounded-full border border-outline/20 text-on-surface-variant text-xs font-bold hover:bg-surface-variant transition-colors">
                            Copy Link
                        </button>
                        <button class="px-6 py-2 rounded-full bg-primary text-on-primary text-xs font-bold hover:opacity-90 transition-colors">
                            Share Post
                        </button>
                    </div>
                </div>
            </footer>
        </main>
    </article>
</x-layout>
