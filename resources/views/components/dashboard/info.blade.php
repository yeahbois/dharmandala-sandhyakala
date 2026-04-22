<section id="admin-info" class="py-20 px-6 md:px-8 border-t border-outline/5 bg-surface">
    <div class="max-w-7xl mx-auto">
        <div class="mb-12">
            <span class="text-[10px] font-black tracking-[0.4em] text-primary uppercase">Personal Information</span>
            <h2 class="text-4xl font-black tracking-tighter mt-2 uppercase">Account Board</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <div class="space-y-6">
                <div>
                    <label class="text-[10px] font-black uppercase tracking-widest opacity-40">Full Name</label>
                    <p class="text-xl font-bold">{{ $user->name }}</p>
                </div>
                <div>
                    <label class="text-[10px] font-black uppercase tracking-widest opacity-40">Jabatan / Role</label>
                    <p class="text-xl font-bold">{{ $user->role }}</p>
                </div>
                <div>
                    <label class="text-[10px] font-black uppercase tracking-widest opacity-40">Group / Divisi</label>
                    <p class="text-xl font-bold">{{ $user->group }}</p>
                </div>
                <div>
                    <label class="text-[10px] font-black uppercase tracking-widest opacity-40">Username</label>
                    <p class="text-xl font-bold">{{ $user->username }}</p>
                </div>
            </div>

            <div class="md:col-span-2">
                <form action="{{ route('dashboard.admin.update') }}" method="POST" class="space-y-8">
                    @csrf
                    <div class="grid grid-cols-1 gap-8">
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-[0.2em] text-primary">Instagram Username</label>
                            <input type="text" name="instagram" value="{{ $user->instagram }}" placeholder="e.g. janesmith"
                                class="w-full bg-surface-variant border-none ring-1 ring-outline/20 focus:ring-2 focus:ring-primary px-6 py-4 text-on-surface font-bold transition-all">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-[0.2em] text-primary">Personal Quote</label>
                            <textarea name="quotes" rows="4" placeholder="Your inspirational message..."
                                class="w-full bg-surface-variant border-none ring-1 ring-outline/20 focus:ring-2 focus:ring-primary px-6 py-4 text-on-surface font-bold transition-all">{{ $user->quotes }}</textarea>
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-[0.2em] text-primary">New Password (leave blank to keep current)</label>
                            <input type="password" name="password" placeholder="••••••••"
                                class="w-full bg-surface-variant border-none ring-1 ring-outline/20 focus:ring-2 focus:ring-primary px-6 py-4 text-on-surface font-bold transition-all">
                        </div>
                    </div>
                    <button type="submit" class="px-10 py-4 bg-primary text-on-primary text-[10px] font-black uppercase tracking-widest hover:opacity-90 transition-all shadow-xl shadow-primary/20">
                        Update Profile
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
