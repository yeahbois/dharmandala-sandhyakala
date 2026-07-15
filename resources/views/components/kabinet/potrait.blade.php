@props([
    'link',
    'name',
    'role' => null,
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
    <div class="p-4 text-left flex flex-col flex-1">
        @if($role)
            <div class="text-[9px] sm:text-[10px] font-bold tracking-widest text-primary uppercase mb-1">
                {{ $role }}
            </div>
        @endif

        <h4 class="text-[11px] sm:text-xs md:text-sm font-black tracking-tight mb-0.5 text-on-surface leading-tight">
            {{ $name }}
        </h4>
        
        <a href="https://instagram.com/{{ ltrim($ig, '@') }}" target="_blank" class="flex items-center text-primary text-[10px] font-bold mb-2 hover:opacity-70 transition-opacity">
            <span class="material-symbols-outlined text-[10px] mr-1">alternate_email</span>
            <span class="truncate">{{ $ig }}</span>
        </a>

        <div class="quote-container flex flex-col flex-1">
            <p class="quote-text text-on-surface-variant text-[10px] italic leading-relaxed {{ strlen($quote) > 100 ? 'line-clamp-2' : '' }}">
                "{{ $quote }}"
            </p>
            @if(strlen($quote) > 100)
                <button onclick="toggleQuote(this)" class="read-more-btn self-start text-[8px] font-black uppercase tracking-widest text-primary mt-2 flex items-center gap-1">
                    Read More <span class="material-symbols-outlined text-[10px]">expand_more</span>
                </button>
            @endif
        </div>
    </div>
</div>

<script>
    if (typeof toggleQuote !== 'function') {
        window.toggleQuote = function(btn) {
            const container = btn.closest('.quote-container');
            const text = container.querySelector('.quote-text');
            const isExpanded = text.classList.contains('line-clamp-2');

            if (isExpanded) {
                text.classList.remove('line-clamp-2');
                btn.innerHTML = 'Read Less <span class="material-symbols-outlined text-[10px]">expand_less</span>';
            } else {
                text.classList.add('line-clamp-2');
                btn.innerHTML = 'Read More <span class="material-symbols-outlined text-[10px]">expand_more</span>';
            }
        }
    }
</script>
