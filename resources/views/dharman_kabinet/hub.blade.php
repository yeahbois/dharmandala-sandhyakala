<x-layout title="Admin Hub">
    <main class="pt-24 min-h-screen bg-surface px-6 md:px-8 max-w-4xl mx-auto pb-20">
        <h1 class="text-4xl font-black mb-8 uppercase tracking-tighter">Admin Hub</h1>

        @if(session('success'))
            <div class="bg-green-500/10 border border-green-500/20 text-green-500 p-4 mb-8 font-bold">
                {{ session('success') }}
            </div>
        @endif

        <div class="space-y-12">
            <!-- ADMIN SECRET -->
            <section class="bg-surface-variant/10 p-8 border border-outline/10">
                <h2 class="text-xl font-bold mb-4 uppercase tracking-wider text-primary">Security</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-widest opacity-50 mb-2">Admin Secret</label>
                        <input type="password" id="global_admin_secret" class="w-full bg-surface border border-outline/20 p-3 text-sm focus:outline-none focus:border-primary transition-colors" placeholder="Enter ADMIN_SECRET">
                    </div>
                </div>
            </section>

            <!-- THALATION -->
            <form action="/kabinet/hub/thalation" method="POST" class="bg-surface-variant/10 p-8 border border-outline/10 hub-form">
                @csrf
                <input type="hidden" name="admin_secret" class="admin-secret-input">
                <h2 class="text-xl font-bold mb-4 uppercase tracking-wider text-primary">Thalation Settings</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-widest opacity-50 mb-2">Next Macapi (YYYY-MM-DD HH:MM:SS)</label>
                        <input type="text" name="next_macapi" class="w-full bg-surface border border-outline/20 p-3 text-sm focus:outline-none focus:border-primary transition-colors" placeholder="2026-07-22 20:00:00">
                    </div>
                    <button type="submit" class="bg-primary text-on-primary px-6 py-2 text-xs font-bold uppercase tracking-widest hover:brightness-110 transition-all">Update Macapi</button>
                </div>
            </form>

            <!-- PRESTASI -->
            <form action="/kabinet/hub/prestasi" method="POST" class="bg-surface-variant/10 p-8 border border-outline/10 hub-form">
                @csrf
                <input type="hidden" name="admin_secret" class="admin-secret-input">
                <h2 class="text-xl font-bold mb-4 uppercase tracking-wider text-primary">Add Prestasi</h2>
                <div class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-widest opacity-50 mb-2">Title</label>
                            <input type="text" name="title" required class="w-full bg-surface border border-outline/20 p-3 text-sm">
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-widest opacity-50 mb-2">Date</label>
                            <input type="date" name="date" class="w-full bg-surface border border-outline/20 p-3 text-sm">
                        </div>
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-widest opacity-50 mb-2">Content</label>
                        <textarea name="content" rows="4" class="w-full bg-surface border border-outline/20 p-3 text-sm"></textarea>
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-widest opacity-50 mb-2">Image URLs (one per line)</label>
                        <textarea id="prestasi_images" rows="2" class="w-full bg-surface border border-outline/20 p-3 text-sm" placeholder="https://example.com/image.jpg"></textarea>
                        <div id="prestasi_images_container"></div>
                    </div>
                    <div class="flex items-center gap-2">
                        <input type="checkbox" name="important" value="1" id="prestasi_important">
                        <label for="prestasi_important" class="text-xs font-bold uppercase tracking-wider">Important</label>
                    </div>
                    <button type="submit" class="bg-primary text-on-primary px-6 py-2 text-xs font-bold uppercase tracking-widest hover:brightness-110 transition-all">Save Prestasi</button>
                </div>
            </form>

            <!-- PROGRAM KERJA -->
            <form action="/kabinet/hub/programkerja" method="POST" class="bg-surface-variant/10 p-8 border border-outline/10 hub-form">
                @csrf
                <input type="hidden" name="admin_secret" class="admin-secret-input">
                <h2 class="text-xl font-bold mb-4 uppercase tracking-wider text-primary">Add Program Kerja</h2>
                <div class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-widest opacity-50 mb-2">Name (Internal)</label>
                            <input type="text" name="name" required class="w-full bg-surface border border-outline/20 p-3 text-sm" placeholder="pudo-documentary">
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-widest opacity-50 mb-2">Title (Display)</label>
                            <input type="text" name="title" required class="w-full bg-surface border border-outline/20 p-3 text-sm" placeholder="Pudo Documentary">
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-widest opacity-50 mb-2">Division (Slug)</label>
                            <input type="text" name="division" class="w-full bg-surface border border-outline/20 p-3 text-sm" placeholder="pudo">
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-widest opacity-50 mb-2">Type</label>
                            <select name="type" class="w-full bg-surface border border-outline/20 p-3 text-sm">
                                <option value="osis">OSIS</option>
                                <option value="mpk">MPK</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-widest opacity-50 mb-2">Content</label>
                        <textarea name="content" rows="4" class="w-full bg-surface border border-outline/20 p-3 text-sm"></textarea>
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-widest opacity-50 mb-2">Image URLs (one per line)</label>
                        <textarea id="proker_images" rows="2" class="w-full bg-surface border border-outline/20 p-3 text-sm"></textarea>
                        <div id="proker_images_container"></div>
                    </div>
                    <div class="flex gap-8">
                        <div class="flex items-center gap-2">
                            <input type="checkbox" name="featured" value="1" id="proker_featured">
                            <label for="proker_featured" class="text-xs font-bold uppercase tracking-wider">Featured (Division)</label>
                        </div>
                        <div class="flex items-center gap-2">
                            <input type="checkbox" name="homepage" value="1" id="proker_homepage">
                            <label for="proker_homepage" class="text-xs font-bold uppercase tracking-wider">Show on Homepage</label>
                        </div>
                    </div>
                    <button type="submit" class="bg-primary text-on-primary px-6 py-2 text-xs font-bold uppercase tracking-widest hover:brightness-110 transition-all">Save Program Kerja</button>
                </div>
            </form>

            <!-- MULTIMEDIA -->
            <form action="/kabinet/hub/multimedia" method="POST" class="bg-surface-variant/10 p-8 border border-outline/10 hub-form">
                @csrf
                <input type="hidden" name="admin_secret" class="admin-secret-input">
                <h2 class="text-xl font-bold mb-4 uppercase tracking-wider text-primary">Add Multimedia</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-widest opacity-50 mb-2">URL (Video/Embed)</label>
                        <input type="text" name="url" required class="w-full bg-surface border border-outline/20 p-3 text-sm">
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-widest opacity-50 mb-2">App/Platform</label>
                        <input type="text" name="app" required class="w-full bg-surface border border-outline/20 p-3 text-sm" placeholder="Youtube">
                    </div>
                    <div class="flex gap-8">
                        <div class="flex items-center gap-2">
                            <input type="checkbox" name="homepage" value="1" id="multi_homepage">
                            <label for="multi_homepage" class="text-xs font-bold uppercase tracking-wider">Homepage</label>
                        </div>
                        <div class="flex items-center gap-2">
                            <input type="checkbox" name="thamnet" value="1" id="multi_thamnet">
                            <label for="multi_thamnet" class="text-xs font-bold uppercase tracking-wider">Thamnet</label>
                        </div>
                    </div>
                    <button type="submit" class="bg-primary text-on-primary px-6 py-2 text-xs font-bold uppercase tracking-widest hover:brightness-110 transition-all">Save Multimedia</button>
                </div>
            </form>

            <!-- ADMIN -->
            <form action="/kabinet/hub/admin" method="POST" class="bg-surface-variant/10 p-8 border border-outline/10 hub-form">
                @csrf
                <input type="hidden" name="admin_secret" class="admin-secret-input">
                <h2 class="text-xl font-bold mb-4 uppercase tracking-wider text-primary">Add New Admin</h2>
                <div class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-widest opacity-50 mb-2">Username</label>
                            <input type="text" name="username" required class="w-full bg-surface border border-outline/20 p-3 text-sm">
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-widest opacity-50 mb-2">Password</label>
                            <input type="password" name="password" required class="w-full bg-surface border border-outline/20 p-3 text-sm">
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-widest opacity-50 mb-2">Full Name</label>
                            <input type="text" name="name" class="w-full bg-surface border border-outline/20 p-3 text-sm">
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-widest opacity-50 mb-2">Instagram (handle)</label>
                            <input type="text" name="instagram" class="w-full bg-surface border border-outline/20 p-3 text-sm">
                        </div>
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-widest opacity-50 mb-2">Quotes</label>
                        <textarea name="quotes" rows="2" class="w-full bg-surface border border-outline/20 p-3 text-sm"></textarea>
                    </div>
                    <button type="submit" class="bg-primary text-on-primary px-6 py-2 text-xs font-bold uppercase tracking-widest hover:brightness-110 transition-all">Add Admin</button>
                </div>
            </form>
        </div>
    </main>

    <script>
        document.querySelectorAll('.hub-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                const secret = document.getElementById('global_admin_secret').value;
                this.querySelector('.admin-secret-input').value = secret;

                // Handle images array for prestasi and proker
                const multiImageTextarea = this.querySelector('textarea[id$="_images"]');
                if (multiImageTextarea) {
                    const container = this.querySelector('div[id$="_images_container"]');
                    container.innerHTML = '';
                    const urls = multiImageTextarea.value.split('\n').filter(url => url.trim() !== '');
                    urls.forEach((url, index) => {
                        const input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = `pictures_urls[${index}]`;
                        input.value = url.trim();
                        container.appendChild(input);
                    });
                }
            });
        });
    </script>
</x-layout>
