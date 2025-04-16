@include('shared.head')
<div class="bg-white dark:bg-gray-900">
    <div class="flex h-screen justify-center">
        <div class="hidden bg-center bg-no-repeat lg:block lg:w-2/3"
            style="background-image: url('{{ asset('images/login-background.svg') }}');">

        </div>

        <div class="mx-auto flex w-full max-w-md items-center px-6 lg:w-2/6">
            <div class="flex-1">
                <div class="text-center">
                    <div class="mx-auto flex justify-center">
                        <img class="h-18 w-auto sm:h-20" src=" {{ asset('images/logo.png') }}" alt="">
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-white sm:text-3xl">{{ env('APP_NAME') }}</h2>
                    </div>
                </div>

                @error('error')
                    <div class="mb-4 items-center rounded bg-red-300 p-4">
                        <p class="text-md text-center text-red-700">{{ $message }}</p>
                    </div>
                @enderror

                <div class="mt-4">
                    <form id="loginForm" action="{{ route('admin.authenticate') }}" method="POST">
                        @csrf
                        <div>
                            <label for="email"
                                class="mb-2 block text-sm text-gray-600 dark:text-gray-200">Email</label>
                            <input type="email" name="email" id="email" placeholder="email@example.com"
                                class="mt-2 block w-full rounded-lg border border-gray-200 bg-white px-4 py-2 text-gray-700 placeholder-gray-400 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-400 focus:ring-opacity-40 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:placeholder-gray-600 dark:focus:border-blue-400" />
                            <div id="emailError" class="mt-2 hidden text-sm text-red-600">Por favor, preencha o campo de
                                email.</div>
                        </div>

                        <div class="mt-6">
                            <label for="password" class="text-sm text-gray-600 dark:text-gray-200">Senha</label>
                            <input type="password" name="password" id="password" placeholder="*******"
                                class="mt-2 block w-full rounded-lg border border-gray-200 bg-white px-4 py-2 text-gray-700 placeholder-gray-400 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-400 focus:ring-opacity-40 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:placeholder-gray-600 dark:focus:border-blue-400" />
                            <div id="passwordError" class="mt-2 hidden text-sm text-red-600">Por favor, preencha o campo
                                de senha.</div>
                        </div>

                        <div class="mt-6">
                            <button
                                class="w-full transform cursor-pointer rounded-lg bg-blue-500 px-4 py-2 tracking-wide text-white transition-colors duration-300 hover:bg-blue-400 focus:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                                Entrar
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('loginForm').addEventListener('submit', function(event) {
        const fields = [
            { id: 'email', errorId: 'emailError', message: 'Por favor, preencha o campo de email.' },
            { id: 'password', errorId: 'passwordError', message: 'Por favor, preencha o campo de senha.' }
        ];

        let hasError = false;

        function validateField(field) {
            const input = document.getElementById(field.id);
            const errorElement = document.getElementById(field.errorId);

            if (!input.value.trim()) {
                errorElement.textContent = field.message;
                errorElement.classList.remove('hidden');
                hasError = true;
            } 
            errorElement.classList.add('hidden');
        }

        fields.map(validateField);

        if (hasError) {
            event.preventDefault();
        }
    });
</script>
