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
    <div class="relative min-h-svh md:flex" x-data="{ open: true }">
        {{-- Sidebar --}}
        <aside :class="open || '-translate-x-full'"
            class="fixed inset-y-0 top-0 left-0 z-20 w-64 px-2 py-2 overflow-y-auto text-gray-900 transition duration-300 ease-in-out transform bg-white shadow-lg md:sticky md:translate-x-0">
            {{-- Logo --}}
            <div class="flex items-center justify-between px-2 mt-2">
                <div class="flex flex-col items-center space-y-2">
                    <a href="">
                        <x-application-logo class="block w-auto text-gray-900 fill-current h-9" />
                    </a>
                    <h1 class="text-xl font-extrabold text-center">Sales and Auto Supply Management System </h1>
                </div>
            </div>

            {{-- Nav Links --}}
            <nav class="mt-8 mb-32 space-y-2">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                    Dashboard
                </x-nav-link>
                <x-nav-link :href="route('joborder')" :active="request()->routeIs('joborder')" wire:navigate>
                    Job Order
                </x-nav-link>
                <x-dropdown-navigation align="left" width="48" :active="request()->routeIs('inventory', 'invoice', 'view-item', 'record-new-item')">
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

            <footer class="fixed bottom-0 flex flex-col items-center px-1 py-2 mt-8 space-y-2 text-center">
                <button type="button" @click="open = !open"
                    class="flex items-center justify-center p-2 text-blue-100 rounded-full md:hidden hover:bg-blue-700 focus:outline-none">
                    <x-icon name="chevron-double-left" class="w-7 h-7" />
                </button>
                <p class="text-xs">
                    All rights reserved &copy 2024 <br> Fred Invo Auto Supply and Car Care Center
                </p>
            </footer>
        </aside>

        {{-- Main Page --}}
        <main class="flex-1 bg-gray-100 min-h-svh">
            <nav class="bg-white shadow-md">
                <div class="px-2 mx-auto sm:px-6 lg:px-8">
                    <div class="relative flex items-center justify-end h-16">
                        <div class="absolute inset-y-0 left-0 flex items-center md:hidden">
                            <button type="button" @click="open = !open" @click.away="open = false"
                                class="inline-flex items-center justify-center p-2 text-blue-100 rounded-md hover:bg-blue-700 focus:outline-none">
                                <x-icon name="bars-3" class="w-6 h-6" />
                            </button>
                        </div>
                        <div class="flex flex-col items-end">
                            <livewire:layout.settings />
                            <x-date-time-display />
                        </div>
                    </div>
                </div>
            </nav>
            <div class="pt-4 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>

    </div>

    {{-- <div class="min-h-screen bg-gray-100">
        <livewire:layout.navigation />

        <!-- Page Heading -->
        @if (isset($header))
            <header class="mt-1 bg-green-500 shadow">
                <div class="px-4 py-6 mx-8 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div> --}}
</body>

</html>
