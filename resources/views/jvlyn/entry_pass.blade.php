<x-layout title="Get Tickets | J V L Y N">
    <x-slot:metadesc>
        <meta name="description"
            content="Secure your ticket pass for J V L Y N - Jakarta Festival by Thamrin X. Festival and VIP options available.">
    </x-slot:metadesc>

    <script src="https://cdn.jsdelivr.net/npm/@supabase/supabase-js@2"></script>

    <style>
        /* Smooth fade-in animation */
        .animate-fade-in {
            animation: fadeIn 0.3s ease-out forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translate(-50%, 10px);
            }

            to {
                opacity: 1;
                transform: translate(-50%, 0);
            }
        }
    </style>

    <div class="w-full max-w-7xl mx-auto py-8 px-4 sm:px-6">
        <!-- Title Header -->
        <div class="flex flex-col items-center text-center mb-10 w-full">
            <span class="text-[11px] font-black tracking-[0.4em] uppercase text-primary mb-3 block">Concert
                Registration</span>
            <h1 class="text-3xl md:text-5xl font-black tracking-tight uppercase mb-2 text-on-surface">
                SELECT YOUR PASS
            </h1>
            <p class="text-xs uppercase tracking-widest text-on-surface-variant opacity-75">
                Jakarta Festival by Thamrin X: An Intimate Concert Experience
            </p>
        </div>

        <!-- Desktop: 3 Columns Horizontal, Mobile: 1 Column Vertical -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start w-full">

            <!-- Column 1: Progress Tracker & Timer (Left) -->
            <aside class="lg:col-span-3 xl:col-span-2 flex flex-col gap-6 w-full">
                <!-- Countdown Timer Widget -->
                <div class="bg-surface border border-outline/10 p-5 text-center flex flex-col gap-2">
                    <p class="text-[9px] uppercase tracking-widest font-black text-on-surface-variant">Time Remaining
                    </p>
                    <div class="text-primary flex items-center justify-center gap-1.5">
                        <span class="material-symbols-outlined text-lg">timer</span>
                        <span class="text-2xl font-black font-mono text-primary" id="countdown-display">10:00</span>
                    </div>
                    <p class="text-[10px] text-on-surface-variant/70 mt-1" id="timer-status">Select ticket to start
                        session</p>
                </div>

                <!-- Progress Stepper -->
                <nav class="bg-surface border border-outline/10 p-6 flex flex-col gap-6 relative">
                    <h3
                        class="text-xs font-black uppercase tracking-[0.2em] text-on-surface border-b border-outline/10 pb-3">
                        Progress</h3>
                    <div class="space-y-8 relative">
                        <!-- Stepper Connector Line -->
                        <div class="absolute left-[15px] top-4 bottom-4 w-0.5 bg-outline/10 z-0" id="stepper-line">
                        </div>

                        <!-- Step 1 Dot -->
                        <div class="flex items-center gap-4 relative z-10">
                            <div id="step-dot-1"
                                class="w-8 h-8 bg-primary text-on-primary border border-primary/20 text-xs font-black flex items-center justify-center transition-all">
                                1</div>
                            <div>
                                <h4 class="text-xs font-bold text-on-surface uppercase tracking-wider">Select Ticket
                                </h4>
                                <p class="text-[10px] text-on-surface-variant">Active Step</p>
                            </div>
                        </div>

                        <!-- Step 2 Dot -->
                        <div class="flex items-center gap-4 relative z-10 opacity-50">
                            <div id="step-dot-2"
                                class="w-8 h-8 bg-surface-variant text-on-surface-variant border border-outline/20 text-xs font-black flex items-center justify-center transition-all">
                                2</div>
                            <div>
                                <h4 class="text-xs font-bold text-on-surface uppercase tracking-wider">Information</h4>
                                <p class="text-[10px] text-on-surface-variant">Details Form</p>
                            </div>
                        </div>

                        <!-- Step 3 Dot -->
                        <div class="flex items-center gap-4 relative z-10 opacity-50">
                            <div id="step-dot-3"
                                class="w-8 h-8 bg-surface-variant text-on-surface-variant border border-outline/20 text-xs font-black flex items-center justify-center transition-all">
                                3</div>
                            <div>
                                <h4 class="text-xs font-bold text-on-surface uppercase tracking-wider">Payment</h4>
                                <p class="text-[10px] text-on-surface-variant">Verification</p>
                            </div>
                        </div>

                        <!-- Step 4 Dot -->
                        <div class="flex items-center gap-4 relative z-10 opacity-50">
                            <div id="step-dot-4"
                                class="w-8 h-8 bg-surface-variant text-on-surface-variant border border-outline/20 text-xs font-black flex items-center justify-center transition-all">
                                4</div>
                            <div>
                                <h4 class="text-xs font-bold text-on-surface uppercase tracking-wider">Confirm</h4>
                                <p class="text-[10px] text-on-surface-variant">Order Done</p>
                            </div>
                        </div>
                    </div>
                </nav>
            </aside>

            <!-- Column 2: Ticket and Seat Selection Workspace (Middle) -->
            <section class="lg:col-span-6 xl:col-span-7 flex flex-col gap-6 w-full relative">
                <div
                    class="bg-surface border border-outline/10 p-6 md:p-8 flex flex-col justify-between min-h-[550px] relative">
                    <div class="relative z-10 flex-grow space-y-8">
                        <div>
                            <h3 class="text-xl font-black uppercase tracking-tight text-on-surface">Choose Ticket Type
                            </h3>
                            <p class="text-xs text-on-surface-variant">Select a ticket category to add to your cart or
                                view seating selections.</p>
                        </div>

                        <!-- Ticket Category Grid -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <!-- Festival Ticket Card -->
                            <div onclick="selectTicket('festival')" id="card-festival"
                                class="cursor-pointer p-5 border border-outline/10 bg-surface/50 hover:bg-surface-variant/20 hover:border-primary/50 transition-all flex flex-col justify-between relative group">
                                <div
                                    class="absolute top-3 right-3 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <span id="icon-festival"
                                        class="material-symbols-outlined text-primary text-lg">radio_button_unchecked</span>
                                </div>
                                <div>
                                    <div
                                        class="ticket-badge text-[9px] font-black uppercase tracking-wider text-primary mb-1">
                                        Available Now</div>
                                    <h4 class="text-base font-bold text-on-surface uppercase tracking-tight">Festival
                                    </h4>
                                    <p class="text-[11px] text-on-surface-variant mt-2 mb-4 leading-relaxed">General
                                        Admission entry to the live stage performance floor.</p>
                                </div>
                                <div>
                                    <div class="text-xl font-black text-on-surface">IDR 150K</div>
                                    <div class="text-[10px] text-on-surface-variant mt-1">Quota: <span
                                            id="quota-festival" class="font-bold text-on-surface">Loading...</span>
                                    </div>
                                </div>
                            </div>

                            <!-- VIP Seat Card -->
                            <div onclick="selectTicket('vip-seat')" id="card-vip-seat"
                                class="cursor-pointer p-5 border border-outline/10 bg-surface/50 hover:bg-surface-variant/20 hover:border-primary/50 transition-all flex flex-col justify-between relative group">
                                <div
                                    class="absolute top-3 right-3 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <span id="icon-vip-seat"
                                        class="material-symbols-outlined text-primary text-lg">radio_button_unchecked</span>
                                </div>
                                <div>
                                    <div
                                        class="ticket-badge text-[9px] font-black uppercase tracking-wider text-secondary mb-1">
                                        Interactive Seat Map</div>
                                    <h4 class="text-base font-bold text-on-surface uppercase tracking-tight">VIP Seat
                                    </h4>
                                    <p class="text-[11px] text-on-surface-variant mt-2 mb-4 leading-relaxed">Exclusive
                                        reserved seated section with premium front views.</p>
                                </div>
                                <div>
                                    <div class="text-xl font-black text-on-surface">IDR 325K</div>
                                    <div class="text-[10px] text-on-surface-variant mt-1">Quota: <span
                                            id="quota-vip-seat" class="font-bold text-on-surface">Loading...</span>
                                    </div>
                                </div>
                            </div>

                            <!-- VIP Random Card -->
                            <div onclick="selectTicket('vip-random')" id="card-vip-random"
                                class="cursor-pointer p-5 border border-outline/10 bg-surface/50 hover:bg-surface-variant/20 hover:border-primary/50 transition-all flex flex-col justify-between relative group">
                                <div
                                    class="absolute top-3 right-3 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <span id="icon-vip-random"
                                        class="material-symbols-outlined text-primary text-lg">radio_button_unchecked</span>
                                </div>
                                <div>
                                    <div
                                        class="ticket-badge text-[9px] font-black uppercase tracking-wider text-on-surface-variant/70 mb-1">
                                        Assigned Seating</div>
                                    <h4 class="text-base font-bold text-on-surface uppercase tracking-tight">VIP Random
                                    </h4>
                                    <p class="text-[11px] text-on-surface-variant mt-2 mb-4 leading-relaxed">VIP level
                                        entry with system-allocated seat numbers.</p>
                                </div>
                                <div>
                                    <div class="text-xl font-black text-on-surface">IDR 300K</div>
                                    <div class="text-[10px] text-on-surface-variant mt-1">Quota: <span
                                            id="quota-vip-random" class="font-bold text-on-surface">Loading...</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 102 VIP Seating Map Section -->
                        <div id="vip-seat-map-container"
                            class="hidden border border-outline/10 bg-surface-variant/10 p-6 space-y-6">
                            <div class="flex flex-col items-center">
                                <div
                                    class="w-full max-w-lg h-6 bg-gradient-to-r from-primary/30 via-primary-container/30 to-primary/30 border-b border-primary/50 text-[9px] font-black tracking-[0.5em] text-on-surface flex items-center justify-center mb-8 uppercase">
                                    CONCERT STAGE
                                </div>
                                <!-- Seat map scroll container for small viewports -->
                                <div class="w-full overflow-x-auto custom-scrollbar pb-3">
                                    <div class="grid grid-cols-7 gap-3 min-w-[380px] max-w-lg mx-auto select-none"
                                        id="seat-grid">
                                        <!-- Seat items generated via Javascript -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Popup overlay for adding Festival / VIP Random to Cart -->
                    <div id="festival-selection-popup"
                        class="hidden absolute bottom-6 left-1/2 -translate-x-1/2 w-11/12 max-w-md bg-surface border border-primary/30 backdrop-blur-xl p-4 shadow-xl z-50 animate-fade-in flex flex-col gap-4">
                        <div class="flex justify-between items-start">
                            <div>
                                <span
                                    class="text-[9px] uppercase font-black tracking-widest text-on-surface-variant">Selected
                                    Ticket</span>
                                <h4 class="font-black text-primary text-base" id="popup-fest-title">Festival Pass</h4>
                            </div>
                            <span class="font-black text-on-surface text-base" id="popup-fest-price">IDR 150,000</span>
                        </div>
                        <!-- Optional referral input (Festival only) -->
                        <div id="popup-referral-container" class="space-y-1.5">
                            <label
                                class="block text-[9px] font-bold uppercase tracking-wider text-on-surface-variant">Referral
                                Code (Optional)</label>
                            <input type="text" id="referral-input" placeholder="Enter Code"
                                class="w-full bg-background border border-outline/20 px-3 py-2 text-xs focus:outline-none focus:border-primary uppercase text-on-surface tracking-widest">
                        </div>
                        <button onclick="addFestivalToCart()"
                            class="w-full bg-primary text-on-primary font-black uppercase text-xs tracking-widest py-3 hover:opacity-90 transition-all">
                            Add to Cart
                        </button>
                    </div>

                    <!-- Popup overlay for adding VIP Seat to Cart -->
                    <div id="seat-selection-popup"
                        class="hidden absolute bottom-6 left-1/2 -translate-x-1/2 w-11/12 max-w-md bg-surface border border-primary/30 backdrop-blur-xl p-4 shadow-xl z-50 animate-fade-in flex flex-col gap-4">
                        <div class="flex justify-between items-start">
                            <div>
                                <span
                                    class="text-[9px] uppercase font-black tracking-widest text-on-surface-variant">Selected
                                    VIP Seat</span>
                                <h4 class="font-black text-primary text-base" id="popup-seat-id">Seat A01</h4>
                            </div>
                            <span class="font-black text-on-surface text-base">IDR 325,000</span>
                        </div>
                        <button onclick="addSeatToCart()"
                            class="w-full bg-primary text-on-primary font-black uppercase text-xs tracking-widest py-3 hover:opacity-90 transition-all">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </section>

            <!-- Column 3: Shopping Cart Sidebar (Right) -->
            <aside class="lg:col-span-3 flex flex-col gap-6 w-full">
                <!-- Shopping Cart Display Box -->
                <div class="bg-surface border border-outline/10 p-6 flex flex-col gap-4">
                    <h3
                        class="text-xs font-black uppercase tracking-[0.2em] text-on-surface border-b border-outline/10 pb-3">
                        Shopping Cart</h3>

                    <!-- Cart List Container -->
                    <div class="space-y-3 max-h-60 overflow-y-auto custom-scrollbar" id="cart-items-list">
                        <!-- Filled in dynamically -->
                        <div class="text-xs text-on-surface-variant opacity-60 text-center py-4">Your cart is empty.
                        </div>
                    </div>

                    <div class="space-y-3 pt-2 border-t border-outline/10">
                        <div class="flex justify-between text-xs">
                            <span class="text-on-surface-variant opacity-80">Subtotal</span>
                            <span id="summary-subtotal" class="font-bold text-on-surface">IDR 0</span>
                        </div>

                        <div id="summary-discount-row" class="hidden justify-between text-xs text-secondary font-bold">
                            <span>Referral Discount</span>
                            <span id="summary-discount">- IDR 0</span>
                        </div>

                        <div class="flex justify-between text-sm pt-3 border-t border-outline/10">
                            <span class="font-black uppercase tracking-wider text-on-surface">Grand Total</span>
                            <span id="summary-total" class="font-black text-primary text-base">IDR 0</span>
                        </div>
                    </div>

                    <button onclick="proceedToCheckout()" id="checkout-btn"
                        class="w-full bg-primary text-on-primary font-black uppercase text-xs tracking-widest py-4 hover:opacity-90 transition-all opacity-50 cursor-not-allowed"
                        disabled>
                        Proceed to Checkout
                    </button>
                </div>

                <!-- Legend (VIP Seat map only) -->
                <div class="bg-surface border border-outline/10 p-5 hidden" id="seating-legend">
                    <h4 class="text-[9px] font-black uppercase tracking-widest text-on-surface-variant mb-4">Map Legend
                    </h4>
                    <div class="space-y-3">
                        <div class="flex items-center gap-3">
                            <div class="w-4 h-4 bg-secondary/15 border border-secondary/30"></div>
                            <span
                                class="text-[10px] font-bold text-on-surface-variant uppercase tracking-wider">Available</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-4 h-4 bg-primary border border-primary/20"></div>
                            <span class="text-[10px] font-bold text-on-surface-variant uppercase tracking-wider">In
                                Cart</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-4 h-4 bg-surface-variant border border-outline/20 opacity-30"></div>
                            <span
                                class="text-[10px] font-bold text-on-surface-variant uppercase tracking-wider">Occupied
                                / Locked</span>
                        </div>
                    </div>
                </div>
            </aside>

        </div>
    </div>

    <!-- Alert Timeout Modal -->
    <div id="alert-modal"
        class="fixed inset-0 z-50 flex items-center justify-center bg-background/80 backdrop-blur-sm hidden">
        <div
            class="bg-surface p-6 max-w-sm w-full mx-4 border border-outline/10 text-center space-y-4 shadow-2xl relative">
            <span class="material-symbols-outlined text-brand-red text-5xl">warning</span>
            <h4 id="alert-modal-title" class="text-lg font-black uppercase text-on-surface tracking-tight">Booking
                Session Timeout</h4>
            <p id="alert-modal-message" class="text-xs text-on-surface-variant leading-relaxed">
                Your cart reservation (10 minutes) has expired. Your items have been released.
            </p>
            <button onclick="closeAlertModal()"
                class="w-full bg-primary hover:opacity-90 text-on-primary font-black text-xs uppercase tracking-widest py-3 transition-all">
                OK, Paham
            </button>
        </div>
    </div>

    <!-- Toast Widgets -->
    <div id="toast"
        class="fixed bottom-6 right-6 z-50 bg-surface border border-outline/20 p-4 shadow-2xl flex items-center gap-3 text-on-surface max-w-sm hidden">
        <span class="material-symbols-outlined text-secondary" id="toast-icon">check_circle</span>
        <div class="text-xs">
            <div class="font-bold" id="toast-title">Success</div>
            <div class="text-on-surface-variant opacity-80" id="toast-msg">Operation completed successfully.</div>
        </div>
    </div>

    <script>
        (function() {
        // Supabase Connection Settings
        const supabaseUrl = "https://gckklfoszosvhkyickis.supabase.co";
        const supabaseKey = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Imdja2tsZm9zem9zdmhreWlja2lzIiwicm9sZSI6ImFub24iLCJpYXQiOjE3ODE0OTg2NzcsImV4cCI6MjA5NzA3NDY3N30.ieXaIliTQo5MTpSMx9n68cupJlyibsg5Q1usGl8R5EM";

        let supabaseClient = null;
        if (supabaseUrl && supabaseKey && window.supabase) {
            supabaseClient = window.supabase.createClient(supabaseUrl, supabaseKey);
        }

        // State variables
        const state = {
            selectedTicket: null,
            selectedSeat: null,
            cart: [],
            timeRemaining: 600, // 10 minutes (600 seconds)
            timerStarted: false,
            timerInterval: null,
            quota: { 'festival': 0, 'vip-seat': 0, 'vip-random': 0 },
            vipSeats: {},
            sessionId: null
        };

        const prices = {
            'festival': 150000,
            'vip-seat': 325000,
            'vip-random': 300000
        };

        const lockedSeats = new Set();

        // Maps internal category key to the DB-searchable keyword
        const catKeyMap = {
            'festival': 'festival',
            'vip-seat': 'vip seat',
            'vip-random': 'vip random'
        };

        /**
         * Atomically adjusts available_quota for a ticket category via RPC.
         * delta = -1 when adding to cart, +1 when removing / restoring.
         */
        async function adjustQuota(category, delta) {
            if (!supabaseClient) return;
            const catKey = catKeyMap[category] || category;
            try {
                const { error } = await supabaseClient.rpc('adjust_quota', { cat_key: catKey, delta });
                if (error) console.warn('adjustQuota error:', error);
            } catch (e) {
                console.warn('adjustQuota exception:', e);
            }
        }

        window.addEventListener('DOMContentLoaded', () => {
            initSession();
            initializeRealtimeData();
        });

        function initSession() {
            let sessionId = localStorage.getItem('jvlyn_session_id');
            if (!sessionId) {
                sessionId = 'sess-' + Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15);
                localStorage.setItem('jvlyn_session_id', sessionId);
            }
            state.sessionId = sessionId;
        }

        async function initializeRealtimeData() {
            await fetchQuota();
            await fetchVIPSeats();
            await fetchLockedSeats();
            // Clean all expired carts globally first, then load our own
            await purgeExpiredCarts();
            await fetchCart();
            subscribeToQuotaChanges();
            subscribeToSeatChanges();
            subscribeToCartChanges();
        }

        /**
         * Deletes ALL cart_items rows older than 10 minutes.
         * Restores quota for every item in those expired carts first.
         */
        async function purgeExpiredCarts() {
            if (!supabaseClient) return;
            try {
                const cutoff = new Date(Date.now() - 10 * 60 * 1000).toISOString();

                // 1. Fetch all expired cart rows first
                const { data: expiredCarts, error: fetchErr } = await supabaseClient
                    .from('cart_items')
                    .select('items')
                    .lt('created_at', cutoff);

                if (!fetchErr && expiredCarts && expiredCarts.length > 0) {
                    // 2. Aggregate how many tickets per category need to be restored
                    const restoration = {};
                    expiredCarts.forEach(row => {
                        (row.items || []).forEach(item => {
                            restoration[item.category] = (restoration[item.category] || 0) + 1;
                        });
                    });
                    // 3. Restore quota for each category
                    for (const [cat, count] of Object.entries(restoration)) {
                        await adjustQuota(cat, count);
                    }
                }

                // 4. Now delete all expired rows
                const { error: delErr } = await supabaseClient
                    .from('cart_items')
                    .delete()
                    .lt('created_at', cutoff);
                if (delErr) console.warn('Purge expired carts delete error:', delErr);
            } catch (e) {
                console.warn('purgeExpiredCarts exception:', e);
            }
        }

        // ==========================================
        // A. QUOTA AND SEAT DATA FETCH & SYNC
        // ==========================================
        async function fetchQuota() {
            if (!supabaseClient) {
                state.quota = { 'festival': 120, 'vip-seat': 30, 'vip-random': 50 };
                updateQuotaUI();
                return;
            }
            try {
                const { data, error } = await supabaseClient
                    .from('ticket_categories')
                    .select('category_name, available_quota');

                if (data && !error) {
                    data.forEach(item => {
                        const name = item.category_name.toLowerCase();
                        if (name.includes('festival')) state.quota['festival'] = item.available_quota;
                        else if (name.includes('vip seat')) state.quota['vip-seat'] = item.available_quota;
                        else if (name.includes('vip random')) state.quota['vip-random'] = item.available_quota;
                    });
                }
            } catch (e) {
                console.error("Quota Fetch Error:", e);
            }
            updateQuotaUI();
        }

        function subscribeToQuotaChanges() {
            if (!supabaseClient) return;
            supabaseClient
                .channel('realtime-quota')
                .on('postgres_changes', { event: 'UPDATE', schema: 'public', table: 'ticket_categories' }, payload => {
                    const item = payload.new;
                    const name = item.category_name.toLowerCase();
                    if (name.includes('festival')) state.quota['festival'] = item.available_quota;
                    else if (name.includes('vip seat')) state.quota['vip-seat'] = item.available_quota;
                    else if (name.includes('vip random')) state.quota['vip-random'] = item.available_quota;

                    updateQuotaUI();
                })
                .subscribe();
        }

        function updateQuotaUI() {
            const festText = document.getElementById('quota-festival');
            const vipSeatText = document.getElementById('quota-vip-seat');
            const vipRandText = document.getElementById('quota-vip-random');

            if (festText) festText.innerText = state.quota['festival'];
            if (vipSeatText) vipSeatText.innerText = state.quota['vip-seat'];
            if (vipRandText) vipRandText.innerText = state.quota['vip-random'];

            toggleQuotaCardState('card-festival', state.quota['festival']);
            toggleQuotaCardState('card-vip-seat', state.quota['vip-seat']);
            toggleQuotaCardState('card-vip-random', state.quota['vip-random']);
        }

        function toggleQuotaCardState(cardId, quota) {
            const card = document.getElementById(cardId);
            if (!card) return;
            const badge = card.querySelector('.ticket-badge');

            if (quota <= 0) {
                card.classList.add('opacity-40', 'pointer-events-none');
                if (badge) {
                    badge.innerText = "SOLD OUT";
                    badge.className = "text-[9px] font-black uppercase tracking-wider text-brand-red mb-1";
                }
            } else {
                card.classList.remove('opacity-40', 'pointer-events-none');
                if (badge) {
                    if (cardId === 'card-vip-seat') {
                        badge.innerText = "Interactive Seat Map";
                        badge.className = "text-[9px] font-black uppercase tracking-wider text-secondary mb-1";
                    } else if (cardId === 'card-festival') {
                        badge.innerText = "Available Now";
                        badge.className = "text-[9px] font-black uppercase tracking-wider text-primary mb-1";
                    } else {
                        badge.innerText = "Assigned Seating";
                        badge.className = "text-[9px] font-black uppercase tracking-wider text-on-surface-variant/70 mb-1";
                    }
                }
            }
        }

        async function fetchVIPSeats() {
            if (!supabaseClient) {
                generateMockSeats();
                renderSeatGridMap();
                return;
            }
            try {
                const { data, error } = await supabaseClient
                    .from('vip_seats')
                    .select('*');

                if (data && !error && data.length > 0) {
                    data.forEach(seat => {
                        const code = seat.seat_number || seat.seat_code || seat.id;
                        state.vipSeats[code] = seat.status;
                    });
                } else {
                    generateMockSeats();
                }
            } catch (e) {
                generateMockSeats();
            }
            renderSeatGridMap();
        }

        function generateMockSeats() {
            const rowChars = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q'];
            rowChars.forEach(row => {
                for (let i = 1; i <= 6; i++) {
                    const code = `${row}0${i}`;
                    if (!state.vipSeats[code]) {
                        state.vipSeats[code] = (Math.random() < 0.1) ? 'locked' : 'available';
                    }
                }
            });
        }

        function subscribeToSeatChanges() {
            if (!supabaseClient) return;
            supabaseClient
                .channel('realtime-seats')
                .on('postgres_changes', { event: '*', schema: 'public', table: 'vip_seats' }, payload => {
                    const seat = payload.new;
                    const code = seat.seat_number || seat.seat_code || seat.id;
                    state.vipSeats[code] = seat.status;
                    renderSeatGridMap();
                })
                .subscribe();
        }

        async function fetchLockedSeats() {
            if (!supabaseClient) return;
            try {
                const { data, error } = await supabaseClient
                    .from('cart_items')
                    .select('session_id, items')
                    .neq('session_id', state.sessionId);

                lockedSeats.clear();
                if (data && !error) {
                    data.forEach(cartRecord => {
                        const items = cartRecord.items || [];
                        items.forEach(item => {
                            if (item.category === 'vip-seat' && item.seat_number) {
                                lockedSeats.add(item.seat_number);
                            }
                        });
                    });
                }
            } catch (e) {
                console.error("Locked Seats Fetch Error:", e);
            }
        }

        function subscribeToCartChanges() {
            if (!supabaseClient) return;
            supabaseClient
                .channel('realtime-cart')
                .on('postgres_changes', { event: '*', schema: 'public', table: 'cart_items' }, async () => {
                    await fetchLockedSeats();
                    renderSeatGridMap();
                })
                .subscribe();
        }

        function renderSeatGridMap() {
            const grid = document.getElementById('seat-grid');
            if (!grid) return;
            grid.innerHTML = '';

            const rowChars = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q'];
            rowChars.forEach(row => {
                const rowLabel = document.createElement('div');
                rowLabel.className = "text-xs font-black text-on-surface opacity-40 flex items-center justify-center";
                rowLabel.innerText = row;
                grid.appendChild(rowLabel);

                for (let i = 1; i <= 6; i++) {
                    const code = `${row}0${i}`;
                    const status = state.vipSeats[code] || 'available';

                    const inOwnCart = state.cart.some(item => item.category === 'vip-seat' && item.seat_number === code);
                    const inOthersCart = lockedSeats.has(code);

                    const seatBtn = document.createElement('button');
                    seatBtn.id = `seat-${code}`;
                    seatBtn.className = "aspect-square text-[9px] font-black border flex items-center justify-center transition-all duration-300";

                    if (status === 'sold' || status === 'locked' || inOthersCart) {
                        seatBtn.className += " bg-surface-variant border-outline/20 text-on-surface-variant/30 cursor-not-allowed opacity-30";
                        seatBtn.disabled = true;
                    } else if (inOwnCart) {
                        seatBtn.className += " bg-primary border-primary text-on-primary shadow-lg shadow-primary/20 scale-105";
                    } else {
                        seatBtn.className += " bg-secondary/10 border-secondary/30 hover:border-secondary hover:bg-secondary/20 text-secondary";
                    }

                    seatBtn.innerText = code;
                    seatBtn.onclick = () => selectSeat(code);
                    grid.appendChild(seatBtn);
                }
            });
        }

        // ==========================================
        // B. TICKET & SEAT USER ACTIONS
        // ==========================================
        function selectTicket(tier) {
            state.selectedTicket = tier;
            state.selectedSeat = null;

            // Clear active status on cards
            ['festival', 'vip-seat', 'vip-random'].forEach(t => {
                const card = document.getElementById(`card-${t}`);
                const icon = document.getElementById(`icon-${t}`);
                if (card && icon) {
                    if (t === tier) {
                        card.className = "cursor-pointer p-5 border border-primary bg-primary-container/20 transition-all flex flex-col justify-between relative group shadow-md";
                        icon.innerText = "check_circle";
                    } else {
                        card.className = "cursor-pointer p-5 border border-outline/10 bg-surface/50 hover:bg-surface-variant/20 hover:border-primary/50 transition-all flex flex-col justify-between relative group";
                        icon.innerText = "radio_button_unchecked";
                    }
                }
            });

            // Toggle grid map container
            const mapContainer = document.getElementById('vip-seat-map-container');
            const seatingLegend = document.getElementById('seating-legend');

            if (tier === 'vip-seat') {
                mapContainer.classList.remove('hidden');
                seatingLegend.classList.remove('hidden');
            } else {
                mapContainer.classList.add('hidden');
                seatingLegend.classList.add('hidden');
            }

            // Hide popups initially
            document.getElementById('festival-selection-popup').classList.add('hidden');
            document.getElementById('seat-selection-popup').classList.add('hidden');

            // Show popup overlay for festival or vip-random
            if (tier === 'festival' || tier === 'vip-random') {
                const title = tier === 'festival' ? 'Festival Pass' : 'VIP Random Pass';
                const price = tier === 'festival' ? 'IDR 150,000' : 'IDR 300,000';

                document.getElementById('popup-fest-title').innerText = title;
                document.getElementById('popup-fest-price').innerText = price;

                const refContainer = document.getElementById('popup-referral-container');
                if (tier === 'festival') {
                    refContainer.classList.remove('hidden');
                } else {
                    refContainer.classList.add('hidden');
                }

                document.getElementById('festival-selection-popup').classList.remove('hidden');
            }
        }

        function selectSeat(code) {
            // If the seat is already in our own cart, clicking it toggles removal from cart
            const inOwnCart = state.cart.some(item => item.category === 'vip-seat' && item.seat_number === code);
            if (inOwnCart) {
                const item = state.cart.find(item => item.category === 'vip-seat' && item.seat_number === code);
                if (item) {
                    removeCartItem(item.id);
                    document.getElementById('seat-selection-popup').classList.add('hidden');
                    return;
                }
            }

            state.selectedSeat = code;
            document.getElementById('popup-seat-id').innerText = `Seat ${code}`;
            document.getElementById('seat-selection-popup').classList.remove('hidden');
        }

        // ==========================================
        // C. CART MANIPULATION & STATE SYNC
        // ==========================================
        async function fetchCart() {
            if (!supabaseClient) {
                state.cart = [];
                updateCartUI();
                return;
            }
            try {
                const { data, error } = await supabaseClient
                    .from('cart_items')
                    .select('items, created_at')
                    .eq('session_id', state.sessionId)
                    .maybeSingle();

                if (data && !error) {
                    state.cart = data.items || [];

                    if (state.cart.length > 0 && data.created_at) {
                        const createdTime = new Date(data.created_at).getTime();
                        const elapsed = Math.floor((Date.now() - createdTime) / 1000);
                        const remaining = 600 - elapsed;

                        if (remaining <= 0) {
                            // Cart already expired — purge and show warning
                            state.cart = [];
                            updateCartUI();
                            await supabaseClient
                                .from('cart_items')
                                .delete()
                                .eq('session_id', state.sessionId);
                            stopTimer();
                            showAlertModal(
                                "Sesi Booking Habis",
                                "Waktu transaksi Anda (10 menit) telah berakhir. Data kursi dan antrean belanja Anda dilepas kembali demi asas keadilan kuota."
                            );
                            return;
                        }

                        // Resume timer from the correct remaining time
                        state.timeRemaining = remaining;
                        startTimer();
                    }
                } else {
                    state.cart = [];
                }
            } catch (e) {
                console.error("Cart Fetch Error:", e);
                state.cart = [];
            }
            updateCartUI();
        }

        async function saveCart() {
            if (!supabaseClient) {
                updateCartUI();
                return;
            }
            try {
                if (state.cart.length === 0) {
                    await supabaseClient
                        .from('cart_items')
                        .delete()
                        .eq('session_id', state.sessionId);

                    stopTimer();
                } else {
                    // Check if cart already exists for this session to preserve original creation time
                    const { data: existing } = await supabaseClient
                        .from('cart_items')
                        .select('created_at')
                        .eq('session_id', state.sessionId)
                        .maybeSingle();

                    const record = {
                        session_id: state.sessionId,
                        items: state.cart,
                        updated_at: new Date().toISOString()
                    };

                    if (!existing) {
                        record.created_at = new Date().toISOString();
                    }

                    const { error } = await supabaseClient
                        .from('cart_items')
                        .upsert(record, { onConflict: 'session_id' });

                    if (error) console.error("Cart Save Error:", error);

                    startTimer();
                }
            } catch (e) {
                console.error("Cart Save Exception:", e);
            }
            updateCartUI();
        }

        async function addFestivalToCart() {
            const codeInput = document.getElementById('referral-input');
            const code = codeInput ? codeInput.value.trim().toUpperCase() : '';

            // Validate referral code if entered
            let referral = null;
            let finalPrice = prices[state.selectedTicket];

            if (state.selectedTicket === 'festival') {
                if (code === 'JVLYNXALUMNI') {
                    referral = code;
                    finalPrice = 85000;
                } else if (code === 'JVLYNXMHT18') {
                    referral = code;
                    finalPrice = 132000;
                } else if (code !== '') {
                    // For PROMO10 or others, we can keep existing logic or just reject if not these specific ones
                    if (code === 'PROMO10') {
                        referral = code;
                    } else {
                        showNotification("Invalid referral code.", "warning");
                        return;
                    }
                }
            }

            const item = {
                id: 'cart-' + Math.random().toString(36).substring(2, 9),
                category: state.selectedTicket,
                seat_number: null,
                price: finalPrice,
                referral_code: referral
            };

            state.cart.push(item);
            await adjustQuota(state.selectedTicket, -1); // Decrement available quota in real-time
            await saveCart();

            // Clean inputs & hide popup
            if (codeInput) codeInput.value = '';
            document.getElementById('festival-selection-popup').classList.add('hidden');
            showNotification(`${state.selectedTicket === 'festival' ? 'Festival' : 'VIP Random'} added to cart!`, "success");
        }

        async function addSeatToCart() {
            if (!state.selectedSeat) return;

            // Recheck locked seats
            await fetchLockedSeats();
            if (lockedSeats.has(state.selectedSeat)) {
                showNotification(`Seat ${state.selectedSeat} is no longer available.`, "warning");
                document.getElementById('seat-selection-popup').classList.add('hidden');
                renderSeatGridMap();
                return;
            }

            const item = {
                id: 'cart-' + Math.random().toString(36).substring(2, 9),
                category: 'vip-seat',
                seat_number: state.selectedSeat,
                price: prices['vip-seat'],
                referral_code: null
            };

            state.cart.push(item);
            await adjustQuota('vip-seat', -1); // Decrement VIP seat quota in real-time
            await saveCart();

            document.getElementById('seat-selection-popup').classList.add('hidden');
            showNotification(`Seat ${state.selectedSeat} added to cart!`, "success");
        }

        async function removeCartItem(itemId) {
            const removedItem = state.cart.find(item => item.id === itemId);
            state.cart = state.cart.filter(item => item.id !== itemId);
            if (removedItem) await adjustQuota(removedItem.category, 1); // Restore quota
            await saveCart();
            showNotification("Item removed from cart.", "success");
        }

        function updateCartUI() {
            const list = document.getElementById('cart-items-list');
            if (!list) return;

            list.innerHTML = '';
            if (state.cart.length === 0) {
                list.innerHTML = '<div class="text-xs text-on-surface-variant opacity-60 text-center py-4">Your cart is empty.</div>';

                document.getElementById('summary-subtotal').innerText = 'IDR 0';
                document.getElementById('summary-discount-row').classList.add('hidden');
                document.getElementById('summary-total').innerText = 'IDR 0';

                const btn = document.getElementById('checkout-btn');
                btn.disabled = true;
                btn.className = "w-full bg-primary text-on-primary font-black uppercase text-xs tracking-widest py-4 hover:opacity-90 transition-all opacity-50 cursor-not-allowed";

                renderSeatGridMap();
                return;
            }

            let subtotal = 0;
            let discount = 0;

            state.cart.forEach(item => {
                subtotal += item.price;

                // Handle discounts.
                // If it's the special codes, the price is already adjusted in addFestivalToCart.
                // But for PROMO10, it's a percentage off.
                let itemDiscount = 0;
                if (item.category === 'festival' && item.referral_code === 'PROMO10') {
                    itemDiscount = item.price * 0.1;
                    discount += itemDiscount;
                }

                const itemTotal = item.price - itemDiscount;

                const row = document.createElement('div');
                row.className = "flex justify-between items-start gap-3 p-3 bg-surface-variant/30 border border-outline/10";

                let label = '';
                let subtitle = '';
                if (item.category === 'festival') {
                    label = 'Festival Pass';
                    subtitle = item.referral_code ? `Promo Applied (${item.referral_code})` : 'General Admission';
                } else if (item.category === 'vip-seat') {
                    label = `VIP Seat ${item.seat_number}`;
                    subtitle = 'Interactive Selection';
                } else {
                    label = 'VIP Random Pass';
                    subtitle = 'Allocated Seating';
                }

                row.innerHTML = `
                    <div class="flex-1">
                        <p class="font-bold text-xs text-on-surface">${label}</p>
                        <p class="text-[10px] text-on-surface-variant opacity-70 mt-0.5">${subtitle}</p>
                    </div>
                    <div class="text-right">
                        <p class="font-black text-xs text-on-surface">IDR ${itemTotal.toLocaleString('id-ID')}</p>
                        ${itemDiscount > 0 ? `<p class="text-[9px] text-secondary line-through mt-0.5">IDR ${item.price.toLocaleString('id-ID')}</p>` : ''}
                    </div>
                    <button onclick="removeCartItem('${item.id}')" class="text-on-surface-variant hover:text-brand-red transition-colors shrink-0">
                        <span class="material-symbols-outlined text-sm font-black">close</span>
                    </button>
                `;
                list.appendChild(row);
            });

            const grandTotal = subtotal - discount;

            document.getElementById('summary-subtotal').innerText = `IDR ${subtotal.toLocaleString('id-ID')}`;
            if (discount > 0) {
                document.getElementById('summary-discount-row').classList.remove('hidden');
                document.getElementById('summary-discount').innerText = `- IDR ${discount.toLocaleString('id-ID')}`;
            } else {
                document.getElementById('summary-discount-row').classList.add('hidden');
            }
            document.getElementById('summary-total').innerText = `IDR ${grandTotal.toLocaleString('id-ID')}`;

            // Activate checkout button
            const btn = document.getElementById('checkout-btn');
            btn.disabled = false;
            btn.className = "w-full bg-primary text-on-primary font-black uppercase text-xs tracking-widest py-4 hover:opacity-90 transition-all opacity-100";

            renderSeatGridMap();
        }

        async function clearCart() {
            state.cart = [];
            await saveCart();
        }

        function proceedToCheckout() {
            if (state.cart.length > 0) {
                window.location.href = '/jvlyn/checkout';
            }
        }

        // ==========================================
        // D. TIMEOUT TIMER MANAGEMENT
        // ==========================================
        function startTimer() {
            if (state.timerStarted) return;
            state.timerStarted = true;

            // Always clear any dangling interval before starting a new one
            if (state.timerInterval) clearInterval(state.timerInterval);

            const statusText = document.getElementById('timer-status');
            if (statusText) statusText.innerText = "Complete checkout before timeout";

            updateTimerUI(); // Immediately reflect synced time

            state.timerInterval = setInterval(() => {
                state.timeRemaining--;
                updateTimerUI();

                if (state.timeRemaining <= 0) {
                    clearInterval(state.timerInterval);
                    state.timerStarted = false;
                    triggerTimeoutReset();
                }
            }, 1000);
        }

        function stopTimer() {
            if (state.timerInterval) clearInterval(state.timerInterval);
            state.timerStarted = false;
            state.timeRemaining = 600;
            updateTimerUI();
            const statusText = document.getElementById('timer-status');
            if (statusText) statusText.innerText = "Select ticket to start session";
        }

        function updateTimerUI() {
            const minutes = Math.floor(state.timeRemaining / 60);
            const seconds = state.timeRemaining % 60;
            const displayStr = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;

            const timerEl = document.getElementById('countdown-display');
            if (timerEl) {
                timerEl.innerText = displayStr;
                if (state.timeRemaining <= 60) {
                    timerEl.className = "text-2xl font-black font-mono text-brand-red animate-pulse";
                } else {
                    timerEl.className = "text-2xl font-black font-mono text-primary";
                }
            }
        }

        async function triggerTimeoutReset() {
            // Restore quota for every item still in the cart before clearing it
            for (const item of state.cart) {
                await adjustQuota(item.category, 1);
            }
            showAlertModal(
                "Sesi Booking Habis",
                "Waktu transaksi Anda (10 menit) telah berakhir. Data kursi dan antrean belanja Anda dilepas kembali demi asas keadilan kuota."
            );
            state.cart = [];
            updateCartUI();
            if (supabaseClient) {
                await supabaseClient
                    .from('cart_items')
                    .delete()
                    .eq('session_id', state.sessionId);
            }
        }

        // ==========================================
        // E. UTILITY INTERFACES
        // ==========================================
        function showAlertModal(title, msg) {
            const modal = document.getElementById('alert-modal');
            const mTitle = document.getElementById('alert-modal-title');
            const mMsg = document.getElementById('alert-modal-message');

            if (modal && mTitle && mMsg) {
                mTitle.innerText = title;
                mMsg.innerText = msg;
                modal.classList.remove('hidden');
            }
        }

        function closeAlertModal() {
            const modal = document.getElementById('alert-modal');
            if (modal) modal.classList.add('hidden');
        }

        function showNotification(msg, type = "success") {
            const toast = document.getElementById('toast');
            const tTitle = document.getElementById('toast-title');
            const tMsg = document.getElementById('toast-msg');
            const tIcon = document.getElementById('toast-icon');

            if (toast && tTitle && tMsg && tIcon) {
                tTitle.innerText = type.toUpperCase();
                tMsg.innerText = msg;
                if (type === 'success') {
                    toast.className = "fixed bottom-6 right-6 z-50 bg-surface border border-secondary/35 p-4 shadow-2xl flex items-center gap-3 text-on-surface max-w-sm";
                    tIcon.innerText = "check_circle";
                    tIcon.className = "material-symbols-outlined text-secondary";
                } else {
                    toast.className = "fixed bottom-6 right-6 z-50 bg-surface border border-brand-red/35 p-4 shadow-2xl flex items-center gap-3 text-on-surface max-w-sm";
                    tIcon.innerText = "warning";
                    tIcon.className = "material-symbols-outlined text-brand-red";
                }

                toast.classList.remove('hidden');
                setTimeout(() => {
                    toast.classList.add('hidden');
                }, 4000);
            }
        }

        // Expose functions to global scope for onclick attributes
        window.selectTicket = selectTicket;
        window.selectSeat = selectSeat;
        window.addFestivalToCart = addFestivalToCart;
        window.addSeatToCart = addSeatToCart;
        window.removeCartItem = removeCartItem;
        window.proceedToCheckout = proceedToCheckout;
        window.closeAlertModal = closeAlertModal;
        })();
    </script>
</x-layout>