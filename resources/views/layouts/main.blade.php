<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-main-800 min-h-screen flex flex-col">
    <header>
        @include('layouts.navigation')
    </header>
    @include('layouts.flash-messages')
    
    <main class="flex-1 w-full mx-auto max-w-full mt-3 mb-3 xl:py-5 lg:py-3 md:py-6 px-14 ">
        {{ $slot }}
    </main>
    <footer class="mt-6 sm:w-full">
        <div class="bg-main-900 w-full items-center p-7 sm:px-6 lg:px-8">
            <div class="flex h-full px-10">
                <p class="text-main-400">&copy; Нарушений нет, 2026.</p>
            </div>
        </div>
    </footer>
</body>
</html>