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
                        @php
                            $imageUrl = (isset($prestasi->pictures_urls) && is_array($prestasi->pictures_urls) && count($prestasi->pictures_urls) > 0) 
                                ? $prestasi->pictures_urls[0] 
                                : asset('images/logo/osis/akad.webp');
                        @endphp
                        <img src="{{ $imageUrl }}" class="w-full h-full object-cover">
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
                        <label class="text-[10px] font-black uppercase tracking-widest opacity-40">Image URL (Optional)</label>
                        <p class="text-[8px] font-bold text-primary uppercase tracking-wider mb-1">Harus CDN (e.g. Google Drive / Unsplash)</p>
                        <input type="url" name="pictures_urls[]" placeholder="https://..." class="w-full bg-surface border-none ring-1 ring-outline/20 focus:ring-2 focus:ring-primary px-6 py-3 text-on-surface font-bold transition-all">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest opacity-40">Description (Rich Text)</label>
                        <input type="hidden" name="content" id="prestasi-content">
                        <div id="prestasi-editor" class="bg-surface"></div>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var quillPrestasi = new Quill('#prestasi-editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{ 'header': [1, 2, false] }],
                    ['bold', 'italic', 'underline'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    ['link', 'clean']
                ]
            },
            placeholder: 'Detail achievement...'
        });

        const form = document.querySelector('form[action="{{ route('dashboard.prestasi.store') }}"]');
        form.addEventListener('submit', function() {
            document.querySelector('#prestasi-content').value = quillPrestasi.root.innerHTML;
        });
    });
</script>
