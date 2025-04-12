@extends('layouts.admin')
@section('content')
    <section class="relative py-4">
        <div class="mx-auto w-full max-w-7xl px-4 md:px-8">
            <form action="{{ route('admin.vehicles.index') }}" method="GET" class="mb-6">
                <div class="flex flex-wrap justify-between gap-4">
                    <select name="type" class="rounded border-2 border-gray-500 px-4 py-2">
                        <option value="">Todos os Tipos</option>
                        <option value="car" {{ request('type') == 'car' ? 'selected' : '' }}>Carro</option>
                        <option value="motorcycle" {{ request('type') == 'motorcycle' ? 'selected' : '' }}>Moto</option>
                    </select>
                    
                    <div>
                        <select name="sort" class="rounded border-2 border-gray-500 px-4 py-2">
                            <option value="">Ordenar por</option>
                            <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Preço (Menor
                                para Maior)</option>
                            <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Preço (Maior
                                para Menor)</option>
                        </select>

                        <button type="submit"
                            class="cursor-pointer rounded bg-blue-500 px-4 py-2 text-white hover:bg-blue-600 focus:outline-none">
                            Filtrar
                        </button>
                    </div>
                </div>
            </form>
            <svg class="mt-7 w-full" xmlns="http://www.w3.org/2000/svg" width="1216" height="2" viewBox="0 0 1216 2"
                fill="none">
                <path d="M0 1H1216" stroke="#E5E7EB" />
            </svg>

        </div>
    </section>
    <section class="body-font text-gray-600">
        <span>
            <p class="mb-2 text-center text-md text-gray-600">Resultado da busca ({{ count($vehicles) }})</p>
        </span>
        <div class="container mx-auto px-5 pb-24">
            <div class="-m-4 flex flex-wrap">
                @foreach ($vehicles as $vehicle)
                    <div class="w-full p-4 md:w-1/2 lg:w-1/4">
                        <a href="{{ route('admin.vehicles.show', $vehicle->id) }}">
                            <div class="relative block h-48 overflow-hidden rounded">
                                <img alt="ecommerce" class="block h-full w-full object-cover object-center"
                                    src="{{ strtolower($vehicle->model) == 'hb20' ? asset('images/hb20-large.webp') : asset('images/vehicle.png') }}">
                            </div>
                            <div class="mt-4">
                                <h3 class="title-font mb-1 text-sm tracking-widest text-gray-600">
                                    {{ $vehicle->manufacturer }}</h3>
                                <h2 class="title-font text-lg font-medium text-gray-900">{{ $vehicle->model }}</h2>
                                <p class="mt-1">R${{ $vehicle->price }}</p>
                            </div>
                        </a>
                    </div>
                @endforEach
            </div>
            <div class="mt-6">
                {{ $vehicles->appends(request()->query())->links() }}
            </div>
        </div>
    </section>
@endsection
