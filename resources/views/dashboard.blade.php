<x-layout title="Dashboard Portal">
    <x-slot:metadesc>
        <meta name="description" content="OSIS MPK Management Dashboard" />
    </x-slot:metadesc>

    <style>
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }

        .slider-nav-btn {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--theme-surface-variant);
            color: var(--theme-on-surface);
            border: 1px solid color-mix(in srgb, var(--theme-outline) 10%, transparent);
            transition: all 0.3s ease;
        }
        .slider-nav-btn:hover {
            background: var(--theme-primary-600);
            color: var(--theme-on-primary);
        }
    </style>

    <main class="min-h-screen bg-surface w-full">
        <!-- Hero Section -->
        <x-dashboard.hero :divisis="$divisis" :showMedia="$showMedia" :showMacapi="$showMacapi" :showPrestasi="$showPrestasi" :showThamNet="$showThamNet" />

        <!-- Info Board -->
        <x-dashboard.info :user="$user" />

        <!-- Divisi Board -->
        @if($divisis->count() > 0)
            <x-dashboard.divisi :divisis="$divisis" />
        @endif

        <!-- Media Board -->
        @if($showMedia)
            <x-dashboard.media :multimedias="$multimedias" />
        @endif

        <!-- Macapi Board -->
        @if($showMacapi)
            <x-dashboard.macapi :thalation="$thalation" />
        @endif

        <!-- Prestasi Board -->
        @if($showPrestasi)
            <x-dashboard.prestasi :prestasis="$prestasis" />
        @endif

        <!-- ThamNet Board -->
        @if($showThamNet)
            <x-dashboard.thamnet :posts="$posts" />
        @endif
    </main>

    <script>
        function scrollSlider(id, dir) {
            const el = document.getElementById(id);
            const scrollAmt = el.offsetWidth * 0.8;
            el.scrollBy({ left: scrollAmt * dir, behavior: 'smooth' });
        }
    </script>
</x-layout>
