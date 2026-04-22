<section id="divisi-board" class="py-20 px-6 md:px-8 border-t border-outline/5 bg-background">
    <div class="max-w-7xl mx-auto">
        <div class="mb-12">
            <span class="text-[10px] font-black tracking-[0.4em] text-primary uppercase">Management</span>
            <h2 class="text-4xl font-black tracking-tighter mt-2 uppercase">Divisi Board</h2>
        </div>

        @foreach($divisis as $divisi)
        <div class="mb-20 last:mb-0 space-y-12">
            <div class="flex items-center gap-6">
                <div class="w-16 h-16 bg-primary/10 flex items-center justify-center">
                    <span class="material-symbols-outlined text-3xl text-primary">groups</span>
                </div>
                <div>
                    <h3 class="text-3xl font-black tracking-tight uppercase">{{ $divisi->name }}</h3>
                    <p class="text-[10px] font-bold opacity-40 uppercase tracking-widest">{{ $divisi->type }} • {{ $divisi->slug }}</p>
                </div>
            </div>

            <!-- Edit Divisi Info -->
            <form action="{{ route('dashboard.divisi.update', $divisi) }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @csrf
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-[0.2em] text-primary">About Divisi (Short)</label>
                    <textarea name="about" rows="3" class="w-full bg-surface-variant border-none ring-1 ring-outline/20 focus:ring-2 focus:ring-primary px-6 py-4 text-on-surface font-bold transition-all">{{ $divisi->about }}</textarea>
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-[0.2em] text-primary">Details (Long/HTML)</label>
                    <textarea name="details" rows="3" class="w-full bg-surface-variant border-none ring-1 ring-outline/20 focus:ring-2 focus:ring-primary px-6 py-4 text-on-surface font-bold transition-all">{{ $divisi->details }}</textarea>
                </div>
                <div class="md:col-span-2">
                    <button type="submit" class="px-8 py-3 bg-on-surface text-surface text-[10px] font-black uppercase tracking-widest hover:opacity-90 transition-all">
                        Save Divisi Info
                    </button>
                </div>
            </form>

            <!-- Proker List -->
            <div class="space-y-6">
                <div class="flex justify-between items-end">
                    <h4 class="text-sm font-black uppercase tracking-widest">Program Kerja List</h4>
                    <div class="flex gap-2">
                        <button class="slider-nav-btn" onclick="scrollSlider('proker-{{ $divisi->id }}', -1)"><span class="material-symbols-outlined">chevron_left</span></button>
                        <button class="slider-nav-btn" onclick="scrollSlider('proker-{{ $divisi->id }}', 1)"><span class="material-symbols-outlined">chevron_right</span></button>
                    </div>
                </div>
                <div id="proker-{{ $divisi->id }}" class="flex overflow-x-auto gap-6 hide-scrollbar pb-6">
                    @forelse($divisi->programKerjas as $proker)
                    <div class="flex-shrink-0 w-80 bg-surface border border-outline/10 p-6 flex flex-col justify-between">
                        <div>
                            <h5 class="font-black uppercase tracking-tight text-lg mb-2">{{ $proker->title }}</h5>
                            <p class="text-[11px] opacity-60 line-clamp-3 mb-4">{{ strip_tags($proker->content) }}</p>
                        </div>
                        <div class="flex justify-between items-center mt-4">
                            <a href="/programkerja/{{ $proker->id }}" class="text-[9px] font-black uppercase tracking-widest text-primary">View</a>
                            <form action="{{ route('dashboard.programkerja.delete', $proker) }}" method="POST" onsubmit="return confirm('Delete this proker?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-[9px] font-black uppercase tracking-widest text-red-500">Delete</button>
                            </form>
                        </div>
                    </div>
                    @empty
                    <div class="w-full py-12 text-center border border-dashed border-outline/20">
                        <p class="text-[10px] font-black uppercase tracking-widest opacity-30">No program kerja found for this divisi.</p>
                    </div>
                    @endforelse
                </div>
            </div>

            <!-- Add Proker Form -->
            <div class="bg-surface-variant/30 p-8 border border-outline/5">
                <h4 class="text-sm font-black uppercase tracking-widest mb-8">Add New Program Kerja</h4>
                <form action="{{ route('dashboard.programkerja.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <input type="hidden" name="divisi_id" value="{{ $divisi->id }}">
                    <input type="hidden" name="type" value="{{ $divisi->type }}">
                    <input type="hidden" name="name" value="{{ $divisi->slug }}">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-widest opacity-40">Proker Title</label>
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
                        <label class="text-[10px] font-black uppercase tracking-widest opacity-40">Description Content (Rich Text)</label>
                        <input type="hidden" name="content" class="proker-content-input">
                        <div class="proker-editor-container bg-surface"></div>
                    </div>
                    <div class="flex flex-wrap gap-8">
                        <div class="flex items-center gap-3">
                            <input type="checkbox" name="featured" value="1" id="feat-{{ $divisi->id }}" class="w-4 h-4 rounded-none accent-primary bg-surface-variant border-outline">
                            <label for="feat-{{ $divisi->id }}" class="text-[10px] font-bold uppercase tracking-widest">Featured in Divisi</label>
                        </div>
                        <div class="flex items-center gap-3">
                            <input type="checkbox" name="homepage" value="1" id="home-{{ $divisi->id }}" class="w-4 h-4 rounded-none accent-primary bg-surface-variant border-outline">
                            <label for="home-{{ $divisi->id }}" class="text-[10px] font-bold uppercase tracking-widest">Show on Homepage</label>
                        </div>
                    </div>
                    <button type="submit" class="px-8 py-3 bg-primary text-on-primary text-[10px] font-black uppercase tracking-widest hover:opacity-90 transition-all">
                        Add Program Kerja
                    </button>
                </form>
            </div>
        </div>
        <hr class="my-16 border-outline/10">
        @endforeach
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const prokerContainers = document.querySelectorAll('.proker-editor-container');
        prokerContainers.forEach((container, index) => {
            var quill = new Quill(container, {
                theme: 'snow',
                modules: {
                    toolbar: [
                        [{ 'header': [1, 2, false] }],
                        ['bold', 'italic', 'underline'],
                        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                        ['link', 'clean']
                    ]
                },
                placeholder: 'Detail program kerja...'
            });

            // Find the parent form
            const form = container.closest('form');
            const hiddenInput = form.querySelector('.proker-content-input');
            
            form.addEventListener('submit', function() {
                hiddenInput.value = quill.root.innerHTML;
            });
        });
    });
</script>
