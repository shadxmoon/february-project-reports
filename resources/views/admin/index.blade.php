<x-main-layout>
    <x-slot:title>Административная панель</x-slot:title>
    <h1 class="text-main-200 text-2xl text-center mb-5 mt-5">Административная панель</h1>
    @if (session('error'))
    <div class="text-main-300 text-center mb-5 bg-main-600 py-2">
        <h2 class="text-main-200">Ошибка</h2>
        {{ session('error') }}
    </div>
    @endif
    @if (session('success'))
    <div class="text-main-200 text-center mb-5 bg-main-600 py-2">
        {{ session('success') }}
    </div>
    @endif
    <div class="grid grid-cols-4 text-main-300 gap-5 px-14">
        <div class="flex flex-col gap-2">
            <h2 class="font-bold">ФИО</h2>
            @foreach ($reports as $report)
            <div>
                <p>{{ $report->user->lastname }} {{ $report->user->name }} {{ $report->user->middlename }}</p>
            </div>
            @endforeach
        </div>

        <div class="flex flex-col gap-2">
          <h2 class="font-bold">Текст заявления</h2>
          @foreach ($reports as $report)
          <div>
            <p>{{ $report->description}}</p>
        </div>
        @endforeach  
        </div>
        
        <div class="flex flex-col gap-2">
          <h2 class="font-bold">Номер автомобиля</h2>
        @foreach ($reports as $report)
        <div>
            <p>{{ $report->number }}</p>
        </div>
        @endforeach
  
        </div>
        
        <div class="flex flex-col gap-2">
            
            <h2 class="font-bold">Статус заявления</h2>
            @foreach ($reports as $report)
            <form class="status-form w-1/2" method="POST" action="{{ route('reports.status.update', $report->id) }}">
                @csrf
                @method('PATCH')
                <select name="status_id" class="form-select bg-main-200 text-black" onchange="this.form.submit()">
                    @foreach ($statuses as $status)
                    <option value="{{ $status->id }}" {{ $report->status_id == $status->id ? 'selected' : '' }}>
                        {{ $status->name }}
                    </option>
                    @endforeach
                </select>
            </form>
            @endforeach
        </div>
        
    </div>
</x-main-layout>