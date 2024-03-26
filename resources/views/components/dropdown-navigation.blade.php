@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'shadow-md block py-2.5 px-4 bg-white font-bold text-blue-700 rounded transition duration-150 ease-in-out'
            : 'block py-2.5 px-4 hover:bg-white hover:font-bold hover:text-blue-700 rounded transition duration-150 ease-in-out';

@endphp
<div x-data="{ open: false }">
    <div {{ $attributes->merge(['class' => $classes]) }}>
        <div class="relative flex items-center justify-between" @click.outside="open = false" @close.stop="open = false"
            @click="open = ! open">
            <div>
                {{ $trigger }}

            </div>
            <div class="ms-1">
                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </div>
        </div>
    </div>
    <div x-show="open" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95" class="" style="display: none;" @click="open = false">
        <div class="ms-2">
            {{ $content }}
        </div>
    </div>
</div>
