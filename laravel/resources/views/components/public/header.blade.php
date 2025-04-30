<header class="body-font bg-gray-900 text-gray-400">
    <div class="container mx-auto flex flex-col flex-wrap items-center p-5 md:flex-row">
        <a class="title-font mb-4 flex items-center font-medium text-white md:mb-0" href="{{ route('home') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 w-10">
            <span class="ml-3 text-xl">{{ config('app.name') }}</span>
        </a>
        <nav
            class="flex flex-wrap items-center justify-center text-base md:ml-4 md:mr-auto md:border-l md:border-gray-700 md:py-1 md:pl-4">
            <a class="mr-5 cursor-pointer hover:text-white">Home</a>
            <a class="mr-5 cursor-pointer hover:text-white">Estoque</a>
            <a class="mr-5 cursor-pointer hover:text-white" href="{{ route("contact") }}">Contato</a>
        </nav>
        <a href="{{ route('admin.vehicles.index') }}">
            <button
                class="mt-4 inline-flex cursor-pointer items-center rounded border-0 bg-gray-800 px-3 py-1 text-base hover:bg-gray-700 focus:outline-none md:mt-0">
                Login Admin
            </button>
        </a>
    </div>
</header>
