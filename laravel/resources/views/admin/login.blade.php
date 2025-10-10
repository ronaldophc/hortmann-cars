@include('shared.head')
<div class="min-h-screen flex flex-col">
    <div class="flex flex-1">
        <div class="hidden md:flex w-1/2 items-center justify-center bg-base-200">
            <img src="{{ asset('images/login-background.svg') }}" alt="Login Background" class="max-w-full h-auto">
        </div>
        <div class="flex w-full md:w-1/2 items-center justify-center bg-base-200">
            <div class="w-full max-w-md mx-auto card bg-base-100 shadow-xl p-8">
                <div class="text-center mb-6">
                    <img class="mx-auto h-18 w-auto sm:h-20" src="{{ asset('images/logo.png') }}" alt="">
                    <h2 class="text-2xl font-bold text-primary sm:text-3xl">{{ env('APP_NAME') }}</h2>
                </div>
                @error('error')
                <div class="alert alert-error mb-4">
                    <svg class="w-6 h-6 stroke-current mr-2" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M18.364 5.636l-1.414-1.414A9 9 0 105.636 18.364l1.414 1.414A9 9 0 1018.364 5.636z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 8v4m0 4h.01"/>
                    </svg>
                    <span>{{ $message }}</span>
                </div>
                @enderror
                <form id="loginForm" action="{{ route('admin.authenticate') }}" method="POST">
                    @csrf
                    <div class="form-control mb-4">
                        <label for="email" class="label">
                            <span class="label-text">Email</span>
                        </label>
                        <input type="email" name="email" id="email" placeholder="email@example.com" required
                               class="input input-bordered w-full" />
                        <div id="emailError" class="mt-2 hidden text-sm text-error">Por favor, preencha o campo de email.</div>
                    </div>
                    <div class="form-control mb-6">
                        <label for="password" class="label">
                            <span class="label-text">Senha</span>
                        </label>
                        <input type="password" name="password" id="password" placeholder="*******" required
                               class="input input-bordered w-full" />
                        <div id="passwordError" class="mt-2 hidden text-sm text-error">Por favor, preencha o campo de senha.</div>
                    </div>
                    <button class="btn btn-primary w-full">
                        Entrar
                    </button>
                </form>
            </div>
        </div>
    </div>
    @include('components.myfooter-slim')
</div>
