@extends('layouts.app')

@section('title', 'Todo - Index')

@section('content')
    <div class="my-4">
        <a href="{{ route('todos.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Add New Todo
        </a>
    </div>

    <div class="flex flex-wrap -mx-4">
        @forelse ($todos as $todo)
            <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/3 xl:w-1/5 px-4 mb-4">
                <a href="{{ route('todos.show', $todo->id) }}" class="block bg-white shadow-md rounded p-4">
                    <p class="font-semibold">{{ $todo->title }}</p>
                </a>
            </div>
        @empty
            <p class="text-gray-700">No todos available.</p>
        @endforelse
    </div>

    <div class="my-4">
        @if ($todos->count())
            {{ $todos->links() }}
        @endif
    </div>
@endsection
