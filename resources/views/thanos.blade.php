<x-layout title="THANOS">
    {{-- <x-slot:metadesc>
        <meta name="THANOS - Beranda" content="">
    </x-slot:metadesc> --}}

    <section class="w-full h-screen flex justify-center items-center bg-gradient-to-r from-blue-500 to-teal-500">
        <div class="bg-white p-8 rounded-lg shadow-xl w-full max-w-4xl">
            <h2 class="text-4xl font-semibold text-center text-gray-800 mb-8">Formulir Jawaban THANOS</h2>
            
            <form action="/submit-form" method="POST">
                @csrf
                
                <!-- Question with Image -->
                <div class="mb-6 flex flex-col items-center">
                    <label class="block text-gray-700 text-lg font-semibold mb-4">Pilih jawaban yang benar:</label>
                    <div class="flex justify-center mb-6">
                        <img src="{{ asset('/images/etc/pertanyaan-thanos-online.png') }}" alt="Question Image" class="w-96 h-96 object-cover rounded-lg shadow-md">
                    </div>
                    <div class="flex flex-col items-center space-y-4 w-full max-w-md mx-auto">
                        <label class="inline-flex items-center text-gray-700 text-lg">
                            <input type="radio" name="question" value="a" class="form-radio text-blue-500" required>
                            <span class="ml-2">A. Jawaban A</span>
                        </label>
                        <label class="inline-flex items-center text-gray-700 text-lg">
                            <input type="radio" name="question" value="b" class="form-radio text-blue-500">
                            <span class="ml-2">B. Jawaban B</span>
                        </label>
                        <label class="inline-flex items-center text-gray-700 text-lg">
                            <input type="radio" name="question" value="c" class="form-radio text-blue-500">
                            <span class="ml-2">C. Jawaban C</span>
                        </label>
                        <label class="inline-flex items-center text-gray-700 text-lg">
                            <input type="radio" name="question" value="d" class="form-radio text-blue-500">
                            <span class="ml-2">D. Jawaban D</span>
                        </label>
                        <label class="inline-flex items-center text-gray-700 text-lg">
                            <input type="radio" name="question" value="e" class="form-radio text-blue-500">
                            <span class="ml-2">E. Jawaban E</span>
                        </label>
                    </div>
                </div>

                <!-- Name -->
                <div class="mb-6">
                    <label for="name" class="block text-gray-700 text-lg font-semibold mb-2">Nama Lengkap</label>
                    <input type="text" id="name" name="name" class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-lg" required>
                </div>

                <!-- Ticket Purchase -->
                <div class="mb-6">
                    <label class="block text-gray-700 text-lg font-semibold mb-2">Sudah membeli tiket?</label>
                    <div class="flex justify-center space-x-6">
                        <label class="inline-flex items-center text-gray-700 text-lg">
                            <input type="radio" name="ticket" value="yes" class="form-radio text-blue-500" id="ticketYes" required>
                            <span class="ml-2">Ya</span>
                        </label>
                        <label class="inline-flex items-center text-gray-700 text-lg">
                            <input type="radio" name="ticket" value="no" class="form-radio text-blue-500" id="ticketNo" required>
                            <span class="ml-2">Tidak</span>
                        </label>
                    </div>
                </div>

                <!-- Conditional Question for Ticket Purchase -->
                <div id="ticketDay" class="mb-6 hidden">
                    <label class="block text-gray-700 text-lg font-semibold mb-2">Pilih hari yang ada ditiket:</label>
                    <div class="flex justify-center space-x-6">
                        <label class="inline-flex items-center text-gray-700 text-lg">
                            <input type="radio" name="day" value="1" class="form-radio text-blue-500" required>
                            <span class="ml-2">Hari 1</span>
                        </label>
                        <label class="inline-flex items-center text-gray-700 text-lg">
                            <input type="radio" name="day" value="2" class="form-radio text-blue-500" required>
                            <span class="ml-2">Hari 2</span>
                        </label>
                    </div>
                </div>

                <!-- Payment Method and Number -->
                <div class="mb-6">
                    <label for="payment" class="block text-gray-700 text-lg font-semibold mb-2">Metode Pembayaran</label>
                    <select name="payment" id="payment" class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-lg" required>
                        <option value="Gopay">Gopay</option>
                        <option value="Dana">Dana</option>
                        <option value="Transfer">Transfer Bank</option>
                    </select>
                </div>

                <div class="mb-6">
                    <label for="paymentNumber" class="block text-gray-700 text-lg font-semibold mb-2">Nomor Pembayaran</label>
                    <input type="text" id="paymentNumber" name="paymentNumber" class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-lg" required>
                </div>

                <!-- Phone Number -->
                <div class="mb-6">
                    <label for="phone" class="block text-gray-700 text-lg font-semibold mb-2">Nomor Telepon</label>
                    <input type="text" id="phone" name="phone" class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-lg" required>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-center">
                    <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 text-lg">Kirim</button>
                </div>
            </form>
        </div>
    </section>

    <script>
        // Show conditional question based on ticket purchase
        document.getElementById('ticketYes').addEventListener('change', function() {
            document.getElementById('ticketDay').classList.remove('hidden');
        });

        document.getElementById('ticketNo').addEventListener('change', function() {
            document.getElementById('ticketDay').classList.add('hidden');
        });
    </script>

</x-layout>

<style>
    /* For larger screens, add margin to the question box */
    @media (min-width: 1024px) {
        .form-radio {
            margin-left: 20px;
        }
    }
</style>