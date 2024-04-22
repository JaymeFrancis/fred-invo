@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' =>
        'border-gray-300 focus:outline-none focus:border-blue-500 placeholder:text-sm focus:ring-0 rounded shadow-sm',
]) !!}>
