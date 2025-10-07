@include('shared.head')
<div class="flex min-h-screen items-center justify-center bg-base-200">
    <div class="w-full max-w-md rounded-xl bg-base-100 p-8 shadow-lg">
        <div class="flex justify-center">
            <img class="h-20 w-auto" src="{{ asset('images/logo.png') }}" alt="Logo">
        </div>
        <h2 class="mb-6 text-center text-3xl font-bold">Login</h2>
        <form method="POST" action="{{ route('settings.authenticate') }}" class="space-y-6">
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
            @error('error')
            <div class="mb-4 flex items-center rounded-xl border border-red-400 bg-red-100 p-3">
                <svg class="mr-2 h-6 w-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M18.364 5.636l-1.414-1.414A9 9 0 105.636 18.364l1.414 1.414A9 9 0 1018.364 5.636z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 8v4m0 4h.01"/>
                </svg>
                <span class="text-md font-semibold text-red-700">{{ $message }}</span>
            </div>
            @enderror
            <button type="submit" class="btn btn-lg btn-primary w-full">Entrar</button>
        </form>
    </div>
</div>
