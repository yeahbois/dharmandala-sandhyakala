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
                                            <span class="text-[9px] font-mono font-bold px-1.5 py-0.5 bg-background border border-outline/5 rounded-sm">{{ $ticket->ticket_id }} ({{ $ticket->ticket_type }})</span>
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
                                    <a href="{{ route('jvlyn.summary', $order->id) }}" class="text-primary font-bold hover:underline">Details</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        // Supabase Real-time Sync
        const supabaseUrl = "{{ config('services.supabase.url') }}";
        const supabaseKey = "{{ config('services.supabase.key') }}";
        const supabase = supabaseUrl && supabaseKey ? window.supabase.createClient(supabaseUrl, supabaseKey) : null;

        if (supabase) {
            // Subscribe to VIP Seats
            supabase.channel('dashboard-seats')
                .on('postgres_changes', { event: '*', schema: 'public', table: 'vip_seats' }, async () => {
                    const { data } = await supabase.from('vip_seats').select('id, status');
                    const available = data.filter(s => s.status === 'available').length;
                    document.getElementById('realtime-vip').innerText = available;
                })
                .subscribe();

            // Subscribe to Cart Changes
            supabase.channel('dashboard-carts')
                .on('postgres_changes', { event: '*', schema: 'public', table: 'cart_items' }, async () => {
                    const { data } = await supabase.from('cart_items').select('items');
                    const active = data.filter(c => c.items && c.items.length > 0).length;
                    document.getElementById('realtime-carts').innerText = active;
                })
                .subscribe();
        }

        function exportToCSV() {
            // Simple CSV export logic can be implemented here
            alert("Exporting CSV...");
        }
    </script>
</x-layout>
