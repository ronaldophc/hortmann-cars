<a class="card bg-base-200 w-80 shadow-sm" href="{{ route('admin.vehicles.show', $vehicle->id) }}">
    <figure>
        <img class='h-52 w-full' src="{{ $vehicle->getMainImage() }}" alt="car" />
        <x-cloudinary::image public-id="{{ $vehicle->getMainImage() }}" />
    </figure>
    <div class="card-body">
        <h2 class="card-title">
            {{ $vehicle->getAttributeFormated('manufacturer') }} {{ $vehicle->getAttributeFormated('model') }}
        </h2>
        <div>
            @if (!empty($vehicle->year))
                <div class="badge badge-neutral"> {{ $vehicle->getAttributeFormated('year') }}</div>
            @endif
            @if (!empty($vehicle->mileage))
                <div class="badge badge-neutral"> {{ $vehicle->getAttributeFormated('mileage') }} km</div>
            @endif
            @if (!empty($vehicle->transmission))
                <div class="badge badge-neutral"> {{ $vehicle->getAttributeFormated('transmission') }}</div>
            @endif
        </div>
        <div class="card-actions justify-between">
            <button class="btn btn-outline">{{ $vehicle->getAttributeFormated('price') }}</button>
            <button class="btn btn-ghost">Ver detalhes</button>
        </div>
    </div>
</a>
