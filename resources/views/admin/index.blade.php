<x-main-layout>
    <x-slot:title>Административная панель</x-slot:title>
    
    <h1 class="text-main-200 text-2xl text-center mb-7">Административная панель</h1>

    <div class="grid grid-cols-4 gap-x-15 gap-y-6 text-main-300 items-end px-10 bg-main-700 py-10 rounded-2xl">
        
        <div class="font-semibold pb-2 border-b border-accent ">ФИО</div>
        <div class="font-semibold pb-2 border-b border-accent ">Текст заявления</div>
        <div class="font-semibold pb-2 border-b border-accent ">Номер автомобиля</div>
        <div class="font-semibold pb-2 border-b border-accent ">Статус заявления</div>

        @foreach ($reports as $report)
            <div class="py-2 border-b border-main-200/20">
                {{ $report->user->lastname }} {{ $report->user->name }} {{ $report->user->middlename }}
            </div>

            <div class="py-2 border-b border-main-200/20 break-words">
                {{ $report->description }}
            </div>

            <div class="py-2 border-b border-main-200/20">
                {{ $report->number }}
            </div>

            <div class="py-2 border-b border-main-200/20">
                @if($report->status->name == "новое")
                    <form method="POST" action="{{ route('reports.status.update', $report->id) }}" class="w-full">
                        @csrf
                        @method('PATCH')
                        <select name="status_id" 
                                class="max-w-50 cursor-pointer bg-main-200 px-2 py-1 rounded-md text-black focus:outline-none" 
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