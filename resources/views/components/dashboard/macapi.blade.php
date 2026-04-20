<section id="macapi-board" class="py-20 px-6 md:px-8 border-t border-outline/5 bg-background">
    <div class="max-w-7xl mx-auto">
        <div class="mb-12">
            <span class="text-[10px] font-black tracking-[0.4em] text-primary uppercase">Analytics & Scheduling</span>
            <h2 class="text-4xl font-black tracking-tighter mt-2 uppercase">Macapi Board</h2>
        </div>

        @if($thalation)
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <div class="bg-surface p-10 border border-outline/10 flex flex-col justify-between">
                <div>
                    <label class="text-[10px] font-black uppercase tracking-widest opacity-40">Visitor Count</label>
                    <p class="text-7xl font-black tracking-tighter my-4">{{ number_format($thalation->jumlah_pengunjung) }}</p>
                    <p class="text-[10px] font-bold opacity-30 uppercase tracking-widest">Total thalation page views</p>
                </div>
                <form action="{{ route('dashboard.thalation.update') }}" method="POST" onsubmit="return confirm('Reset all visitor data?')">
                    @csrf
                    <input type="hidden" name="reset_pengunjung" value="1">
                    <button type="submit" class="mt-8 px-6 py-2 border border-red-500/20 text-red-500 text-[10px] font-black uppercase tracking-widest hover:bg-red-500 hover:text-white transition-all">
                        Reset Visitors
                    </button>
                </form>
            </div>

            <div class="bg-surface p-10 border border-outline/10">
                <label class="text-[10px] font-black uppercase tracking-widest opacity-40 mb-8 block">Macapi Countdown</label>
                <form action="{{ route('dashboard.thalation.update') }}" method="POST" class="space-y-8">
                    @csrf
                    <div class="space-y-4">
                        <div class="p-6 bg-primary/5 border border-primary/10">
                            <p class="text-[10px] font-black uppercase tracking-[0.2em] text-primary mb-2">Current Target</p>
                            <p class="text-2xl font-black uppercase">{{ $thalation->next_macapi ? \Carbon\Carbon::parse($thalation->next_macapi)->format('M d, Y H:i') : 'Not Set' }}</p>
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-widest opacity-40">Set New Date & Time</label>
                            <input type="datetime-local" name="next_macapi" value="{{ $thalation->next_macapi ? \Carbon\Carbon::parse($thalation->next_macapi)->format('Y-m-d\TH:i') : '' }}" required
                                class="w-full bg-surface-variant border-none ring-1 ring-outline/20 focus:ring-2 focus:ring-primary px-6 py-4 text-on-surface font-bold transition-all">
                        </div>
                    </div>
                    <button type="submit" class="w-full py-4 bg-on-surface text-surface text-[10px] font-black uppercase tracking-widest hover:opacity-90 transition-all">
                        Update Countdown
                    </button>
                </form>
            </div>
        </div>
        @else
        <div class="py-20 text-center border border-dashed border-outline/20 bg-surface">
            <p class="text-[10px] font-black uppercase tracking-widest opacity-30">Macapi analytics currently unavailable.</p>
        </div>
        @endif
    </div>
</section>
