<x-layout title="THANOS" extra="bg-surface">
    <x-slot:metadesc>
        <meta name="description" content="THANOS - Tes Harian Akademis Nomor Satu" />
    </x-slot:metadesc>

    <style>
        .dp-inner {
            width: 100%;
            max-width: 1536px;
            margin: 0 auto;
            padding: clamp(2rem, 8vh, 5rem) clamp(1rem, 6vw, 4.5rem);
        }
        .dp-h1 {
            font-size: clamp(2.5rem, 8vw, 6rem);
            font-weight: 950;
            line-height: 0.9;
            letter-spacing: -0.05em;
            text-transform: uppercase;
        }
        .dp-label {
            font-size: clamp(10px, 1.25vw, 14px);
            font-weight: 900;
            letter-spacing: 0.4em;
            text-transform: uppercase;
            color: var(--theme-primary-600);
            display: block;
            margin-bottom: 1rem;
        }
        .form-input {
            width: 100%;
            background: var(--theme-surface-variant);
            border: 1px solid color-mix(in srgb, var(--theme-outline) 20%, transparent);
            padding: 1rem;
            color: var(--theme-on-surface);
            transition: all 0.3s;
        }
        .form-input:focus {
            outline: none;
            border-color: var(--theme-primary-600);
            background: var(--theme-surface);
        }
        .choice-btn {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            background: var(--theme-surface-variant);
            border: 1px solid color-mix(in srgb, var(--theme-outline) 20%, transparent);
            cursor: pointer;
            transition: all 0.3s;
        }
        .choice-btn:hover {
            background: color-mix(in srgb, var(--theme-primary-600) 10%, var(--theme-surface-variant));
        }
        .choice-btn input:checked + span {
            color: var(--theme-primary-600);
            font-weight: 900;
        }
        .choice-btn:has(input:checked) {
            border-color: var(--theme-primary-600);
            background: color-mix(in srgb, var(--theme-primary-600) 5%, var(--theme-surface-variant));
        }
    </style>

    <main class="min-h-screen">
        @if($event)
        <section class="dp-inner">
            <div class="mb-12 md:mb-20 text-center md:text-left">
                <span class="dp-label">Akademis Present</span>
                <h1 class="dp-h1 mb-6">{{ $event->title }}</h1>

                {{-- Countdown --}}
                <div class="flex flex-col md:flex-row items-center gap-6 mt-10">
                    <div class="bg-primary text-on-primary px-6 py-3 font-black uppercase tracking-widest text-xs">
                        Deadline
                    </div>
                    <div id="thanos-countdown" class="text-3xl md:text-5xl font-black tracking-tighter flex gap-4" data-expiry="{{ $event->deadline->toIso8601String() }}">
                        <div class="flex flex-col items-center">
                            <span id="days">00</span>
                            <span class="text-[8px] uppercase tracking-widest opacity-60">Days</span>
                        </div>
                        <span class="opacity-30">:</span>
                        <div class="flex flex-col items-center">
                            <span id="hours">00</span>
                            <span class="text-[8px] uppercase tracking-widest opacity-60">Hours</span>
                        </div>
                        <span class="opacity-30">:</span>
                        <div class="flex flex-col items-center">
                            <span id="minutes">00</span>
                            <span class="text-[8px] uppercase tracking-widest opacity-60">Mins</span>
                        </div>
                        <span class="opacity-30">:</span>
                        <div class="flex flex-col items-center">
                            <span id="seconds">00</span>
                            <span class="text-[8px] uppercase tracking-widest opacity-60">Secs</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20">
                {{-- Left: Questions --}}
                <div class="space-y-8">
                    @if($event->questions)
                        @foreach($event->questions as $img)
                            <div class="border border-outline/10 p-2 bg-surface-variant/20">
                                @if(Str::startsWith($img, 'http'))
                                    <img src="{{ $img }}" alt="Question" class="w-full h-auto object-contain">
                                @else
                                    <img src="{{ asset($img) }}" alt="Question" class="w-full h-auto object-contain">
                                @endif
                            </div>
                        @endforeach
                    @endif
                </div>

                {{-- Right: Form --}}
                <div class="bg-surface-variant/30 border border-outline/20 p-6 md:p-10">
                    <form action="/submit-form" method="POST" class="space-y-8">
                        @csrf

                        <div>
                            <label class="dp-label !text-[10px] !mb-4">Your answer</label>
                            <input type="text" name="question" class="form-input" required placeholder="Type your answer here...">
                        </div>

                        <div class="space-y-4">
                            <div>
                                <label class="text-[10px] font-black uppercase tracking-widest opacity-60 mb-2 block">Full Name</label>
                                <input type="text" name="name" class="form-input" required placeholder="John Doe">
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="text-[10px] font-black uppercase tracking-widest opacity-60 mb-2 block">Payment Method</label>
                                    <select name="payment" class="form-input" required>
                                        <option value="Gopay">Gopay</option>
                                        <option value="Dana">Dana</option>
                                        <option value="Transfer">Transfer Bank</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="text-[10px] font-black uppercase tracking-widest opacity-60 mb-2 block">Payment Number</label>
                                    <input type="text" name="paymentNumber" class="form-input" required placeholder="08123456789">
                                </div>
                            </div>

                            <div>
                                <label class="text-[10px] font-black uppercase tracking-widest opacity-60 mb-2 block">Username IG</label>
                                <input type="text" name="usnig" class="form-input" required placeholder="@username">
                            </div>
                        </div>

                        <button type="submit" id="submit-btn" class="w-full bg-primary text-on-primary font-black uppercase tracking-widest py-5 hover:brightness-110 transition-all">
                            Submit Answer
                        </button>
                    </form>
                </div>
            </div>
        </section>
        @else
        <section class="dp-inner min-h-[70vh] flex flex-col justify-center items-center text-center">
            <span class="dp-label">Status</span>
            <h1 class="dp-h1 opacity-20">NO ACTIVE EVENT</h1>
            <p class="mt-4 opacity-60 uppercase tracking-widest text-xs">Check back later for the next THANOS event.</p>
        </section>
        @endif
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const countdownEl = document.getElementById('thanos-countdown');
            if (countdownEl) {
                const expiry = new Date(countdownEl.dataset.expiry).getTime();
                const submitBtn = document.getElementById('submit-btn');

                const update = setInterval(function() {
                    const now = new Date().getTime();
                    const diff = expiry - now;

                    if (diff <= 0) {
                        clearInterval(update);
                        countdownEl.innerHTML = "<span class='text-primary uppercase tracking-widest text-xl'>EVENT EXPIRED</span>";
                        if (submitBtn) {
                            submitBtn.disabled = true;
                            submitBtn.style.opacity = '0.5';
                            submitBtn.innerText = 'EVENT EXPIRED';
                        }
                        return;
                    }

                    const d = Math.floor(diff / (1000 * 60 * 60 * 24));
                    const h = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    const m = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                    const s = Math.floor((diff % (1000 * 60)) / 1000);

                    document.getElementById('days').innerText = d.toString().padStart(2, '0');
                    document.getElementById('hours').innerText = h.toString().padStart(2, '0');
                    document.getElementById('minutes').innerText = m.toString().padStart(2, '0');
                    document.getElementById('seconds').innerText = s.toString().padStart(2, '0');
                }, 1000);
            }
        });
    </script>
</x-layout>
