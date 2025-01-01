<x-layout title="Thamnet - Open House 2025">
    {{-- <x-slot:metadesc>
        <meta name="Thamnet - Open House 2025" content="">
    </x-slot:metadesc> --}}

    {{-- Hero Section --}}
    <section class="relative w-full h-[50vh] flex flex-col justify-center items-center bg-center bg-cover" style="background-image: url('{{ asset('/images/blog/open-house-2025.jpg') }}');">
        <div class="absolute inset-0 w-full h-full bg-black opacity-30"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center">
            <h1 class="font-bold text-5xl text-white">Open House SMAN Unggulan M.H. Thamrin 2025</h1>
            <p class="mt-2 text-lg text-white">Discover Your Future at SMAN Unggulan M.H. Thamrin</p>
        </div>
    </section>

    {{-- Blog Content --}}
    <main class="container mx-auto px-4 py-12">
        {{-- Title and Date --}}
        <div class="mb-8">
        <p class="text-gray-600 mt-2">Tanggal:</p>
        <div class="text-center">
            <ul class="list-none">
                <li><span class="font-semibold text-gray-800">Sabtu, 8 Februari 2025</span> (Day 1)</li>
                <li><span class="font-semibold text-gray-800">Minggu, 9 Februari 2025</span> (Day 2)</li>
            </ul>
        </div>
        <p class="text-gray-600">Waktu: <span class="font-medium text-gray-800">06:30 WIB - 16:30 WIB</span></p>
        <p class="text-gray-600">Lokasi: <span class="font-medium text-gray-800">SMAN Unggulan M.H. Thamrin</span></p>
        </div>


        {{-- Countdown Timer --}}
        <div class="text-center mb-12">
            <p class="text-lg text-gray-700">Hitung Mundur</p>
            <x-countdown date="2025-02-08 06:30:00" />
        </div>

        {{-- What is Open House --}}
        <section class="mb-12">
            <h3 class="text-2xl font-semibold mb-4">Apa itu Open House?</h3>
            <p>
            𝐎𝐏𝐄𝐍 𝐇𝐎𝐔𝐒𝐄 𝐒𝐌𝐀𝐍 𝐔𝐧𝐠𝐠𝐮𝐥𝐚𝐧 𝐌.𝐇. 𝐓𝐡𝐚𝐦𝐫𝐢𝐧 merupakan acara tahunan yang diselenggarakan oleh SMAN Unggulan M.H. Thamrin yang berisi pengenalan dan penjelasan lebih dalam mengenai SMAN Unggulan M.H. Thamrin. 
            Acara ini sangat cocok untuk kamu yang ingin bersekolah di SMAN Unggulan M.H. Thamrin!
            </p>
        </section>

        {{-- Event Highlights --}}
        <section class="mb-12">
            <h3 class="text-2xl font-semibold mb-4">Highlight Acara</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="p-4 border rounded-lg shadow-md">
                    <p>⭐ <strong>Tour de MHT 🌏</strong>: Eksplorasi SMAN Unggulan M.H. Thamrin!</p>
                </div>
                <div class="p-4 border rounded-lg shadow-md">
                    <p>⭐ <strong>Class Simulation 🧑🏻‍🏫</strong>: Experience a day in the life of an MHT student.</p>
                </div>
                <div class="p-4 border rounded-lg shadow-md">
                    <p>⭐ <strong>Sharing Session 💬</strong>: Learn from our alumni and students.</p>
                </div>
                <div class="p-4 border rounded-lg shadow-md">
                    <p>⭐ <strong>Meet the Medalists 🏆</strong>: Interact with our award-winning students.</p>
                </div>
                <div class="p-4 border rounded-lg shadow-md">
                    <p>⭐ <strong>MHT Things 🏫</strong>: Discover what makes our school unique.</p>
                </div>
                <div class="p-4 border rounded-lg shadow-md">
                    <p>⭐ <strong>Tryout with Prizes 💸</strong>: Participate in a tryout with total prizes worth millions of Rupiah!</p>
                </div>
            </div>
        </section>

        {{-- Benefits --}}
        <section class="mb-12">
            <h3 class="text-2xl font-semibold mb-4">Manfaat yang Dapat Diperoleh</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="p-4 border rounded-lg shadow-md">
                    <p>✔ Gain valuable insights into our academic and extracurricular programs.</p>
                </div>
                <div class="p-4 border rounded-lg shadow-md">
                    <p>✔ Interact with students, teachers, and alumni to hear firsthand experiences.</p>
                </div>
                <div class="p-4 border rounded-lg shadow-md">
                    <p>✔ Participate in engaging hands-on activities and demonstrations.</p>
                </div>
                <div class="p-4 border rounded-lg shadow-md">
                    <p>✔ Learn about the admissions process.</p>
                </div>
                <div class="p-4 border rounded-lg shadow-md">
                    <p>✔ Explore our modern facilities and vibrant dorm life.</p>
                </div>
            </div>
        </section>

        {{-- Registration and Ticket Information --}}
        <section class="mb-12">
            <h3 class="text-2xl font-semibold mb-4">Registration & Tickets</h3>
            <p>Register now through the link below:</p>
            <p class="text-blue-600 underline"><a href="#">[Insert Registration Link Here]</a></p>
            <p class="mt-4">🎟 Ticket Prices:</p>
            <ul class="list-disc pl-6 space-y-2">
                <li>Presale Ticket (1-16 January 2025):</li>
                <ul class="pl-6">
                    <li>Rp150,000 (Individual)</li>
                    <li>Rp170,000 (With 1 Parent)</li>
                </ul>
            </ul>
            <p class="mt-4 font-bold">❗ Limited slots available for each batch! ❗</p>
        </section>

        {{-- Contact Information --}}
        <section class="mb-12">
            <h3 class="text-2xl font-semibold mb-4">Contact Information</h3>
            <p>For more information, follow us on:</p>
            <p>📱 Instagram and TikTok: <a href="https://instagram.com/osismpktthamrin" class="font-medium text-blue-600">@osismpktthamrin</a></p>
            <p class="mt-4">Or reach out to our representatives:</p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="p-4 border rounded-lg shadow-md">
                    <p>👤 <strong>Aurell</strong></p>
                    <p>📞 087788005635</p>
                    <p>📷 <a href="https://instagram.com/aurelliashafina" class="text-blue-600">@aurelliashafina</a></p>
                    <p>LINE: aurelliashfn</p>
                </div>
                <div class="p-4 border rounded-lg shadow-md">
                    <p>👤 <strong>Ara</strong></p>
                    <p>📞 085771074407</p>
                    <p>📷 <a href="https://instagram.com/azkyazahra.p" class="text-blue-600">@azkyazahra.p</a></p>
                    <p>LINE: azkyazahraa</p>
                </div>
                <div class="p-4 border rounded-lg shadow-md">
                    <p>👤 <strong>Balqis</strong></p>
                    <p>📞 081586297119</p>
                    <p>📷 <a href="https://instagram.com/blqisrueee_" class="text-blue-600">@blqisrueee_</a></p>
                    <p>LINE: blqisruee</p>
                </div>
            </div>
        </section>
    </main>
</x-layout>