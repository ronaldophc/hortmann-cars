<header class="body-font bg-gray-900 text-gray-400">
    <div class="container mx-auto flex flex-col flex-wrap items-center p-2 md:flex-row">
        <a class="title-font mb-4 flex items-center font-medium text-white md:mb-0" href="{{ route('public.home') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 w-10">
            <span class="ml-3 text-xl">{{ env('APP_NAME') }}</span>
        </a>

        <nav
            class="flex flex-wrap items-center justify-center text-base md:ml-4 md:mr-auto md:border-l md:border-gray-700 md:py-1 md:pl-4">
            <a class="mr-5 cursor-pointer leading-8 hover:text-white" href="{{ route('admin.dashboard') }}">Home</a>
            <a class="mr-5 cursor-pointer leading-8 hover:text-white">Configurações</a>
        </nav>

        <form action="{{ route('admin.logout') }}" method="POST" class="flex items-center">
            @csrf
            <button
                class="mt-4 inline-flex cursor-pointer items-center rounded border-0 bg-red-500 px-3 text-base text-black hover:bg-red-600 focus:outline-none md:mt-0">
                <span class="leading-8">Sair</span>
            </button>
        </form>
    </div>
</header>
