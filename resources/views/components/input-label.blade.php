@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-base truncate text-gray-900']) }}>
    {{ $value ?? $slot }}
</label>
