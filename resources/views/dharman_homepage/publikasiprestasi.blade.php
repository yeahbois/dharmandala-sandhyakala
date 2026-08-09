<x-layout title="Publikasi Prestasi | Dharmandala Sandhyakala" keywords="prestasi, sman mh thamrin">
    <x-slot:metadesc>
        <meta name="description" content="Legasi Pemenang: Prestasi kami.">
    </x-slot:metadesc>

    <style>
        .dp-section {
            align-self: stretch;
            width: 100%;
            min-height: 100svh;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            position: relative;
            overflow: hidden;
        }
        .dp-inner {
            width: 100%;
            max-width: 1536px;
            margin: 0 auto;
            padding: clamp(2rem, 8vh, 5rem) clamp(1rem, 6vw, 4.5rem);
            display: flex;
            flex-direction: column;
        }
        .dp-label {
            font-size: clamp(8px, 1.25vw, 12px);
            font-weight: 900;
            letter-spacing: 0.45em;
            text-transform: uppercase;
            display: block;
            margin-bottom: 0.5rem;
        }
        .dp-h2 {
            font-size: clamp(1.6rem, 6vw, 5rem);
            font-weight: 950;
            line-height: 1;
            letter-spacing: -0.04em;
            text-transform: uppercase;
            word-break: break-word;
            overflow-wrap: break-word;
        }
    </style>

    <div id="prestasi-page" class="w-full relative transition-colors duration-500 bg-background text-on-surface">
        <section class="dp-section" style="background:var(--theme-background); color:var(--theme-on-surface); min-height: auto;">
            <div class="dp-inner items-center text-center">
                <span class="dp-label" style="color:var(--theme-primary-600);">Legasi Pemenang</span>
                <h2 class="dp-h2 mb-16">Publikasi Prestasi</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full text-left">
                    @foreach($prestasis as $prestasi)
                    <a href="/publikasiprestasi/{{ $prestasi->id }}" class="group block w-full border border-outline/10 hover:border-primary/30 transition-all duration-300" style="background:var(--theme-surface);">
                        <div style="aspect-ratio:16/9; overflow:hidden;" class="w-full">
                            <img src="{{ $prestasi->pictures_urls[0] ?? 'https://lh3.googleusercontent.com/aida-public/AB6AXuDLWG-f1T_yXJ1d3WzYjnOzL7BMCsQQ7Jp3mzu23IsiqJtZMLyQd2e0MoE88W1-Cx-FA3MOa70C467Oce4qdkdnO1iyQZ5g_5OTHJuE4kDPe2pGiNOzXzGPi2N4KtZPibEp4Iz9FtIU-WMo-MbZGxmoa0MC2OL57lAzTRlC5zQWFEPHxFCk0rc34N5ftqJJqhZd0DabphN9IM2aJZY8ukI6cYgWO-qUB1p3Ad0dkSqf-SBqOz1NOiQ6siCFZ2qHfeTob1BfAlBAAd0' }}" class="w-full h-full object-cover sepia-[0.3] group-hover:sepia-0 group-hover:scale-105 transition-all duration-700">
                        </div>
                        <div style="padding:1.5rem;">
                            <h4 style="font-size:10px; font-weight:900; color:var(--theme-primary-600); margin-bottom:8px; font-style:italic; text-transform:uppercase;">{{ $prestasi->date ? \Carbon\Carbon::parse($prestasi->date)->format('M Y') : '' }}</h4>
                            <h3 style="font-size:clamp(1.2rem, 2.5vw, 1.8rem); font-weight:950; margin-bottom:12px; letter-spacing:-0.03em; color:var(--theme-on-surface);" class="group-hover:text-primary transition-colors line-clamp-2">{{ $prestasi->title }}</h3>
                            <p style="font-size:clamp(0.85rem, 1.6vw, 1.15rem); line-height:1.6; font-weight:300; opacity:0.7; color:var(--theme-on-surface-variant);" class="line-clamp-3">{{ Str::limit(strip_tags($prestasi->content), 120) }}</p>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</x-layout>