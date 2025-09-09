@extends('layouts.admin')
@section('content')
    <section class="pt-4 text-xl">
        <div class="mx-auto w-full max-w-7xl px-4 md:px-8">
            <form action="{{ route('admin.vehicles.index') }}" method="GET" >
                <div class="flex flex-wrap justify-between gap-4">
                    <select name="type" class="select select-primary text-xl">
                        <option value="">Todos os Tipos</option>
                        <option value="car" {{ request('type') == 'car' ? 'selected' : '' }}>Carro</option>
                        <option value="motorcycle" {{ request('type') == 'motorcycle' ? 'selected' : '' }}>Moto</option>
                    </select>

                    <div class="flex items-center gap-4">
                        <select name="sort" class="select select-primary text-xl">
                            <option value="">Ordenar por</option>
                            <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Preço (Menor
                                para Maior)</option>
                            <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Preço (Maior
                                para Menor)</option>
                        </select>

                        <button type="submit"
                            class="btn btn-accent text-xl">
                            Filtrar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <div class="divider"></div>
    <section class="body-font">
        <div class="mb-2 text-center">
            <span class="text-lg">
                Resultado da busca ({{ count($vehicles) }})
            </span>
        </div>
        <div class="container mx-auto px-5 pb-24">
            <div class="-mx-4 flex flex-wrap justify-center gap-2">
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
