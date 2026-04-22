@props([
    'link',
    'name',
    'role' => null, // Kept for logic, but hidden to match the provided layout
    'ig',
    'quote' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
    'logoLink' => null,
])

<div class="group relative bg-surface ivory-card-shadow overflow-hidden transition-all hover:-translate-y-1 border border-outline/10 h-full flex flex-col">
    {{-- Square Photo --}}
    <div class="member-photo-aspect overflow-hidden bg-surface-variant">
        <img class="w-full h-full object-cover transition-all duration-700" 
             src="{{ asset('images/potrait/'.$link.'.webp') }}" 
             alt="{{ $name }}" />
    </div>

    {{-- Info --}}
    <div class="p-4 text-left">
        <h4 class="text-sm md:text-base font-black tracking-tight mb-0.5 truncate text-on-surface">
            {{ $name }}
        </h4>
        
        <div class="flex items-center text-primary text-[10px] font-bold mb-2">
            <span class="material-symbols-outlined text-[10px] mr-1">alternate_email</span>
            <span class="truncate">{{ $ig }}</span>
        </div>

        <p class="text-on-surface-variant text-[10px] italic leading-relaxed line-clamp-2">
            "{{ $quote }}"
        </p>
    </div>
</div>
