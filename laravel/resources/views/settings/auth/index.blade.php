@extends('layouts.admin')
@section('content')
    <div class="flex min-h-screen items-center justify-center bg-base-200">
        <div class="w-full max-w-md rounded-xl bg-base-100 p-8 shadow-lg">
            <h2 class="mb-6 text-center text-3xl font-bold">Login</h2>
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                <div>
                    <label for="email" class="mb-1 block font-semibold">E-mail</label>
                    <input type="email" name="email" id="email" required autofocus
                           class="input input-lg input-bordered w-full" value="{{ old('email') }}">
                </div>
                <div>
                    <label for="password" class="mb-1 block font-semibold">Senha</label>
                    <input type="password" name="password" id="password" required
                           class="input input-lg input-bordered w-full">
                </div>
                @error('email')
                <div class="text-error text-sm">{{ $message }}</div>
                @enderror
                @error('password')
                <div class="text-error text-sm">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-lg btn-primary w-full">Entrar</button>
            </form>
        </div>
    </div>
@endsection
