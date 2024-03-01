<div class="flex space-x-2">
    @isset($viewLink)
        <a href="{{ $viewLink }}" class="flex px-4 py-2 text-white rounded-md bg-cyan-600">
            View
            <x-icon name="eye" solid mini class="w-5 h-5 ms-2" />
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
