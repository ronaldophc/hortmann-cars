@extends('layouts.public')

@section('content')
    <div class="mx-auto max-w-7xl p-4">
        <h2 class="mb-6 text-center text-3xl font-bold">Nossos carros</h2>

        <form method="GET" class="mb-8 flex flex-col justify-center gap-2 md:flex-row md:items-end md:gap-4">
            <div>
                <label for="type" class="mb-1 block font-semibold">Tipo</label>
                <select name="type" id="type" class="select select-bordered w-full">
                    <option value="">Todos</option>
                    <option value="car" {{ request('type') == 'car' ? 'selected' : '' }}>Carro</option>
                    <option value="motorcycle" {{ request('type') == 'motorcycle' ? 'selected' : '' }}>Moto</option>
                </select>
            </div>
            <div>
                <label for="sort" class="mb-1 block font-semibold">Ordenar por</label>
                <select name="sort" id="sort" class="select select-bordered w-full">
                    <option value="">Mais recentes</option>
                    <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Preço: Menor para maior
                    </option>
                    <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Preço: Maior para
                        menor</option>
                </select>
            </div>
            <div class="mt-2 md:mt-0">
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </div>
        </form>

        <div class="px-5 pb-24">
            <div class="-mx-4 flex flex-wrap justify-center gap-2">
                @forelse ($vehicles as $vehicle)
                    <a class="card bg-base-200 mx-auto min-w-80 shadow-sm" href="">
                        <figure>
                            <img class="h-52 w-full object-cover"
                                src="{{ $vehicle->getMainImage() ?? 'https://dummyimage.com/400x250' }}" alt="car" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title">
                                {{ $vehicle->getAttributeFormated('manufacturer') }}
                                {{ $vehicle->getAttributeFormated('model') }}
                            </h2>
                            <div class="flex flex-wrap gap-2">
                                @if (!empty($vehicle->year))
                                    <div class="badge badge-neutral">{{ $vehicle->getAttributeFormated('year') }}</div>
                                @endif
                                @if (!empty($vehicle->mileage))
                                    <div class="badge badge-neutral">{{ $vehicle->getAttributeFormated('mileage') }} km
                                    </div>
                                @endif
                                @if (!empty($vehicle->transmission))
                                    <div class="badge badge-neutral">{{ $vehicle->getAttributeFormated('transmission') }}
                                    </div>
                                @endif
                            </div>
                            <div class="card-actions mt-4 justify-between">
                                <button class="btn btn-outline">{{ $vehicle->getAttributeFormated('price') }}</button>
                                <span class="btn btn-ghost">Ver detalhes</span>
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
