@extends('layouts.admin')
@section('content')
    <section class="bg-base-200 max-w-8xl mx-auto my-3 p-6 shadow-md md:my-8 md:rounded-md">
        <h2 class="text-xl font-bold">Criar Veículo</h2>

        <form action="{{ route('admin.vehicles.store') }}" method="POST">
            @csrf
            <input hidden name="is_active" value="1" />
            <div class="mt-4 grid grid-cols-1 gap-2 sm:grid-cols-2 md:grid-cols-3">
                <div>
                    <label for="type">Tipo<span class="text-error">*</span></label>
                    <select id="type" name="type" class="select mt-1 w-full cursor-pointer">
                        <option value="car" {{ old('type') == 'car' ? 'selected' : '' }}>Carro</option>
                        <option value="motorcycle" {{ old('type') == 'motorcycle' ? 'selected' : '' }}>Moto</option>
                    </select>
                    @error('type')
                        <div class="text-error mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="model">Modelo<span class="text-error">*</span></label>
                    <input id="model" name="model" type="text" value="{{ old('model') }}"
                        class="input mt-1 block w-full">
                    @error('model')
                        <div class="text-error mt-1 text-sm font-bold">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="manufacturer">Fabricante<span class="text-error">*</span></label>
                    <input id="manufacturer" name="manufacturer" type="text" value="{{ old('manufacturer') }}"
                        class="input mt-1 block w-full">
                    @error('manufacturer')
                        <div class="text-error mt-1 text-sm font-bold">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="fuel_type">Tipo de Combustível</label>
                    <select id="fuel_type" name="fuel_type" class="select mt-1 w-full cursor-pointer">
                        <option value="gasoline" {{ old('fuel_type') == 'gasoline' ? 'selected' : '' }}>Gasolina</option>
                        <option value="alcohol" {{ old('fuel_type') == 'alcohol' ? 'selected' : '' }}>Álcool</option>
                        <option value="flex" {{ old('fuel_type') == 'flex' ? 'selected' : '' }}>Flex</option>
                        <option value="diesel" {{ old('fuel_type') == 'diesel' ? 'selected' : '' }}>Diesel</option>
                    </select>
                    @error('fuel_type')
                        <div class="text-error mt-1 text-sm font-bold">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="steering_type">Tipo de Direção</label>
                    <select id="steering_type" name="steering_type" class="select mt-1 w-full cursor-pointer">
                        <option value="mechanical" {{ old('steering_type') == 'mechanical' ? 'selected' : '' }}>Mecânica
                        </option>
                        <option value="hydraulic" {{ old('steering_type') == 'hydraulic' ? 'selected' : '' }}>Hidráulica
                        </option>
                        <option value="electric" {{ old('steering_type') == 'electric' ? 'selected' : '' }}>Elétrica
                        </option>
                    </select>
                    @error('steering_type')
                        <div class="text-error mt-1 text-sm font-bold">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="transmission">Transmissão</label>
                    <select id="transmission" name="transmission" class="select mt-1 w-full cursor-pointer">
                        <option value="manual" {{ old('transmission') == 'manual' ? 'selected' : '' }}>Manual</option>
                        <option value="automatic" {{ old('transmission') == 'automatic' ? 'selected' : '' }}>Automática
                        </option>
                    </select>
                    @error('transmission')
                        <div class="text-error mt-1 text-sm font-bold">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="doors">Portas</label>
                    <input id="doors" name="doors" type="number" min="1" max="5"
                        value="{{ old('doors') }}" class="input mt-1 block w-full" min="1" max="6">
                    @error('doors')
                        <div class="text-error mt-1 text-sm font-bold">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="year">Ano</label>
                    <input id="year" name="year" type="number" placeholder="YYYY" value="{{ old('year') }}"
                        class="input mt-1 block w-full" min="1900" max="2026">
                    @error('year')
                        <div class="text-error mt-1 text-sm font-bold">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="mileage">Quilometragem Atual</label>
                    <input id="mileage" name="mileage" type="text" value="{{ old('mileage') }}"
                        class="input mt-1 block w-full">
                    @error('mileage')
                        <div class="text-error mt-1 text-sm font-bold">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="price">Preço<span class="text-error">*</span></label>
                    <label class="input">
                        R$
                        <input id="price" name="price" type="text" value="{{ old('price') }}"
                            class="input mt-1 block w-full" placeholder="R$ 0,00">
                    </label>
                    @error('price')
                        <div class="text-error mt-1 text-sm font-bold">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="license_plate">Placa</label>
                    <input id="license_plate" name="license_plate" type="text" value="{{ old('license_plate') }}"
                        class="input mt-1 block w-full">
                    @error('license_plate')
                        <div class="text-error mt-1 text-sm font-bold">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="" for="images">Imagens</label>
                    <input type="file" class="file-input file-input-md file-input-neutral mt-1 block w-full"
                        id="images" name="images" />
                </div>

                <div class="sm:col-span-2">
                    <label for="description">Descrição</label>
                    <textarea id="description" name="description" value="{{ old('description') }}" class="textarea mt-1 block w-full"></textarea>
                    @error('description')
                        <div class="text-error mt-1 text-sm font-bold">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mt-6 flex justify-end">
                <button type="submit" class="btn btn-outline cursor-pointer">Salvar</button>
            </div>
        </form>
    </section>
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
