<div>
    @include('livewire.inc.todo-header')
    @if (session('error'))
    <div class="bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md" role="alert">
        <p class=" font-bold">Error</p>
        <p class="text-sm">{{ session('error') }}</p>
    </div>
    @endif

    @include('livewire.inc.create-todo')
    @include('livewire.inc.search-box')
    <div id="todos-list">
        @forelse ($todos as $todo)
        @include('livewire.inc.todo-card')
        @empty
        <h1 class="font-semibold text-lg text-gray-400 mb-5 text-center">No Todo...</h1>
        @endforelse

        <div class="my-2">
            {{ $todos->links() }}
        </div>
    </div>
</div>