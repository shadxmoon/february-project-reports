<x-main-layout>
    <x-slot:title>Административная панель</x-slot:title>
    
    <h1 class="text-main-200 text-2xl text-center mb-10 mt-5">Административная панель</h1>

    <div class="grid grid-cols-4 gap-x-15 gap-y-6 text-main-300 items-center px-10">
        
        <div class="font-bold pb-2 border-b border-main-200/20">ФИО</div>
        <div class="font-bold pb-2 border-b border-main-200/20">Текст заявления</div>
        <div class="font-bold pb-2 border-b border-main-200/20">Номер автомобиля</div>
        <div class="font-bold pb-2 border-b border-main-200/20">Статус заявления</div>

        @foreach ($reports as $report)
            <div class="py-2">
                {{ $report->user->lastname }} {{ $report->user->name }} {{ $report->user->middlename }}
            </div>

            <div class="py-2 break-words">
                {{ $report->description }}
            </div>

            <div class="py-2">
                {{ $report->number }}
            </div>

            <div class="py-2">
                @if($report->status->name == "новое")
                    <form method="POST" action="{{ route('reports.status.update', $report->id) }}" class="w-full">
                        @csrf
                        @method('PATCH')
                        <select name="status_id" 
                                class="w-full cursor-pointer bg-main-200 px-2 py-1 rounded-md text-black focus:outline-none" 
                                onchange="this.form.submit()">
                            @foreach ($statuses as $status)
                                <option value="{{ $status->id }}" {{ $report->status_id == $status->id ? 'selected' : '' }}>
                                    {{ $status->name }}
                                </option>
                            @endforeach
                        </select>
                    </form>
                @else
                    <span class="px-2 py-1 rounded-md bg-opacity-10 
                        {{ $report->status->name == 'отклонено' ? 'text-main-400' : 'text-accent' }}">
                        {{ $report->status->name }}
                    </span>
                @endif
            </div>
        @endforeach
    </div>
</x-main-layout>