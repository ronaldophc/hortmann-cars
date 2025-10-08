@extends('layouts.settings')

@section('content')
    <div class="container mx-auto py-8">
        @include('components.settings.header')

        <div class="max-w-xl mx-auto bg-base-100 rounded-xl shadow p-6 border border-base-300">
            <h1 class="text-2xl font-bold mb-6">Nova Empresa</h1>
            @if ($errors->any())
                <div class="mb-4 p-4 border border-error bg-error/10 rounded text-error">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('settings.customers.store') }}">
                @csrf

                <div class="mb-4">
                    <label class="block mb-1 font-semibold" for="name">Nome</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                           class="input input-bordered w-full" required>
                    @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block mb-1 font-semibold" for="active">Ativo</label>
                    <select name="active" id="active" class="select select-bordered w-full">
                        <option value="1" {{ old('active') == 1 ? 'selected' : '' }}>Sim</option>
                        <option value="0" {{ old('active') == 0 ? 'selected' : '' }}>Não</option>
                    </select>
                    @error('active')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block mb-1 font-semibold" for="domain">Domínio</label>
                    <input type="text" name="domain" id="domain" value="{{ old('domain') }}"
                           class="input input-bordered w-full" required>
                    @error('domain')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                @include('components.settings.subdomains', [
                    'subdomains' => old('subdomains', [''])
                ])

                <div class="flex justify-end">
                    <a href="{{ route('settings.customers.index') }}" class="btn btn-ghost mr-2">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
