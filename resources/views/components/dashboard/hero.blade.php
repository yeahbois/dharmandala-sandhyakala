<section class="px-6 md:px-8 py-20 max-w-7xl mx-auto flex flex-col items-center text-center">
    <div class="flex items-center justify-center gap-4 mb-8">
        <img alt="OSIS Emblem" class="h-12 w-12 md:h-16 md:w-16 object-contain" src="{{ asset('images/logo/general/osis514.webp') }}">
        <img alt="MPK Emblem" class="h-12 w-12 md:h-16 md:w-16 object-contain" src="{{ asset('images/logo/general/mpk514.webp') }}">
    </div>
    <p class="text-[10px] font-black tracking-[0.4em] text-primary uppercase mb-4">Internal Management Portal</p>
    <h1 class="text-5xl md:text-7xl font-black tracking-tighter leading-none text-on-surface uppercase mb-12">
        OSIS MPK Dashboard
    </h1>

    <div class="flex flex-wrap justify-center gap-3">
        <a href="#admin-info" class="px-4 py-2 bg-surface-variant text-on-surface text-[10px] font-black uppercase tracking-widest border border-outline/10 hover:bg-primary hover:text-on-primary transition-all">Profile</a>
        @if($divisis->count() > 0)
            <a href="#divisi-board" class="px-4 py-2 bg-surface-variant text-on-surface text-[10px] font-black uppercase tracking-widest border border-outline/10 hover:bg-primary hover:text-on-primary transition-all">Divisi</a>
        @endif
        @if($showMedia)
            <a href="#media-board" class="px-4 py-2 bg-surface-variant text-on-surface text-[10px] font-black uppercase tracking-widest border border-outline/10 hover:bg-primary hover:text-on-primary transition-all">Media</a>
        @endif
        @if($showMacapi)
            <a href="#macapi-board" class="px-4 py-2 bg-surface-variant text-on-surface text-[10px] font-black uppercase tracking-widest border border-outline/10 hover:bg-primary hover:text-on-primary transition-all">Macapi</a>
        @endif
        @if($showPrestasi)
            <a href="#prestasi-board" class="px-4 py-2 bg-surface-variant text-on-surface text-[10px] font-black uppercase tracking-widest border border-outline/10 hover:bg-primary hover:text-on-primary transition-all">Prestasi</a>
        @endif
        @if($showThamNet)
            <a href="#thamnet-board" class="px-4 py-2 bg-surface-variant text-on-surface text-[10px] font-black uppercase tracking-widest border border-outline/10 hover:bg-primary hover:text-on-primary transition-all">ThamNet</a>
        @endif
        @if($showThanos ?? false)
            <a href="#thanos-board" class="px-4 py-2 bg-surface-variant text-on-surface text-[10px] font-black uppercase tracking-widest border border-outline/10 hover:bg-primary hover:text-on-primary transition-all">Thanos</a>
        @endif
        <a href="{{ route('logout') }}" class="px-4 py-2 bg-red-500/10 text-red-500 text-[10px] font-black uppercase tracking-widest border border-red-500/20 hover:bg-red-500 hover:text-white transition-all">Logout</a>
    </div>
</section>
