@props(['active' => false, 'href'])

@php
$classes = $active
    ? 'block w-full text-blue-600 bg-blue-50 rounded-lg mx-2 px-3 py-2 transition-all duration-300 ease-out font-semibold'
    : 'block w-full text-slate-700 hover:bg-slate-100 rounded-lg mx-2 px-3 py-2 transition-all duration-300 ease-out';
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
