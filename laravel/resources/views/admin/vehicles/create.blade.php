@extends('layouts.admin')
@section('content')
    <section class="mx-auto max-w-7xl md:rounded-md md:mt-8 p-6 shadow-md dark:bg-gray-900">
        <h2 class="text-lg font-semibold capitalize text-gray-700 dark:text-white">Criar Veículo</h2>

        <form action="{{ route('admin.vehicles.store') }}" method="POST">
            @csrf
            <input hidden name="is_active" value="1"/>
            <div class="mt-4 grid grid-cols-1 gap-5 sm:grid-cols-2">
                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="type">Tipo<span class="text-red-700">*</span></label>
                    <select id="type" name="type"
                        class="cursor-pointer mt-1 block w-full rounded-md border border-gray-200 bg-white px-4 py-2 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-blue-300">
                        <option value="car" {{ old('type') == 'car' ? 'selected' : '' }}>Carro</option>
                        <option value="motorcycle" {{ old('type') == 'motorcycle' ? 'selected' : '' }}>Moto</option>
                    </select>
                    @error('type')
                        <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="model">Modelo<span class="text-red-700">*</span></label>
                    <input id="model" name="model" type="text" value="{{ old('model') }}"
                        class="mt-1 block w-full rounded-md border border-gray-200 bg-white px-4 py-2 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-blue-300">
                    @error('model')
                        <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="manufacturer">Fabricante<span class="text-red-700">*</span></label>
                    <input id="manufacturer" name="manufacturer" type="text" value="{{ old('manufacturer') }}"
                        class="mt-1 block w-full rounded-md border border-gray-200 bg-white px-4 py-2 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-blue-300">
                    @error('manufacturer')
                        <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="fuel_type">Tipo de Combustível</label>
                    <select id="fuel_type" name="fuel_type"
                        class="cursor-pointer mt-1 block w-full rounded-md border border-gray-200 bg-white px-4 py-2 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-blue-300">
                        <option value="gasoline" {{ old('fuel_type') == 'gasoline' ? 'selected' : '' }}>Gasolina</option>
                        <option value="alcohol" {{ old('fuel_type') == 'alcohol' ? 'selected' : '' }}>Álcool</option>
                        <option value="flex" {{ old('fuel_type') == 'flex' ? 'selected' : '' }}>Flex</option>
                        <option value="diesel" {{ old('fuel_type') == 'diesel' ? 'selected' : '' }}>Diesel</option>
                    </select>
                    @error('fuel_type')
                        <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="steering_type">Tipo de Direção</label>
                    <select id="steering_type" name="steering_type"
                        class="cursor-pointer mt-1 block w-full rounded-md border border-gray-200 bg-white px-4 py-2 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-blue-300">
                        <option value="mechanical" {{ old('steering_type') == 'mechanical' ? 'selected' : '' }}>Mecânica</option>
                        <option value="hydraulic" {{ old('steering_type') == 'hydraulic' ? 'selected' : '' }}>Hidráulica</option>
                        <option value="electric" {{ old('steering_type') == 'electric' ? 'selected' : '' }}>Elétrica</option>
                    </select>
                    @error('steering_type')
                        <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="transmission">Transmissão</label>
                    <select id="transmission" name="transmission"
                        class="cursor-pointer mt-1 block w-full rounded-md border border-gray-200 bg-white px-4 py-2 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-blue-300">
                        <option value="manual" {{ old('transmission') == 'manual' ? 'selected' : '' }}>Manual</option>
                        <option value="automatic" {{ old('transmission') == 'automatic' ? 'selected' : '' }}>Automática</option>
                    </select>
                    @error('transmission')
                        <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="doors">Portas</label>
                    <input id="doors" name="doors" type="number" min="0" max="5" value="{{ old('doors') }}"
                        class="mt-1 block w-full rounded-md border border-gray-200 bg-white px-4 py-2 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-blue-300">
                    @error('doors')
                        <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="year">Ano</label>
                    <input id="year" name="year" type="text" placeholder="YYYY" value="{{ old('year') }}"
                        class="mt-1 block w-full rounded-md border border-gray-200 bg-white px-4 py-2 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-blue-300">
                    @error('year')
                        <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="mileage">Quilometragem Atual</label>
                    <input id="mileage" name="mileage" type="text" value="{{ old('mileage') }}"
                        class="mt-1 block w-full rounded-md border border-gray-200 bg-white px-4 py-2 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-blue-300">
                    @error('mileage')
                        <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="price">Preço<span class="text-red-700">*</span></label>
                    <input id="price" name="price" type="number" step="0.01" value="{{ old('price') }}"
                        class="mt-1 block w-full rounded-md border border-gray-200 bg-white px-4 py-2 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-blue-300">
                    @error('price')
                        <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="license_plate">Placa</label>
                    <input id="license_plate" name="license_plate" type="text" value="{{ old('license_plate') }}"
                        class="mt-1 block w-full rounded-md border border-gray-200 bg-white px-4 py-2 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-blue-300">
                    @error('license_plate')
                        <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <div class="sm:col-span-2">
                    <label class="text-gray-700 dark:text-gray-200" for="description">Descrição</label>
                    <textarea id="description" name="description" rows="4" value="{{ old('description') }}"
                        class="mt-1 block w-full rounded-md border border-gray-200 bg-white px-4 py-2 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-blue-300"></textarea>
                    @error('description')
                        <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mt-6 flex justify-end">
                <button type="submit"
                    class="cursor-pointer transform rounded-md bg-gray-700 px-8 py-2.5 leading-5 text-white transition-colors duration-300 hover:bg-gray-600 focus:bg-gray-600 focus:outline-none">Salvar</button>
            </div>
        </form>
    </section>
@endsection