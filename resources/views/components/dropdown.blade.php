@props(['align' => 'right', 'width' => '56', 'contentClasses' => 'p-1.5 bg-white/80'])

@php
$alignmentClasses = match ($align) {
    'left' => 'ltr:origin-top-left rtl:origin-top-right start-0',
    'top' => 'origin-top',
    default => 'ltr:origin-top-right rtl:origin-top-left end-0',
};

// Pakai lebar yang sedikit lebih lega (w-56) biar gak sesak
$width = match ($width) {
    '48' => 'w-48',
    '56' => 'w-56',
    default => $width,
};
@endphp

<div class="relative" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
    {{-- Trigger dengan feedback klik --}}
    <div @click="open = ! open" class="cursor-pointer transition-transform duration-200 active:scale-95">
        {{ $trigger }}
    </div>

    <div x-show="open"
            {{-- Animasi masuk lebih "kenyal" (out-back) --}}
            x-transition:enter="transition cubic-bezier(0.34, 1.56, 0.64, 1) duration-300"
            x-transition:enter-start="opacity-0 translate-y-2 scale-90"
            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="absolute z-50 mt-3 {{ $width }} {{ $alignmentClasses }}"
            style="display: none;"
            @click="open = false">
        
        {{-- Container utama dengan Glassmorphism --}}
        <div class="overflow-hidden rounded-2xl border border-slate-200/60 bg-white/90 backdrop-blur-xl shadow-[0_20px_50px_rgba(0,0,0,0.1)] ring-1 ring-black/5 {{ $contentClasses }}">
            {{-- Kita tambahkan pembungkus di dalam content untuk animasi list --}}
            <div class="flex flex-col gap-0.5">
                {{ $content }}
            </div>
        </div>
    </div>
</div>