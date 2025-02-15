<x-layout title="PROGRAM KERJA">
    <x-slot:metadesc>
        <meta name="description" content="Kenali program kerja utama OSIS MHT! Dari event seru hingga proyek inspiratif, lihat bagaimana kami membawa perubahan!">
        <meta name="keywords" content="OSIS, MPK, MHT, m h thamrin, smanu mh thamrin, program kerja, event sekolah, kegiatan siswa">
        <meta property="og:title" content="Program Kerja Terbaru OSIS MPK SMA Negeri Unggulan M. H. Thamrin 2024/2025">
        <meta property="og:description" content="Cari tahu event terbaru OSIS MPK MHT dan ikut berkontribusi dalam kegiatan sekolah!">
        <meta property="og:image" content="https://ospkmhthamrin.com/images/potrait/ospkfull.jpg">
    </x-slot:metadesc>
    <main class="flex flex-col flex-grow w-full max-w-[1080px] h-full">
        <section class="py-8 w-full flex flex-col items-start space-y-16">
            <h1 class="py-4 font-bold text-6xl sm:text-8xl text-center w-full">
                Program Kerja
            </h1>
            <div class="flex flex-col items-center sm:items-start w-full">
                <div class="flex mb-4 flex-row w-full justify-center sm:justify-start">
                    <h3 class="text-2xl text-left">
                        Featured
                    </h3>
                </div>
                <div class="flex space-y-4 flex-col sm:space-y-0 sm:flex-row sm:space-x-8">
                    <x-seksi.akad.openhouse/>
                    <x-seksi.dhl.scorence/>
                    <x-seksi.sasbud.tgt/>
                </div>
            </div>
            <div class="flex flex-col items-center sm:items-start w-full">
                <div class="flex flex-row w-full justify-between pb-4 items-end">
                    <h3 class="text-2xl text-left">
                        Recent  
                    </h3>
                    <h3 class="text-xl text-blue-500 underline hover:text-blue-600 focus:text-blue-600">
                        <a href="/program-kerja/recent">
                            See more
                        </a>
                    </h3>
                </div>
                <div class="flex mb-8 space-y-4 flex-col sm:space-y-0 sm:flex-row sm:space-x-8">
                    <x-seksi.akad.openhouse/>
                    <x-seksi.dhl.scorence/>
                    <x-seksi.rohani.isra-miraj/>
                </div>
            </div>
        </section>
    </main>
</x-layout>
