<x-layout title="PROGRAM KERJA">
    <x-slot:metadesc>
        <meta name="description" content="Apa saja program OSIS yang baru saja dilaksanakan? Jangan ketinggalan update terbaru dan temukan inspirasinya di sini!">
    </x-slot:metadesc>
    <main class="flex flex-col flex-grow w-full max-w-[1080px] h-full">
        <section class="py-8 w-full flex flex-col items-start space-y-16">
            <h1 class="py-4 font-bold text-6xl sm:text-8xl text-center w-full">
                Program Kerja
            </h1>
            <div class="flex flex-col items-center sm:items-start w-full">
                <div class="flex mb-4 flex-row w-full justify-center sm:justify-start">
                    <h3 class="text-2xl text-left">
                        Recent
                    </h3>
                </div>
                <div class="flex mb-8 space-y-4 flex-col w-full sm:space-y-0 sm:flex-row sm:space-x-8">
                    <x-seksi.akad.openhouse/>
                    <x-seksi.dhl.scorence/>
                    <x-seksi.rohani.isra-miraj/>
                </div>
                <div class="flex mb-8 space-y-4 flex-col w-full sm:space-y-0 sm:flex-row sm:space-x-8">
                    <x-seksi.sasbud.tgt/>
                    <x-seksi.sasbud.yes/>
                    <x-seksi.k3or.tsc/>
                </div>
                <div class="flex mb-8 space-y-4 flex-col w-full sm:space-y-0 sm:flex-row sm:space-x-8">
                    <x-seksi.dhl.donuts/>
                    <x-seksi.k3or.hari-guru/>
                    <x-seksi.akad.mamacu/>
                </div>
                <div class="flex mb-8 space-y-4 flex-col w-full sm:space-y-0 sm:flex-row sm:space-x-8">
                    <x-seksi.akad.thc/>
                    <x-seksi.sasbud.tsf/>
                    <x-seksi.rohani.maulid-nabi/>
                </div>
                <div class="flex mb-8 space-y-4 flex-col w-full sm:space-y-0 sm:flex-row sm:space-x-8">
                    <x-seksi.k3or.thamfam/>
                    <div class="flex flex-1"></div>
                    <div class="flex flex-1"></div>
                </div>
            </div>
        </section>
    </main>
</x-layout>
