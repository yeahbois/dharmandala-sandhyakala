<x-layout title="OSIS MPK MHT">
    {{-- <x-slot:metadesc>
        <meta name="Beranda OSIS MPK SMA Unggulan M. H. Thamrin" content="

        ">
    </x-slot:metadesc> --}}
    <div id="toast-default" class="z-10 flex items-center p-4 w-fit text-gray-500 bg-white rounded-lg shadow-lg dark:text-gray-400 dark:bg-gray-800" role="alert">
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-orange-500 bg-orange-200 rounded-lg dark:bg-blue-800 dark:text-blue-200">
            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.147 15.085a7.159 7.159 0 0 1-6.189 3.307A6.713 6.713 0 0 1 3.1 15.444c-2.679-4.513.287-8.737.888-9.548A4.373 4.373 0 0 0 5 1.608c1.287.953 6.445 3.218 5.537 10.5 1.5-1.122 2.706-3.01 2.853-6.14 1.433 1.049 3.993 5.395 1.757 9.117Z"/>
            </svg>
            <span class="sr-only">Fire icon</span>
        </div>
        <div class="ms-3 text-sm font-normal mr-2">
            <span>Open House 2025 is live!</span>
            <a href="https://docs.google.com/forms/d/e/1FAIpQLSctBxnZDjKLNZgjrpIdWjhxpGdmUnKCTN-f8J7OR11P_CPGHg/viewform?usp=dialog" class="inline underline text-blue-500 hover:text-blue-600">Learn more</a>
        </div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-default" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
    <section class="-mt-[128px] w-full h-[100vh] flex flex-col justify-center items-center">
        <div class="flex flex-col items-center justify-center py-4">
            <img src={{ asset('images/logo/general/ospk384.webp') }}>
            <h1 class="font-bold text-6xl">
                Agradama Navaleksa
            </h1>
            <p class="mt-1 text-gray-500">
                Selamat datang di beranda OSIS SMA Negeri Unggulan M. H. Thamrin, 2024/2025.
            </p>
        </div>
        {{-- <div class="space-x-4">
            <button class="p-3 rounded-lg bg-blue-600 border-blue-600 hover:bg-blue-700 focus:bg-blue-700 hover:border-blue-700 focus:border-blue-700 text-white border-2 font-semibold">
                <a href="#featured">
                    Featured
                </a>
            </button>
            <button class="p-3 rounded-lg border-black hover:bg-slate-100 focus:bg-slate-100 border-2 font-semibold">
                <a href="/program-kerja">
                    Program Kerja
                </a>
            </button>
        </div> --}}
    </section>
    <main id="featured" class="flex flex-col flex-grow max-w-[1080px] w-full items-center h-full py-12 space-y-24">
        {{-- <div id="default-carousel" class="relative w-full" data-carousel="static">
            <!-- Carousel wrapper -->
            <div class="relative h-120 overflow-hidden rounded-lg md:h-96">
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                    <img src="{{ asset('images/one.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    <a href="/program-kerja/akademis/mamacu-kakacu" class="absolute block px-8 py-10 bottom-0 left-0 text-4xl font-bold text-white hover:underline">
                        Mamacu Kakacu
                    </a>
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('images/two.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    <a href="https://www.instagram.com/thamrinolymcup" target="_blank" class="absolute block px-8 py-10 bottom-0 left-0 text-4xl font-bold text-white hover:underline">
                        TOC 15
                    </a>
                </div>
                <!-- Item 3 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('images/three.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    <a href="https://www.instagram.com/thamrinolymcup" target="_blank" class="absolute block px-8 py-10 bottom-0 left-0 text-4xl font-bold text-white hover:underline">
                        JVLYN 9.0
                    </a>
                </div>
            </div>
            <!-- Slider indicators -->
            <!-- <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
            </div> -->
            <!-- Slider controls -->
            <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div> --}}
        <!-- Logo Meaning -->
        <section class="flex flex-col sm:flex-row sm:space-x-3 justify-center items-center">
            <img src="{{ asset('images/logo/general/ospk228.webp') }}">
            <div class="w-full sm:w-5/6 text-center sm:text-left">
                <h2 class="font-semibold text-4xl mb-3 text-black">
                    Our Logo
                </h2>
                <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                    <ul class="px-2 sm:p-0 flex flex-wrap justify-center sm:justify-start -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
                        <li class="me-2" role="presentation">
                            <button class="inline-block p-4 border-b-2 rounded-t-lg" id="sayap-tab" data-tabs-target="#sayap" type="button" role="tab" aria-controls="sayap" aria-selected="false">Sayap</button>
                        </li>
                        <li class="me-2" role="presentation">
                            <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="perisai-tab" data-tabs-target="#perisai" type="button" role="tab" aria-controls="perisai" aria-selected="false">Perisai</button>
                        </li>
                        <li class="me-2" role="presentation">
                            <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="mahkota-tab" data-tabs-target="#mahkota" type="button" role="tab" aria-controls="mahkota" aria-selected="false">Mahkota</button>
                        </li>
                        <li role="presentation">
                            <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="banner-tab" data-tabs-target="#banner" type="button" role="tab" aria-controls="banner" aria-selected="false">Banner</button>
                        </li>
                        <li role="presentation">
                            <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="neraca-tab" data-tabs-target="#neraca" type="button" role="tab" aria-controls="neraca" aria-selected="false">Neraca</button>
                        </li>
                        <li role="presentation">
                            <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="bintang-tab" data-tabs-target="#bintang" type="button" role="tab" aria-controls="bintang" aria-selected="false">Bintang</button>
                        </li>
                        <li role="presentation">
                            <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="anakpanah-tab" data-tabs-target="#anakpanah" type="button" role="tab" aria-controls="anakpanah" aria-selected="false">Anak Panah</button>
                        </li>
                        <li role="presentation">
                            <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="pedang-tab" data-tabs-target="#pedang" type="button" role="tab" aria-controls="pedang" aria-selected="false">Pedang</button>
                        </li>
                        <li role="presentation">
                            <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="warna-tab" data-tabs-target="#warna" type="button" role="tab" aria-controls="warna" aria-selected="false">Warna</button>
                        </li>
                    </ul>
                </div>
                <div id="default-tab-content">
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="sayap" role="tabpanel" aria-labelledby="sayap-tab">
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Elang dengan sayap dan ekor yang jumlah seluruhnya mencapai 69, melambangkan <strong class="font-medium text-gray-800 dark:text-white">jumlah anggota OSIS dan MPK kabinet Agradama Navaleksa</strong>. Setiap sayap mewakili ambisi dan kekuatan, sedangkan ekor menggambarkan keseimbangan dan arah. Gabungan elemen-elemen ini mencerminkan sinergi serta kontribusi unik dari setiap individu dalam kabinet, yang bersama-sama menciptakan sebuah kekuatan kolektif yang tangguh dan visioner.
                        </p>
                    </div>
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="perisai" role="tabpanel" aria-labelledby="perisai-tab">
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Perisai melambangkan <strong class="font-medium text-gray-800 dark:text-white">perlindungan dan kekuatan</strong>, mencerminkan <strong class="font-medium text-gray-800 dark:text-white">stabilitas dan ketahanan</strong>, serta menandakan <strong class="font-medium text-gray-800 dark:text-white">komitmen terhadap keamanan dan tanggung jawab</strong> dalam menghadapi tantangan yang akan datang pada masa mendatang.
                        </p>
                    </div>
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="mahkota" role="tabpanel" aria-labelledby="mahkota-tab">
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Mahkota merepresentasikan <strong class="font-medium text-gray-800 dark:text-white">keagungan</strong>, serta <strong class="font-medium text-gray-800 dark:text-white">kemewahan</strong>, sekaligus menjadi simbol <strong class="font-medium text-gray-800 dark:text-white">kehormatan, kebijaksanaan, dan kejayaan</strong> dalam berbagai sektor.
                        </p>
                    </div>
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="banner" role="tabpanel" aria-labelledby="banner-tab">
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Banner bertuliskan Agradama Navaleksa yang merupakan <strong class="font-medium text-gray-800 dark:text-white">nama kabinet</strong> kepengurusan OSIS MPK SMA Negeri Unggulan M.H. Thamrin masa bakti 2024/2025. Nama tersebut ditempatkan pada banner sebagai identitas kabinet yang akan menjalankan tugas dan tanggung jawab kepemimpinan pada periode tersebut.<br><br>
                            Adapun nama Agradama Navaleksa merupakan singkatan dari <strong class="font-medium text-gray-800 dark:text-white">Agranaya Mahadhama Navadhara Leksa</strong> yang berarti <strong class="font-medium text-gray-800 dark:text-white">elang muda tangguh membawa inovasi dengan ikatan yang kuat untuk perubahan masa depan</strong>.
                        </p>
                    </div>
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="neraca" role="tabpanel" aria-labelledby="neraca-tab">
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Neraca bermakna <strong class="font-medium text-gray-800 dark:text-white">keadilan sosial</strong> sebagai salah satu dasar MPK dalam mengambil keputusan, tidak berat sebelah, dan tidak pandang bulu dalam menciptakan keadilan.
                        </p>
                    </div>
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="bintang" role="tabpanel" aria-labelledby="bintang-tab">
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Bintang dengan jumlah 5 berarti <strong class="font-medium text-gray-800 dark:text-white">MPK melihat dari sudut pandang yang berbeda</strong> tidak terfokuskan terhadap 1 masalah saja, serta 5 bintang pelambang Pancasila sebagai falsafah bangsa Indonesia dan pedoman MPK dalam berorganisasi.
                        </p>
                    </div>
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="anakpanah" role="tabpanel" aria-labelledby="anakpanah-tab">
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Simbol anak panah yang dikelilingi oleh api merepresentasikan OSIS sebagai <strong class="font-medium text-gray-800 dark:text-white">organisasi yang penuh semangat dan berdedikasi tinggi</strong>. Anak panah melambangkan <strong class="font-medium text-gray-800 dark:text-white">arah yang jelas dan ketepatan</strong> 
                            dalam setiap tindakan OSIS, sementara api mencerminkan <strong class="font-medium text-gray-800 dark:text-white">semangat yang menyala, kekuatan, dan kemampuan untuk menghadapi tantangan</strong> dengan energi yang tak terhentikan. Kombinasi ini menggambarkan OSIS sebagai penggerak perubahan yang terus maju tanpa henti, menghadapi rintangan dengan tekad kuat dan selalu berusaha membawa dampak positif bagi seluruh siswa.
                        </p>
                    </div>
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="pedang" role="tabpanel" aria-labelledby="pedang-tab">
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Tiga pedang utama mencerminkan <strong class="font-medium text-gray-800 dark:text-white">ketua umum dan kedua ketua bidangnya dalam OSIS</strong>, melambangkan kepemimpinan yang kuat dan kesatuan visi yang menginspirasi. Setiap pedang mewakili dedikasi dan peran vital dalam membimbing serta mendukung organisasi, menggambarkan kerja sama yang harmonis, keberanian dalam menghadapi tantangan, dan komitmen yang tak tergoyahkan untuk mencapai tujuan bersama.
                        </p>
                    </div>
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="warna" role="tabpanel" aria-labelledby="warna-tab">
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            <strong class="font-medium text-gray-800 dark:text-white">Warna biru</strong> diartikan sebagai warna alam semesta, yang melambangkan <strong class="font-medium text-gray-800 dark:text-white">cinta, bijaksana, hebat, besar, dan kokoh</strong>.<br>
                            <strong class="font-medium text-gray-800 dark:text-white">Warna emas</strong> melambangkan <strong class="font-medium text-gray-800 dark:text-white">kehormatan, kejayaan, dan nilai-nilai yang berharga</strong>. Dalam konteks ini, warna emas mencerminkan prestasi tinggi dan tanggung jawab yang mulia dari kepengurusan. Ini menunjukkan cita-cita kabinet untuk mencapai kesuksesan dan memberikan kontribusi terbaik bagi sekolah.<br>
                            <strong class="font-medium text-gray-800 dark:text-white">Warna putih</strong> merepresentasikan <strong class="font-medium text-gray-800 dark:text-white">kemurnian, kejujuran, dan transparansi</strong>. Ini mencerminkan niat tulus dari kepengurusan untuk menjalankan tugas mereka dengan penuh integritas dan tanpa kepentingan pribadi.<br>
                            <strong class="font-medium text-gray-800 dark:text-white">Warna merah</strong> pada logo merepresentasikan <strong class="font-medium text-gray-800 dark:text-white">semangat, keberanian, dan kekuatan dalam menjalankan tanggung jawab</strong>. Warna ini melambangkan energi dinamis dan komitmen kuat OSIS dalam menghadapi tantangan serta mengambil keputusan tegas untuk kemajuan bersama. Selain itu, merah mencerminkan sikap penuh tanggung jawab OSIS dalam memajukan kegiatan siswa dan mendorong perubahan positif di lingkungan sekolah.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Link to /merchandise -->
        {{-- <section class="bg-white dark:bg-gray-900">
            <h3 class="text-6xl font-semibold">
                Merchandise
            </h3>
            <p class="mt-1 text-gray-500">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat minus obcaecati minima laboriosam expedita officia accusantium quo asperiores eaque maxime, temporibus culpa quia cumque optio enim sequi, amet corrupti adipisci?
            </p>
            <div class="my-8">
                <img src="{{ asset('images/sae vs rin.png') }}" alt="">
            </div>
            <a href="/merchandise" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                Get started
                <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </a>
        </section> --}}
    </main>
</x-layout>
