@props(['active' => false, 'href'])

@php
$baseClasses = 'relative inline-flex items-center group px-1 py-2 text-sm font-medium transition-all duration-300';

$activeClasses = $active 
    ? 'text-blue-600' 
    : 'text-slate-500 hover:text-blue-600';
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => "$baseClasses $activeClasses"]) }}>
    {{ $slot }}
    
    {{-- Garis Animasi --}}
    <span @class([
    'absolute bottom-0 left-1/2 -translate-x-1/2 h-[2px] bg-blue-600 transition-all duration-300 ease-out',
    'w-full' => $active,
    'w-0 group-hover:w-full' => !$active
])></span>
</a>