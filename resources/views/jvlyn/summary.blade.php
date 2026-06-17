<x-layout title="Order Summary | J V L Y N">
    <div class="w-full max-w-4xl mx-auto py-12 px-4 sm:px-6">
        <div class="flex flex-col items-center text-center mb-10">
            <div class="w-20 h-20 bg-secondary/20 text-secondary border border-secondary/30 flex items-center justify-center shadow-sm mb-6">
                <span class="material-symbols-outlined text-5xl">check_circle</span>
            </div>
            <h1 class="text-3xl md:text-5xl font-black tracking-tight uppercase mb-2 text-on-surface">
                ORDER SUCCESS
            </h1>
            <p class="text-xs uppercase tracking-widest text-on-surface-variant opacity-75">
                Thank you for your purchase. Your order is being processed.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-surface border border-outline/10 p-6 space-y-6">
                <h3 class="text-lg font-black uppercase tracking-tight text-on-surface border-b border-outline/10 pb-3">Buyer Information</h3>
                <div class="space-y-4">
                    <div>
                        <p class="text-[10px] uppercase text-on-surface-variant tracking-wider">Name</p>
                        <p class="text-sm font-bold text-on-surface">{{ $order->buyer_name }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] uppercase text-on-surface-variant tracking-wider">Email</p>
                        <p class="text-sm font-bold text-on-surface">{{ $order->buyer_email }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] uppercase text-on-surface-variant tracking-wider">Phone</p>
                        <p class="text-sm font-bold text-on-surface">{{ $order->buyer_phone }}</p>
                    </div>
                    <div class="pt-4 border-t border-outline/10">
                        <p class="text-[10px] uppercase text-on-surface-variant tracking-wider">Order Status</p>
                        <span class="inline-block px-3 py-1 text-[10px] font-black uppercase tracking-widest {{ $order->order_status === 'paid' ? 'bg-secondary text-on-primary' : 'bg-primary text-on-primary' }}">
                            {{ $order->order_status }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="bg-surface border border-outline/10 p-6 space-y-6">
                <h3 class="text-lg font-black uppercase tracking-tight text-on-surface border-b border-outline/10 pb-3">Payment Proof</h3>
                @if($order->payment_proof)
                    <div class="aspect-square w-full border border-outline/10 overflow-hidden bg-background">
                        <img src="{{ $order->payment_proof }}" alt="Payment Proof" class="w-full h-full object-contain">
                    </div>
                @else
                    <p class="text-xs text-on-surface-variant">No proof uploaded.</p>
                @endif
            </div>
        </div>

        <div class="mt-8 bg-surface border border-outline/10 p-6 space-y-6">
            <h3 class="text-lg font-black uppercase tracking-tight text-on-surface border-b border-outline/10 pb-3">Ticket Details</h3>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead>
                        <tr class="border-b border-outline/10">
                            <th class="py-3 uppercase tracking-widest font-black">Ticket ID</th>
                            <th class="py-3 uppercase tracking-widest font-black">Type</th>
                            <th class="py-3 uppercase tracking-widest font-black">Referral</th>
                            <th class="py-3 uppercase tracking-widest font-black">Price</th>
                            <th class="py-3 uppercase tracking-widest font-black">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-outline/5">
                        @foreach($order->tickets as $ticket)
                            <tr>
                                <td class="py-4 font-mono font-bold">{{ $ticket->ticket_id }}</td>
                                <td class="py-4 uppercase text-[10px]">{{ $ticket->ticket_type }}</td>
                                <td class="py-4 uppercase text-[10px] font-bold text-secondary">{{ $ticket->referral_code ?? '-' }}</td>
                                <td class="py-4 font-bold">IDR {{ number_format($ticket->price, 0, ',', '.') }}</td>
                                <td class="py-4">
                                    <span class="px-2 py-0.5 font-bold uppercase tracking-tighter text-[9px] {{ $ticket->ticket_status === 'pending_delivery' ? 'bg-secondary/10 text-secondary border border-secondary/20' : 'bg-primary/10 text-primary border border-primary/20' }}">
                                        {{ $ticket->ticket_status }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="flex justify-between items-center pt-6 border-t border-outline/10">
                <span class="text-sm font-black uppercase tracking-wider text-on-surface">Total Paid</span>
                <span class="text-xl font-black text-primary">IDR {{ number_format($order->price, 0, ',', '.') }}</span>
            </div>
        </div>

        <div class="mt-10 flex justify-center gap-4">
            <a href="/jvlyn" class="text-xs font-black uppercase tracking-widest bg-surface border border-outline/10 hover:bg-surface-variant/30 text-on-surface px-8 py-4 transition-colors">
                Back to Home
            </a>
        </div>
    </div>
</x-layout>
