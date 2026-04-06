<div class="flex flex-col">
    <x-input-label for="path_img" :value="__('Загрузите фото')"/>
    <x-text-input id="path_img" class="block mt-1 hover:bg-soft-accent" type="file" name="path_img" required/>
    <x-input-error :messages="$errors->get('path_img')" class="mt-2 text-main-300"></x-input-error>
</div>