<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
    @vite(['resources/css/app.css'])
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="container mx-auto mt-10 mb-10 max-w-lg">
    <h1 class="text-3xl font-bold mb-5">
        @yield('title')
    </h1>
    <div x-data="{ flash: true }" x-show="flash" x-transition>
        @if (session('success'))
        <div x-show="flash"
            class="success-message"
            role="alert">
            <strong>Success!</strong>
            <p>{{ session('success') }}</p>

            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" @click="flash = false"
                    stroke="currentColor" class="h-6 w-6 cursor-pointer">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </span>
        </div>
    </div>
    @endif
    @yield('content')
</body>
</html>