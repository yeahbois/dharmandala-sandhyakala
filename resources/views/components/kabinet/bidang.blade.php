@props([
    'name',
    'group',
    'slug' => null,
    'logo' => null,
    'type' => 'osis',
])

<section class="max-w-7xl mx-auto px-8 mb-32">
    {{-- Header Section --}}
    <div class="flex items-end justify-between mb-12 border-b border-primary/10 pb-4">
        <div class="text-left">
            @if($group)
                <h2 class="text-[10px] font-bold tracking-[0.3em] uppercase text-primary mb-2">
                    {{ $group }}
                </h2>
            @endif
            <h3 class="text-3xl md:text-4xl font-black tracking-tight text-on-surface uppercase">
                {{ $name }}
            </h3>
        </div>

        <div class="flex items-center gap-6">
            @if($slug)
                <a href="/kabinet/{{ $type }}/ds/{{ $type == 'osis' ? 'seksi' : 'bidang' }}/{{ $slug }}" 
                   class="hidden md:block bg-primary text-on-primary px-4 py-1.5 rounded-sm text-[9px] font-black tracking-widest uppercase hover:brightness-110 active:scale-95 transition-all">
                    View Details
                </a>
            @endif

            @if($logo)
                <div class="transition-transform hover:scale-110 duration-500">
                    <img src="{{ asset($logo) }}" 
                         class="w-10 h-10 md:w-12 md:h-12 object-contain" 
                         alt="{{ $name }} Logo">
                </div>
            @endif
        </div>
    </div>

    {{-- Grid: 2 Cols Mobile, 5 Cols Desktop --}}
    <div class="grid grid-cols-2 lg:grid-cols-5 gap-6">
        {{ $slot }}
    </div>

    @if($slug)
        <div class="mt-6 md:hidden">
            <a href="/kabinet/{{ $type }}/ds/{{ $type == 'osis' ? 'seksi' : 'bidang' }}/{{ $slug }}" 
               class="inline-block bg-primary text-on-primary px-4 py-1.5 rounded-sm text-[9px] font-black tracking-widest uppercase w-full text-center">
                View Details
            </a>
        </div>
    @endif
</section>