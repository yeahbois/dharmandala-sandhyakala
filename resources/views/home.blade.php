<x-layout title="OSIS MPK MHT">
    {{-- <x-slot:metadesc>
        <meta name="Beranda OSIS MPK SMA Unggulan M. H. Thamrin" content="

        ">
    </x-slot:metadesc> --}}
    <section style="background-image:url('{{ asset('images/potrait/darkened_ospkfull.jpg') }}')" class="-mt-[95px] w-full min-h-screen p-4 sm:p-16 flex flex-col justify-center items-center bg-center bg-cover">
        <div class="flex flex-col items-center justify-center px-8">
            <img src={{ asset('images/logo/general/ospk514.webp') }}>
            <h1 class="mb-4 font-bold text-4xl sm:text-6xl md:text-8xl text-white">
                OSIS SMA Negeri Unggulan M. H. Thamrin
            </h1>
            <p class="mb-4 text-xl md:text-4xl text-gray-300">
                Selamat datang di beranda Agradama Navaleksa, 2024/2025.
            </p>
            <button onclick="document.getElementById('hamburger').click();" class="lg:hidden py-4 px-4 mb-16 rounded-lg bg-transparent border-yellow-400 hover:bg-yellow-400/75 focus:bg-yellow-400/75 hover:border-transparent focus:border-yellow-400/75 text-white border-2 text-xl font-semibold">
                Get to know us!
            </button>
        </div>
    </section>
    <main id="featured" class="flex flex-col flex-grow w-full items-center">
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
        
        <section style="background-image:url('{{ asset('images/proker/bph/stuban_smkn8/darkened_IMG_0122.webp') }}')" class="bg-cover bg-bottom min-h-screen w-full flex flex-col sm:space-x-3 pb-16 justify-center items-center">
            <div class="flex flex-row px-8">
                <div>
                    <img src="{{ asset('images/logo/general/osis514.webp') }}">
                </div>
                <div>
                    <img src="{{ asset('images/logo/general/mpk514.webp') }}">
                </div>
            </div>
            <h2 class="font-semibold text-6xl sm:text-8xl mb-3 text-white">
                Our Logo
            </h2>
            <div class="w-full sm:w-5/6 text-center sm:text-left">
                <div>
                    <ul class="px-4 flex flex-wrap justify-center -mb-px text-xl font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
                        <li role="presentation">
                            <button class="inline-block p-4 border-b-2 rounded-t-lg text-slate-300 border-slate-300 hover:text-slate-100 hover:border-slate-100 aria-selected:text-blue-500 aria-selected:border-blue-500" id="sayap-tab" data-tabs-target="#sayap" type="button" role="tab" aria-controls="sayap" aria-selected="true">Sayap</button>
                        </li>
                        <li role="presentation">
                            <button class="inline-block p-4 border-b-2 rounded-t-lg text-slate-300 border-slate-300 hover:text-slate-100 hover:border-slate-100 aria-selected:text-blue-500 aria-selected:border-blue-500" id="perisai-tab" data-tabs-target="#perisai" type="button" role="tab" aria-controls="perisai" aria-selected="false">Perisai</button>
                        </li>
                        <li role="presentation">
                            <button class="inline-block p-4 border-b-2 rounded-t-lg text-slate-300 border-slate-300 hover:text-slate-100 hover:border-slate-100 aria-selected:text-blue-500 aria-selected:border-blue-500" id="mahkota-tab" data-tabs-target="#mahkota" type="button" role="tab" aria-controls="mahkota" aria-selected="false">Mahkota</button>
                        </li>
                        <li role="presentation">
                            <button class="inline-block p-4 border-b-2 rounded-t-lg text-slate-300 border-slate-300 hover:text-slate-100 hover:border-slate-100 aria-selected:text-blue-500 aria-selected:border-blue-500" id="banner-tab" data-tabs-target="#banner" type="button" role="tab" aria-controls="banner" aria-selected="false">Banner</button>
                        </li>
                        <li role="presentation">
                            <button class="inline-block p-4 border-b-2 rounded-t-lg text-slate-300 border-slate-300 hover:text-slate-100 hover:border-slate-100 aria-selected:text-blue-500 aria-selected:border-blue-500" id="neraca-tab" data-tabs-target="#neraca" type="button" role="tab" aria-controls="neraca" aria-selected="false">Neraca</button>
                        </li>
                        <li role="presentation">
                            <button class="inline-block p-4 border-b-2 rounded-t-lg text-slate-300 border-slate-300 hover:text-slate-100 hover:border-slate-100 aria-selected:text-blue-500 aria-selected:border-blue-500" id="bintang-tab" data-tabs-target="#bintang" type="button" role="tab" aria-controls="bintang" aria-selected="false">Bintang</button>
                        </li>
                        <li role="presentation">
                            <button class="inline-block p-4 border-b-2 rounded-t-lg text-slate-300 border-slate-300 hover:text-slate-100 hover:border-slate-100 aria-selected:text-blue-500 aria-selected:border-blue-500" id="anakpanah-tab" data-tabs-target="#anakpanah" type="button" role="tab" aria-controls="anakpanah" aria-selected="false">Anak Panah</button>
                        </li>
                        <li role="presentation">
                            <button class="inline-block p-4 border-b-2 rounded-t-lg text-slate-300 border-slate-300 hover:text-slate-100 hover:border-slate-100 aria-selected:text-blue-500 aria-selected:border-blue-500" id="pedang-tab" data-tabs-target="#pedang" type="button" role="tab" aria-controls="pedang" aria-selected="false">Pedang</button>
                        </li>
                        <li role="presentation">
                            <button class="inline-block p-4 border-b-2 rounded-t-lg text-slate-300 border-slate-300 hover:text-slate-100 hover:border-slate-100 aria-selected:text-blue-500 aria-selected:border-blue-500" id="warna-tab" data-tabs-target="#warna" type="button" role="tab" aria-controls="warna" aria-selected="false">Warna</button>
                        </li>
                    </ul>
                </div>
                <div id="default-tab-content" class="mb-8">
                    <div class="hidden p-4 rounded-lg" id="sayap" role="tabpanel" aria-labelledby="sayap-tab">
                        <p class="text-lg text-slate-300">
                            Elang dengan sayap dan ekor yang jumlah seluruhnya mencapai 69, melambangkan <strong class="font-semibold">jumlah anggota OSIS dan MPK kabinet Agradama Navaleksa</strong>. Setiap sayap mewakili ambisi dan kekuatan, sedangkan ekor menggambarkan keseimbangan dan arah. Gabungan elemen-elemen ini mencerminkan sinergi serta kontribusi unik dari setiap individu dalam kabinet, yang bersama-sama menciptakan sebuah kekuatan kolektif yang tangguh dan visioner.
                        </p>
                    </div>
                    <div class="hidden p-4 rounded-lg" id="perisai" role="tabpanel" aria-labelledby="perisai-tab">
                        <p class="text-lg text-slate-300">
                            Perisai melambangkan <strong class="font-semibold">perlindungan dan kekuatan</strong>, mencerminkan <strong class="font-semibold">stabilitas dan ketahanan</strong>, serta menandakan <strong class="font-semibold">komitmen terhadap keamanan dan tanggung jawab</strong> dalam menghadapi tantangan yang akan datang pada masa mendatang.
                        </p>
                    </div>
                    <div class="hidden p-4 rounded-lg" id="mahkota" role="tabpanel" aria-labelledby="mahkota-tab">
                        <p class="text-lg text-slate-300">
                            Mahkota merepresentasikan <strong class="font-semibold">keagungan</strong>, serta <strong class="font-semibold">kemewahan</strong>, sekaligus menjadi simbol <strong class="font-semibold">kehormatan, kebijaksanaan, dan kejayaan</strong> dalam berbagai sektor.
                        </p>
                    </div>
                    <div class="hidden p-4 rounded-lg" id="banner" role="tabpanel" aria-labelledby="banner-tab">
                        <p class="text-lg text-slate-300">
                            Banner bertuliskan Agradama Navaleksa yang merupakan <strong class="font-semibold">nama kabinet</strong> kepengurusan OSIS MPK SMA Negeri Unggulan M.H. Thamrin masa bakti 2024/2025. Nama tersebut ditempatkan pada banner sebagai identitas kabinet yang akan menjalankan tugas dan tanggung jawab kepemimpinan pada periode tersebut.<br><br>
                            Adapun nama Agradama Navaleksa merupakan singkatan dari <strong class="font-semibold">Agranaya Mahadhama Navadhara Leksa</strong> yang berarti <strong class="font-semibold">elang muda tangguh membawa inovasi dengan ikatan yang kuat untuk perubahan masa depan</strong>.
                        </p>
                    </div>
                    <div class="hidden p-4 rounded-lg" id="neraca" role="tabpanel" aria-labelledby="neraca-tab">
                        <p class="text-lg text-slate-300">
                            Neraca bermakna <strong class="font-semibold">keadilan sosial</strong> sebagai salah satu dasar MPK dalam mengambil keputusan, tidak berat sebelah, dan tidak pandang bulu dalam menciptakan keadilan.
                        </p>
                    </div>
                    <div class="hidden p-4 rounded-lg" id="bintang" role="tabpanel" aria-labelledby="bintang-tab">
                        <p class="text-lg text-slate-300">
                            Bintang dengan jumlah 5 berarti <strong class="font-semibold">MPK melihat dari sudut pandang yang berbeda</strong> tidak terfokuskan terhadap 1 masalah saja, serta 5 bintang pelambang Pancasila sebagai falsafah bangsa Indonesia dan pedoman MPK dalam berorganisasi.
                        </p>
                    </div>
                    <div class="hidden p-4 rounded-lg" id="anakpanah" role="tabpanel" aria-labelledby="anakpanah-tab">
                        <p class="text-lg text-slate-300">
                            Simbol anak panah yang dikelilingi oleh api merepresentasikan OSIS sebagai <strong class="font-semibold">organisasi yang penuh semangat dan berdedikasi tinggi</strong>. Anak panah melambangkan <strong class="font-semibold">arah yang jelas dan ketepatan</strong> 
                            dalam setiap tindakan OSIS, sementara api mencerminkan <strong class="font-semibold">semangat yang menyala, kekuatan, dan kemampuan untuk menghadapi tantangan</strong> dengan energi yang tak terhentikan. Kombinasi ini menggambarkan OSIS sebagai penggerak perubahan yang terus maju tanpa henti, menghadapi rintangan dengan tekad kuat dan selalu berusaha membawa dampak positif bagi seluruh siswa.
                        </p>
                    </div>
                    <div class="hidden p-4 rounded-lg" id="pedang" role="tabpanel" aria-labelledby="pedang-tab">
                        <p class="text-lg text-slate-300">
                            Tiga pedang utama mencerminkan <strong class="font-semibold">ketua umum dan kedua ketua bidangnya dalam OSIS</strong>, melambangkan kepemimpinan yang kuat dan kesatuan visi yang menginspirasi. Setiap pedang mewakili dedikasi dan peran vital dalam membimbing serta mendukung organisasi, menggambarkan kerja sama yang harmonis, keberanian dalam menghadapi tantangan, dan komitmen yang tak tergoyahkan untuk mencapai tujuan bersama.
                        </p>
                    </div>
                    <div class="hidden p-4 rounded-lg" id="warna" role="tabpanel" aria-labelledby="warna-tab">
                        <p class="text-lg text-slate-300">
                            <strong class="font-semibold">Warna biru</strong> diartikan sebagai warna alam semesta, yang melambangkan <strong class="font-semibold">cinta, bijaksana, hebat, besar, dan kokoh</strong>.<br><br>
                            <strong class="font-semibold">Warna emas</strong> melambangkan <strong class="font-semibold">kehormatan, kejayaan, dan nilai-nilai yang berharga</strong>. Dalam konteks ini, warna emas mencerminkan prestasi tinggi dan tanggung jawab yang mulia dari kepengurusan. Ini menunjukkan cita-cita kabinet untuk mencapai kesuksesan dan memberikan kontribusi terbaik bagi sekolah.<br><br>
                            <strong class="font-semibold">Warna putih</strong> merepresentasikan <strong class="font-semibold">kemurnian, kejujuran, dan transparansi</strong>. Ini mencerminkan niat tulus dari kepengurusan untuk menjalankan tugas mereka dengan penuh integritas dan tanpa kepentingan pribadi.<br><br>
                            <strong class="font-semibold">Warna merah</strong> pada logo merepresentasikan <strong class="font-semibold">semangat, keberanian, dan kekuatan dalam menjalankan tanggung jawab</strong>. Warna ini melambangkan energi dinamis dan komitmen kuat OSIS dalam menghadapi tantangan serta mengambil keputusan tegas untuk kemajuan bersama.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section style="background-image:url('{{ asset('images/proker/pudo/velda/darkened_backdrop.webp') }}')" class="w-full min-h-screen p-16 flex flex-col justify-center items-center bg-center bg-cover">
            <div class="flex flex-col items-center justify-center px-8">
                <h1 class="mb-4 font-bold text-4xl sm:text-6xl md:text-8xl text-white">
                    Vlog Elang Muda
                </h1>
                <p class="mb-4 text-xl md:text-4xl text-gray-300">
                    Saksikan kehidupan OSIS MPK MHT dari sudut pandang kami!
                </p>
            </div>
            <div class="w-full flex flex-col md:flex-row space-y-8 md:space-y-0 space-x-0 md:space-x-8 mt-8">
                <iframe class="flex flex-1 aspect-[16/9]" src="https://www.youtube.com/embed/wCqFYdHKIdo?si=-tUerVVdf0J1jRV-" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                <iframe class="flex flex-1 aspect-[16/9]" src="https://www.youtube.com/embed/2YAq2VOHsFY?si=mFzNXn0lncqYKZQK" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </section>

        <section style="background-image:url('{{ asset('images/proker/dhl/donuts/darkened_637A8750.webp') }}')" class="w-full min-h-screen p-16 flex flex-col justify-center items-center bg-center bg-cover">
            <div class="flex flex-col items-center justify-center px-8">
                <h1 class="mb-4 font-bold text-4xl sm:text-6xl md:text-8xl text-white">
                    DHE Campaign
                </h1>
                <p class="mb-4 text-xl md:text-4xl text-gray-300">
                    Untuk demokrasi, HAM, dan lingkungan.
                </p>
            </div>
            <div class="flex flex-row mt-8">
                <div class="hidden md:block mr-8">
                    <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/reel/DBZ7jQ_Af-H/?utm_source=ig_embed&amp;utm_campaign=loading" data-instgrm-version="14" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:16px;"> <a href="https://www.instagram.com/reel/DBZ7jQ_Af-H/?utm_source=ig_embed&amp;utm_campaign=loading" style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank"> <div style=" display: flex; flex-direction: row; align-items: center;"> <div style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;"></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;"></div></div></div><div style="padding: 19% 0;"></div> <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-511.000000, -20.000000)" fill="#000000"><g><path d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631"></path></g></g></g></svg></div><div style="padding-top: 8px;"> <div style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;">View this post on Instagram</div></div><div style="padding: 12.5% 0;"></div> <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;"><div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);"></div> <div style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;"></div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);"></div></div><div style="margin-left: 8px;"> <div style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;"></div> <div style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)"></div></div><div style="margin-left: auto;"> <div style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);"></div> <div style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);"></div> <div style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);"></div></div></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;"></div></div></a><p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;"><a href="https://www.instagram.com/reel/DBZ7jQ_Af-H/?utm_source=ig_embed&amp;utm_campaign=loading" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">A post shared by 𝗔𝗚𝗥𝗔𝗗𝗔𝗠𝗔 𝗡𝗔𝗩𝗔𝗟𝗘𝗞𝗦𝗔 (@osismpkthamrin)</a></p></div></blockquote>
                </div>
                <div>
                    <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/reel/DD3tKDiyf5c/?utm_source=ig_embed&amp;utm_campaign=loading" data-instgrm-version="14" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:16px;"> <a href="https://www.instagram.com/reel/DD3tKDiyf5c/?utm_source=ig_embed&amp;utm_campaign=loading" style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank"> <div style=" display: flex; flex-direction: row; align-items: center;"> <div style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;"></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;"></div></div></div><div style="padding: 19% 0;"></div> <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-511.000000, -20.000000)" fill="#000000"><g><path d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631"></path></g></g></g></svg></div><div style="padding-top: 8px;"> <div style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;">View this post on Instagram</div></div><div style="padding: 12.5% 0;"></div> <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;"><div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);"></div> <div style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;"></div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);"></div></div><div style="margin-left: 8px;"> <div style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;"></div> <div style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)"></div></div><div style="margin-left: auto;"> <div style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);"></div> <div style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);"></div> <div style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);"></div></div></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;"></div></div></a><p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;"><a href="https://www.instagram.com/reel/DD3tKDiyf5c/?utm_source=ig_embed&amp;utm_campaign=loading" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">A post shared by 𝗔𝗚𝗥𝗔𝗗𝗔𝗠𝗔 𝗡𝗔𝗩𝗔𝗟𝗘𝗞𝗦𝗔 (@osismpkthamrin)</a></p></div></blockquote>
                </div>
                <script async src="//www.instagram.com/embed.js"></script>
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
