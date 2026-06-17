<x-layout title="Event Dashboard | J V L Y N Panitia">
    <script src="https://cdn.jsdelivr.net/npm/@supabase/supabase-js@2"></script>

    <div class="w-full max-w-7xl mx-auto py-8 px-4 sm:px-6">
        <div class="flex flex-col items-center text-center mb-10 w-full">
            <span class="text-[11px] font-black tracking-[0.4em] uppercase text-primary mb-3 block">Admin Panel</span>
            <h1 class="text-3xl md:text-5xl font-black tracking-tight uppercase mb-2 text-on-surface">
                EVENT DASHBOARD
            </h1>
            <p class="text-xs uppercase tracking-widest text-on-surface-variant opacity-75">
                Real-time sales statistics and order data
            </p>
        </div>

        <!-- Real-time Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
            <div class="bg-surface border border-outline/10 p-6 shadow-sm">
                <p class="text-[10px] font-black uppercase tracking-widest text-on-surface-variant mb-2">Total Orders</p>
                <h3 class="text-3xl font-black text-on-surface">{{ $totalOrders }}</h3>
                <div class="mt-4 flex gap-2">
                    <span class="text-[9px] font-bold uppercase tracking-tighter px-2 py-0.5 bg-secondary/10 text-secondary border border-secondary/20">Paid: {{ $ordersByStatus['paid'] ?? 0 }}</span>
                    <span class="text-[9px] font-bold uppercase tracking-tighter px-2 py-0.5 bg-primary/10 text-primary border border-primary/20">Pending: {{ $ordersByStatus['pending'] ?? 0 }}</span>
                </div>
            </div>
            <div class="bg-surface border border-outline/10 p-6 shadow-sm">
                <p class="text-[10px] font-black uppercase tracking-widest text-on-surface-variant mb-2">Tickets Sold</p>
                <h3 class="text-3xl font-black text-on-surface">{{ array_sum($ticketsByType->toArray()) }}</h3>
                <div class="mt-4 flex flex-wrap gap-2">
                    @foreach($ticketsByType as $type => $count)
                        <span class="text-[9px] font-bold uppercase tracking-tighter px-2 py-0.5 bg-background border border-outline/10">{{ $type }}: {{ $count }}</span>
                    @endforeach
                </div>
            </div>
            <div class="bg-surface border border-outline/10 p-6 shadow-sm">
                <p class="text-[10px] font-black uppercase tracking-widest text-on-surface-variant mb-2">VIP Seats Available</p>
                <h3 class="text-3xl font-black text-secondary" id="realtime-vip">{{ $availableVIP }}</h3>
                <p class="text-[9px] text-on-surface-variant mt-2 uppercase font-bold tracking-widest">Real-time Syncing...</p>
            </div>
            <div class="bg-surface border border-outline/10 p-6 shadow-sm">
                <p class="text-[10px] font-black uppercase tracking-widest text-on-surface-variant mb-2">Items in Cart</p>
                <h3 class="text-3xl font-black text-primary" id="realtime-carts">{{ $cartsCount }}</h3>
                <p class="text-[9px] text-on-surface-variant mt-2 uppercase font-bold tracking-widest">Active Sessions</p>
            </div>
        </div>

        <!-- Main Data Table -->
        <div class="bg-surface border border-outline/10 shadow-sm overflow-hidden">
            <div class="p-6 border-b border-outline/10 flex justify-between items-center">
                <h3 class="text-lg font-black uppercase tracking-tight text-on-surface">Order Spreadsheet</h3>
                <button onclick="exportToCSV()" class="text-[10px] font-black uppercase tracking-widest bg-background border border-outline/20 px-4 py-2 hover:bg-surface-variant/30 transition-all">Export CSV</button>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs whitespace-nowrap">
                    <thead>
                        <tr class="bg-surface-variant/10 border-b border-outline/10">
                            <th class="p-4 uppercase font-black tracking-widest">Date</th>
                            <th class="p-4 uppercase font-black tracking-widest">Buyer</th>
                            <th class="p-4 uppercase font-black tracking-widest">Contact</th>
                            <th class="p-4 uppercase font-black tracking-widest">Tickets</th>
                            <th class="p-4 uppercase font-black tracking-widest">Total Price</th>
                            <th class="p-4 uppercase font-black tracking-widest">Status</th>
                            <th class="p-4 uppercase font-black tracking-widest">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-outline/5">
                        @foreach($allOrders as $order)
                            <tr class="hover:bg-surface-variant/5 transition-colors">
                                <td class="p-4 text-on-surface-variant">{{ $order->created_at->format('d/m/y H:i') }}</td>
                                <td class="p-4 font-bold text-on-surface">{{ $order->buyer_name }}</td>
                                <td class="p-4 text-on-surface-variant">{{ $order->buyer_phone }}</td>
                                <td class="p-4">
                                    <div class="flex flex-col gap-1">
                                        @foreach($order->tickets as $ticket)
                                            <div class="flex items-center gap-1">
                                                <span class="text-[9px] font-mono font-bold px-1.5 py-0.5 bg-background border border-outline/5 rounded-sm">{{ $ticket->ticket_id }} ({{ $ticket->ticket_type }})</span>
                                                <form action="{{ route('jvlyn.panit.ticket.delete', $ticket->id) }}" method="POST" onsubmit="return confirm('Hapus tiket ini?')">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="text-[10px] text-brand-red hover:underline">Delete</button>
                                                </form>
                                            </div>
                                        @endforeach
                                    </div>
                                </td>
                                <td class="p-4 font-black text-primary">IDR {{ number_format($order->price, 0, ',', '.') }}</td>
                                <td class="p-4">
                                    <span class="px-2 py-0.5 text-[9px] font-black uppercase tracking-widest border {{ $order->order_status === 'paid' ? 'bg-secondary/10 text-secondary border-secondary/20' : ($order->order_status === 'declined' ? 'bg-brand-red/10 text-brand-red border-brand-red/20' : 'bg-primary/10 text-primary border-primary/20') }}">
                                        {{ $order->order_status }}
                                    </span>
                                </td>
                                <td class="p-4">
                                    <div class="flex items-center gap-3">
                                        <a href="{{ route('jvlyn.summary', $order->id) }}" class="text-primary font-bold hover:underline">Details</a>
                                        <form action="{{ route('jvlyn.panit.order.delete', $order->id) }}" method="POST" onsubmit="return confirm('Hapus seluruh order ini?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-brand-red font-bold hover:underline">Delete Order</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if($allOrders->hasPages())
                <div class="p-6 border-t border-outline/10">
                    {{ $allOrders->links() }}
                </div>
            @endif
        </div>
    </div>

    <script>
        // Supabase Real-time Sync
        (function() {
            const sbUrl = "{{ config('services.supabase.url') }}";
            const sbKey = "{{ config('services.supabase.key') }}";
            const sbClient = (typeof window.supabase !== 'undefined' && sbUrl && sbKey) ? window.supabase.createClient(sbUrl, sbKey) : null;

            if (sbClient) {
                async function fetchAndRenderStats() {
                    try {
                        const { data: seats } = await sbClient.from('vip_seats').select('seat_number, status');
                        const { data: carts } = await sbClient.from('cart_items').select('items');

                        const locked = new Set();
                        if (carts) {
                            carts.forEach(c => {
                                (c.items || []).forEach(item => {
                                    if (item.category === 'vip-seat' && item.seat_number) {
                                        locked.add(item.seat_number);
                                    }
                                });
                            });
                        }

                        if (seats) {
                            const available = seats.filter(s => {
                                const code = s.seat_number || s.seat_code || s.id;
                                return s.status === 'available' && !locked.has(code);
                            }).length;
                            document.getElementById('realtime-vip').innerText = available;
                        }

                        if (carts) {
                            const active = carts.filter(c => c.items && c.items.length > 0).length;
                            document.getElementById('realtime-carts').innerText = active;
                        }
                    } catch (e) {
                        console.error("Dashboard Stats Fetch Error:", e);
                    }
                }

                // Subscribe to VIP Seats
                sbClient.channel('dashboard-seats')
                    .on('postgres_changes', { event: '*', schema: 'public', table: 'vip_seats' }, fetchAndRenderStats)
                    .subscribe();

                // Subscribe to Cart Changes
                sbClient.channel('dashboard-carts')
                    .on('postgres_changes', { event: '*', schema: 'public', table: 'cart_items' }, fetchAndRenderStats)
                    .subscribe();
            }
        })();

        function exportToCSV() {
            // Simple CSV export logic can be implemented here
            alert("Exporting CSV...");
        }
    </script>
</x-layout>
