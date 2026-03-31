@props(['sort', 'status'])

<div class="flex flex-row gap-10">
    
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
            <ul class="flex flex-row gap-5 items-center">
                <li>
                    <a href="{{ route('report.index', ['sort' => 'desc']) }}" class=" option-link text-main-400">сначала новые</a>
                </li>
                <li>
                   <a href="{{ route('report.index', ['sort' => 'asc']) }}" class="option-link text-main-400">сначала старые</a> 
                </li> 
            </ul>
    </div>
    <a href="{{ route('report.index', ['status' => $statuses]) }}" class="option-link text-main-400">Все</a>
</div>