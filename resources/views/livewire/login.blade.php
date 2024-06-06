<div>
    <section class="flex flex-col md:flex-row h-screen items-center">

        <div class="bg-indigo-600 hidden lg:block w-full md:w-1/2 xl:w-2/3 h-screen">
          <img src="https://neilpatel.com/wp-content/uploads/2019/06/maos-masculinas-teclando-em-laptop-em-mesa-de-escr.jpeg" alt="" class="w-full h-full object-cover">
        </div>
      
        <div class="bg-white w-full md:max-w-md lg:max-w-full md:mx-auto md:mx-0 md:w-1/2 xl:w-1/3 h-screen px-6 lg:px-16 xl:px-12
              flex items-center justify-center">
      
          <div class="w-full h-100">
      
      
            <h1 class="text-xl md:text-2xl font-bold leading-tight mt-12">Faça login na sua conta</h1>
      
            <form class="mt-6" wire:submit.prevent="logar">
              <div>
                <label class="block text-gray-700">Email </label>
                <input type="email" name="email" 
                wire:model="email"
                id="email" placeholder="Entre com seu email" 
                class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none" 
                autofocus autocomplete required>
                @error('email') <span>{{ $message }}</span> @enderror
              
              </div>
      
              <div class="mt-4">
                <label class="block text-gray-700">Senha</label>
                <input type="password" name="password" id="password" 
                wire:model="password"
                placeholder="Digite sua senha " minlength="6" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500
                      focus:bg-white focus:outline-none" required>
                @error('password') <span>{{ $message }}</span> @enderror
              </div>
              @error('auth') <span>{{ $message }}</span> @enderror

              <div class="text-right mt-2">
                <a href="#" class="text-sm font-semibold text-gray-700 hover:text-blue-700 focus:text-blue-700">Esqueci minha senha</a>
              </div>
      
              <button  type="submit" class="w-full block bg-indigo-500 hover:bg-indigo-400 focus:bg-indigo-400 text-white font-semibold rounded-lg
                    px-4 py-3 mt-6">Log In</button>
            </form>
      
            <hr class="my-6 border-gray-300 w-full">

      
            <p class="mt-8">Não possui conta? <a href="{{ url('/cadastro')}}"  class="text-blue-500 hover:text-blue-700 font-semibold">Cria sua conta aqui</a></p>
      
            @if (session()->has('error'))
              <div class="text-red-500">{{ session('error') }}</div>
            @endif
          </div>
        </div>
      
      </section>
</div>
