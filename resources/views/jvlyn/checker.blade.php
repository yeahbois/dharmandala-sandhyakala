<x-layout title="Order Checker | J V L Y N Panitia">
    <div class="w-full max-w-6xl mx-auto py-8 px-4 sm:px-6">
        <div class="flex flex-col items-center text-center mb-10 w-full">
            <span class="text-[11px] font-black tracking-[0.4em] uppercase text-primary mb-3 block">Admin Panel</span>
            <h1 class="text-3xl md:text-5xl font-black tracking-tight uppercase mb-2 text-on-surface">
                ORDER CHECKER
            </h1>
            <p class="text-xs uppercase tracking-widest text-on-surface-variant opacity-75">
                Review and verify incoming entry pass orders
            </p>
        </div>

        @if($orders->isEmpty())
            <div class="bg-surface border border-outline/10 p-12 text-center">
                <span class="material-symbols-outlined text-5xl text-on-surface-variant/30 mb-4">inbox</span>
                <p class="text-sm font-bold text-on-surface-variant uppercase tracking-widest">No pending orders to check
                </p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($orders as $order)
                    <div class="bg-surface border border-outline/10 flex flex-col h-full shadow-sm">
                        <div class="p-5 border-b border-outline/10 flex justify-between items-start">
                            <div>
                                <h3 class="text-base font-black text-on-surface uppercase">{{ $order->buyer_name }}</h3>
                                <div class="flex items-center gap-2">
                                    <p class="text-[10px] text-on-surface-variant font-bold uppercase tracking-wider">
                                        {{ $order->created_at->format('d M Y, H:i') }}</p>
                                    <a href="{{ route('jvlyn.summary', $order->id) }}"
                                        class="text-[10px] text-primary font-black uppercase hover:underline tracking-widest">Details</a>
                                </div>
                            </div>
                            <span
                                class="bg-primary/10 text-primary border border-primary/20 px-2 py-0.5 text-[9px] font-black uppercase tracking-widest">Pending</span>
                        </div>

                        <div class="p-5 flex-grow space-y-4">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <p class="text-[9px] uppercase text-on-surface-variant tracking-wider font-bold">Phone</p>
                                    <p class="text-xs font-bold text-on-surface">{{ $order->buyer_phone }}</p>
                                </div>
                                <div>
                                    <p class="text-[9px] uppercase text-on-surface-variant tracking-wider font-bold">Total Price
                                    </p>
                                    <p class="text-xs font-black text-primary">IDR
                                        {{ number_format($order->price, 0, ',', '.') }}</p>
                                </div>
                            </div>

                            <div>
                                <p class="text-[9px] uppercase text-on-surface-variant tracking-wider font-bold mb-2">Entry Pass
                                    ({{ $order->total_tickets }})</p>
                                <div class="space-y-1.5">
                                    @foreach($order->tickets as $ticket)
                                        <div
                                            class="flex justify-between items-center text-[10px] bg-background p-2 border border-outline/5">
                                            <span class="font-mono font-bold">{{ $ticket->ticket_id }}</span>
                                            <span class="uppercase opacity-70">{{ $ticket->ticket_type }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            @if($order->payment_proof)
                                <div class="pt-2">
                                    <p class="text-[9px] uppercase text-on-surface-variant tracking-wider font-bold mb-2">Payment
                                        Proof</p>
                                    <a href="{{ $order->payment_proof }}" target="_blank"
                                        class="block aspect-video w-full border border-outline/10 overflow-hidden bg-background group relative">
                                        <img src="{{ $order->payment_proof }}" alt="Proof"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                        <div
                                            class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity">
                                            <span class="text-[10px] font-black text-white uppercase tracking-widest">View Full
                                                Image</span>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        </div>

                        <div class="p-4 border-t border-outline/10 grid grid-cols-2 gap-3 bg-surface-variant/10">
                            <form action="{{ route('jvlyn.panit.status.update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="order_id" value="{{ $order->id }}">
                                <input type="hidden" name="action" value="decline">
                                <button type="submit"
                                    class="w-full py-2.5 bg-background border border-outline/20 text-on-surface-variant text-[10px] font-black uppercase tracking-widest hover:bg-brand-red/10 hover:text-brand-red hover:border-brand-red/30 transition-all">Decline</button>
                            </form>
                            <form action="{{ route('jvlyn.panit.status.update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="order_id" value="{{ $order->id }}">
                                <input type="hidden" name="action" value="approve">
                                <button type="submit"
                                    class="w-full py-2.5 bg-primary text-on-primary text-[10px] font-black uppercase tracking-widest hover:opacity-90 transition-all shadow-sm">Approve</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-layout>