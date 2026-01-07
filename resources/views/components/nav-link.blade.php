@props(['active' => false, 'href'])

@php
$classes = $active
    ? 'inline-flex items-center text-blue-600 bg-blue-50 shadow-sm shadow-blue-100/50 rounded-xl px-4 py-2 transition-all duration-300 ease-out hover:scale-105 hover:shadow-lg'
    : 'inline-flex items-center text-slate-500 hover:bg-white/5 hover:backdrop-blur-sm rounded-xl px-4 py-2 transition-all duration-300 ease-out hover:scale-105 hover:shadow-lg';
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
