<x-layout title="OSIS MPK MHT">
    <x-slot:metadesc>
        <meta name="description" content="Klik sekarang untuk menemukan kegiatan seru, proyek keren, dan cara ikut berkontribusi!">
        <meta property="og:title" content="Beranda OSIS MPK SMA Negeri Unggulan M. H. Thamrin 2024/2025">
        <meta property="og:description" content="Cari tahu event terbaru OSIS MPK MHT dan ikut berkontribusi dalam kegiatan sekolah!">
        <meta property="og:image" content="https://ospkmhthamrin.com/images/potrait/ospkfull.jpg ">
    </x-slot:metadesc>

    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-50 to-gray-100 font-sans p-4 sm:p-6">
        <div class="bg-white w-full max-w-md p-6 sm:p-8 rounded-2xl shadow-lg border border-gray-100 text-center transition-all duration-300 hover:shadow-xl">
            <div class="mb-6">
                <h1 class="text-2xl sm:text-3xl font-bold text-gray-800">Tiket Antrian PudoBooth</h1>
                <p class="text-sm text-gray-500 mt-2">Isi data untuk mendapatkan nomor antrianmu!</p>
            </div>

            {{-- ✅ Queue Form --}}
            <form id="queueForm" class="space-y-5 text-left">
                @csrf
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                    <input 
                        type="text" 
                        id="nama" 
                        name="nama" 
                        required
                        placeholder="Contoh: Dominic Budiyanto"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200 outline-none shadow-sm"
                    >
                </div>

                <div>
                    <label for="tipe_antrian" class="block text-sm font-medium text-gray-700 mb-2">Tipe Antrian</label>
                    <select 
                        id="tipe_antrian" 
                        name="tipe_antrian" 
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200 outline-none shadow-sm bg-white"
                    >
                        <option value="" disabled selected>Pilih tipe antrian</option>
                        <option value="NORMAL">Normal</option>
                        <option value="PRIVATE">Private</option>
                    </select>
                </div>

                <button type="submit"
                    class="w-full bg-gradient-to-r from-green-500 to-emerald-600 text-white py-3.5 rounded-xl font-semibold text-lg shadow-md hover:from-green-600 hover:to-emerald-700 transition-all duration-300 transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-50">
                    Ambil Tiket Antrian
                </button>
            </form>

            <div class="mt-8 pt-6 border-t border-gray-100">
                <p class="text-gray-600">
                    Antrian saat ini: 
                    <span id="queue-count" class="font-bold text-green-600 text-lg">0</span>
                </p>
            </div>
        </div>
    </div>

    <script>
        // 🔹 Live queue counter
        async function fetchQueueCount() {
            try {
                const res = await fetch("{{ route('queue.data') }}");
                if (!res.ok) return console.warn('Queue count fetch failed:', res.status);

                const payload = await res.json();
                const count = Array.isArray(payload)
                    ? payload.length
                    : (payload.count ?? (typeof payload === 'number' ? payload : 0));

                document.getElementById('queue-count').textContent = count ?? 0;
            } catch (err) {
                console.error('fetchQueueCount error:', err);
            }
        }
        fetchQueueCount();
        setInterval(fetchQueueCount, 5000);

        // 🔹 Handle form submit (AJAX)
        document.getElementById('queueForm').addEventListener('submit', async (e) => {
            e.preventDefault();

            const formData = new FormData(e.target);
            const res = await fetch("{{ route('queue.create') }}", {
                method: 'POST',
                body: formData,
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
            });

            if (res.ok) {
                // Redirect to homepage with success message
                const pbNum = await fetch("{{ route('queue.data') }}");
                const plNum = await pbNum.json();
                const numCount = Array.isArray(plNum)
                    ? plNum.length
                    : (plNum.count ?? (typeof plNum === 'number' ? plNum : 0));
                window.location.href = "/?success=1&pbnum=" + numCount;
            } else {
                alert("⚠️ Terjadi kesalahan, coba lagi!");
            }
        });
    </script>
</x-layout>