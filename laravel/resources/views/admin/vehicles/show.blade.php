@extends('layouts.admin')
@section('content')
    <div class="container">
        <section class="body-font overflow-hidden">
            <div class="container px-5 py-24">
                <div class="flex flex-col md:mx-auto md:flex-row lg:w-4/5">
                    <div class="mb-6 w-full lg:mb-0 lg:w-1/2 lg:py-6 lg:pr-10">
                        <h2 class="title-font text-md tracking-widest">{{ $vehicle->manufacturer }}</h2>
                        <h1 class="title-font text-3xl font-medium">{{ $vehicle->model }}</h1>
                        @if (!empty($vehicle->description))
                            <div class="mb-4 flex">
                                <a class="flex-grow border-b-2 px-1 py-2 text-lg"></a>
                            </div>
                            <p class="mb-4 leading-relaxed">{{ $vehicle->description }}</p>
                        @endif
                        <x-show-car-detail name="Tipo" :value="$vehicle->getAttributeFormated('type')" />
                        <x-show-car-detail name="Tipo de Combustível" :value="$vehicle->getAttributeFormated('fuel_type')" />
                        <x-show-car-detail name="Direção" :value="$vehicle->getAttributeFormated('steering_type')" />
                        <x-show-car-detail name="Portas" :value="$vehicle->getAttributeFormated('doors')" />
                        <x-show-car-detail name="Ano" :value="$vehicle->getAttributeFormated('year')" />
                        <x-show-car-detail name="Quilometragem" :value="$vehicle->getAttributeFormated('mileage')" />
                        <x-show-car-detail name="Transmissão" :value="$vehicle->getAttributeFormated('transmission')" />
                        <x-show-car-detail name="Placa" :value="$vehicle->getAttributeFormated('license_plate')" />
                        <x-show-car-detail name="Ativo" :value="$vehicle->getAttributeFormated('is_active')" />

                        <div class="flex">
                            <span class="title-font text-info text-2xl font-bold">R${{ $vehicle->price }}</span>
                            <a href="{{ route('admin.vehicles.edit', $vehicle->id) }}"
                                class="btn btn-warning ml-auto">Editar</a>
                            <button onclick="confirmDelete({{ $vehicle->id }})"
                                class="ml-4 inline-flex h-10 w-10 cursor-pointer items-center justify-center rounded-full border-0 bg-gray-200 p-0 text-red-500 hover:bg-gray-300 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" class="h-7 w-7" viewBox="0 0 30 30">
                                    <path
                                        d="M 14.984375 2.4863281 A 1.0001 1.0001 0 0 0 14 3.5 L 14 4 L 8.5 4 A 1.0001 1.0001 0 0 0 7.4863281 5 L 6 5 A 1.0001 1.0001 0 1 0 6 7 L 24 7 A 1.0001 1.0001 0 1 0 24 5 L 22.513672 5 A 1.0001 1.0001 0 0 0 21.5 4 L 16 4 L 16 3.5 A 1.0001 1.0001 0 0 0 14.984375 2.4863281 z M 6 9 L 7.7929688 24.234375 C 7.9109687 25.241375 8.7633438 26 9.7773438 26 L 20.222656 26 C 21.236656 26 22.088031 25.241375 22.207031 24.234375 L 24 9 L 6 9 z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    @php
                        $images = $vehicle->getOrderedImages() ?? [];
                    @endphp
                    <x-admin.vehicle-image-carousel :images="$images" />
                    </div>
                </div>
        </section>
    </div>
    <form id="delete-form-{{ $vehicle->id }}" action="{{ route('admin.vehicles.destroy', $vehicle->id) }}" method="POST"
        style="display: none;">
        @csrf
        @method('DELETE')
    </form>
    <script>
        function confirmDelete(vehicleId) {
            Swal.fire({
                title: 'Tem certeza que deseja excluir?',
                text: "Você não poderá desfazer essa ação!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sim, excluir!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`delete-form-${vehicleId}`).submit();
                }
            });
        }
    </script>
@endsection
