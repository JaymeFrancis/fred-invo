<div class="flex space-x-2">
    @isset($viewLink)
        <a href="{{ $viewLink }}"
            class="flex items-center justify-center w-24 p-2 text-blue-700 bg-blue-100 rounded hover:bg-blue-300">
            <x-icon name="eye" solid mini class="w-4 h-4 me-1" />
            View
        </a>
        @endif

        @isset($editLink)
            <a href="{{ $editLink }}">
                <x-icon name="pencil-square" solid mini class="w-5 h-5" />
            </a>
            @endif

            @isset($deleteLink)
                <form action="{{ $deleteLink }}" class="d-inline" method="POST" x-data
                    @submit.prevent="if (confirm('Are you sure you want to delete this user?')) $el.submit()">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-link">
                        <x-icon name="trash" solid mini class="w-5 h-5" />
                    </button>
                </form>
                @endif
            </div>
