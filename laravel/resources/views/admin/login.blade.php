@include('shared.head')
<div class="min-h-screen flex flex-col">
    <div class="flex flex-1">
        <div class="hidden md:flex w-1/2 items-center justify-center bg-gray-100 dark:bg-gray-900">
            <img src="{{ asset('images/login-background.svg') }}" alt="Login Background" class="max-w-full h-auto">
        </div>
        <div class="flex w-full md:w-1/2 items-center justify-center bg-white dark:bg-gray-900">
            <div class="w-full max-w-md mx-auto bg-white dark:bg-gray-900 rounded-lg shadow-lg p-6">
                <div class="text-center mb-6">
                    <img class="mx-auto h-18 w-auto sm:h-20" src="{{ asset('images/logo.png') }}" alt="">
                    <h2 class="text-2xl font-bold text-white sm:text-3xl">{{ env('APP_NAME') }}</h2>
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
                <form id="loginForm" action="{{ route('admin.authenticate') }}" method="POST">
                    @csrf
                    <div>
                        <label for="email" class="mb-2 block text-sm text-gray-600 dark:text-gray-200">Email</label>
                        <input type="email" name="email" id="email" placeholder="email@example.com" required
                               class="mt-2 block w-full rounded-lg border border-gray-200 bg-white px-4 py-2 text-gray-700 placeholder-gray-400 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-400 focus:ring-opacity-40 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:placeholder-gray-600 dark:focus:border-blue-400" />
                        <div id="emailError" class="mt-2 hidden text-sm text-red-600">Por favor, preencha o campo de email.</div>
                    </div>
                    <div class="mt-6">
                        <label for="password" class="text-sm text-gray-600 dark:text-gray-200">Senha</label>
                        <input type="password" name="password" id="password" placeholder="*******" required
                               class="mt-2 block w-full rounded-lg border border-gray-200 bg-white px-4 py-2 text-gray-700 placeholder-gray-400 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-400 focus:ring-opacity-40 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:placeholder-gray-600 dark:focus:border-blue-400" />
                        <div id="passwordError" class="mt-2 hidden text-sm text-red-600">Por favor, preencha o campo de senha.</div>
                    </div>
                    <div class="mt-6">
                        <button class="w-full rounded-lg bg-blue-500 px-4 py-2 text-white hover:bg-blue-400 focus:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                            Entrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('components.myfooter-slim')
</div>
