@extends('layouts.settings')
@section('content')
    <div class="container mx-auto py-8">
        @include('components.settings.header')

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Empresas Cadastradas</h1>
            <div class="flex items-center gap-2">
                <a href="{{ route('settings.customers.create') }}" class="btn btn-primary">
                    Nova Empresa
                </a>
                <form method="POST" action="{{ route('settings.logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-error flex items-center gap-2">
                        <i class="fa fa-sign-out-alt"></i>
                        Sair
                    </button>
                </form>
            </div>
        </div>

        <ul class="list list-bordered bg-base-100 rounded-xl shadow bg-base-200 rounded-xl shadow-lg">
            @forelse($customers as $customer)
                <li>
                    <a href="{{ route('settings.customers.edit', $customer->id) }}"
                       class="flex items-center justify-between px-4 py-3 border-b last:border-b-0">
                        <div>
                            <h2 class="font-semibold">{{ $customer->name }}</h2>
                            <p class="text-sm text-base-content/70">Dominio: {{ $customer->domain }}</p>
                            <p class="text-sm text-base-content/70">Sub
                                Dominios: {{ count($customer->subdomains()->get()) }}</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="badge badge-info badge-outline">{{ $customer->active }}</span>
                            <form method="POST" action="{{ route('settings.customers.destroy', $customer->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-error" title="Deletar">
                                    <i class="fa fa-trash"></i> Deletar
                                </button>
                            </form>
                            <form method="POST" action="{{ route('settings.customers.migrate', $customer->id) }}">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-accent" title="Rodar migrations"
                                        @if(!$customer->hasPendingMigrations) disabled @endif>
                                    <i class="fa fa-database"></i>Rodar migrations
                                </button>
                            </form>
                            <form method="POST" action="{{ route('settings.customers.seed', $customer->id) }}">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-accent" title="Rodar seeders"
                                        @if($customer->migrated) disabled @endif>
                                    <i class="fa fa-server"></i>Rodar seeders
                                </button>
                            </form>
                            <form method="POST" action="{{ route('settings.customers.refresh', $customer->id) }}">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-accent" title="Rodar seeders">
                                    <i class="fa fa-server"></i>Refresh
                                </button>
                            </form>
                        </div>
                    </a>
                </li>
            @empty
                <li class="alert alert-info">Nenhuma empresa cadastrada.</li>
            @endforelse
        </ul>
    </div>
@endsection
