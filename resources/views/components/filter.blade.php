@props(['sort', 'status'])

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