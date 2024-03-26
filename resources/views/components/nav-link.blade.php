@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'shadow-md block py-2.5 px-4 bg-white font-bold text-blue-700 rounded transition duration-150 ease-in-out'
            : 'block py-2.5 px-4 hover:bg-white hover:font-bold hover:text-blue-700 rounded transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
