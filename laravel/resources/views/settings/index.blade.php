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

        <div class="grid gap-4">
            @forelse($customers as $customer)
                <a class="block rounded-xl border border-base-300 bg-base-100 p-4 shadow hover:bg-base-200 transition" href="{{ route('settings.customers.edit', $customer->id) }}">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-lg font-semibold">{{ $customer->name }}</h2>
                            <p class="text-sm text-base-content/70">Dominio: {{ $customer->domain }}</p>
                            <p class="text-sm text-base-content/70">Sub Dominio: {{ $customer->subdomain }}</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="badge badge-info badge-outline">{{ $customer->active }}</span>
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
                    </div>
                </a>
            @empty
                <div class="alert alert-info">
                    Nenhuma empresa cadastrada.
                </div>
            @endforelse
        </div>
    </div>
@endsection
