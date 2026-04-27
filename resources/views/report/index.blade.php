
<x-main-layout>
    <x-slot:title>Заявления</x-slot:title>
    
    <div class="w-full flex flex-col gap-6">
        <div class="w-full flex flex-row justify-between mb-2 gap-4">
            <div class="flex items-center justify-center md:justify-normal">
                <a href="/reports/create" class="hover:bg-soft-accent items-center hover:scale-102 transition-transform duration-200 ease-in-out create-report bg-accent text-black py-1.5 px-3">
                    создать заявление
                </a>

            </div>
            <div class="shrink-0">
                <x-filter :sort=$sort :status=$status></x-filter>
            </div>
        </div>
        
           <div class="w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-6">
               @forelse ($reports as $report)
            <div class="card hover:scale-102 transition-transform duration-200 ease-in-out flex flex-col gap-2 bg-main-300">
                <div class="justify-self-start grid grid-cols-2 gap-2">
                    <div class="optn h-full text-center flex flex-col justify-center p-2 bg-main-100">
                        <span class="block text-sm sm:text-sm lg:text-[16px]">номер авто</span>
                        <p class="text-sm sm:text-sm lg:text-[16px] text-accent font-semibold">{{$report->number}}</p>                         
                    </div>
                    <div class="optn h-full text-center px-3 flex flex-col justify-center bg-main-100">
                        <span class="block text-sm sm:text-sm lg:text-[16px]">дата создания</span>
                        <p class="text-sm sm:text-sm lg:text-[16px] text-accent font-semibold">{{ \Carbon\Carbon::parse($report->created_at)->translatedFormat('j M Y h:i');}}</p>              
                    </div>
                </div>
                <div>
                    @isset($report->path_img)
                    <div class="overflow-hidden  aspect-[1] rounded-lg">
                        <img src="{{ Storage::url($report->path_img) }}" alt="Фото заявления" class="object-cover w-full h-full cursor-pointer hover:scale-102 transition-transform duration-300 hover:shadow-2xl" onclick="window.open(this.src, '_blank')" >
                    </div>
                        
                    @endisset
                </div>
                <div class="card-body group flex-1 min-h-21.25 bg-white overflow-hidden ">
                    <div class="relative max-h-18 overflow-hidden">
                       
                        <p class="whitespace-normal wrap-break-word @if (mb_strlen($report->description) > 140) description-clamp group-hover:blur-[1px] @endif">
                            {{ $report->description }}
                        </p>
                        @if (mb_strlen($report->description) > 140 )
                        <button type="button" class="read-more-btn absolute bottom-1 right-0 rounded-md text-soft-accent opacity-0 pointer-events-none transition-opacity duration-200 group-hover:opacity-100 group-hover:pointer-events-auto hover:-rotate-45 ease-in-out" aria-label="Открыть полный текст">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrows-angle-expand" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" stroke="var(--color-accent)" stroke-width="0.8" d="M5.828 10.172a.5.5 0 0 0-.707 0l-4.096 4.096V11.5a.5.5 0 0 0-1 0v3.975a.5.5 0 0 0 .5.5H4.5a.5.5 0 0 0 0-1H1.732l4.096-4.096a.5.5 0 0 0 0-.707m4.344-4.344a.5.5 0 0 0 .707 0l4.096-4.096V4.5a.5.5 0 1 0 1 0V.525a.5.5 0 0 0-.5-.5H11.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707"/>
                            </svg>
                        </button>
                        @endif
                        
                    </div>
                </div>
                <div class="justify-self-end flex flex-col gap-2">
                    <x-status :type="$report->status->id" class="font-semibold">{{ $report->status->name }}</x-status>
                    <div class="options">
                        <form action="{{route('report.destroy', $report->id)}}" method="POST">
                            @method('delete')
                            @csrf
                            <button class="average-button bg-accent text-black px-2 py-2 rounded-4" id="btn-delete" onClick="btnDeleteAction">
                                <input type="submit" class="cursor-pointer" value="удалить">                              
                            </button>
                        </form>
                        <a class="average-button bg-accent cursor-pointer text-black px-2 py-2 rounded-4" href="{{route('report.edit', ['report'=>$report]) }}">
                            редактировать
                        </a>
                    </div> 
                </div>
            </div>
            @empty
            <div class="col-span-full w-full rounded-2xl px-6 py-8 text-center text-lg text-main-400">
                @if (!empty($status))
                    Заявлений с таким статусом нет.
                @else
                    У вас пока нет заявлений.
                @endif
            </div>
            @endforelse
            @if ($reports->isNotEmpty())
                <div class="col-span-full">
                    {{ $reports->links() }}
                </div>
            @endif
        </div> 
    </div>

    <div id="report-modal" class="fixed inset-0 z-50 hidden items-center justify-center p-4" aria-hidden="true">
        <div class="modal-overlay absolute inset-0 bg-black/60"></div>
        <div class="modal-card relative z-10 w-full h-auto max-w-lg rounded-2xl bg-white p-6 shadow-2xl">
            <div class="mb-4 flex items-center justify-between">
                <h3 class="text-lg font-semibold text-main-900">Текст заявления</h3>
                <button type="button" id="modal-close-btn" class="rounded-md px-2 py-1 text-main-600 hover:bg-main-100" aria-label="Закрыть модалку">✕</button>
            </div>
            <div class="h-auto border-l-4 border-l-soft-accent p-2 pl-2 rounded-r-md bg-accent/20 mb-4">
              <p id="modal-description" class="overflow-y-auto whitespace-normal text-wrap wrap-break-word  text-main-900"></p>  
            </div>
            
            <div id="modal-image-header" class="mb-4 flex items-center justify-between">
                <h3 class="text-lg font-semibold text-main-900">Фото к заявлению</h3>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="var(--color-accent)"  class="cursor-pointer bi bi-paperclip" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0z"/>
                </svg>
            </div>
            <div class="rounded-lg bg-main-200 py-2 flex items-center justify-center">
              <img src="" alt="Фото заявления" id="modal-image" class="hidden max-h-[60vh] rounded-lg object-contain">  
            </div>
            
            <p id="modal-image-empty" class="hidden rounded-md bg-main-100 px-4 py-3 text-main-600">Фото к этому заявлению не прикреплено.</p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modal = document.getElementById('report-modal');
            const modalCard = document.querySelector('.modal-card');
            const modalText = document.getElementById('modal-description');
            const modalImage = document.getElementById('modal-image');
            const modalImageHeader = document.getElementById('modal-image-header');
            const modalImageEmpty = document.getElementById('modal-image-empty');
            const closeBtn = document.getElementById('modal-close-btn');

            if (!modal || !modalText || !modalImage || !modalImageHeader || !modalImageEmpty || !closeBtn) {
                return;
            }

            const openModal = (text, imageSrc) => {
                modalText.textContent = text;

                if (imageSrc) {
                    modalImage.src = imageSrc;
                    modalImage.classList.remove('hidden');
                    modalImageHeader.classList.remove('hidden');
                    modalImageEmpty.classList.add('hidden');
                } else {
                    modalImage.removeAttribute('src');
                    modalImage.classList.add('hidden');
                    modalImageHeader.classList.add('hidden');
                    modalImageEmpty.classList.remove('hidden');
                }

                modal.classList.remove('hidden');
                modal.classList.add('flex');
                modal.setAttribute('aria-hidden', 'false');
                document.body.classList.add('overflow-hidden');
            };

            const closeModal = () => {
                modalCard.classList.add('closing-card');
                setTimeout(() => {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                    modal.setAttribute('aria-hidden', 'true');
                    document.body.classList.remove('overflow-hidden');
                    modalCard.classList.remove('closing-card');
                }, 200);
            };

            document.querySelectorAll('.read-more-btn').forEach((btn) => {
                btn.addEventListener('click', function (event) {
                    event.preventDefault();
                    const card = this.closest('.card');
                    const cardBody = this.closest('.card-body');
                    const imageEl = card ? card.querySelector('img[alt="Фото заявления"]') : null;
                    const descriptionEl = cardBody ? cardBody.querySelector('p') : null;
                    const fullText = descriptionEl ? descriptionEl.textContent.trim() : '';
                    const imageSrc = imageEl ? imageEl.getAttribute('src') : '';

                    openModal(fullText, imageSrc);
                });
            });

            closeBtn.addEventListener('click', closeModal);

            modal.addEventListener('click', function (event) {
                if (event.target.classList.contains('modal-overlay')) {
                    closeModal();
                }
            });

            document.addEventListener('keydown', function (event) {
                if (event.key === 'Escape' && !modal.classList.contains('hidden')) {
                    closeModal();
                }
            });
        });
    </script>
    
</x-main-layout>