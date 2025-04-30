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
        <div class="mb-2 text-center">
            <span class="text-md text-gray-600">
                Resultado da busca ({{ count($vehicles) }})
            </span>
        </div>
        <div class="container mx-auto px-5 pb-24">
            <div class="-m-4 flex flex-wrap">
                @foreach ($vehicles as $vehicle)
                    <x-vehicle-card :vehicle="$vehicle" />
                @endforEach
            </div>
            <div class="mt-6">
                {{ $vehicles->appends(request()->query())->links() }}
            </div>
        </div>
    </section>
@endsection
