@props(['post'])

@php
    $categories = [
        'Program Kerja' => 'text-secondary',
        'Prestasi' => 'text-primary',
        'Cerita' => 'text-primary-container',
        'Ilmu' => 'text-secondary'
    ];
    $categoryColor = $categories[$post->category] ?? 'text-primary';
@endphp

<article class="flex-none w-[300px] md:w-[400px] h-[520px] snap-center group text-left flex flex-col bg-surface-variant/5 rounded-2xl p-5 border border-outline/5 hover:border-primary/20 transition-all duration-500">
    <a href="{{ route('thamnet.show', $post->slug) }}" class="flex flex-col h-full">
        <div class="aspect-[16/10] flex-none rounded-xl bg-surface-variant/30 overflow-hidden mb-6 relative">
            <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" 
                src="{{ $post->image_url ?? 'https://images.unsplash.com/photo-1517842645767-c639042777db?auto=format&fit=crop&w=800&q=80' }}" 
                alt="{{ $post->title }}">
            <div class="absolute inset-0 bg-black/5 group-hover:bg-transparent transition-colors"></div>
        </div>
        
        <div class="flex flex-col flex-1 space-y-3">
            <p class="text-[10px] font-black uppercase tracking-[0.2em] {{ $categoryColor }}">
                {{ $post->category }}
            </p>
            
            <h3 class="text-xl font-bold leading-tight text-on-surface group-hover:text-primary transition-colors line-clamp-2 h-14">
                {{ $post->title }}
            </h3>
            
            <p class="text-sm text-on-surface-variant line-clamp-3 flex-1 leading-relaxed">
                {{ Str::limit(strip_tags($post->content), 120) }}
            </p>
            
            <div class="flex items-center gap-3 pt-4 border-t border-outline/5">
                <div class="w-8 h-8 rounded-full bg-primary-container flex items-center justify-center text-on-primary-container font-black text-xs">
                    {{ strtoupper(substr($post->author, 0, 1)) }}
                </div>
                <div class="flex flex-col">
                    <span class="text-xs font-bold text-on-surface">{{ $post->author }}</span>
                    <span class="text-[10px] text-on-surface-variant uppercase tracking-wider">{{ $post->created_at->diffForHumans() }}</span>
                </div>
            </div>
        </div>
    </a>
</article>
