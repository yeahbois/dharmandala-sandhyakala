<x-layout title="PROGRAM KERJA">
    <main class="flex flex-col flex-grow w-full max-w-[1080px] h-full">
        <section class="py-8 w-full flex flex-col items-start space-y-16">
            <h1 class="py-4 font-bold text-6xl text-center w-full">
                Program Kerja
            </h1>
            <div class="flex flex-col items-center sm:items-start w-full">
                <div class="flex mb-4 flex-row w-full justify-center sm:justify-start">
                    <h3 class="text-2xl text-left">
                        Recent
                    </h3>
                </div>
                <div class="flex mb-8 space-y-4 flex-col sm:space-y-0 sm:flex-row sm:space-x-8">
                    <x-seksi.sasbud.yes/>
                    <x-seksi.k3or.tsc/>
                    <x-seksi.dhl.donuts/>
                </div>
                <div class="flex mb-8 space-y-4 flex-col sm:space-y-0 sm:flex-row sm:space-x-8">
                    <x-seksi.k3or.hari-guru/>
                    <x-seksi.akad.mamacu/>
                    <x-seksi.akad.thc/>
                </div>
                <div class="flex mb-8 space-y-4 flex-col sm:space-y-0 sm:flex-row sm:space-x-8">
                    <x-seksi.sasbud.tsf/>
                    <x-seksi.rohani.maulid-nabi/>
                    <x-seksi.k3or.thamfam/>
                </div>
            </div>
        </section>
    </main>
</x-layout>
