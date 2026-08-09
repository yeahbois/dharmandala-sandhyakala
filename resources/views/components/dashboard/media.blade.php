<section id="media-board" class="py-20 px-6 md:px-8 border-t border-outline/5 bg-surface">
    <div class="max-w-7xl mx-auto">
        <div class="mb-12">
            <span class="text-[10px] font-black tracking-[0.4em] text-primary uppercase">Public Relations</span>
            <h2 class="text-4xl font-black tracking-tighter mt-2 uppercase">Media Board</h2>
        </div>

        <div class="space-y-12">
            <div class="flex justify-between items-end">
                <h4 class="text-sm font-black uppercase tracking-widest">Multimedia Feed</h4>
                <div class="flex gap-2">
                    <button class="slider-nav-btn" onclick="scrollSlider('media-list', -1)"><span class="material-symbols-outlined">chevron_left</span></button>
                    <button class="slider-nav-btn" onclick="scrollSlider('media-list', 1)"><span class="material-symbols-outlined">chevron_right</span></button>
                </div>
            </div>

            <div id="media-list" class="flex overflow-x-auto gap-6 hide-scrollbar pb-6">
                @forelse($multimedias as $item)
                <div class="flex-shrink-0 w-64 bg-background border border-outline/10 group relative">
                    <div class="aspect-[9/16] overflow-hidden">
                        <iframe src="{{ $item->embed_url }}" class="w-full h-full pointer-events-none" frameborder="0"></iframe>
                    </div>
                    <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-all flex items-center justify-center p-6 text-center">
                        <div class="space-y-4">
                            <p class="text-[10px] text-white font-black uppercase tracking-widest">{{ $item->app ?? 'Video' }}</p>
                            <form action="{{ route('dashboard.multimedia.delete', $item) }}" method="POST" onsubmit="return confirm('Delete this media?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="px-4 py-2 bg-red-500 text-white text-[9px] font-black uppercase tracking-widest">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                @empty
                <div class="w-full py-20 text-center border border-dashed border-outline/20">
                    <p class="text-[10px] font-black uppercase tracking-widest opacity-30">No multimedia links found.</p>
                </div>
                @endforelse
            </div>

            <div class="bg-surface-variant/30 p-8 border border-outline/5">
                <h4 class="text-sm font-black uppercase tracking-widest mb-8">Add Multimedia Link</h4>
                <form action="{{ route('dashboard.multimedia.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-widest opacity-40">YouTube/Instagram URL</label>
                            <input type="url" name="url" required placeholder="https://www.youtube.com/watch?v=..." class="w-full bg-surface border-none ring-1 ring-outline/20 focus:ring-2 focus:ring-primary px-6 py-3 text-on-surface font-bold transition-all">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-widest opacity-40">App Name</label>
                            <input type="text" name="app" placeholder="e.g. youtube, instagram, tiktok" class="w-full bg-surface border-none ring-1 ring-outline/20 focus:ring-2 focus:ring-primary px-6 py-3 text-on-surface font-bold transition-all">
                        </div>
                    </div>
                    <div class="flex gap-8">
                        <div class="flex items-center gap-3">
                            <input type="checkbox" name="homepage" value="1" id="m-home" class="w-4 h-4 rounded-none border-outline">
                            <label for="m-home" class="text-[10px] font-bold uppercase tracking-widest">Homepage Spotlight</label>
                        </div>
                        <div class="flex items-center gap-3">
                            <input type="checkbox" name="thamnet" value="1" id="m-thamnet" class="w-4 h-4 rounded-none border-outline">
                            <label for="m-thamnet" class="text-[10px] font-bold uppercase tracking-widest">ThamNet Feed</label>
                        </div>
                    </div>
                    <button type="submit" class="px-8 py-3 bg-primary text-on-primary text-[10px] font-black uppercase tracking-widest hover:opacity-90 transition-all">
                        Save Media Link
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
