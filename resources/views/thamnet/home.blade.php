<x-layout title="Thamnet - Beranda">
    {{-- <x-slot:metadesc>
        <meta name="Thamnet - Beranda" content="

        ">
    </x-slot:metadesc> --}}

        <section class="relative -mt-[64px] w-full h-[100vh] flex flex-col justify-center items-center bg-center bg-cover">
        <div class="absolute inset-0 w-full h-full">
            <!-- Pseudo-background for watermark -->
            <div style="background-image: url('{{ asset('/images/logo/general/osis.webp') }}'); background-size: contain; background-repeat: no-repeat; background-position: center; opacity: 0.5; width: 100%; height: 100%; pointer-events: none;">
            </div>
        </div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center w-full h-full flex flex-col items-center justify-center">
            <h1 class="font-bold text-6xl text-black">
                Selamat datang di Thamnet
            </h1>
            <p class="mt-1 text-black-300">
                Thamnet adalah salah satu program kerja seksi Akademis dalam bentuk website blog yang terintegrasi dengan website OSIS SMAN Unggulan M.H. Thamrin kabinet Agradama Navaleksa.
            </p>
        </div>
        </section>


    <main id="featured" class="flex flex-col flex-grow max-w-[1080px] w-full items-center h-full py-12 space-y-24">
        <section class="w-full flex flex-col items-center">
            <h2 class="font-semibold text-4xl mb-6 text-black">Blog Terbaru</h2>
            <div class="w-full md:w-3/4 lg:w-2/3 bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-6">
                    <h3 class="text-2xl font-medium text-gray-800">Hall of Fame Prestasi SMAN Unggulan M.H. Thamrin</h3>
                    <p class="mt-2 text-sm text-gray-600">Digitalisasi sesi pemotretan kepada peserta didik yang memenangkan medali OSN tingkat nasional maupun lomba tingkat internasional sebagai bentuk publikasi prestasi dan apresiasi dari pihak sekolah kepada peserta didik yang berprestasi.</p>
                    <a href="/thamnet/blog/hall-of-fame" class="mt-4 inline-block text-sm text-blue-600 font-semibold">Baca Selengkapnya →</a>
                </div>
                <div class="p-6">
                    <h3 class="text-2xl font-medium text-gray-800">Open House SMAN Unggulan M.H. Thamrin</h3>
                    <p class="mt-2 text-sm text-gray-600">Acara tahunan yang diselenggarakan oleh SMAN Unggulan M.H. Thamrin yang berisi pengenalan dan penjelasan lebih dalam mengenai SMAN Unggulan M.H. Thamrin. Acara ini sangat cocok untuk kamu yang ingin bersekolah di SMAN Unggulan M.H. Thamrin!</p>
                    <a href="/thamnet/blog/openhouse2025" class="mt-4 inline-block text-sm text-blue-600 font-semibold">Baca Selengkapnya →</a>
                </div>
            </div>
        </section>
    </main>
</x-layout>
