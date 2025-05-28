{{-- filepath: /home/ronaldo/web/utfpr/dev-web/hortmann-cars/laravel/resources/views/admin/vehicles/edit.blade.php --}}
@extends('layouts.admin')
@section('content')
    <fieldset class="fieldset bg-base-200 border-base-300 rounded-box mx-auto border p-4">
        <legend class="fieldset-legend">Editar Veículo</legend>

        <form action="{{ route('admin.vehicles.update', $vehicle->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input hidden name="is_active" value="1" />
            <div class="mt-4 grid grid-cols-1 gap-2 sm:grid-cols-2 md:grid-cols-3">
                <div>
                    <label for="type">Tipo<span class="text-error">*</span></label>
                    <select id="type" name="type" class="select validator mt-1 w-full cursor-pointer" required>
                        <option value="" disabled>Selecione o tipo</option>
                        <option value="car" {{ old('type', $vehicle->type) == 'car' ? 'selected' : '' }}>Carro</option>
                        <option value="motorcycle" {{ old('type', $vehicle->type) == 'motorcycle' ? 'selected' : '' }}>Moto
                        </option>
                    </select>
                    <p class="validator-hint hidden">Selecione o tipo do veículo</p>
                    @error('type')
                        <div class="text-error mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="model">Modelo<span class="text-error">*</span></label>
                    <input id="model" name="model" type="text" value="{{ old('model', $vehicle->model) }}"
                        class="input mt-1 block w-full">
                    @error('model')
                        <div class="text-error mt-1 text-sm font-bold">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="manufacturer">Fabricante<span class="text-error">*</span></label>
                    <input id="manufacturer" name="manufacturer" type="text"
                        value="{{ old('manufacturer', $vehicle->manufacturer) }}" class="input mt-1 block w-full">
                    @error('manufacturer')
                        <div class="text-error mt-1 text-sm font-bold">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="fuel_type">Tipo de Combustível</label>
                    <select id="fuel_type" name="fuel_type" class="select mt-1 w-full cursor-pointer">
                        <option value="" disabled>Selecione</option>
                        <option value="gasoline"
                            {{ old('fuel_type', $vehicle->fuel_type) == 'gasoline' ? 'selected' : '' }}>Gasolina</option>
                        <option value="alcohol" {{ old('fuel_type', $vehicle->fuel_type) == 'alcohol' ? 'selected' : '' }}>
                            Álcool</option>
                        <option value="flex" {{ old('fuel_type', $vehicle->fuel_type) == 'flex' ? 'selected' : '' }}>Flex
                        </option>
                        <option value="diesel" {{ old('fuel_type', $vehicle->fuel_type) == 'diesel' ? 'selected' : '' }}>
                            Diesel</option>
                    </select>
                    @error('fuel_type')
                        <div class="text-error mt-1 text-sm font-bold">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="steering_type">Tipo de Direção</label>
                    <select id="steering_type" name="steering_type" class="select mt-1 w-full cursor-pointer">
                        <option value="" disabled>Selecione a direção</option>
                        <option value="mechanical"
                            {{ old('steering_type', $vehicle->steering_type) == 'mechanical' ? 'selected' : '' }}>Mecânica
                        </option>
                        <option value="hydraulic"
                            {{ old('steering_type', $vehicle->steering_type) == 'hydraulic' ? 'selected' : '' }}>Hidráulica
                        </option>
                        <option value="electric"
                            {{ old('steering_type', $vehicle->steering_type) == 'electric' ? 'selected' : '' }}>Elétrica
                        </option>
                    </select>
                    @error('steering_type')
                        <div class="text-error mt-1 text-sm font-bold">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="transmission">Transmissão</label>
                    <select id="transmission" name="transmission" class="select mt-1 w-full cursor-pointer">
                        <option value="" disabled>Selecione</option>
                        <option value="manual"
                            {{ old('transmission', $vehicle->transmission) == 'manual' ? 'selected' : '' }}>Manual</option>
                        <option value="automatic"
                            {{ old('transmission', $vehicle->transmission) == 'automatic' ? 'selected' : '' }}>Automática
                        </option>
                    </select>
                    @error('transmission')
                        <div class="text-error mt-1 text-sm font-bold">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="doors">Portas</label>
                    <input id="doors" name="doors" type="number" value="{{ old('doors', $vehicle->doors) }}"
                        class="input mt-1 block w-full">
                    @error('doors')
                        <div class="text-error mt-1 text-sm font-bold">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="year">Ano</label>
                    <input id="year" name="year" type="number" value="{{ old('year', $vehicle->year) }}"
                        class="input mt-1 block w-full">
                    @error('year')
                        <div class="text-error mt-1 text-sm font-bold">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="mileage">Quilometragem Atual</label>
                    <input id="mileage" name="mileage" type="text" value="{{ old('mileage', $vehicle->mileage) }}"
                        class="input mt-1 block w-full">
                    @error('mileage')
                        <div class="text-error mt-1 text-sm font-bold">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="price">Preço<span class="text-error">*</span></label>
                    <label class="input" for="price">
                        R$
                        <input id="price" name="price" type="text" value="{{ old('price', $vehicle->price) }}"
                            class="mt-1 grow">
                    </label>
                    @error('price')
                        <div class="text-error mt-1 text-sm font-bold">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="license_plate">Placa</label>
                    <input id="license_plate" name="license_plate" type="text"
                        value="{{ old('license_plate', $vehicle->license_plate) }}" class="input mt-1 block w-full">
                    @error('license_plate')
                        <div class="text-error mt-1 text-sm font-bold">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="is_active">Ativo</label>
                    <select id="is_active" name="is_active" class="select mt-1 w-full cursor-pointer">
                        <option value="1" {{ old('is_active', $vehicle->is_active) == 1 ? 'selected' : '' }}>Sim
                        </option>
                        <option value="0" {{ old('is_active', $vehicle->is_active) == 0 ? 'selected' : '' }}>Não
                        </option>
                    </select>
                    @error('is_active')
                        <div class="text-error mt-1 text-sm font-bold">{{ $message }}</div>
                    @enderror
                </div>

                <div class="sm:col-span-2">
                    <label for="description">Descrição</label>
                    <textarea id="description" name="description" class="textarea mt-1 block w-full">{{ old('description', $vehicle->description) }}</textarea>
                    @error('description')
                        <div class="text-error mt-1 text-sm font-bold">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mt-6 flex justify-end">
                <button type="submit" class="btn btn-outline cursor-pointer">Salvar</button>
            </div>
        </form>
    </fieldset>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const priceInput = document.getElementById('price');

        priceInput.addEventListener('input', (e) => {
            let value = e.target.value.replace(/\D/g, '');
            value = (value / 100).toFixed(2);
            value = value.replace('.', ',');
            e.target.value = `${value}`;
        });
    });
</script>
