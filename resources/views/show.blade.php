@extends('layouts.app')

@section('title', 'Todo - Index')

@section('content')
    <div class="mb-4">
        @if (session()->has('error'))
            @include('components.error_alert', ['message' => session('error')])
        @endif
    </div>

    <div class="mb-4">
        <em class="text-gray-500 text-sm block mt-6 mb-4">{{ $todo->created_at }}</em>
        <div class="flex items-center space-x-16">
            <strong class="text-2xl font-bold">{{ $todo->title }}</strong>
        </div>
        <p class="text-gray-700">{{ $todo->description }}</p>
    </div>

    <div class="flex items-center space-x-4 my-4">
        <a href="{{ route('todos.edit', $todo->id) }}"
            class="bg-green-500 hover:bg-green-700 text-white px-4 py-2 rounded-2xl border-none transition duration-300 ease-in-out">Edit
            Todo</a>

        <form action="{{ route('todos.destroy', $todo->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="bg-red-500 hover:bg-red-700 text-white px-4 py-2 rounded-2xl border-none transition duration-300 ease-in-out">Delete
                Todo</button>
        </form>
    </div>
@endsection
