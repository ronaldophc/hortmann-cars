<div class="navbar bg-base-300">
    <div class="navbar-start">
        <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
            </div>
            <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
                <li><a href="{{ route('admin.vehicles.index') }}" class="text-xl">Home</a></li>
                <li><a href="{{ route('admin.vehicles.create') }}" class="text-xl">Criar Veículo</a></li>
                <li><a href="{{ route('admin.settings') }}" class="text-xl">Configurações</a></li>
                <li><a target="_blank" href="{{ route('home') }}" class="text-xl">Ver Site</a></li>
            </ul>
        </div>
        <a class="btn btn-ghost flex items-center text-2xl" href="{{ route('admin.vehicles.index') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 w-10">
            <span>{{ config('app.name') }}</span>
        </a>
    </div>
    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal px-1 text-xl">
            <li><a href="{{ route('admin.vehicles.index') }}">Home</a></li>
            <li><a href="{{ route('admin.vehicles.create') }}">Criar Veículo</a></li>
            <li><a href="{{ route('admin.settings') }}">Configurações</a></li>
            <li><a target="_blank" href="{{ route('home') }}">Ver Site</a></li>
        </ul>
    </div>
    <div class="navbar-end gap-2">
        @include('components.theme-controller')
        <form action="{{ route('admin.logout') }}" method="POST" class="flex items-center">
            @csrf
            <button
                class="inline-flex cursor-pointer items-center rounded border-0 bg-red-500 px-4 text-base text-black hover:bg-red-600 focus:outline-none md:mt-0">
                <span class="leading-8 text-xl">Sair</span>
            </button>
        </form>
    </div>
</div>
