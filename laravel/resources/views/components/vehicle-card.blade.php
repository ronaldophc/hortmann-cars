<div class="w-full p-2 m-2 md:w-1/2 lg:w-1/4 border-1 rounded-lg border-gray-800 bg-gray-900">
    <a href="{{ route('admin.vehicles.show', $vehicle->id) }}">
        <div class="relative block h-48 overflow-hidden rounded">
            <img alt="ecommerce" class="block h-full w-full object-cover object-center"
                 src="{{ strtolower($vehicle->model) == 'hb20' ? asset('images/hb20-large.webp') : asset('images/vehicle.png') }}">
        </div>
        <div class="mt-4">
            <h3 class="title-font mb-1 text-sm tracking-widest text-gray-200">
                {{ $vehicle->getAttributeFormated("manufacturer") }}
            </h3>
            <h2 class="title-font text-lg font-medium text-gray-200">{{ $vehicle->getAttributeFormated("model") }}</h2>
            <p class="text-sm text-gray-400">
                @if (!empty($vehicle->year))
                    {{ $vehicle->getAttributeFormated("year") }}
                @endif
                @if (!empty($vehicle->mileage) && !empty($vehicle->year))
                        -
                @endif
                @if (!empty($vehicle->mileage))
                    {{ $vehicle->getAttributeFormated("mileage") }} km
                @endif
            </p>
            <p class="mt-1 text-gray-100">{{ $vehicle->getAttributeFormated("price") }}</p>
        </div>
    </a>
</div>
