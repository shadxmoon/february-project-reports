<div x-data="{ fileName: 'Файл не выбран' }" class="flex flex-col gap-2">
    <x-input-label for="path_img" :value="__('Загрузите фото')"/>

    <div class="flex items-center gap-3">
        <label for="path_img" class="inline-flex cursor-pointer rounded-md bg-main-100 px-4 py-2 text-main-900 transition hover:bg-soft-accent">
            Выберите файл
        </label>
        <span class="text-sm text-main-700" x-text="fileName"></span>
    </div>

    <input
        id="path_img"
        class="hidden"
        type="file"
        name="path_img"
        required
        x-on:change="fileName = $event.target.files.length ? $event.target.files[0].name : 'Файл не выбран'"
    >

    <x-input-error :messages="$errors->get('path_img')" class="mt-2 text-main-300"></x-input-error>
</div>