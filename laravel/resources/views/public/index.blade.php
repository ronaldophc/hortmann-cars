@extends('layouts.public')
@section('content')
    <section class="body-font text-gray-600">
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
                                    {{ $vehicle->getAttributeFormated("manufacturer") }}</h3>
                                <h2 class="title-font text-lg font-medium text-gray-900">{{ $vehicle->getAttributeFormated("model") }}</h2>
                                <p class="text-sm text-gray-500">
                                    {{ $vehicle->getAttributeFormated("year") }} - {{ $vehicle->getAttributeFormated("mileage") }} km</p>
                                <p class="mt-1">{{ $vehicle->getAttributeFormated("price") }}</p>
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
