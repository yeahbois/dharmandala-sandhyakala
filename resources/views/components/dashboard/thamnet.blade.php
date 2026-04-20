<section id="thamnet-board" class="py-20 px-6 md:px-8 border-t border-outline/5 bg-background">
    <div class="max-w-7xl mx-auto">
        <div class="mb-12">
            <span class="text-[10px] font-black tracking-[0.4em] text-primary uppercase">Editorial & Community</span>
            <h2 class="text-4xl font-black tracking-tighter mt-2 uppercase">ThamNet Board</h2>
        </div>

        <div class="space-y-12">
            <div class="flex justify-between items-end">
                <h4 class="text-sm font-black uppercase tracking-widest">Blog Archives</h4>
                <div class="flex gap-2">
                    <button class="slider-nav-btn" onclick="scrollSlider('posts-list', -1)"><span class="material-symbols-outlined">chevron_left</span></button>
                    <button class="slider-nav-btn" onclick="scrollSlider('posts-list', 1)"><span class="material-symbols-outlined">chevron_right</span></button>
                </div>
            </div>

            <div id="posts-list" class="flex overflow-x-auto gap-6 hide-scrollbar pb-6">
                @forelse($posts as $post)
                <div class="flex-shrink-0 w-80 bg-surface border border-outline/10 flex flex-col justify-between">
                    <div>
                        <div class="aspect-video bg-surface-variant overflow-hidden mb-6">
                            @if($post->image_url)
                                <img src="{{ $post->image_url }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center opacity-20">
                                    <span class="material-symbols-outlined text-5xl">article</span>
                                </div>
                            @endif
                        </div>
                        <div class="px-6">
                            <p class="text-[9px] font-black uppercase tracking-[0.2em] text-primary mb-2">{{ $post->category }}</p>
                            <h5 class="font-black uppercase tracking-tight text-lg line-clamp-2 mb-4">{{ $post->title }}</h5>
                            <p class="text-[11px] opacity-60 line-clamp-2 mb-8">{{ strip_tags($post->content) }}</p>
                        </div>
                    </div>
                    <div class="px-6 pb-6 flex justify-between items-center">
                        <a href="{{ route('thamnet.show', $post->slug) }}" class="text-[9px] font-black uppercase tracking-widest text-primary">Engage</a>
                        <form action="{{ route('dashboard.post.delete', $post) }}" method="POST" onsubmit="return confirm('Delete this blog post permanently?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-[9px] font-black uppercase tracking-widest text-red-500">Delete</button>
                        </form>
                    </div>
                </div>
                @empty
                <div class="w-full py-20 text-center border border-dashed border-outline/20">
                    <p class="text-[10px] font-black uppercase tracking-widest opacity-30">No blog entries found.</p>
                </div>
                @endforelse
            </div>

            <div class="bg-primary/5 p-12 border border-primary/10 text-center">
                <h4 class="text-xl font-black uppercase tracking-tight mb-4">Compose New Entry</h4>
                <p class="text-sm opacity-60 max-w-md mx-auto mb-8 font-light italic">"The pen is mightier than the sword, and the blog is mightier than the newsletter."</p>
                <a href="{{ route('thamnet.editor') }}" class="inline-block px-12 py-4 bg-primary text-on-primary text-[10px] font-black uppercase tracking-widest hover:opacity-90 transition-all shadow-xl shadow-primary/20">
                    Open Editor Portal
                </a>
            </div>
        </div>
    </div>
</section>
