<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Todo App</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="font-sans bg-gray-100">

    @if (session()->has('success'))
        @include('components.success_alert', ['message' => session('success')])
    @elseif (session()->has('warning'))
        @include('components.warning_alert', ['message' => session('warning')])
    @elseif (session()->has('error'))
        @include('components.error_alert', ['message' => session('error')])
    @endif

    <div class="container mx-auto p-4 mt-2 mx-8">
        <a href="{{ route('todos.index') }}" class="text-blue-500 hover:underline">Home</a>
        <div class="mt-6">
            <h1 class="text-3xl font-bold">@yield('title')</h1>
            <div class="mt-4">@yield('content')</div>
        </div>
    </div>

</body>

</html>
