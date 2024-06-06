<div>
    <section class="flex flex-col md:flex-row h-screen items-center">

        <div class="bg-indigo-600 hidden lg:block w-full md:w-1/2 xl:w-2/3 h-screen">
          <img src="https://source.unsplash.com/random" alt="" class="w-full h-full object-cover">
        </div>
      
        <div class="bg-white w-full md:max-w-md lg:max-w-full md:mx-auto md:mx-0 md:w-1/2 xl:w-1/3 h-screen px-6 lg:px-16 xl:px-12
              flex items-center justify-center">
      
          <div class="w-full h-100">
      
      
            <h1 class="text-xl md:text-2xl font-bold leading-tight mt-12">Crie sua conta</h1>
      
            <form class="mt-6" wire:submit.prevent="cadastro">
             <div>
                <label class="block text-gray-700">nome </label>
                <input type="text" name="" id=""  wire:model="nome" placeholder="Digite seu nome" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none" autofocus autocomplete required>
                @error('nome') <span>{{ $message }}</span> @enderror

              </div>
              <div>
                <label class="block text-gray-700">Email </label>
                <input type="email" name="" id="" wire:model="email" placeholder="Digite se email" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none" autofocus autocomplete required>
                @error('email') <span>{{ $message }}</span> @enderror

              </div>
      
              <div class="mt-4">
                <label class="block text-gray-700">Senha</label>
                <input type="password" wire:model="password" name="" id="" placeholder="Digite sua senha" minlength="6" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500
                      focus:bg-white focus:outline-none" required>
                      @error('password') <span>{{ $message }}</span> @enderror

              </div>
      
              <div class="text-right mt-2">
                <a href="#" class="text-sm font-semibold text-gray-700 hover:text-blue-700 focus:text-blue-700">Esqueci minha senha</a>
              </div>
              <div class="text-left mt-2">
                <a href="{{ url('/login')}}" class="text-sm font-semibold text-gray-700 hover:text-blue-700 focus:text-blue-700">Login</a>
              </div>
      
              <button type="submit" class="w-full block bg-indigo-500 hover:bg-indigo-400 focus:bg-indigo-400 text-white font-semibold rounded-lg
                    px-4 py-3 mt-6">cadastrar</button>
            </form>
      

      
      
      
          </div>
        </div>
      
      </section>
</div>
