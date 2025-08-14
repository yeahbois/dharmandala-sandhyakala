<x-layout title="THANOS" extra="bg-gradient-to-r from-blue-500 to-teal-500">
    {{-- <x-slot:metadesc>
        <meta name="THANOS - Beranda" content="">
    </x-slot:metadesc> --}}
    <section class="w-full flex justify-center items-center">
        <div class="bg-white mt-8 p-8 rounded-lg shadow-xl w-full max-w-4xl">
            <h2 class="text-4xl font-semibold text-center text-gray-800 mb-8">Formulir Jawaban THANOS</h2>
            
            <form action="/submit-form" method="POST">
                @csrf
                <!-- Question with Image -->
                <div class="mb-6 flex flex-col items-center">
                    <label class="block text-gray-700 text-lg font-semibold mb-4">Pilih jawaban yang benar:</label>
                    <div class="flex justify-center items-center mb-6 rounded-lg shadow-md">
                    <img src="https://cdn.discordapp.com/attachments/887673617335345173/1404048336868212817/2_2.jpg?ex=6899c569&is=689873e9&hm=24bf2ea6a7eca9a6b5b348d9b32730b4ab7b2e868105f05c36d9c9f4860f58f7&" alt="Question Image" class="w-96 rounded-l-lg">
                    <img src="https://cdn.discordapp.com/attachments/887673617335345173/1404048336868212817/2_2.jpg?ex=6899c569&is=689873e9&hm=24bf2ea6a7eca9a6b5b348d9b32730b4ab7b2e868105f05c36d9c9f4860f58f7&" alt="Question Image" class="w-96 rounded-l-lg">
                        <div class="flex flex-col pr-6 items-center space-y-4 w-full max-w-md mx-auto">
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
                </div>

                <!-- Name -->
                <div class="mb-6">
                    <label for="name" class="block text-gray-700 text-lg font-semibold mb-2">Nama Lengkap</label>
                    <input type="text" id="name" name="name" class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-lg" required>
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
                    <label for="usnig" class="block text-gray-700 text-lg font-semibold mb-2">Username IG</label>
                    <input type="text" id="usnig" name="usnig" class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-lg" required>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-center">
                    <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 text-lg">Kirim</button>
                </div>
            </form>
        </div>
    </section>

</x-layout>

<style>
    /* For larger screens, add margin to the question box */
    @media (min-width: 1024px) {
        .form-radio {
            margin-left: 20px;
        }
    }
</style>
