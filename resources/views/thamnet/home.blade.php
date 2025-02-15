<x-layout title="Thamnet - Beranda" keywords="thamnet, blog, akademis">
    <meta name="description" content="Belajar jadi lebih seru dengan program akademis OSIS! Yuk, cek blog kami untuk info lengkap tentang kegiatan pendidikan terbaru!">
    <meta property="og:title" content="Thamrin Network - OSIS MPK SMA Negeri Unggulan M. H. Thamrin 2024/2025">
    <meta property="og:description" content="Penasaran dengan program akademis OSIS? Baca blog terbaru tentang event, workshop, dan bimbingan belajar yang bisa kamu ikuti!">
    <meta property="og:image" content="https://ospkmhthamrin.com/images/logo/osis/akad.webp">

    <div class="flex flex-1 flex-col justify-center items-center">
        <section class="w-full h-screen flex flex-col justify-center items-center bg-center bg-cover">
            <div class="flex flex-col min-h-[calc(100vh-95px)] items-center justify-center px-8">
                <div class="flex flex-col sm:flex-row justify-center space-x-4 max-w-full">
                    <!-- OSIS -->
                    <img src="{{ asset('/images/logo/general/osis514.webp') }}" width="250" alt="Logo 1">
        
                    <!-- AKAD -->
                    <img src="{{ asset('/images/logo/osis/akad514.webp') }}" width="250" alt="Logo 2">
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
    </div>
</x-layout>