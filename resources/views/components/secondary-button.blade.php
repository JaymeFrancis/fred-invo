<button
    {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-2 py-2 bg-white border border-gray-300 rounded font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
