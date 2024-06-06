<div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16">
    <div class="text-center mb-10">
        <h1 class="text-4xl font-bold">Página de Notícias</h1>
    </div>
    <div class="mb-5">
        <input type="text" class="border border-gray-400 p-2 rounded w-full" placeholder="Buscar por título..."
            wire:model="search" />
    </div>

    <div class="p-5">
        {{ $noticias->links() }}
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 sm:grid-cols-2 gap-10">
        @foreach ($noticias as $noticia)
            <div
                class="border-r border-b border-l border-gray-400 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r   justify-between leading-normal">
                <img src="{{ asset('storage/' . $noticia->imagem) }}" class="w-full h-5/12	mb-3">
                <div class="p-4 pt-0 ">
                    <div class="mb-8">
                        <a href="#"
                            class="text-gray-900 font-bold text-lg mb-2 hover:text-indigo-600 inline-block">{{ $noticia->titulo }}</a>
                    </div>
                    <div class="mb-4">
                        <p class="text-gray-700 text-sm">{{ $noticia->descricao }}</p>
                    </div>
                    <div class="flex items-center pt-0">
                        {{-- <a href="#"><img class="w-10 h-10 rounded-full mr-4" src="" alt="Avatar of Jonathan Reinink"></a> --}}
                        <div class="text-sm">
                            <a href="#"
                                class="text-gray-900 font-semibold leading-none hover:text-indigo-600">criador:{{ $noticia->user->name }}
                            </a>
                            <p class="text-gray-600">Criado:{{ $noticia->created_at }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach




    </div>
    <div class="p-5">
        {{ $noticias->links() }}
    </div>
</div>
