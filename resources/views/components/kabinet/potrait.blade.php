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
    <div class="p-4 text-left flex-1 flex flex-col">
        <h4 class="text-sm md:text-base font-black tracking-tight mb-0.5 truncate text-on-surface">
            {{ $name }}
        </h4>
        
        <a href="https://instagram.com/{{ ltrim($ig, '@') }}" target="_blank" class="flex items-center text-primary text-[10px] font-bold mb-2 hover:underline w-fit">
            <span class="material-symbols-outlined text-[10px] mr-1">alternate_email</span>
            <span class="truncate">{{ $ig }}</span>
        </a>

        <div class="flex-1 flex flex-col quote-container">
            <p class="text-on-surface-variant text-[10px] italic leading-relaxed transition-all duration-300 line-clamp-2 quote-text">
                "{{ $quote }}"
            </p>
            @if(strlen($quote) > 60)
            <button onclick="
                    const text = this.previousElementSibling;
                    if (text.classList.contains('line-clamp-2')) {
                        text.classList.remove('line-clamp-2');
                        this.textContent = 'View Less';
                    } else {
                        text.classList.add('line-clamp-2');
                        this.textContent = 'View All';
                    }
                "
                class="text-primary text-[8px] font-black uppercase tracking-widest mt-2 hover:opacity-70 transition-opacity self-start">
                View All
            </button>
            @endif
        </div>
    </div>
</div>
