@extends('layouts.admin')
@section('content')
    <div class="container">
        <section class="body-font overflow-hidden text-gray-600">
            <div class="container mx-auto px-5 py-24">
                <div class="mx-auto flex flex-wrap lg:w-4/5">
                    <div class="mb-6 w-full lg:mb-0 lg:w-1/2 lg:py-6 lg:pr-10">
                        <h2 class="title-font text-sm tracking-widest text-gray-500">{{ $vehicle->manufacturer }}</h2>
                        <h1 class="title-font text-3xl font-medium text-gray-900">{{ $vehicle->model }}</h1>
                        <div class="mb-4 flex">
                            <a class="flex-grow border-b-2 border-gray-300 px-1 py-2 text-lg"></a>
                        </div>
                        <p class="mb-4 leading-relaxed">{{ $vehicle->description }}</p>
                        <div class="flex border-t border-gray-200 py-2">
                            <span class="text-gray-500">Tipo</span>
                            <span class="ml-auto text-gray-900">{{ $vehicle->getAttributeFormated('type') }}</span>
                        </div>
                        <div class="flex border-t border-gray-200 py-2">
                            <span class="text-gray-500">Tipo de Combustível</span>
                            <span class="ml-auto text-gray-900">{{ $vehicle->getAttributeFormated('fuel_type') }}</span>
                        </div>
                        <div class="flex border-t border-gray-200 py-2">
                            <span class="text-gray-500">Direção</span>
                            <span class="ml-auto text-gray-900">{{ $vehicle->getAttributeFormated('steering_type') }}</span>
                        </div>
                        <div class="flex border-t border-gray-200 py-2">
                            <span class="text-gray-500">Portas</span>
                            <span class="ml-auto text-gray-900">{{ $vehicle->getAttributeFormated('doors') }}</span>
                        </div>
                        <div class="flex border-t border-gray-200 py-2">
                            <span class="text-gray-500">Ano</span>
                            <span class="ml-auto text-gray-900">{{ $vehicle->getAttributeFormated('year') }}</span>
                        </div>
                        <div class="flex border-t border-gray-200 py-2">
                            <span class="text-gray-500">Quilometragem</span>
                            <span class="ml-auto text-gray-900">{{ $vehicle->getAttributeFormated('mileage') }}</span>
                        </div>
                        <div class="flex border-t border-gray-200 py-2">
                            <span class="text-gray-500">Transmissão</span>
                            <span class="ml-auto text-gray-900">{{ $vehicle->getAttributeFormated('transmission') }}</span>
                        </div>
                        <div class="flex border-t border-gray-200 py-2">
                            <span class="text-gray-500">Placa</span>
                            <span
                                class="ml-auto text-gray-900">{{ $vehicle->getAttributeFormated('license_plate') }}</span>
                        </div>
                        <div class="flex border-t border-gray-200 py-2">
                            <span class="text-gray-500">Ativo</span>
                            <span
                                class="ml-auto text-gray-900">{{ $vehicle->getAttributeFormated('is_active') }}</span>
                        </div>

                        <div class="flex">
                            <span class="title-font text-2xl font-medium text-gray-900">R${{ $vehicle->price }}</span>
                            <a href="{{ route('admin.vehicles.edit', $vehicle->id) }}"
                                class="ml-auto flex cursor-pointer rounded border-0 bg-gray-700 px-6 py-2 text-white hover:bg-gray-800 focus:outline-none">Editar</a>
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
                    <img alt="ecommerce" class="h-64 w-full rounded object-cover object-center lg:h-auto lg:w-1/2"
                        src="https://dummyimage.com/400x400">
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
