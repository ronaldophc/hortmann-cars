@extends('layouts.admin')
@section('content')
    <div class="mx-auto max-w-7xl p-4 text-xl">
        <form action="{{ route('admin.vehicles.index') }}" method="GET"
            class="mb-8 flex flex-wrap items-end justify-center gap-4">

            <div class="w-full md:max-w-32">
                <label for="type" class="mb-1 font-semibold">Tipo</label>
                <select name="type" id="type" class="select select-lg select-bordered w-full">
                    <option value="">Todos</option>
                    <option value="car" {{ request('type') == 'car' ? 'selected' : '' }}>Carro</option>
                    <option value="motorcycle" {{ request('type') == 'motorcycle' ? 'selected' : '' }}>Moto</option>
                </select>
            </div>
            <div class="w-full md:max-w-64">
                <label for="sort" class="mb-1 font-semibold">Ordenar por</label>
                <select name="sort" id="sort" class="select select-lg select-bordered w-full">
                    <option value="">Mais recentes</option>
                    <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Preço: Menor para maior
                    </option>
                    <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Preço: Maior para
                        menor</option>
                    <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Mais recentes</option>
                    <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Mais antigos</option>
                </select>
            </div>

            <div class="w-full md:max-w-64">
                <label for="search" class="mb-1 font-semibold">Pesquisar</label>
                <input type="text" name="search" id="search" value="{{ request('search') }}"
                    class="input input-lg w-full">
            </div>

            <button type="submit" class="btn btn-lg btn-primary w-full md:w-auto">Filtrar</button>
        </form>
        <div class="px-5 pb-24">
            <div class="mb-2 text-center">
                <span class="text-lg">
                    Resultado da busca ({{ count($vehicles) }})
                </span>
            </div>
            <div class="flex flex-wrap justify-center gap-10">
                @foreach ($vehicles as $vehicle)
                    <x-vehicle-card :vehicle="$vehicle" :isAdmin="true"/>
                @endforEach
            </div>
            <div class="mt-8 flex justify-center">
                {{ $vehicles->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
@endsection
