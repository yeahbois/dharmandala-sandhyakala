@props(['event'])

<section class="mb-12">
    <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
        <div>
            <span class="text-xs font-black uppercase tracking-[0.3em] text-secondary-600 block mb-1">Akademis Control</span>
            <h2 class="text-4xl font-black uppercase tracking-tighter text-on-surface">THANOS BOARD</h2>
        </div>
        <div class="flex gap-3">
            @if(!$event)
                <a href="{{ route('thanos.create') }}" class="btn-base btn-pri flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm">add</span> Create Event
                </a>
            @else
                <a href="{{ route('thanos.create') }}" class="btn-base btn-sec flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm">edit</span> Edit Event
                </a>
                <button onclick="toggleThanosDeleteModal()" class="btn-base bg-error text-on-error flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm">delete</span> Delete Event
                </button>
            @endif
        </div>
    </div>

    @if($event)
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-10">
            <div class="bg-surface-variant/30 border border-outline/20 p-6">
                <span class="text-[10px] font-black uppercase tracking-widest opacity-60 block mb-2">Active Event</span>
                <h3 class="text-xl font-black uppercase tracking-tight mb-4">{{ $event->title }}</h3>
                <div class="space-y-2 text-xs">
                    <p class="flex justify-between"><span class="opacity-60">Event ID:</span> <span class="font-mono">{{ $event->event_id }}</span></p>
                    <p class="flex justify-between"><span class="opacity-60">Deadline:</span> <span>{{ $event->deadline->format('M d, Y H:i') }}</span></p>
                    <p class="flex justify-between"><span class="opacity-60">Total Responders:</span> <span>{{ $event->responders->count() }}</span></p>
                </div>
            </div>

            <div class="lg:col-span-2 bg-surface-variant/30 border border-outline/20 p-6 overflow-hidden flex flex-col">
                <span class="text-[10px] font-black uppercase tracking-widest opacity-60 block mb-4">Responders Feed</span>
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs">
                        <thead>
                            <tr class="border-b border-outline/10">
                                <th class="pb-3 font-black uppercase tracking-widest opacity-60">Name</th>
                                <th class="pb-3 font-black uppercase tracking-widest opacity-60 text-center">Answer</th>
                                <th class="pb-3 font-black uppercase tracking-widest opacity-60 text-center">Correct?</th>
                                <th class="pb-3 font-black uppercase tracking-widest opacity-60 text-right">Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $responders = $event->responders->map(function($r) use ($event) {
                                    $r->is_correct = strtolower($r->answer) === strtolower($event->right_answer);
                                    return $r;
                                })->sort(function($a, $b) {
                                    if ($a->is_correct && !$b->is_correct) return -1;
                                    if (!$a->is_correct && $b->is_correct) return 1;
                                    return $a->created_at <=> $b->created_at;
                                })->take(10);
                            @endphp
                            @foreach($responders as $responder)
                            <tr class="border-b border-outline/5 last:border-0">
                                <td class="py-3 font-bold uppercase">{{ $responder->name }}</td>
                                <td class="py-3 text-center uppercase">{{ $responder->answer }}</td>
                                <td class="py-3 text-center">
                                    @if($responder->is_correct)
                                        <span class="text-success material-symbols-outlined text-sm">check_circle</span>
                                    @else
                                        <span class="text-error material-symbols-outlined text-sm">cancel</span>
                                    @endif
                                </td>
                                <td class="py-3 text-right opacity-60">{{ $responder->created_at->format('H:i:s') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if($event->responders->count() > 10)
                    <p class="mt-4 text-[9px] opacity-40 uppercase tracking-widest text-center">Showing top 10 fastest & correct responders</p>
                @endif
            </div>
        </div>

        {{-- Delete Modal --}}
        <div id="thanos-delete-modal" class="fixed inset-0 z-[100] hidden items-center justify-center p-4 bg-black/80 backdrop-blur-sm">
            <div class="bg-surface border border-outline/20 p-8 max-w-md w-full">
                <h3 class="text-2xl font-black uppercase tracking-tighter mb-4">Delete Event?</h3>
                <p class="text-xs opacity-60 mb-6 leading-relaxed">
                    This action is permanent. All responders data will be wiped. Please type the Event ID <span class="font-mono font-black text-on-surface">{{ $event->event_id }}</span> to confirm.
                </p>
                <form action="{{ route('thanos.delete') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="text" name="confirm_event_id" placeholder="Enter Event ID" required
                        class="w-full bg-surface-variant/50 border border-outline/40 p-4 text-on-surface mb-6 focus:ring-2 focus:ring-primary outline-none transition-all font-mono">

                    <div class="flex gap-3">
                        <button type="button" onclick="toggleThanosDeleteModal()" class="flex-1 btn-sec py-4">Cancel</button>
                        <button type="submit" class="flex-1 bg-error text-on-error font-black uppercase tracking-widest py-4">Confirm Delete</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</section>

<script>
    function toggleThanosDeleteModal() {
        const modal = document.getElementById('thanos-delete-modal');
        modal.classList.toggle('hidden');
        modal.classList.toggle('flex');
    }
</script>
