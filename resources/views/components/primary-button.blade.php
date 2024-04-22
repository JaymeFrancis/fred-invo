<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-2 py-2 text-blue-700 bg-blue-100 rounded font-semibold text-xs uppercase tracking-widest hover:bg-blue-300 focus:bg-blue-300 focus:outline-none transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
