<x-layout title="Checkout Tickets | J V L Y N">
    <x-slot:metadesc>
        <meta name="description"
            content="Provide details and complete payment for your J V L Y N concert tickets.">
    </x-slot:metadesc>

    <script src="https://cdn.jsdelivr.net/npm/@supabase/supabase-js@2"></script>

    <style>
        .animate-fade-in {
            animation: fadeIn 0.4s ease-out forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    <div class="w-full max-w-7xl mx-auto py-8 px-4 sm:px-6">
        <!-- Title Header -->
        <div class="flex flex-col items-center text-center mb-10 w-full">
            <span class="text-[11px] font-black tracking-[0.4em] uppercase text-primary mb-3 block">Concert Registration</span>
            <h1 class="text-3xl md:text-5xl font-black tracking-tight uppercase mb-2 text-on-surface">
                CHECKOUT TICKETS
            </h1>
            <p class="text-xs uppercase tracking-widest text-on-surface-variant opacity-75">
                Jakarta Festival by Thamrin X: Complete your order details
            </p>
        </div>

        <!-- 3-Column Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start w-full">
            
            <!-- Column 1: Progress Tracker & Timer (Left) -->
            <aside class="lg:col-span-3 xl:col-span-2 flex flex-col gap-6 w-full">
                <!-- Countdown Timer -->
                <div class="bg-surface border border-outline/10 p-5 text-center flex flex-col gap-2">
                    <p class="text-[9px] uppercase tracking-widest font-black text-on-surface-variant">Time Remaining</p>
                    <div class="text-primary flex items-center justify-center gap-1.5">
                        <span class="material-symbols-outlined text-lg">timer</span>
                        <span class="text-2xl font-black font-mono text-primary" id="countdown-display">10:00</span>
                    </div>
                    <p class="text-[10px] text-on-surface-variant/70 mt-1" id="timer-status">Complete checkout before timeout</p>
                </div>

                <!-- Stepper -->
                <nav class="bg-surface border border-outline/10 p-6 flex flex-col gap-6 relative">
                    <h3 class="text-xs font-black uppercase tracking-[0.2em] text-on-surface border-b border-outline/10 pb-3">Progress</h3>
                    <div class="space-y-8 relative">
                        <div class="absolute left-[15px] top-4 bottom-4 w-0.5 bg-outline/10 z-0" id="stepper-line"></div>
                        
                        <!-- Step 1 Dot -->
                        <div class="flex items-center gap-4 relative z-10">
                            <div id="step-dot-1" class="w-8 h-8 bg-secondary text-on-primary border border-secondary/20 text-xs font-black flex items-center justify-center transition-all">
                                <span class="material-symbols-outlined text-sm font-black">check</span>
                            </div>
                            <div>
                                <h4 class="text-xs font-bold text-on-surface uppercase tracking-wider">Select Ticket</h4>
                                <p class="text-[10px] text-on-surface-variant">Completed</p>
                            </div>
                        </div>
                        
                        <!-- Step 2 Dot -->
                        <div class="flex items-center gap-4 relative z-10">
                            <div id="step-dot-2" class="w-8 h-8 bg-primary text-on-primary border border-primary/20 text-xs font-black flex items-center justify-center transition-all">2</div>
                            <div>
                                <h4 class="text-xs font-bold text-on-surface uppercase tracking-wider">Information</h4>
                                <p class="text-[10px] text-on-surface-variant">Details Form</p>
                            </div>
                        </div>
                        
                        <!-- Step 3 Dot -->
                        <div class="flex items-center gap-4 relative z-10">
                            <div id="step-dot-3" class="w-8 h-8 bg-surface-variant text-on-surface-variant border border-outline/20 text-xs font-black flex items-center justify-center transition-all">3</div>
                            <div>
                                <h4 class="text-xs font-bold text-on-surface uppercase tracking-wider">Payment</h4>
                                <p class="text-[10px] text-on-surface-variant">Verification</p>
                            </div>
                        </div>
                        
                        <!-- Step 4 Dot -->
                        <div class="flex items-center gap-4 relative z-10">
                            <div id="step-dot-4" class="w-8 h-8 bg-surface-variant text-on-surface-variant border border-outline/20 text-xs font-black flex items-center justify-center transition-all">4</div>
                            <div>
                                <h4 class="text-xs font-bold text-on-surface uppercase tracking-wider">Confirm</h4>
                                <p class="text-[10px] text-on-surface-variant">Order Done</p>
                            </div>
                        </div>
                    </div>
                </nav>
            </aside>

            <!-- Column 2: Checkout Content Panel (Middle) -->
            <section class="lg:col-span-6 xl:col-span-7 flex flex-col gap-6 w-full">
                <div class="bg-surface border border-outline/10 p-6 md:p-8 flex flex-col justify-between min-h-[550px] relative">
                    <div class="relative z-10 flex-grow">
                        
                        <!-- Step 2: Personal details input -->
                        <div id="step-2" class="step-content space-y-6">
                            <div>
                                <h3 class="text-xl font-black uppercase tracking-tight text-on-surface">Contact Information</h3>
                                <p class="text-xs text-on-surface-variant">Provide your active contact details. Tickets will be sent to this email.</p>
                            </div>
                            
                            <div class="space-y-4 max-w-xl">
                                <div>
                                    <label class="block text-xs uppercase tracking-wider font-bold mb-2 text-on-surface">Full Name</label>
                                    <input type="text" id="input-name" oninput="validateStep()" placeholder="John Doe" class="w-full bg-background border border-outline/20 px-4 py-3 text-sm focus:outline-none focus:border-primary transition-all text-on-surface">
                                </div>
                                <div>
                                    <label class="block text-xs uppercase tracking-wider font-bold mb-2 text-on-surface">Email Address</label>
                                    <input type="email" id="input-email" oninput="validateStep()" placeholder="johndoe@email.com" class="w-full bg-background border border-outline/20 px-4 py-3 text-sm focus:outline-none focus:border-primary transition-all text-on-surface">
                                </div>
                                <div>
                                    <label class="block text-xs uppercase tracking-wider font-bold mb-2 text-on-surface">WhatsApp / Phone Number</label>
                                    <input type="tel" id="input-phone" oninput="validateStep()" placeholder="0812XXXXXXXX" class="w-full bg-background border border-outline/20 px-4 py-3 text-sm focus:outline-none focus:border-primary transition-all text-on-surface">
                                </div>
                            </div>
                        </div>

                        <!-- Step 3: QRIS instructions and image upload -->
                        <div id="step-3" class="step-content space-y-6 hidden">
                            <div>
                                <h3 class="text-xl font-black uppercase tracking-tight text-on-surface">Payment & Verification</h3>
                                <p class="text-xs text-on-surface-variant">Transfer the exact total amount to our bank account or scan the QRIS code.</p>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="border border-outline/10 bg-surface-variant/10 p-5 space-y-4">
                                    <h4 class="text-xs font-black uppercase tracking-widest text-primary">Bank Account Details</h4>
                                    <div class="space-y-3">
                                        <div>
                                            <div class="text-[10px] text-on-surface-variant uppercase tracking-wider">Bank Name</div>
                                            <div class="text-sm font-bold text-on-surface">Bank Mandiri</div>
                                        </div>
                                        <div>
                                            <div class="text-[10px] text-on-surface-variant uppercase tracking-wider">Account Number</div>
                                            <div class="flex items-center gap-2 mt-1">
                                                <span id="account-num" class="text-base font-black tracking-widest text-on-surface">1660099988877</span>
                                                <button onclick="copyToClipboard('1660099988877')" class="text-[10px] bg-primary text-on-primary hover:bg-primary-container px-2 py-1 transition-colors uppercase font-bold">Copy</button>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="text-[10px] text-on-surface-variant uppercase tracking-wider">Account Holder</div>
                                            <div class="text-sm font-bold text-on-surface">OSIS PK MHT</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border border-outline/10 bg-surface-variant/10 p-5 flex flex-col items-center justify-center space-y-3">
                                    <h4 class="text-xs font-black uppercase tracking-widest text-secondary">Scan QRIS Payment</h4>
                                    <div class="bg-white p-2 w-32 h-32 flex items-center justify-center shadow-md border border-outline/10 overflow-hidden">
                                        <img src="{{ asset('image/qris.jpg') }}" alt="QRIS" class="w-full h-full object-contain">
                                    </div>
                                    <span class="text-[9px] uppercase tracking-wider text-on-surface-variant">Instant Settlement Payment</span>
                                </div>
                            </div>
                            <div class="space-y-3">
                                <label class="block text-xs uppercase tracking-wider font-bold text-on-surface">Upload Payment Proof</label>
                                <div id="drop-zone" class="border-2 border-dashed border-outline/20 hover:border-primary/50 transition-all p-8 flex flex-col items-center justify-center text-center cursor-pointer relative bg-surface-variant/10">
                                    <input type="file" id="file-payment-proof" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer">
                                    <span class="material-symbols-outlined text-4xl text-primary mb-2">cloud_upload</span>
                                    <span class="text-xs text-on-surface font-bold" id="upload-status-text">Drag & drop your transfer receipt image here</span>
                                    <span class="text-[10px] text-on-surface-variant mt-1">Supports PNG, JPG, or JPEG (Max 5MB)</span>
                                </div>
                                <div id="proof-preview-container" class="hidden border border-outline/10 p-3 flex items-center justify-between bg-surface-variant/20">
                                    <div class="flex items-center gap-3">
                                        <img id="proof-img-preview" src="" class="w-12 h-12 object-cover border border-outline/10" alt="Proof Preview">
                                        <span id="proof-filename" class="text-xs text-on-surface font-bold truncate max-w-xs">filename.jpg</span>
                                    </div>
                                    <button onclick="removeUploadedFile()" class="text-primary hover:text-on-surface transition-colors">
                                        <span class="material-symbols-outlined">delete</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Step 4: Final order success summary page -->
                        <div id="step-4" class="step-content space-y-8 flex flex-col items-center justify-center py-8 text-center hidden">
                            <div class="w-16 h-16 bg-secondary/20 text-secondary border border-secondary/30 flex items-center justify-center shadow-sm">
                                <span class="material-symbols-outlined text-4xl">check_circle</span>
                            </div>
                            <div>
                                <h2 class="text-2xl font-black uppercase text-on-surface tracking-tight">Order Registered Successfully!</h2>
                                <p class="text-xs text-on-surface-variant max-w-md mx-auto mt-2 leading-relaxed">
                                    Thank you for your purchase. We are currently verifying your payment. Your ticket details have been logged and will be dispatched.
                                </p>
                            </div>
                            <div class="w-full max-w-md border border-outline/10 bg-surface-variant/10 p-5 text-left space-y-4">
                                <div class="flex justify-between items-center pb-3 border-b border-outline/10">
                                    <span class="text-[10px] uppercase text-on-surface-variant tracking-wider">Order ID</span>
                                    <span id="success-order-id" class="text-xs font-black text-on-surface">#TKT-99120831</span>
                                </div>
                                <div class="space-y-3">
                                    <div>
                                        <span class="text-[10px] uppercase text-on-surface-variant tracking-wider">Ticket Types Purchased</span>
                                        <div id="success-ticket-types" class="text-sm font-bold text-on-surface">VIP Seat, Festival</div>
                                    </div>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <span class="text-[10px] uppercase text-on-surface-variant tracking-wider">Total Paid</span>
                                            <div id="success-total-price" class="text-sm font-black text-on-surface">IDR 300,000</div>
                                        </div>
                                        <div>
                                            <span class="text-[10px] uppercase text-on-surface-variant tracking-wider">Delivery Status</span>
                                            <div class="text-sm font-bold text-secondary">Pending Verification</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex gap-4">
                                <a href="/jvlyn" class="text-xs font-black uppercase tracking-widest bg-surface border border-outline/10 hover:bg-surface-variant/30 text-on-surface px-6 py-3 transition-colors">
                                    Event Homepage
                                </a>
                                <a href="/jvlyn/entry_pass" class="text-xs font-black uppercase tracking-widest bg-primary text-on-primary px-6 py-3 transition-colors hover:opacity-90">
                                    Purchase More Tickets
                                </a>
                            </div>
                        </div>

                    </div>

                    <!-- Step Controls -->
                    <div class="relative z-10 flex justify-between items-center pt-8 border-t border-outline/10 mt-8" id="nav-controls">
                        <button onclick="prevStep()" id="btn-back" class="text-xs font-black uppercase tracking-widest text-on-surface-variant hover:text-on-surface transition-colors flex items-center gap-1">
                            <span class="material-symbols-outlined text-sm">arrow_back</span> Back
                        </button>
                        <button onclick="nextStep()" id="btn-next" class="bg-primary text-on-primary text-xs font-black uppercase tracking-widest px-8 py-3.5 hover:opacity-90 transition-all flex items-center gap-1 opacity-50 cursor-not-allowed" disabled>
                            Next <span class="material-symbols-outlined text-sm">arrow_forward</span>
                        </button>
                    </div>
                </div>
            </section>

            <!-- Column 3: Cart Summary Sidebar (Right) -->
            <aside class="lg:col-span-3 flex flex-col gap-6 w-full">
                <!-- Summary Card -->
                <div class="bg-surface border border-outline/10 p-6 flex flex-col gap-4">
                    <h3 class="text-xs font-black uppercase tracking-[0.2em] text-on-surface border-b border-outline/10 pb-3">Order Items</h3>
                    <div class="space-y-3 max-h-60 overflow-y-auto custom-scrollbar" id="cart-items-list">
                        <!-- Loaded dynamically -->
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
                </div>
            </aside>

        </div>
    </div>

    <!-- Timeout Alert Modal -->
    <div id="alert-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-background/80 backdrop-blur-sm hidden">
        <div class="bg-surface p-6 max-w-sm w-full mx-4 border border-outline/10 text-center space-y-4 shadow-2xl relative">
            <span class="material-symbols-outlined text-brand-red text-5xl">warning</span>
            <h4 id="alert-modal-title" class="text-lg font-black uppercase text-on-surface tracking-tight">Checkout Timeout</h4>
            <p id="alert-modal-message" class="text-xs text-on-surface-variant leading-relaxed">
                Your booking session has expired. You will be redirected back to the ticketing map.
            </p>
            <button onclick="window.location.href='/jvlyn/entry_pass'" class="w-full bg-primary hover:opacity-90 text-on-primary font-black text-xs uppercase tracking-widest py-3 transition-all">
                OK, Paham
            </button>
        </div>
    </div>

    <!-- Toast alerts -->
    <div id="toast" class="fixed bottom-6 right-6 z-50 bg-surface border border-outline/20 p-4 shadow-2xl flex items-center gap-3 text-on-surface max-w-sm hidden">
        <span class="material-symbols-outlined text-secondary" id="toast-icon">check_circle</span>
        <div class="text-xs">
            <div class="font-bold" id="toast-title">Success</div>
            <div class="text-on-surface-variant opacity-80" id="toast-msg">Operation completed successfully.</div>
        </div>
    </div>

    <script>
        // Supabase Settings
        const supabaseUrl = "https://gckklfoszosvhkyickis.supabase.co";
        const supabaseKey = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Imdja2tsZm9zem9zdmhreWlja2lzIiwicm9sZSI6ImFub24iLCJpYXQiOjE3ODE0OTg2NzcsImV4cCI6MjA5NzA3NDY3N30.ieXaIliTQo5MTpSMx9n68cupJlyibsg5Q1usGl8R5EM";

        let supabaseClient = null;
        if (supabaseUrl && supabaseKey && window.supabase) {
            supabaseClient = window.supabase.createClient(supabaseUrl, supabaseKey);
        }

        const state = {
            currentStep: 2, // Starts at details form
            cart: [],
            personalInfo: { name: '', email: '', phone: '' },
            paymentProof: null,
            timeRemaining: 600,
            timerInterval: null,
            sessionId: null
        };

        window.addEventListener('DOMContentLoaded', () => {
            initSession();
            initializeCheckout();
        });

        function initSession() {
            const sessionId = localStorage.getItem('jvlyn_session_id');
            if (!sessionId) {
                window.location.href = '/jvlyn/entry_pass';
                return;
            }
            state.sessionId = sessionId;
        }

        async function initializeCheckout() {
            await fetchCart();
            if (state.cart.length === 0) {
                window.location.href = '/jvlyn/entry_pass';
                return;
            }
            startTimer();
            subscribeToCartChanges();
        }

        async function fetchCart() {
            if (!supabaseClient) return;
            try {
                const { data, error } = await supabaseClient
                    .from('cart_items')
                    .select('items, created_at')
                    .eq('session_id', state.sessionId)
                    .maybeSingle();

                if (data && !error) {
                    state.cart = data.items || [];
                    if (state.cart.length === 0) {
                        window.location.href = '/jvlyn/entry_pass';
                        return;
                    }
                    if (data.created_at) {
                        const createdTime = new Date(data.created_at).getTime();
                        const elapsed = Math.floor((Date.now() - createdTime) / 1000);
                        state.timeRemaining = Math.max(0, 600 - elapsed);
                        if (state.timeRemaining <= 0) {
                            triggerTimeoutReset();
                        }
                    }
                } else {
                    window.location.href = '/jvlyn/entry_pass';
                }
            } catch (e) {
                console.error("Cart Fetch Error:", e);
                window.location.href = '/jvlyn/entry_pass';
            }
            updateCartSummaryUI();
        }

        function subscribeToCartChanges() {
            if (!supabaseClient) return;
            supabaseClient
                .channel('realtime-checkout-cart')
                .on('postgres_changes', { event: 'DELETE', schema: 'public', table: 'cart_items', filter: `session_id=eq.${state.sessionId}` }, () => {
                    // Redirect back if cart gets cleared on timeout
                    window.location.href = '/jvlyn/entry_pass';
                })
                .subscribe();
        }

        function updateCartSummaryUI() {
            const list = document.getElementById('cart-items-list');
            if (!list) return;

            list.innerHTML = '';
            let subtotal = 0;
            let discount = 0;

            state.cart.forEach(item => {
                subtotal += item.price;
                let itemDiscount = 0;
                if (item.category === 'festival' && item.referral_code === 'PROMO10') {
                    itemDiscount = item.price * 0.1;
                    discount += itemDiscount;
                }

                const itemTotal = item.price - itemDiscount;

                const row = document.createElement('div');
                row.className = "p-3 bg-surface-variant/30 border border-outline/10 flex justify-between items-start";
                
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
                    <div>
                        <p class="font-bold text-xs text-on-surface">${label}</p>
                        <p class="text-[10px] text-on-surface-variant opacity-70 mt-0.5">${subtitle}</p>
                    </div>
                    <div class="text-right shrink-0">
                        <p class="font-black text-xs text-on-surface">IDR ${itemTotal.toLocaleString('id-ID')}</p>
                    </div>
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
        }

        // ==========================================
        // C. STEP NAVIGATION AND VALIDATIONS
        // ==========================================
        function updateStepperUI() {
            // Update panel visibility
            ['step-2', 'step-3', 'step-4'].forEach(stepId => {
                const el = document.getElementById(stepId);
                if (el) {
                    if (stepId === `step-${state.currentStep}`) el.classList.remove('hidden');
                    else el.classList.add('hidden');
                }
            });

            // Update dot indicators
            for (let i = 2; i <= 4; i++) {
                const dot = document.getElementById(`step-dot-${i}`);
                if (dot) {
                    if (state.currentStep === i) {
                        dot.className = "w-8 h-8 bg-primary text-on-primary border border-primary/20 text-xs font-black flex items-center justify-center shadow-lg shadow-primary/20 transition-all";
                        dot.innerText = i;
                    } else if (state.currentStep > i) {
                        dot.className = "w-8 h-8 bg-secondary text-on-primary border border-secondary/20 text-xs font-black flex items-center justify-center transition-all";
                        dot.innerHTML = `<span class="material-symbols-outlined text-sm font-black">check</span>`;
                    } else {
                        dot.className = "w-8 h-8 bg-surface-variant text-on-surface-variant border border-outline/20 text-xs font-black flex items-center justify-center transition-all";
                        dot.innerText = i;
                    }
                }
            }

            const line = document.getElementById('stepper-line');
            if (line) {
                const progressPercent = ((state.currentStep - 1) / 3) * 100;
                line.style.background = `linear-gradient(180deg, var(--theme-primary-600, #3755c3) ${progressPercent}%, var(--theme-surface-variant, #d5e3fd) ${progressPercent}%)`;
            }

            const btnBack = document.getElementById('btn-back');
            const btnNext = document.getElementById('btn-next');
            const navControls = document.getElementById('nav-controls');

            if (state.currentStep === 4) {
                navControls.classList.add('hidden');
            } else {
                navControls.classList.remove('hidden');
            }

            if (btnBack) btnBack.disabled = (state.currentStep === 2);

            if (btnNext) {
                if (state.currentStep === 3) {
                    btnNext.innerHTML = `Complete Order <span class="material-symbols-outlined text-sm">check_circle</span>`;
                } else {
                    btnNext.innerHTML = `Next <span class="material-symbols-outlined text-sm">arrow_forward</span>`;
                }
            }

            validateStep();
        }

        function validateStep() {
            const btnNext = document.getElementById('btn-next');
            if (!btnNext) return;

            let isValid = false;

            if (state.currentStep === 2) {
                const name = document.getElementById('input-name').value.trim();
                const email = document.getElementById('input-email').value.trim();
                const phone = document.getElementById('input-phone').value.trim();
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                isValid = (name.length >= 3 && emailRegex.test(email) && phone.length >= 9);
            } else if (state.currentStep === 3) {
                isValid = (state.paymentProof !== null);
            }

            btnNext.disabled = !isValid;
            if (isValid) {
                btnNext.classList.remove('opacity-50', 'cursor-not-allowed');
                btnNext.classList.add('opacity-100');
            } else {
                btnNext.classList.remove('opacity-100');
                btnNext.classList.add('opacity-50', 'cursor-not-allowed');
            }
        }

        function nextStep() {
            if (state.currentStep === 2) {
                state.personalInfo.name = document.getElementById('input-name').value.trim();
                state.personalInfo.email = document.getElementById('input-email').value.trim();
                state.personalInfo.phone = document.getElementById('input-phone').value.trim();
                state.currentStep = 3;
            } else if (state.currentStep === 3) {
                submitFinalOrder();
                return;
            }
            updateStepperUI();
        }

        function prevStep() {
            if (state.currentStep > 2) {
                state.currentStep--;
                updateStepperUI();
            }
        }

        // ==========================================
        // D. FINAL ORDER TRANSMISSION TO DATABASE
        // ==========================================
        async function submitFinalOrder() {
            if (state.timerInterval) clearInterval(state.timerInterval);

            const btnNext = document.getElementById('btn-next');
            btnNext.disabled = true;
            btnNext.innerText = "Processing...";

            const formData = new FormData();
            formData.append('buyer_name', state.personalInfo.name);
            formData.append('buyer_email', state.personalInfo.email);
            formData.append('buyer_phone', state.personalInfo.phone);
            formData.append('session_id', state.sessionId);
            formData.append('payment_proof', state.paymentProof);

            try {
                const response = await fetch('/jvlyn/checkout/store', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: formData
                });

                const result = await response.json();

                if (response.ok) {
                    window.location.href = `/jvlyn/summary/${result.order_id}`;
                } else {
                    showNotification(result.message || "Failed to submit order", "warning");
                    btnNext.disabled = false;
                    btnNext.innerText = "Complete Order";
                }
            } catch (error) {
                console.error("Submission Error:", error);
                showNotification("An error occurred during submission", "warning");
                btnNext.disabled = false;
                btnNext.innerText = "Complete Order";
            }
        }

        // ==========================================
        // E. TIMER MANAGEMENT
        // ==========================================
        function startTimer() {
            state.timerInterval = setInterval(() => {
                state.timeRemaining--;
                updateTimerUI();

                if (state.timeRemaining <= 0) {
                    clearInterval(state.timerInterval);
                    triggerTimeoutReset();
                }
            }, 1000);
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
            if (supabaseClient) {
                await supabaseClient
                    .from('cart_items')
                    .delete()
                    .eq('session_id', state.sessionId);
            }
            showAlertModal();
        }

        function showAlertModal() {
            const modal = document.getElementById('alert-modal');
            if (modal) modal.classList.remove('hidden');
        }

        // ==========================================
        // F. FILE PREVIEW & UPLOADER
        // ==========================================
        const dropZone = document.getElementById('drop-zone');
        const fileInput = document.getElementById('file-payment-proof');
        const uploadStatusText = document.getElementById('upload-status-text');

        if (dropZone && fileInput) {
            fileInput.addEventListener('change', handleFileSelect);

            ['dragenter', 'dragover'].forEach(eventName => {
                dropZone.addEventListener(eventName, e => {
                    e.preventDefault();
                    dropZone.classList.add('border-primary', 'bg-surface-variant/20');
                }, false);
            });

            ['dragleave', 'drop'].forEach(eventName => {
                dropZone.addEventListener(eventName, e => {
                    e.preventDefault();
                    dropZone.classList.remove('border-primary', 'bg-surface-variant/20');
                }, false);
            });

            dropZone.addEventListener('drop', e => {
                const dt = e.dataTransfer;
                const files = dt.files;
                if (files.length > 0) {
                    fileInput.files = files;
                    handleFileSelect();
                }
            });
        }

        function handleFileSelect() {
            if (fileInput.files.length > 0) {
                const file = fileInput.files[0];
                if (file.size > 5 * 1024 * 1024) {
                    showNotification("File size exceeds 5MB limit", "warning");
                    fileInput.value = '';
                    return;
                }

                state.paymentProof = file;

                const reader = new FileReader();
                reader.onload = e => {
                    document.getElementById('proof-img-preview').src = e.target.result;
                    document.getElementById('proof-filename').innerText = file.name;
                    document.getElementById('proof-preview-container').classList.remove('hidden');
                    uploadStatusText.innerText = "Receipt uploaded successfully!";
                    validateStep();
                };
                reader.readAsDataURL(file);
            }
        }

        function removeUploadedFile() {
            state.paymentProof = null;
            fileInput.value = '';
            document.getElementById('proof-preview-container').classList.add('hidden');
            uploadStatusText.innerText = "Drag & drop your transfer receipt image here";
            validateStep();
        }

        function copyToClipboard(text) {
            if (navigator.clipboard && navigator.clipboard.writeText) {
                navigator.clipboard.writeText(text).then(() => {
                    showNotification("Bank Account Number copied!", "success");
                });
            } else {
                showNotification("Bank Account Number copied!", "success");
            }
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
    </script>
</x-layout>
