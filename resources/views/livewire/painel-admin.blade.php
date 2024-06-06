<div class="flex h-screen ">
    <!-- sidebar -->
    <div class="hidden md:flex flex-col w-64 bg-gray-800">
        <div class="flex items-center justify-center h-16 bg-gray-900">
            <span class="text-white font-bold uppercase">Noticias</span>
        </div>
        <div class="flex flex-col flex-1 overflow-y-auto">
            <nav class="flex-1 px-2 py-4 bg-gray-800">
                <a href="#" class="flex items-center px-4 py-2 text-gray-100 hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    Dashboard
                </a>
            </nav>
        </div>
    </div>
    <!-- Main content -->
    <div class="flex flex-col flex-1 ">
        <div class="flex items-center justify-between h-16  border-b border-gray-200">
            <div class="flex items-center px-4">
            </div>
            <div class="flex items-center pr-4">
                <livewire:logout :wire:key="'logout22'" />
            </div>
        </div>
        <div class="">
            <div>
                <div class="text-center mb-10 mt-5">
                    <h1 class="text-4xl font-bold">Crie sua Notícia</h1>
                </div>
                <livewire:criar-noticia :wire:key="'criar_noticia'" name />

            </div>
            <div class="">
                <livewire:list-noticias :wire:key="'listar_noticia'" />
            </div>
        </div>
    </div>

</div>
