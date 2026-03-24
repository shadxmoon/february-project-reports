<x-app-layout>
    <main class="px-5 mt-3 xl:px-24 xl:py-5 xl:mt-3 lg:px-11 lg:py-3 md:px-9 md:py-6">
        <div class="flex flex-row justify-between">
            <div class="flex items-center justify-center md:justify-normal">
                <button class="create-report bg-accent text-black py-1 px-3">
                    <a href="/reports/create">
                        создать заявление
                    </a>
                </button>
            </div>
            <div class="flex flex-row gap-5">
                <div class="text-center">
                    <span class="text-main-200 text-center">сортировка по статусу</span>
                    <ul class="flex flex-row gap-5 items-center">
                        @foreach ($statuses as $status)
                        <li>
                            <a href="{{ route('report.index', [ 'sort' => $sort, 'status' => $status->id]) }}" class="option-link text-main-400">{{ $status->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="text-center">
                    <span class="text-main-200">сортировка по дате создания</span>
                    <div class="flex flex-row gap-5 items-center">
                        <a href="{{ route('report.index', ['sort' => 'desc', 'status' => $status]) }}" class=" option-link text-main-400">сначала новые</a>
                        <a href="{{ route('report.index', ['sort' => 'asc', 'status' => $status]) }}" class="option-link text-main-400">сначала старые</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-2.5 mt-4 xl:grid 2xl:grid-cols-4 xl:gap-8 xl:auto-rows-fr xl:grid-cols-3 xl:mb-11 xl:mt-10 lg:gap-8 lg:mb-8 lg:grid-cols-3 lg:mt-8 md:grid md:grid-cols-2 md:gap-5 md:mt-6">
             @foreach ($reports as $report)
            <div class="card flex flex-col gap-2.5 h-full bg-main-300">
                <div class="options justify-self-start">
                    <div class="optn h-full text-center bg-main-100">
                        <span>номер авто</span>
                        <p class="font-bold text-main-900">{{$report->number}}</p>                         
                    </div>
                    <div class="optn h-full text-center bg-main-100">
                        <span>дата создания</span>
                        <p class="text-main-900 font-bold">{{$report->created_at}}</p>              
                    </div>
                </div>
                <div class="card-body h-auto flex-1 bg-white">
                    <p>{{$report->description}}</p>
                </div>
                <div class="justify-self-end flex flex-col gap-2">
                    <p>статус заявления - <span class="text-accent font-bold">{{ $report->status->name }}</span></p>
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
            {{ $reports->links() }}           
        </div>
    </main>
</x-app-layout>