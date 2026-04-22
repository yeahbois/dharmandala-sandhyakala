<x-layout title="ThamNet Editor" keywords="editor, writing, blog">
    <!-- Quill.js CSS -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    
    <style>
        .ql-toolbar.ql-snow {
            border: 1px solid var(--theme-outline);
            background: var(--theme-surface);
            border-radius: 0;
        }
        .ql-container.ql-snow {
            border: 1px solid var(--theme-outline);
            background: var(--theme-surface);
            border-radius: 0;
            min-height: 500px;
            font-size: 1.125rem;
            color: var(--theme-on-surface);
        }
        .ql-editor.ql-blank::before {
            color: var(--theme-on-surface-variant);
            opacity: 0.5;
        }
    </style>

    <div class="w-full bg-background min-h-screen py-12 md:py-20 px-4 sm:px-8">
        <div class="w-full max-w-5xl mx-auto space-y-8 md:space-y-12">
            <!-- Header -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-6">
                <div class="text-left">
                    <h1 class="text-3xl md:text-4xl font-black tracking-tighter text-on-surface uppercase">ThamNet Editor</h1>
                    <p class="text-sm md:text-base text-on-surface-variant font-medium mt-1">Compose your legacy for the Ivory Tower.</p>
                </div>
                <div class="flex gap-3 md:gap-4">
                    <button onclick="window.history.back()" class="flex-1 sm:flex-none px-4 md:px-6 py-3 rounded-none border border-outline/20 text-on-surface text-[10px] md:text-xs font-black uppercase tracking-widest hover:bg-surface transition-colors">
                        Cancel
                    </button>
                    <button id="submit-btn" class="flex-1 sm:flex-none px-6 md:px-10 py-3 rounded-none bg-primary text-on-primary text-[10px] md:text-xs font-black uppercase tracking-widest hover:opacity-90 transition-all shadow-xl shadow-primary/20">
                        Publish Entry
                    </button>
                </div>
            </div>

            <!-- Form -->
            <form id="blog-form" action="{{ route('thamnet.store') }}" method="POST" class="space-y-8 text-left">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Title -->
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-[0.2em] text-primary">Entry Title</label>
                        <input type="text" name="title" required placeholder="Nature's Whisper: A Journey..." 
                            class="w-full bg-surface border-none ring-1 ring-outline/20 focus:ring-2 focus:ring-primary rounded-none px-6 py-4 text-on-surface text-lg font-bold placeholder:opacity-30 transition-all">
                    </div>
                    <!-- Category -->
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-[0.2em] text-primary">Category</label>
                        <select name="category" required class="w-full bg-surface border-none ring-1 ring-outline/20 focus:ring-2 focus:ring-primary rounded-none px-6 py-4 text-on-surface font-bold transition-all">
                            <option value="Beasiswa">Beasiswa</option>
                            <option value="Lomba">Lomba</option>
                            <option value="Cerita">Cerita</option>
                            <option value="Ilmu">Ilmu</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Author -->
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-[0.2em] text-primary">Author Name</label>
                        <input type="text" name="author" required placeholder="Janitra Pradipta" 
                            class="w-full bg-surface border-none ring-1 ring-outline/20 focus:ring-2 focus:ring-primary rounded-none px-6 py-4 text-on-surface font-bold placeholder:opacity-30 transition-all">
                    </div>
                    <!-- Image URL -->
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-[0.2em] text-primary">Cover Image URL</label>
                        <input type="url" name="image_url" placeholder="https://unsplash.com/..." 
                            class="w-full bg-surface border-none ring-1 ring-outline/20 focus:ring-2 focus:ring-primary rounded-none px-6 py-4 text-on-surface font-bold placeholder:opacity-30 transition-all">
                    </div>
                </div>

                <!-- Featured Toggle -->
                <div class="flex items-center gap-4">
                    <input type="checkbox" name="is_featured" value="1" id="is_featured" class="w-5 h-5 rounded-none accent-primary bg-surface-variant border-outline focus:ring-primary">
                    <label for="is_featured" class="text-sm font-bold text-on-surface">Mark as Editorial Choice (Hero Spotlight)</label>
                </div>

                <!-- Hidden Content Input -->
                <input type="hidden" name="content" id="content-input">

                <!-- Quill Editor -->
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-[0.2em] text-primary">Article Content</label>
                    <div id="editor-container"></div>
                </div>
            </form>
        </div>
    </div>

    <!-- Quill.js Script -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script>
        var quill = new Quill('#editor-container', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{ 'header': [1, 2, 3, false] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    ['blockquote', 'code-block'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    ['link', 'clean']
                ]
            },
            placeholder: 'Share your perspective with the M.H. Thamrin community...'
        });

        // Handle Form Submission
        const form = document.querySelector('#blog-form');
        const submitBtn = document.querySelector('#submit-btn');
        const contentInput = document.querySelector('#content-input');

        submitBtn.addEventListener('click', function() {
            // Get content from Quill
            contentInput.value = quill.root.innerHTML;
            
            // Basic validation
            if (quill.getText().trim().length === 0) {
                alert('Article content cannot be empty.');
                return;
            }
            
            form.submit();
        });
    </script>
</x-layout>
