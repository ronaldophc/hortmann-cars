@extends('layouts.settings')

@section('content')
    <div class="container mx-auto py-8">
        @include('components.settings.header')

        <div class="max-w-xl mx-auto bg-base-100 rounded-xl shadow p-6 border border-base-300">
            <h1 class="text-2xl font-bold mb-6">Editar Empresa</h1>
            <form method="POST" action="{{ route('settings.customers.update', $customer->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block mb-1 font-semibold" for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" value="{{ old('nome', $customer->nome) }}"
                           class="input input-bordered w-full" required>
                    @error('nome')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block mb-1 font-semibold" for="ativo">Ativo</label>
                    <select name="ativo" id="ativo" class="select select-bordered w-full">
                        <option value="1" {{ old('ativo', $customer->ativo) == 1 ? 'selected' : '' }}>Sim</option>
                        <option value="0" {{ old('ativo', $customer->ativo) == 0 ? 'selected' : '' }}>Não</option>
                    </select>
                    @error('ativo')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block mb-1 font-semibold" for="dominio">Domínio</label>
                    <input type="text" name="dominio" id="dominio" value="{{ old('dominio', $customer->dominio) }}"
                           class="input input-bordered w-full" required>
                    @error('dominio')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-1 font-semibold" for="subdominio">Subdomínio</label>
                    <input type="text" name="subdominio" id="subdominio" value="{{ old('subdominio', $customer->subdominio) }}"
                           class="input input-bordered w-full">
                    @error('subdominio')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <a href="{{ route('settings.customers.index') }}" class="btn btn-ghost mr-2">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
