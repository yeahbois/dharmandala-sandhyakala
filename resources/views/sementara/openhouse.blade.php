<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<x-layout title="Open House 2026 | SMAN Unggulan M.H. Thamrin">
    <x-slot:metadesc>
        <meta name="description" content="Open House SMAN Unggulan M.H. Thamrin 2026">
        <meta property="og:title" content="Open House SMAN Unggulan M.H. Thamrin 2026">
        <meta property="og:image" content="{{ asset('images/potrait/ospkfull.jpg') }}">
    </x-slot:metadesc>

    {{-- Hero --}}
    <section class="relative h-[60vh] flex items-center justify-center bg-cover bg-center"
        style="background-image:url('{{ asset('images/potrait/darkened_ospkfull.jpg') }}')">
        <div class="absolute inset-0 bg-black/40"></div>
        <div class="relative text-center text-white px-4">
            <h1 class="text-4xl md:text-6xl font-bold">Open House 2026</h1>
            <p class="mt-3 text-lg md:text-xl">
                SMAN Unggulan M.H. Thamrin
            </p>
        </div>
    </section>

    {{-- Content --}}
    <main class="max-w-5xl mx-auto px-4 py-12 space-y-12">

        {{-- Countdown --}}
        <div class="text-center">
            <p class="text-lg font-semibold mb-2">Hitung Mundur Acara</p>
            <x-countdown date="2026-02-07 06:30:00" />
        </div>

        {{-- About --}}
        <section>
            <h2 class="text-2xl font-bold mb-4">Tentang Open House</h2>
            <p class="text-gray-700 leading-relaxed">
                Open House SMAN Unggulan M.H. Thamrin adalah acara tahunan untuk
                memperkenalkan lingkungan sekolah, sistem akademik, dan kehidupan
                siswa kepada calon peserta didik dan orang tua.
            </p>
        </section>

        {{-- Highlights --}}
        <section>
            <h2 class="text-2xl font-bold mb-4">Sorotan Acara</h2>
            <ul class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <li class="p-4 border rounded-lg shadow">Tour de MHT</li>
                <li class="p-4 border rounded-lg shadow">Class Simulation</li>
                <li class="p-4 border rounded-lg shadow">Sharing Alumni</li>
                <li class="p-4 border rounded-lg shadow">Meet the Medalist</li>
            </ul>
        </section>

        {{-- Documentation --}}
        <section>
            <h2 class="text-2xl font-bold text-center mb-6">
                Dokumentasi Tahun Sebelumnya
            </h2>

            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach ([
                        'audit.jpg',
                        'audit2.jpg',
                        'baris.jpg',
                        'gor.jpg'
                    ] as $img)
                        <div class="swiper-slide overflow-hidden rounded-xl">
                            <img src="{{ asset('images/thamnet/openhouse/'.$img) }}"
                                 class="w-full h-full object-cover">
                        </div>
                    @endforeach
                </div>

                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </section>

        {{-- CTA --}}
        <section class="text-center">
            <a href="/register"
               class="inline-block px-10 py-4 bg-blue-600 text-white text-lg font-semibold rounded-xl shadow hover:bg-blue-700 transition">
                DAFTAR OPEN HOUSE
            </a>
        </section>

    </main>
</x-layout>

<script>
document.addEventListener('DOMContentLoaded', () => {
    new Swiper('.swiper-container', {
        loop: true,
        autoplay: { delay: 3000 },
        pagination: { el: '.swiper-pagination', clickable: true },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
});
</script>
