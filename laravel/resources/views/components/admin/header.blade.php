<header class="text-gray-400 bg-gray-900 body-font">
  <div class="container mx-auto flex flex-wrap p-2 flex-col md:flex-row items-center">
    <a class="flex title-font font-medium items-center text-white mb-4 md:mb-0" href="{{ route('public.home') }}">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-10 h-10">
      <span class="ml-3 text-xl">{{ env('APP_NAME') }}</span>
    </a>
    <nav class="md:mr-auto md:ml-4 md:py-1 md:pl-4 md:border-l md:border-gray-700 flex flex-wrap items-center text-base justify-center">
      <a class="cursor-pointer mr-5 hover:text-white">Home</a>
      <a class="cursor-pointer mr-5 hover:text-white">Configurações</a>
    </nav>
  </div>
</header>