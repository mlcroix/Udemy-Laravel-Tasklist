<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
    @vite(['resources/css/app.css'])
</head>
<body class="container mx-auto mt-10 mb-10 max-w-lg">
    <h1 class="text-3xl font-bold mb-5">
        @yield('title')
    </h1>
    <div>
        @if (session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif
        @yield('content')
    </div>
</body>
</html>