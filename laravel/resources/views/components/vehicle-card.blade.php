<a class="card bg-base-200 w-96 shadow-sm" href="{{ route('admin.vehicles.show', $vehicle->id) }}">
    <figure>
        <img src="{{ asset('storage/vehicles/nMFXUrMZwgGtH8V8tY4yD1AdKiXS0nMif7GI0F2Y.jpg') }}"
            alt="car" />
    </figure>
    <div class="card-body">
        <h2 class="card-title">
            {{ $vehicle->getAttributeFormated('manufacturer') }} {{ $vehicle->getAttributeFormated('model') }}
        </h2>
        <div>
            <div class="badge badge-neutral"> {{ $vehicle->getAttributeFormated('year') }}</div>
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
