@extends('layouts.public')

@section('content')
    <div class="mx-auto max-w-7xl p-4">
        <h2 class="mb-6 text-center text-3xl font-bold">Nossos carros</h2>

        <form action="{{ route('stock') }}" method="GET" class="mb-8 flex flex-wrap items-end justify-center gap-4">

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
                <input type="text" name="search" id="search" value="{{ old('search') }}" class="input input-lg w-full">
            </div>

            <button type="submit" class="btn btn-lg btn-primary w-full md:w-auto">Filtrar</button>
        </form>

        <div class="px-5 pb-24">
            <div class="flex flex-wrap justify-center gap-2">
                @forelse ($vehicles as $vehicle)
                    <a class="card bg-base-200 mx-auto w-80 shadow-sm" href="">
                        <figure class="h-52 w-full">
                            <x-cloudinary::image public-id="{{ $vehicle->getMainImage() }}" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title text-xl">
                                {{ $vehicle->getAttributeFormated('manufacturer') }}
                                {{ $vehicle->getAttributeFormated('model') }}
                            </h2>
                            <div class="flex h-8 items-center gap-2">
                                @if (!empty($vehicle->year))
                                    <div class="badge badge-neutral text-md"> {{ $vehicle->getAttributeFormated('year') }}
                                    </div>
                                @endif
                                @if (!empty($vehicle->mileage))
                                    <div class="badge badge-neutral text-md">
                                        {{ $vehicle->getAttributeFormated('mileage') }} km</div>
                                @endif
                                @if (!empty($vehicle->transmission))
                                    <div class="badge badge-neutral text-md">
                                        {{ $vehicle->getAttributeFormated('transmission') }}</div>
                                @endif
                            </div>
                            <div class="card-actions flex flex-row justify-between">
                                <button
                                    class="btn btn-outline text-lg">{{ $vehicle->getAttributeFormated('price') }}</button>
                                <button class="btn btn-ghost text-md">Ver detalhes</button>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="col-span-3 text-center text-lg">Nenhum veículo encontrado.</div>
                @endforelse
            </div>
        </div>

        <div class="mt-8 flex justify-center">
            {{ $vehicles->withQueryString()->links() }}
        </div>
    </div>
@endsection
