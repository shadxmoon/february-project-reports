<x-app-layout>
<body class="bg-main-800">
    <main class="flex items-center justify-center mt-60 flex-col">
        <h1 class="text-main-100 text-3xl mb-5">Редактирование заявления</h1>
        <div class="bg-main-300 px-7 py-7 rounded-2xl">
            <div class="form-container">
                <form method="POST" action="{{ route('report.update', ['report'=>$report]) }}">
                    @csrf
                    @method('put')
                    <input type="text" name="number" value='{{ $report->number }}' class="bg-main-100 form-item px-5 py-3" required>
                    <textarea class="bg-main-100 form-item px-5 py-3" rows="4" name="description" required>{{ $report->description }}</textarea>
                    <button class="bg-accent text-main-900 px-2 py-2 rounded-xl text-xl">Обновить</button>
                </form>
            </div>
        </div>
    </main>
</body>
</x-app-layout>