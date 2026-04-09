@props(['sort', 'status'])

<div class="flex flex-row gap-5 lg:gap-10">
    
    <div class="text-center hidden lg:block">
        <span class="text-main-200 text-center">сортировка по статусу</span>
            <ul class="flex gap-2 flex-row lg:gap-5 items-center">
                @foreach ($statuses as $status)
                    <li>
                        <a href="{{ route('report.index', [ 'sort' => $sort, 'status' => $status->id]) }}" class="option-link text-main-400">{{ $status->name }}</a>
                    </li>
                @endforeach
            </ul>
    </div>
    <div class="text-center hidden lg:block">
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
    <a href="{{ route('report.index', ['status' => $statuses]) }}" class="hidden lg:block option-link text-main-400">Все</a>

    <div class="block lg:hidden">
        <x-dropdown>
            <x-slot name="trigger">
                <div class="-me-2 flex items-center">
                    <button class="inline-flex items-center gap-2 justify-center p-2 rounded-md text-main-400 hover:text-accent  focus:outline-none focus:text-soft-accent transition duration-150 ease-in-out">
                        Сортировка
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-up" viewBox="0 0 16 16">
                        
                            <path fill-rule="evenodd" d="M11.5 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L11 2.707V14.5a.5.5 0 0 0 .5.5m-7-14a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V1.5a.5.5 0 0 1 .5-.5"/>
                        </svg>
                    </button>
                </div>
            </x-slot>
            <div class="hidden sm:flex sm:items-center ">>
                <x-slot name="content" class="hidden sm:hidden">
                    <div class="flex flex-col gap-2 px-2">
                        <div class="pl-2">
                            <span class="block py-1 text-main-600 border-b border-main-200">по статусу</span>
                            <ul class="flex flex-col gap-1">
                                @foreach ($statuses as $status)
                                <li>
                                    <x-dropdown-link :href="route('report.index', [ 'sort' => $sort, 'status' => $status->id])" class="option-link text-main-400">{{ $status->name }}</x-dropdown-link>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="pl-2">
                            <span class="block py-1 text-main-600 border-b border-main-200">по дате создания</span>
                            <ul class="flex flex-col gap-1">
                                <li>
                                    <x-dropdown-link :href="route('report.index', ['sort' => 'desc'])" class=" option-link text-main-400">сначала новые</x-dropdown-link>
                                </li>
                                <li>
                                    <x-dropdown-link :href="route('report.index', ['sort' => 'asc'])" class="option-link text-main-400">сначала старые</x-dropdown-link>
                                </li>
                            </ul>
                        </div>
                    </div>
                </x-slot> 
            </div>
        </x-dropdown>
    </div>
    
</div>