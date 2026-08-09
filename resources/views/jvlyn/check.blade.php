<x-layout title="Check Entry Pass | J V L Y N">
    <div class="w-full max-w-4xl mx-auto py-12 px-4 sm:px-6">
        <div class="flex flex-col items-center text-center mb-10 w-full">
            <span class="text-[11px] font-black tracking-[0.4em] uppercase text-primary mb-3 block">Self Service</span>
            <h1 class="text-3xl md:text-5xl font-black tracking-tight uppercase mb-2 text-on-surface">
                CHECK YOUR ENTRY PASS
            </h1>
            <p class="text-xs uppercase tracking-widest text-on-surface-variant opacity-75">
                Retrieve your QR codes by entering your order details
            </p>
        </div>

        <div class="bg-surface border border-outline/10 p-8 shadow-sm mb-10">
            <form action="{{ route('jvlyn.entry_pass.check.post') }}" method="POST" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-on-surface-variant">Full
                            Name</label>
                        <input type="text" name="name" required placeholder="Joshua Sitorus"
                            class="w-full bg-background border border-outline/20 px-4 py-3 text-sm focus:outline-none focus:border-primary text-on-surface">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-on-surface-variant">Email
                            Address</label>
                        <input type="email" name="email" required placeholder="joshua@joshua.com"
                            class="w-full bg-background border border-outline/20 px-4 py-3 text-sm focus:outline-none focus:border-primary text-on-surface">
                    </div>
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-on-surface-variant">Phone
                        Number</label>
                    <input type="text" name="phone" required placeholder="08123456789"
                        class="w-full bg-background border border-outline/20 px-4 py-3 text-sm focus:outline-none focus:border-primary text-on-surface">
                </div>
                <button type="submit"
                    class="w-full bg-primary text-on-primary font-black uppercase text-xs tracking-[0.2em] py-4 hover:brightness-110 transition-all">
                    Find My Entry Pass
                </button>
            </form>
        </div>

        @if(isset($searched))
            @if($orders->isEmpty())
                <div class="bg-brand-red/5 border border-brand-red/20 p-6 text-center">
                    <p class="text-sm font-bold text-brand-red uppercase tracking-widest">No orders found with these details.
                    </p>
                </div>
            @else
                <div class="space-y-8">
                    @foreach($orders as $order)
                        <div class="bg-surface border border-outline/10 overflow-hidden">
                            <div class="p-6 border-b border-outline/10 bg-surface-variant/5 flex justify-between items-center">
                                <div>
                                    <h3 class="text-sm font-black uppercase tracking-widest text-on-surface">Order #{{ $order->id }}
                                    </h3>
                                    <p class="text-[10px] text-on-surface-variant uppercase mt-1">
                                        {{ $order->created_at->format('d M Y') }} • {{ $order->order_status }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-[10px] font-black uppercase text-on-surface-variant">Total Paid</p>
                                    <p class="text-sm font-black text-primary">IDR {{ number_format($order->price, 0, ',', '.') }}
                                    </p>
                                </div>
                            </div>
                            <div class="p-6">
                                @if($order->order_status === 'pending')
                                    <div class="py-12 text-center">
                                        <span class="material-symbols-outlined text-4xl text-primary mb-3">hourglass_empty</span>
                                        <p class="text-sm font-black uppercase tracking-widest text-on-surface">Order waiting for
                                            confirmation</p>
                                        <p class="text-[10px] text-on-surface-variant mt-2 uppercase tracking-tight">Your payment is
                                            being reviewed by our team.</p>
                                    </div>
                                @elseif($order->order_status === 'declined')
                                    <div class="py-12 text-center">
                                        <span class="material-symbols-outlined text-4xl text-brand-red mb-3">error</span>
                                        <p class="text-sm font-black uppercase tracking-widest text-brand-red">Order Declined</p>
                                        <p class="text-[10px] text-on-surface-variant mt-2 uppercase tracking-tight">Please contact our
                                            contact person for more information.</p>
                                    </div>
                                @elseif($order->order_status === 'paid')
                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                        @foreach($order->tickets as $ticket)
                                            <div class="flex flex-col items-center text-center p-4 border border-outline/5 bg-background">
                                                <div class="mb-4 p-2 bg-white rounded-lg">
                                                    {!! QrCode::size(150)->generate($ticket->ticket_id) !!}
                                                </div>
                                                <p class="text-[10px] font-black uppercase tracking-tighter text-on-surface">
                                                    {{ $ticket->ticket_type }}</p>
                                                <p class="text-xs font-mono font-bold text-primary mt-1">{{ $ticket->ticket_id }}</p>
                                                @if($ticket->seat_number)
                                                    <p
                                                        class="text-[9px] font-black bg-secondary/10 text-secondary px-2 py-0.5 mt-2 rounded-full border border-secondary/20">
                                                        SEAT {{ $ticket->seat_number }}</p>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="py-12 text-center">
                                        <p class="text-sm font-black uppercase tracking-widest text-on-surface">Status:
                                            {{ $order->order_status }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        @endif
    </div>
</x-layout>