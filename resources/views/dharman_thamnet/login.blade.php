<x-layout title="ThamNet - Access Portal" keywords="thamnet, login, admin">
    <div class="w-full min-h-[90vh] bg-background text-on-surface flex items-center justify-center px-4 py-20 relative overflow-hidden">
        <!-- Abstract Decorative Elements -->
        <div class="absolute top-0 left-0 w-full h-full opacity-20 pointer-events-none">
            <div class="absolute top-[-10%] right-[-5%] w-[300px] md:w-[500px] h-[300px] md:h-[500px] bg-primary/10 blur-[80px] md:blur-[120px] rounded-none"></div>
            <div class="absolute bottom-[-10%] left-[-5%] w-[250px] md:w-[400px] h-[250px] md:h-[400px] bg-on-tertiary-container/10 blur-[70px] md:blur-[100px] rounded-none"></div>
        </div>

        <div class="relative z-10 w-full max-w-md">
            <div class="flex flex-col items-center mb-8">
                <img alt="Seksi Akad Logo" class="h-16 w-16 md:h-20 md:w-20 object-contain mb-6 transition-all duration-500"
                    src="{{ asset('images/logo/osis/akad514.webp') }}">
                <h1 class="text-3xl md:text-4xl font-black tracking-tighter text-on-surface uppercase text-center leading-none">
                    ThamNet<br/><span class="text-primary text-xl md:text-2xl tracking-[0.3em]">Access Portal</span>
                </h1>
            </div>

            <div class="bg-surface/80 backdrop-blur-xl border border-outline/20 p-8 md:p-10 shadow-2xl rounded-none">
                @if ($errors->any())
                    <div class="mb-6 p-4 bg-error/10 border border-error/20 text-error text-sm font-bold tracking-wide">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="/thamnet/api/login" class="space-y-6">
                    @csrf
                    <div class="space-y-2">
                        <label for="username" class="text-[10px] font-black tracking-[0.2em] text-secondary uppercase block">Admin Identifier</label>
                        <input type="text" id="username" name="username" value="{{ old('username') }}" required autofocus
                            class="w-full bg-surface-variant/50 border border-outline/30 px-4 py-3 text-on-surface font-semibold focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all duration-300 placeholder:text-on-surface-variant/50"
                            placeholder="Enter username">
                    </div>

                    <div class="space-y-2">
                        <label for="password" class="text-[10px] font-black tracking-[0.2em] text-secondary uppercase block">Passcode</label>
                        <input type="password" id="password" name="password" required
                            class="w-full bg-surface-variant/50 border border-outline/30 px-4 py-3 text-on-surface font-semibold focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all duration-300 placeholder:text-on-surface-variant/50"
                            placeholder="Enter password">
                    </div>

                    <button type="submit" class="w-full mt-8 px-8 py-4 bg-primary text-on-primary text-[10px] md:text-xs font-black uppercase tracking-[0.3em] hover:opacity-90 transition-all duration-300 shadow-xl shadow-primary/20">
                        Authenticate
                    </button>
                </form>
                
                <div class="mt-8 text-center border-t border-outline/10 pt-6">
                    <a href="{{ route('thamnet.home') }}" class="text-[10px] font-black tracking-[0.2em] text-on-surface-variant hover:text-primary uppercase transition-colors">
                        Return to Hub
                    </a>
                </div>
            </div>
            
            <p class="text-center text-[10px] font-black tracking-[0.2em] text-on-surface-variant/50 uppercase mt-8">
                Restricted Access • Authorized Personnel Only
            </p>
        </div>
    </div>
</x-layout>
