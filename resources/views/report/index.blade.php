<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-main-600">
    <header class="reports-header">
        <h1 class="font-bold text-white" style="font-size: 48px;">нарушений<span class="text-accent">.net<span></h1>
        <h3 style="font-size: 18px;" class="font-bold">носова ольга бедросовна</h3>
    </header>
    <main class="reports-section mt-3">
        <button class="create-report bg-accent text-black">
            <a href="/reports/create">
                создать заявление
            </a>
        </button>
        <div class="grid-container mb-11">
             @foreach ($reports as $report)
            <div class="card  bg-main-300">
                <div class="options bg-white">
                    <span class="text-accent-500 font-bold">{{$report->created_at}}</span>
                    <div>
                        <form method="DELETE" action="{{route('report.destroy', $report->id)}}">
                            @method('delete')
                            @csrf
                            <button class="bg-accent px-2 py-2 rounded-4">
                              <input type="submit" value="удалить" class="font-bold">                              
                            </button>
                        </form>                      
                    </div>

                </div>
                <div class="card-body bg-white">
                    <p class="font-bold">{{$report->number}}</p>
                    <p>{{$report->description}}</p>
                    <p class="mt-6">статус заявления - </p>
                </div>
            </div>
            @endforeach           
        </div>
    </main>
</body>
</html>