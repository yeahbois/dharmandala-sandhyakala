<x-layout title="Thamnet - Beranda">
    {{-- <x-slot:metadesc>
        <meta name="Thamnet - Beranda" content="">
    </x-slot:metadesc> --}}

    <section class="w-full h-[100vh] flex flex-col justify-center items-center bg-center bg-cover">
        <div class="flex flex-col items-center justify-center px-8">
            <div class="flex flex-row justify-center space-x-4">
                <!-- OSIS -->
                <img src="{{ asset('/images/logo/general/osis.webp') }}" class="w-[250px] object-cover" alt="Logo 1">
                
                <!-- AKAD -->
                <img src="{{ asset('/images/logo/osis/akad.webp') }}" class="w-[250px] object-cover" alt="Logo 2">
            </div>
            <h1 class="mb-2 font-bold text-6xl text-black mt-8">
                Selamat datang di Thamnet
            </h1>
            <p class="mb-4 text-black-300">
                Thamnet adalah salah satu program kerja seksi Akademis dalam bentuk website blog yang terintegrasi dengan website OSIS SMAN Unggulan M.H. Thamrin kabinet Agradama Navaleksa.
            </p>
        </div>
    </section>

    <main id="featured" class="flex flex-col flex-grow max-w-[1080px] w-full items-center h-full py-12 space-y-24">
        <section class="w-full flex flex-col items-center">
            <h2 class="font-semibold text-4xl mb-6 text-black">Blog Terbaru</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full px-4 md:px-0">
                <!-- Blog Card 1 -->
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="p-6">
                        <h3 class="text-2xl font-medium text-gray-800">Hall of Fame Prestasi SMAN Unggulan M.H. Thamrin</h3>
                        <p class="mt-2 text-sm text-gray-600">Digitalisasi sesi pemotretan kepada peserta didik yang memenangkan medali OSN tingkat nasional maupun lomba tingkat internasional sebagai bentuk publikasi prestasi dan apresiasi dari pihak sekolah kepada peserta didik yang berprestasi.</p>
                        <a href="/thamnet/blog/hall-of-fame" class="mt-4 inline-block text-sm text-blue-600 font-semibold">Baca Selengkapnya →</a>
                    </div>
                </div>

                <!-- Blog Card 2 -->
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="p-6">
                        <h3 class="text-2xl font-medium text-gray-800">Open House SMAN Unggulan M.H. Thamrin</h3>
                        <p class="mt-2 text-sm text-gray-600">Acara tahunan yang diselenggarakan oleh SMAN Unggulan M.H. Thamrin yang berisi pengenalan dan penjelasan lebih dalam mengenai SMAN Unggulan M.H. Thamrin. Acara ini sangat cocok untuk kamu yang ingin bersekolah di SMAN Unggulan M.H. Thamrin!</p>
                        <a href="/thamnet/blog/openhouse2025" class="mt-4 inline-block text-sm text-blue-600 font-semibold">Baca Selengkapnya →</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-layout>

<style>
    /* Gaya untuk container gambar */
/* .image-container {
    display: flex;
    justify-content: center;
    gap: 10px;  */
    /* Jarak antar gambar */
    /* flex-wrap: nowrap;  */
    /* Mencegah gambar membungkus ke bawah */
    /* padding: 0 20px;  */
    /* Memberikan padding kiri dan kanan */
/* } */

/* Gaya untuk gambar */
/* .image {
    width: 284px;
    height: 284px;
    object-fit: cover;  */
    /* Menjaga gambar tetap proporsional */
/* } */

/* Responsif: Gambar akan lebih kecil pada layar lebih kecil */
@media (max-width: 768px) {
    .image {
        width: 250px;
        height: 250px;
    }

    /* Memberikan margin atas, kiri, dan kanan pada layar kecil */
    .image-container {
        margin-top: 80px; /* Margin atas */
        margin-left: 70px; /* Margin kiri */
        margin-right: 70px; /* Margin kanan */
    }
}

</style>