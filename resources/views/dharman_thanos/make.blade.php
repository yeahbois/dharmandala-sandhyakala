<x-layout title="Make THANOS Event">
    <x-slot:metadesc>
        <meta name="description" content="Admin page to create or edit THANOS event" />
    </x-slot:metadesc>

    <main class="min-h-screen bg-surface w-full p-4 md:p-8">
        <div class="max-w-4xl mx-auto bg-surface-variant/30 border border-outline/20 p-6 md:p-10">
            <div class="flex items-center gap-4 mb-8">
                <a href="{{ route('dashboard') }}" class="w-10 h-10 flex items-center justify-center bg-surface-variant text-on-surface border border-outline/20 hover:bg-primary hover:text-on-primary transition-all">
                    <span class="material-symbols-outlined">arrow_back</span>
                </a>
                <h1 class="text-2xl md:text-3xl font-black uppercase tracking-tighter text-on-surface">
                    {{ $event ? 'Edit' : 'Create' }} THANOS Event
                </h1>
            </div>

            <form action="{{ route('thanos.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div class="space-y-2">
                    <label for="title" class="text-xs font-black uppercase tracking-widest text-secondary-600">Event Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $event->title ?? '') }}" required
                        class="w-full bg-surface-variant/50 border border-outline/40 p-4 text-on-surface focus:ring-2 focus:ring-primary outline-none transition-all">
                </div>

                <div class="space-y-2">
                    <label for="deadline" class="text-xs font-black uppercase tracking-widest text-secondary-600">Deadline Date & Time</label>
                    <input type="datetime-local" name="deadline" id="deadline"
                        value="{{ old('deadline', $event ? $event->deadline->format('Y-m-d\TH:i') : '') }}" required
                        class="w-full bg-surface-variant/50 border border-outline/40 p-4 text-on-surface focus:ring-2 focus:ring-primary outline-none transition-all">
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-black uppercase tracking-widest text-secondary-600">Question Images (Max 3)</label>
                    <div class="flex flex-col gap-4">
                        @if($event && $event->questions)
                            <div class="flex flex-wrap gap-4">
                                @foreach($event->questions as $img)
                                    <div class="relative w-32 h-32 border border-outline/20">
                                        @if(Str::startsWith($img, 'http'))
                                            <img src="{{ $img }}" class="w-full h-full object-cover">
                                        @else
                                            <img src="{{ asset($img) }}" class="w-full h-full object-cover">
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                            <p class="text-[10px] text-on-surface-variant">Uploading new images or entering URLs will replace existing ones.</p>
                        @endif

                        <div class="space-y-4">
                            <div class="space-y-1">
                                <span class="text-[10px] opacity-60">Upload Files:</span>
                                <input type="file" name="questions[]" multiple accept="image/*"
                                    class="w-full bg-surface-variant/50 border border-outline/40 p-4 text-on-surface focus:ring-2 focus:ring-primary outline-none transition-all">
                            </div>
                            <div class="space-y-1">
                                <span class="text-[10px] opacity-60">Or Enter Image URLs (one per line):</span>
                                <textarea name="question_urls" rows="3"
                                    class="w-full bg-surface-variant/50 border border-outline/40 p-4 text-on-surface focus:ring-2 focus:ring-primary outline-none transition-all"
                                    placeholder="https://example.com/image1.jpg&#10;https://example.com/image2.jpg">{{ old('question_urls', $event && $event->questions ? implode("\n", array_filter($event->questions, fn($q) => Str::startsWith($q, 'http'))) : '') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="right_answer" class="text-xs font-black uppercase tracking-widest text-secondary-600">Right Answer(s)</label>
                    <p class="text-[10px] text-on-surface-variant mb-1">Separate multiple correct answers with | (e.g. 0.67|0,67|2/3)</p>
                    <input type="text" name="right_answer" id="right_answer" value="{{ old('right_answer', $event->right_answer ?? '') }}" required
                        class="w-full bg-surface-variant/50 border border-outline/40 p-4 text-on-surface focus:ring-2 focus:ring-primary outline-none transition-all"
                        placeholder="e.g. 0.67|0,67">
                </div>

                @if($event)
                    <div class="space-y-2">
                        <label class="text-xs font-black uppercase tracking-widest text-secondary-600">Event ID</label>
                        <p class="p-4 bg-surface-variant/20 border border-outline/10 text-on-surface-variant font-mono">
                            {{ $event->event_id }}
                        </p>
                    </div>
                @endif

                <div class="pt-4">
                    <button type="submit" class="w-full bg-primary text-on-primary font-black uppercase tracking-widest py-4 hover:brightness-110 transition-all">
                        {{ $event ? 'Update' : 'Create' }} THANOS Event
                    </button>
                </div>
            </form>
        </div>
    </main>
</x-layout>
