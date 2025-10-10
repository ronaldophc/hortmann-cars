<div class="flex flex-col mb-8 bg-base-200 rounded-xl shadow-lg">
    <div class="flex items-center justify-between px-6 py-4 border-b">
        <div class="flex items-center gap-4">
            <a href="{{ route('settings.customers.index') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-12">
            </a>
            <div>
                <h1 class="text-2xl font-bold">Painel de Configurações</h1>
                <p class="text-base-content/70 text-sm">Gerencie domínios e subdomínios do sistema</p>
            </div>
        </div>
        <div>
            @include('components.theme-controller')
        </div>
    </div>
    <div class="tabs tabs-boxed mt-2 px-6">
        <a href="{{ route('settings.customers.index') }}"
           class="tab flex items-center gap-2 {{ request()->routeIs('settings.customers.index') ? 'tab-active' : '' }}">
            <i class="fa fa-globe"></i>
            Domínios
        </a>
        <a href="{{ route('settings.customers.index') }}"
           class="tab flex items-center gap-2 {{ request()->routeIs('settings.customers.index') ? 'tab-active' : '' }}">
            <i class="fa fa-sitemap"></i>
            Subdomínios
        </a>
    </div>
</div>
