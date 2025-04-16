@extends('layouts.admin')
@section('content')
    <section class="mx-auto max-w-7xl p-6 shadow-md md:mt-8 md:rounded-md dark:bg-gray-900">
        <div class="flex items-center">
            <button onclick="history.back()"
                class="transform cursor-pointer rounded-md bg-gray-700 px-6 py-2 me-2 leading-5 text-white transition-colors duration-300 hover:bg-gray-600 focus:bg-gray-600 focus:outline-none">
                Voltar
            </button>
            <h2 class="text-lg font-semibold capitalize text-gray-700 dark:text-white">Editar Veículo</h2>
        </div>

        <form action="{{ route('admin.vehicles.update', $vehicle->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mt-4 grid grid-cols-1 gap-5 sm:grid-cols-2">
                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="type">Tipo<span class="text-red-700">*</span></label>
                    <select id="type" name="type"
                        class="mt-1 block w-full cursor-pointer rounded-md border border-gray-200 bg-white px-4 py-2 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-blue-300">
                        <option value="car" {{ $vehicle->type == 'car' ? 'selected' : '' }}>Carro</option>
                        <option value="motorcycle" {{ $vehicle->type == 'motorcycle' ? 'selected' : '' }}>Moto</option>
                    </select>
                    @error('type')
                        <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="model">Modelo<span class="text-red-700">*</span></label>
                    <input id="model" name="model" type="text" value="{{ $vehicle->model }}"
                        class="mt-1 block w-full rounded-md border border-gray-200 bg-white px-4 py-2 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-blue-300">
                    @error('model')
                        <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="manufacturer">Fabricante<span class="text-red-700">*</span></label>
                    <input id="manufacturer" name="manufacturer" type="text" value="{{ $vehicle->manufacturer }}"
                        class="mt-1 block w-full rounded-md border border-gray-200 bg-white px-4 py-2 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-blue-300">
                    @error('manufacturer')
                        <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="fuel_type">Tipo de Combustível</label>
                    <select id="fuel_type" name="fuel_type"
                        class="mt-1 block w-full cursor-pointer rounded-md border border-gray-200 bg-white px-4 py-2 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-blue-300">
                        <option value="gasoline" {{ $vehicle->fuel_type == 'gasoline' ? 'selected' : '' }}>Gasolina</option>
                        <option value="alcohol" {{ $vehicle->fuel_type == 'alcohol' ? 'selected' : '' }}>Álcool</option>
                        <option value="flex" {{ $vehicle->fuel_type == 'flex' ? 'selected' : '' }}>Flex</option>
                        <option value="diesel" {{ $vehicle->fuel_type == 'diesel' ? 'selected' : '' }}>Diesel</option>
                    </select>
                    @error('fuel_type')
                        <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="steering_type">Tipo de Direção</label>
                    <select id="steering_type" name="steering_type"
                        class="mt-1 block w-full cursor-pointer rounded-md border border-gray-200 bg-white px-4 py-2 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-blue-300">
                        <option value="mechanical" {{ $vehicle->steering_type == 'mechanical' ? 'selected' : '' }}>Mecânica
                        </option>
                        <option value="hydraulic" {{ $vehicle->steering_type == 'hydraulic' ? 'selected' : '' }}>Hidráulica
                        </option>
                        <option value="electric" {{ $vehicle->steering_type == 'electric' ? 'selected' : '' }}>Elétrica
                        </option>
                    </select>
                    @error('steering_type')
                        <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="transmission">Transmissão</label>
                    <select id="transmission" name="transmission"
                        class="mt-1 block w-full cursor-pointer rounded-md border border-gray-200 bg-white px-4 py-2 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-blue-300">
                        <option value="manual" {{ $vehicle->transmission == 'manual' ? 'selected' : '' }}>Manual</option>
                        <option value="automatic" {{ $vehicle->transmission == 'automatic' ? 'selected' : '' }}>Automática
                        </option>
                    </select>
                    @error('transmission')
                        <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="doors">Portas</label>
                    <input id="doors" name="doors" type="number" min="0" max="5"
                        value="{{ $vehicle->doors }}"
                        class="mt-1 block w-full rounded-md border border-gray-200 bg-white px-4 py-2 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-blue-300">
                    @error('doors')
                        <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="year">Ano</label>
                    <input id="year" name="year" type="text" placeholder="YYYY" value="{{ $vehicle->year }}"
                        class="mt-1 block w-full rounded-md border border-gray-200 bg-white px-4 py-2 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-blue-300">
                    @error('year')
                        <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="mileage">Quilometragem Atual</label>
                    <input id="mileage" name="mileage" type="text" value="{{ $vehicle->mileage }}"
                        class="mt-1 block w-full rounded-md border border-gray-200 bg-white px-4 py-2 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-blue-300">
                    @error('mileage')
                        <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="price">Preço<span class="text-red-700">*</span></label>
                    <input id="price" name="price" type="number" step="0.01" value="{{ $vehicle->price }}"
                        class="mt-1 block w-full rounded-md border border-gray-200 bg-white px-4 py-2 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-blue-300">
                    @error('price')
                        <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="license_plate">Placa</label>
                    <input id="license_plate" name="license_plate" type="text" value="{{ $vehicle->license_plate }}"
                        class="mt-1 block w-full rounded-md border border-gray-200 bg-white px-4 py-2 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-blue-300">
                    @error('license_plate')
                        <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="is_active">Ativo<span class="text-red-700">*</span></label>
                    <select id="is_active" name="is_active"
                        class="mt-1 block w-full cursor-pointer rounded-md border border-gray-200 bg-white px-4 py-2 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-blue-300">
                        <option value="1" {{ $vehicle->is_active ? 'selected' : '' }}>Sim</option>
                        <option value="0" {{ !$vehicle->is_active ? 'selected' : '' }}>Não</option>
                    </select>
                    @error('is_active')
                        <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <div class="sm:col-span-2">
                    <label class="text-gray-700 dark:text-gray-200" for="description">Descrição</label>
                    <textarea id="description" name="description" rows="4"
                        class="mt-1 block w-full rounded-md border border-gray-200 bg-white px-4 py-2 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-blue-300">{{ $vehicle->description }}</textarea>
                    @error('description')
                        <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mt-6 flex justify-end">
                <button type="submit"
                    class="transform cursor-pointer rounded-md bg-gray-700 px-8 py-2.5 leading-5 text-white transition-colors duration-300 hover:bg-gray-600 focus:bg-gray-600 focus:outline-none">Salvar</button>
            </div>
        </form>
    </section>
@endsection
