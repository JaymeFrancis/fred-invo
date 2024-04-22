<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="font-sans antialiased">
    <div class="relative min-h-screen md:flex" x-data="{ open: true }">
        {{-- Sidebar --}}
        <aside :class="open || '-translate-x-full'"
            class="absolute inset-y-0 left-0 z-10 w-64 px-2 py-2 overflow-y-auto text-blue-100 transition duration-300 ease-in-out transform bg-blue-800 shadow-lg md:relative md:translate-x-0">
            {{-- Logo --}}
            <div class="flex items-center justify-between px-2">
                <div class="flex items-center space-x-2">
                    <a href="">
                        <x-application-logo class="block w-auto text-blue-100 fill-current h-9" />
                    </a>
                    <span class="text-2xl font-extrabold">Admin</span>
                </div>
                <button type="button" @click="open = !open"
                    class="inline-flex items-center justify-center p-2 text-blue-100 rounded-md md:hidden hover:bg-blue-700 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="block w-6 h-6 ">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            {{-- Nav Links --}}
            <nav class="mt-8 space-y-2">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                    Dashboard
                </x-nav-link>
                <x-nav-link :href="route('joborder')" :active="request()->routeIs('joborder')" wire:navigate>
                    Job Order
                </x-nav-link>
                <x-dropdown-navigation align="left" width="48" :active="request()->routeIs('inventory', 'invoice', 'view-item')">
                    <x-slot name="trigger">
                        <button>
                            Auto Supply
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-nav-link :href="route('inventory')" wire:navigate>Inventory</x-dropdown-nav-link>
                        <x-dropdown-nav-link>Invoice</x-dropdown-nav-link>
                    </x-slot>
                </x-dropdown-navigation>
                <x-nav-link :href="route('reports')" :active="request()->routeIs('reports')" wire:navigate>
                    Reports
                </x-nav-link>

                <x-dropdown-navigation align="left" width="48">
                    <x-slot name="trigger">
                        <button>
                            Utilities
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-nav-link>User Management</x-dropdown-nav-link>
                        <x-dropdown-nav-link>Customer Management</x-dropdown-nav-link>
                        <x-dropdown-nav-link>Stocks Management</x-dropdown-nav-link>
                        <x-dropdown-nav-link>Back-up and Restore</x-dropdown-nav-link>
                        <x-dropdown-nav-link>Audit Logs</x-dropdown-nav-link>
                    </x-slot>
                </x-dropdown-navigation>
            </nav>
        </aside>

        {{-- Main Page --}}
        <main class="flex-1 h-screen bg-gray-100">
            <nav class="bg-blue-900 shadow-lg">
                <div class="px-2 mx-auto sm:px-6 lg:px-8">
                    <div class="relative flex items-center justify-end h-16">
                        <div class="absolute inset-y-0 left-0 flex items-center md:hidden">
                            <button type="button" @click="open = !open" @click.away="open = false"
                                class="inline-flex items-center justify-center p-2 text-blue-100 rounded-md hover:bg-blue-700 focus:outline-none">
                                <x-icon name="bars-3" class="w-6 h-6" />
                            </button>
                        </div>
                        <div>
                            <livewire:layout.settings />
                        </div>
                    </div>
                </div>
            </nav>
            <div>
                {{ $slot }}
            </div>
        </main>
    </div>
</body>

</html>
