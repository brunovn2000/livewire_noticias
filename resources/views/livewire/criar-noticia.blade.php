<div>
    <section class="flex items-center justify-center pt-4">
        <div
            class="max-w-4xl w-full bg-white p-8 rounded-lg shadow-md flex flex-col md:flex-row md:items-start md:justify-between">

            <!-- Formulário -->
            <form wire:submit.prevent="salvarNoticia" class="md:w-2/3 mr-8">
                <!-- Campo Oculto para ID da Notícia -->
                <input type="hidden" wire:model="noticiaId">

                <!-- Post titulo Section -->
                <div class="mb-6">
                    <label for="titulo" class="block text-gray-700 text-sm font-bold mb-2">Titulo da noticia:</label>
                    <input type="titulo" wire:model="titulo" name="titulo" id="titulo" placeholder="Digite o titulo"
                        minlength="6"
                        class="w-full px-4 py-3 rounded-lg  mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none"
                        required>
                    @error('titulo')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Post Content Section -->
                <div class="mb-6">
                    <label for="descricaoNoticia" class="block text-gray-700 text-sm font-bold mb-2">Descricão da
                        noticia:</label>
                    <textarea id="postContent" wire:model="descricao" name="postContent" rows="4"
                        class="w-full border-2 rounded-md px-4 py-2 leading-5 transition duration-150 ease-in-out sm:text-sm sm:leading-5 resize-none focus:outline-none focus:border-blue-500"
                        placeholder="Descreva aqui a noticia"></textarea>
                    <span class="text-gray-500 text-sm">Max 280 caracteres</span>
                    <div>
                        @error('descricao')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="flex justify-center items-center bg-blue-500 hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue text-white py-4 px-8 rounded-md transition duration-300 gap-4">
                        @if ($noticiaId)
                            Atualizar
                        @else
                            Criar
                        @endif
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24"
                            id="send" fill="#fff">
                            <path fill="none" d="M0 0h24v24H0V0z"></path>
                            <path
                                d="M3.4 20.4l17.45-7.48c.81-.35.81-1.49 0-1.84L3.4 3.6c-.66-.29-1.39.2-1.39.91L2 9.12c0 .5.37.93.87.99L17 12 2.87 13.88c-.5.07-.87.5-.87 1l.01 4.61c0 .71.73 1.2 1.39.91z">
                            </path>
                        </svg>
                        <button wire:click="limparCampos"
                            class="bg-gray-300 hover:bg-gray-700 text-white  py-1 px-1 rounded">
                            Limpar campos
                        </button>
                    </button>
                </div>


                <!-- Mensagem de Sucesso -->
                <div class="py-3">
                    @if (session()->has('sucess_create'))
                        <div class="bg-green-100 border-t border-b border-green-500 text-green-700 px-4 py-3"
                            role="alert">
                            <p class="font-bold">Sucesso</p>
                            <p class="text-sm">{{ session('sucess_create') }}</p>
                        </div>
                    @endif
                </div>
            </form>

            <!-- Adicionar uma imagem -->
            <div class="relative mt-4 md:mt-0 md:w-1/3">
                <label for="adicionarImagem" class="block text-gray-700 text-sm font-bold mb-2">Adicionar uma
                    imagem:</label>
                <div
                    class="relative border-2 rounded-md px-4 py-3 bg-white flex items-center justify-between hover:border-blue-500 transition duration-150 ease-in-out">
                    <input type="file" wire:model="imagem" id="adicionarImagem" name="adicionarImagem"
                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        <span class="ml-2 text-sm text-gray-600">
                            {{ $imagemNome ? (strlen($imagemNome) > 10 ? substr($imagemNome, 0, 10) . '...' : $imagemNome) : 'Escolha o arquivo' }}
                        </span>
                    </div>
                    <span class="text-sm text-gray-500">Tamanho maximo: 5MB</span>
                </div>
                @if ($imagemPreview)
                    <div class="mt-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Pré-visualização da imagem:</label>
                        <img src="{{ $imagemPreview }}" alt="Image Preview" class="w-full h-auto rounded-md"
                            style="width: 300px; height: 300px; object-fit: cover;">
                    </div>
                @endif
                @error('imagem')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </section>
</div>
