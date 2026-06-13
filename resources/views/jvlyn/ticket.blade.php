<x-layout title="Get Tickets | J V L Y N">
    <x-slot:metadesc>
        <meta name="description" content="Secure your ticket pass for J V L Y N - Jakarta Festival by Thamrin X. Presale and normal entries available.">
    </x-slot:metadesc>

    <div class="w-full max-w-4xl mx-auto py-16 px-6 flex flex-col items-center">
        <span class="text-[10px] font-black tracking-[0.4em] uppercase text-primary mb-4 block">Concert Ticketing</span>
        <h1 class="text-4xl md:text-5xl font-black tracking-tighter uppercase mb-2 text-center text-on-surface">
            GET YOUR PASS
        </h1>
        <p class="text-xs uppercase tracking-widest text-on-surface-variant opacity-60 mb-12 text-center">
            Jakarta Festival by Thamrin X: An Intimate Concert
        </p>

        <div class="w-full bg-surface-variant/40 border border-outline/10 p-8 md:p-12 relative flex flex-col md:flex-row gap-12 shadow-xl">
            <div class="absolute -inset-0.5 bg-gradient-to-r from-primary to-secondary-600 opacity-10 blur-xl pointer-events-none"></div>
            
            {{-- Form Section --}}
            <div class="w-full md:w-1/2 text-left relative z-10 flex flex-col justify-between">
                <div>
                    <h3 class="text-lg font-black uppercase tracking-tight mb-6">Select Ticket Tier</h3>
                    
                    <div class="space-y-4 mb-8">
                        <label class="block p-4 border border-outline/10 opacity-60 cursor-not-allowed transition-all">
                            <input type="radio" name="ticket_tier" value="presale1" disabled class="accent-primary mr-3">
                            <span class="text-xs font-black uppercase text-on-surface line-through">Presale 1 (SOLD OUT)</span>
                            <span class="float-right text-xs font-black text-primary">IDR 125K</span>
                        </label>
                        
                        <label class="block p-4 border border-primary bg-primary/5 cursor-pointer transition-all">
                            <input type="radio" name="ticket_tier" value="presale2" checked class="accent-primary mr-3">
                            <span class="text-xs font-black uppercase text-on-surface">Presale 2</span>
                            <span class="float-right text-xs font-black text-primary">IDR 150K</span>
                        </label>
                        
                        <label class="block p-4 border border-outline/10 hover:border-primary/50 cursor-pointer transition-all">
                            <input type="radio" name="ticket_tier" value="normal" class="accent-primary mr-3">
                            <span class="text-xs font-black uppercase text-on-surface">Normal / OTS Pass</span>
                            <span class="float-right text-xs font-black text-primary">IDR 185K</span>
                        </label>
                    </div>
                </div>

                <div>
                    <button onclick="alert('Ticket booking system is being integrated. Stand by for launch!')" class="w-full text-center block bg-primary text-on-primary text-[10px] font-black uppercase tracking-[0.3em] py-4 shadow-md hover:brightness-110 transition-all">
                        PROCEED TO PAYMENT
                    </button>
                </div>
            </div>

            {{-- Summary/Info Section --}}
            <div class="w-full md:w-1/2 text-left relative z-10 border-t md:border-t-0 md:border-l border-outline/10 pt-12 md:pt-0 md:pl-12 flex flex-col justify-between">
                <div>
                    <h3 class="text-lg font-black uppercase tracking-tight mb-6">Concert Guidelines</h3>
                    <ul class="space-y-4 text-xs text-on-surface-variant font-light leading-relaxed list-disc list-inside">
                        <li>Gate opens at 14:00 WIB. Make sure to arrive early for check-in.</li>
                        <li>Bring a valid ID or student card matching the ticket holder's name.</li>
                        <li>E-tickets will be sent to your registered email address upon checkout.</li>
                        <li>No outside food, beverages, or sharp objects allowed inside the venue.</li>
                    </ul>
                </div>
                
                <div class="mt-8 pt-8 border-t border-outline/10">
                    <p class="text-[10px] text-on-surface-variant opacity-60 leading-relaxed font-light">
                        Need help with your purchase? Contact our ticketing support channel via our official social accounts.
                    </p>
                </div>
            </div>
        </div>

        <a href="/jvlyn" class="mt-12 text-xs font-black uppercase tracking-widest text-primary hover:underline flex items-center gap-2">
            <span class="material-symbols-outlined text-sm">arrow_back</span> Back to Event Info
        </a>
    </div>
</x-layout>
