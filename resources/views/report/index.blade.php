
<x-main-layout>
    <x-slot:title>Заявления</x-slot:title>
    
    <div class="flex flex-col gap-6">
           <div class="flex flex-row justify-between">
            <div class="flex items-center justify-center md:justify-normal">
                <button class="create-report bg-accent text-black py-1 px-3">
                    <a href="/reports/create">
                        создать заявление
                    </a>
                </button>
            </div>
            <x-filter :sort=$sort :status=$status></x-filter>
        </div>
        
        <div class="w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
             @foreach ($reports as $report)
            <div class="card flex flex-col gap-2 h-full bg-main-300">
                <div class="justify-self-start grid grid-cols-2 gap-2">
                    <div class="optn h-full text-center flex flex-col justify-center p-2 bg-main-100">
                        <span>номер авто</span>
                        <p class=" text-main-900 font-semibold">{{$report->number}}</p>                         
                    </div>
                    <div class="optn h-full text-center px-3 flex flex-col justify-center bg-main-100">
                        <span>дата создания</span>
                        <p class="text-main-900 font-semibold">{{ \Carbon\Carbon::parse($report->created_at)->translatedFormat('j F Y h:i');}}</p>              
                    </div>
                </div>
                <div>
                    @isset($report->path_img)
                        <img src="{{ Storage::url($report->path_img) }}" alt="Фото заявления" class="w-full h-auto rounded-lg cursor-pointer hover:scale-102 transition-transform duration-300 hover:shadow-2xl" onclick="window.open(this.src, '_blank')" >
                    @endisset
                </div>
                <div class="card-body flex-1 min-h-[85px] bg-white">
                    <p>{{$report->description}}</p>
                </div>
                <div class="justify-self-end flex flex-col gap-2">
                    <x-status :type="$report->status->id" class="font-semibold">{{ $report->status->name }}</x-status>
                    <div class="options">
                        <form action="{{route('report.destroy', $report->id)}}" method="POST">
                            @method('delete')
                            @csrf
                            <button class="average-button bg-accent text-black px-2 py-2 rounded-4" id="btn-delete" onClick="btnDeleteAction">
                                <input type="submit" value="удалить">                              
                            </button>
                        </form>
                        <a class="average-button bg-accent text-black px-2 py-2 rounded-4" href="{{route('report.edit', ['report'=>$report]) }}">
                            редактировать
                        </a>
                    </div> 
                </div>
            </div>
            @endforeach
            {{ $reports->links() }}           
        </div> 
    </div>
    
</x-main-layout>