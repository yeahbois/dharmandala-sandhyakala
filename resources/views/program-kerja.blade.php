<x-layout title="PROGRAM KERJA">
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
