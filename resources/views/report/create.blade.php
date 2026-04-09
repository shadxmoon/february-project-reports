<x-main-layout>
    <x-slot:title>Создание заявления</x-slot:title>
    <div class="flex min-h-[70vh] flex-col items-center justify-center">
       <h1 class="text-main-100 text-3xl mb-5">Создание заявления</h1>
        <div class="w-full max-w-md bg-main-300 px-7 py-7 rounded-2xl">
            <div>
                <form class="w-full" method="POST" action="{{route('report.store')}}" enctype="multipart/form-data">
                    @csrf
                    <x-car-input class="w-full" type="text" name="number" placeholder="Номер авто" :value="old('number')" />
                    <x-input-error :messages="$errors->get('number')" class="mt-2 text-main-300" />
                    <textarea class="w-full bg-main-100 form-item px-5 py-3" rows="4" name="description" placeholder="Описание">{{ old('description') }}</textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2 text-main-300" />
                    <x-input-file/>
                    <button class=" hover:bg-soft-accent hover:scale-102 transition-transform duration-200 ease-in-out w-full bg-accent text-main-900 px-2 py-2 rounded-xl text-xl ">Отправить</button>
                </form>
            </div>
        </div> 
    </div>
        
</x-main-layout>