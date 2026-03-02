<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование заявления</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-main-800">
    <header class="reports-header bg-main-900">
        <a href="/reports">
            <h1 class="font-bold text-main-100 cursor-pointer text-5xl">нарушений<span class="text-accent">.net<span></h1>
        </a>
        <div>
            <h3 class="text-lg text-main-200 flex flex-row gap-2.5 items-center justify-center">
                носова ольга бедросовна
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6"><path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z" clip-rule="evenodd" /></svg>
            </h3>                
        </div>
    </header>
    <main class="flex items-center justify-center mt-60 flex-col">
        <h1 class="text-main-100 text-3xl mb-5">Редактирование заявления</h1>
        <div class="bg-main-300 px-7 py-7 rounded-2xl">
            <div class="form-container">
                <form method="POST" action="{{ route('report.update', ['report'=>$report]) }}">
                    @csrf
                    @method('put')
                    <input type="text" name="number" value='{{ $report->number }}' class="bg-main-100 form-item px-5 py-3" required>
                    <textarea class="bg-main-100 form-item px-5 py-3" rows="4" name="description" required>{{ $report->description }}</textarea>
                    <button class="bg-accent text-main-900 px-2 py-2 rounded-xl text-xl">Обновить</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>