<x-main-layout>
    <x-slot:title>Редактирование заявления</x-slot:title>
    <div class="flex min-h-[70vh] flex-col items-center justify-center">
        <h1 class="text-main-100 text-3xl mb-5">Редактирование заявления</h1>
        <div class="w-full max-w-xl bg-main-300 px-7 py-7 rounded-2xl">
            <div class="form-container">
                <form class="w-full" method="POST" action="{{ route('report.update', ['report'=>$report]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <input type="text" name="number" value='{{ $report->number }}' class="w-full bg-main-100 form-item px-5 py-3" required>
                    <textarea class="w-full bg-main-100 form-item px-5 py-3" rows="4" name="description" required>{{ $report->description }}</textarea>
                    @if ($report->path_img)
                        <div class="mb-4 flex flex-col gap-2">
                            <p class="text-main-800">Текущее фото</p>
                            <img src="{{ Storage::url($report->path_img) }}" alt="Текущее фото заявления" class="max-h-80 w-auto rounded-xl object-cover">
                            <p class="text-sm text-main-400">Выберите новый файл, если хотите заменить текущее фото.</p>
                        </div>
                    @endif

                    <x-input-file :required="false" file-name="Оставить текущее фото"/>
                    <button class="hover:bg-soft-accent hover:scale-102 transition-transform duration-200 ease-in-out w-full bg-accent text-main-900 px-2 py-2 rounded-xl text-xl">Обновить</button>
                </form>
            </div>
        </div>
    </div>
</x-main-layout>