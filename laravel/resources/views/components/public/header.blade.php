<div class="navbar bg-base-100 shadow-sm">
    <div class="navbar-start">
        <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 w-10">
                {{ config('app.name') }}
            </div>
            <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="#">Estoque</a></li>
                <li><a href="{{ route('contact') }}">Contato</a></li>
            </ul>
        </div>
        <a class="ms-4 text-xl flex items-center font-bold" href="{{ route('home') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 w-10">
            {{ config('app.name') }}
        </a>
    </div>
    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal px-1 text-md">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="#">Estoque</a></li>
            <li><a href="{{ route('contact') }}">Contato</a></li>
        </ul>
    </div>
    <div class="navbar-end">
        <a href="{{ route('admin.vehicles.index') }}" class="btn">Login Admin</a>
    </div>
</div>