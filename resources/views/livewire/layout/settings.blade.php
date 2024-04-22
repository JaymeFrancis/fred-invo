<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component {
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<div class="flex items-center ms-6">
    <x-dropdown align="right" width="48">
        <x-slot name="trigger">
            <button
                class="inline-flex items-center text-sm font-medium leading-4 text-gray-900 transition duration-150 ease-in-out md:text-base focus:outline-none">
                <div x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>

                <div class="ms-1">
                    <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
            </button>
        </x-slot>

        <x-slot name="content">
            <x-dropdown-link
                class="flex items-center justify-start text-lg hover:bg-blue-100 hover:text-blue-700 hover:font-extrabold"
                :href="route('profile')" wire:navigate>
                <x-icon name="user-circle" solid mini class="me-2" />
                Profile
            </x-dropdown-link>

            <!-- Authentication -->
            <button wire:click="logout" class="w-full text-start">
                <x-dropdown-link
                    class="flex items-center justify-start text-lg hover:bg-blue-100 hover:text-blue-700 hover:font-extrabold">
                    <x-icon name="arrow-left" solid mini class="me-2" />
                    Log Out
                </x-dropdown-link>
            </button>
        </x-slot>
    </x-dropdown>
</div>
