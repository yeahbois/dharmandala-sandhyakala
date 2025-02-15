<x-layout title="OSIS MPK MHT">
    <x-slot:metadesc>
        <meta name="description" content="Klik sekarang untuk menemukan kegiatan seru, proyek keren, dan cara ikut berkontribusi!">
        <meta property="og:title" content="Beranda OSIS MPK SMA Negeri Unggulan M. H. Thamrin 2024/2025">
        <meta property="og:description" content="Cari tahu event terbaru OSIS MPK MHT dan ikut berkontribusi dalam kegiatan sekolah!">
        <meta property="og:image" content="https://ospkmhthamrin.com/images/potrait/ospkfull.jpg">
    </x-slot:metadesc>
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
                <div>
                    <a href="https://www.youtube.com/watch?v=wCqFYdHKIdo" target="_blank">
                        <img src={{ asset('embeds/mamacukakacu.jpg') }} alt="Mamacu Kakacu">
                    </a>
                </div>
                <div>
                    <a href="https://www.youtube.com/watch?v=2YAq2VOHsFY" target="_blank">
                        <img src={{ asset('embeds/tsf.jpg') }} alt="Thamrin Sastra Fair">
                    </a>
                </div>
            </div>
        </section>

        <section style="background-image:url('{{ asset('images/proker/dhl/donuts/darkened_637A8750.webp') }}')" class="w-full min-h-screen p-16 flex flex-col justify-center items-center bg-center bg-cover">
            <div class="flex flex-col items-center justify-center px-8">
                <h1 class="mb-4 font-bold text-4xl sm:text-6xl md:text-8xl text-white">
                    DHE Campaign
                </h1>
                <p class="text-xl md:text-4xl text-gray-300">
                    Untuk demokrasi, HAM, dan lingkungan.
                </p>
            </div>
            <div class="w-full flex flex-col justify-center items-center md:flex-row space-y-8 md:space-y-0 space-x-0 md:space-x-8 sm:mt-8">
                <div class="hidden sm:block max-w-96">
                    <a href="https://www.youtube.com/watch?v=wCqFYdHKIdo" target="_blank">
                        <img src={{ asset('embeds/dhe2.jpg') }} alt="DHE Campaign - Episode 2">
                    </a>
                </div>
                <div class="max-w-96">
                    <a href="https://www.youtube.com/watch?v=2YAq2VOHsFY" target="_blank">
                        <img src={{ asset('embeds/dhe3.jpg') }} alt="DHE Campaign - Episode 3">
                    </a>
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
