@props([
    'name',
    'group' => null,
    'slug' => null,
    'logo' => null,
    'type' => 'osis',
])

<div class="mb-24 last:mb-0">
    <div class="flex items-center justify-between mb-8 border-b border-on-surface-variant/10 pb-4">
        <h4 class="text-xs md:text-sm font-bold flex items-center gap-4 text-on-surface-variant uppercase tracking-widest">
            <span class="w-8 h-[1px] bg-primary"></span>
            {{ $name }} @if($group) <span class="opacity-30 inline-block ml-2">{{ $group }}</span> @endif
        </h4>

        <div class="flex items-center gap-4">
            @if($slug)
                <a href="/kabinet/{{ $type }}/ds/{{ $type == 'osis' ? 'seksi' : 'bidang' }}/{{ $slug }}" 
                   class="bg-primary text-on-primary px-3 py-1 rounded-sm text-[9px] font-black tracking-widest uppercase hover:brightness-110 active:scale-95 transition-all">
                    View Details
                </a>
            @endif

            @if($logo)
                <img src="{{ asset($logo) }}" 
                     class="w-6 h-6 md:w-8 md:h-8 object-contain opacity-50 contrast-125" 
                     alt="{{ $name }} Logo">
            @endif
        </div>
    </div>

    <div class="grid grid-cols-2 lg:grid-cols-5 gap-6">
        {{ $slot }}
    </div>
</div>
