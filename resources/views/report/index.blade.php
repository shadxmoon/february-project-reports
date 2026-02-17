<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-main-500">
    <header style="background-color: white;" class="reports-header">
        <h1 class="font-bold text-blue-700" style="font-size: 48px;">НАРУШЕНИЙ<span class="text-red-500">.НЕТ<span></h1>
        <h3 style="font-size: 18px;" class="font-bold">носова ольга бедросовна</h3>
    </header>
    <main class="reports-section mt-3">
        <button class="create-report bg-red-500 text-white">
            создать заявление
        </button>
        <div class="grid-container mb-11">
             @foreach ($reports as $report)
            <div class="card">
                <div class="options">
                    <span class="text-red-500 font-bold">{{$report->created_at}}</span>
                    <div>
                        <span class="font-bold">ред. </span>
                        <span class="font-bold">удалить</span>                        
                    </div>
                </div>
                <p class="font-bold">{{$report->number}}</p>
                <p>{{$report->description}}</p>
                <p class="mt-6">статус заявления - </p>
            </div>
            @endforeach           
        </div>
    </main>
</body>
</html>