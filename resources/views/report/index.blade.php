<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <main class="reports-section mt-3">
        <button class="create-report bg-accent text-black py-1 px-3">
            <a href="/reports/create">
                создать заявление
            </a>
        </button>
        <div class="grid grid-cols-3 gap-11 auto-rows-fr mb-11 mt-10">
             @foreach ($reports as $report)
            <div class="card flex flex-col gap-2.5 h-full bg-main-300">
                <div class="options justify-self-start">
                    <div class="optn bg-main-100">
                        <span>номер авто</span>
                        <p class="font-bold text-main-900">{{$report->number}}</p>                         
                    </div>
                    <div class="optn bg-main-100">
                        <span>дата создания</span>
                        <p class="text-main-900 font-bold">{{$report->created_at}}</p>              
                    </div>
                </div>
                <div class="card-body h-auto flex-1 bg-white">
                    <p>{{$report->description}}</p>
                </div>
                <div class="justify-self-end flex flex-col gap-2">
                    <p>статус заявления - <span class="text-accent font-bold"></span></p>
                    <div class="options">
                        <form action="{{route('report.destroy', $report->id)}}" method="POST">
                            @method('delete')
                            @csrf
                            <button class="average-button bg-accent text-black px-2 py-2 rounded-4">
                                <input type="submit" value="удалить">                              
                            </button>
                        </form>
                        <a class="average-button bg-accent text-black px-2 py-2 rounded-4" href="{{route('report.edit', ['report'=>$report]) }}">
                            редактировать
                        </a>
                    </div> 
                </div>
            </div>
            @endforeach           
        </div>
    </main>
</body>
</html>