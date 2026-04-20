<section id="prestasi-board" class="py-20 px-6 md:px-8 border-t border-outline/5 bg-surface">
    <div class="max-w-7xl mx-auto">
        <div class="mb-12">
            <span class="text-[10px] font-black tracking-[0.4em] text-primary uppercase">Achievements</span>
            <h2 class="text-4xl font-black tracking-tighter mt-2 uppercase">Prestasi Board</h2>
        </div>

        <div class="space-y-12">
            <div class="flex justify-between items-end">
                <h4 class="text-sm font-black uppercase tracking-widest">Prestasi Repository</h4>
                <div class="flex gap-2">
                    <button class="slider-nav-btn" onclick="scrollSlider('prestasi-list', -1)"><span class="material-symbols-outlined">chevron_left</span></button>
                    <button class="slider-nav-btn" onclick="scrollSlider('prestasi-list', 1)"><span class="material-symbols-outlined">chevron_right</span></button>
                </div>
            </div>

            <div id="prestasi-list" class="flex overflow-x-auto gap-6 hide-scrollbar pb-6">
                @forelse($prestasis as $prestasi)
                <div class="flex-shrink-0 w-80 bg-background border border-outline/10 overflow-hidden">
                    <div class="aspect-video bg-surface-variant overflow-hidden">
                        @if(isset($prestasi->pictures_urls[0]))
                            <img src="{{ asset($prestasi->pictures_urls[0]) }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center opacity-20">
                                <span class="material-symbols-outlined text-5xl">trophy</span>
                            </div>
                        @endif
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <h5 class="font-black uppercase tracking-tight text-lg line-clamp-1">{{ $prestasi->title }}</h5>
                            @if($prestasi->important)
                                <span class="material-symbols-outlined text-primary text-sm">star</span>
                            @endif
                        </div>
                        <div class="flex justify-between items-center mt-4">
                            <a href="/publikasiprestasi/{{ $prestasi->id }}" class="text-[9px] font-black uppercase tracking-widest text-primary">View</a>
                            <form action="{{ route('dashboard.prestasi.delete', $prestasi) }}" method="POST" onsubmit="return confirm('Delete this achievement?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-[9px] font-black uppercase tracking-widest text-red-500">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                @empty
                <div class="w-full py-20 text-center border border-dashed border-outline/20">
                    <p class="text-[10px] font-black uppercase tracking-widest opacity-30">No achievements recorded yet.</p>
                </div>
                @endforelse
            </div>

            <div class="bg-surface-variant/30 p-8 border border-outline/5">
                <h4 class="text-sm font-black uppercase tracking-widest mb-8">Record New Prestasi</h4>
                <form action="{{ route('dashboard.prestasi.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-widest opacity-40">Achievement Title</label>
                            <input type="text" name="title" required class="w-full bg-surface border-none ring-1 ring-outline/20 focus:ring-2 focus:ring-primary px-6 py-3 text-on-surface font-bold transition-all">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-widest opacity-40">Date</label>
                            <input type="date" name="date" class="w-full bg-surface border-none ring-1 ring-outline/20 focus:ring-2 focus:ring-primary px-6 py-3 text-on-surface font-bold transition-all">
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest opacity-40">Description (HTML allowed)</label>
                        <textarea name="content" rows="4" class="w-full bg-surface border-none ring-1 ring-outline/20 focus:ring-2 focus:ring-primary px-6 py-3 text-on-surface font-bold transition-all"></textarea>
                    </div>
                    <div class="flex items-center gap-3">
                        <input type="checkbox" name="important" value="1" id="p-imp" class="w-4 h-4 rounded-none text-primary border-outline">
                        <label for="p-imp" class="text-[10px] font-bold uppercase tracking-widest">Mark as Major Achievement</label>
                    </div>
                    <button type="submit" class="px-8 py-3 bg-primary text-on-primary text-[10px] font-black uppercase tracking-widest hover:opacity-90 transition-all">
                        Publish Prestasi
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
