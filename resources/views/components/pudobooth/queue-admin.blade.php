<div class="max-w-5xl mx-auto bg-white p-6 rounded-2xl shadow-md">
    <div class="flex justify-between items-center border-b pb-4 mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Current Queue</h2>
        <div class="flex items-center gap-3">
            <span id="queue-total" class="text-lg font-medium text-blue-600">Total: 0</span>
            <button id="refresh-btn"
                class="px-3 py-1 bg-blue-100 hover:bg-blue-200 text-blue-700 rounded transition">
                🔄 Refresh
            </button>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-700">
            <thead class="bg-gray-100 uppercase text-xs font-semibold text-gray-600">
                <tr>
                    <th class="px-4 py-3">#</th>
                    <th class="px-4 py-3">Nama</th>
                    <th class="px-4 py-3">Tipe Antrian</th>
                    <th class="px-4 py-3">Jumlah</th>
                    <th class="px-4 py-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody id="queue-table" class="divide-y divide-gray-200">
                <tr>
                    <td colspan="6" class="text-center text-gray-400 py-6">Queue is currently empty.</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    const queueTable = document.getElementById('queue-table');
    const queueTotal = document.getElementById('queue-total');
    const refreshBtn = document.getElementById('refresh-btn');

    // 🟦 Fetch and render queue
    async function fetchQueue(showLoading = true) {
        if (showLoading)
            queueTable.innerHTML = `<tr><td colspan="6" class="text-center text-gray-400 py-6">Loading...</td></tr>`;

        const res = await fetch(`{{ route('queue.data') }}`);
        const data = await res.json();

        queueTable.innerHTML = '';
        queueTotal.textContent = `Total: ${data.length}`;

        if (data.length === 0) {
            queueTable.innerHTML = `<tr><td colspan="6" class="text-center text-gray-400 py-6">Queue is currently empty.</td></tr>`;
            return;
        }

        data.forEach((item, index) => {
            const tr = document.createElement('tr');
            tr.classList.add('hover:bg-gray-50', 'transition');
            tr.innerHTML = `
                <td class="px-4 py-2 font-medium">${index + 1}</td>
                <td class="px-4 py-2">${item.nama}</td>
                <td class="px-4 py-2">${item.tipe}</td>
                <td class="px-4 py-2">
                    <input type="number" min="1" value="1"
                        class="jumlah-input w-20 border-gray-300 rounded-md text-center focus:ring focus:ring-blue-200">
                </td>
                <td class="px-4 py-2 text-center space-x-1">
                    <button onclick="queueActions.moveUp('${item.nama}')" class="px-2 py-1 bg-yellow-100 hover:bg-yellow-200 text-yellow-700 rounded">↑</button>
                    <button onclick="queueActions.moveDown('${item.nama}')" class="px-2 py-1 bg-yellow-100 hover:bg-yellow-200 text-yellow-700 rounded">↓</button>
                    <button onclick="queueActions.moveTop('${item.nama}')" class="px-2 py-1 bg-yellow-100 hover:bg-yellow-200 text-yellow-700 rounded">⇡</button>
                    <button onclick="queueActions.moveBottom('${item.nama}')" class="px-2 py-1 bg-yellow-100 hover:bg-yellow-200 text-yellow-700 rounded">⇣</button>
                    <button onclick="queueActions.completeItem('${item.nama}', this)" class="px-3 py-1 bg-green-100 hover:bg-green-200 text-green-700 rounded">Complete</button>
                </td>
            `;
            queueTable.appendChild(tr);
        });
    }

    // 🟩 Queue Actions
    const queueActions = {
        async completeItem(name, btn) {
            const jumlahInput = btn.closest('tr').querySelector('.jumlah-input');
            const jumlah = jumlahInput.value;

            if (!jumlah || jumlah < 0) {
                alert("⚠️ Masukkan jumlah yang valid sebelum menyelesaikan item.");
                return;
            }

            if (!confirm(`Selesaikan ${name} dengan jumlah ${jumlah}?`)) return;

            await fetch(`/queue/complete`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ name, jumlah })
            });
            // Remove from queue
            await fetch(`/queue/remove/${name}`, {
                method: 'DELETE',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
            });

            fetchQueue(false);
        },

        async moveUp(name) {
            await fetch(`/queue/move-up/${name}`, {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
            });
            fetchQueue(false);
        },

        async moveDown(name) {
            await fetch(`/queue/move-down/${name}`, {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
            });
            fetchQueue(false);
        },

        async moveTop(name) {
            await fetch(`/queue/move-top/${name}`, {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
            });
            fetchQueue(false);
        },

        async moveBottom(name) {
            await fetch(`/queue/move-bottom/${name}`, {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
            });
            fetchQueue(false);
        }
    };

    // 🟦 Manual refresh
    refreshBtn.addEventListener('click', () => fetchQueue(true));

    // Initial load
    fetchQueue(true);
</script>