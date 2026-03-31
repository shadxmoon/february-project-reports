<x-main-layout>
    <x-slot:title>Создание заявления</x-slot:title>
    <main class="flex items-center justify-center mt-60 flex-col">
        <h1 class="text-main-100 text-3xl mb-5">Создание заявления</h1>
        <div class="bg-main-300 px-7 py-7 rounded-2xl">
            <div class="form-container">
                <form method="POST" action="{{route('report.store')}}">
                    @csrf
                    <x-car-input type="text" name="number" placeholder="Номер авто"></x-car-input>
                    <textarea class="bg-main-100 form-item px-5 py-3" rows="4" name="description" placeholder="Описание"></textarea>
                    <button class="bg-accent text-main-900 px-2 py-2 rounded-xl text-xl">Отправить</button>
                </form>
            </div>
        </div>
    </main>
</x-main-layout>