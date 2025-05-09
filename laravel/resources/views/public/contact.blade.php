@extends('layouts.public')
@section('content')
    <section class="hero my-5 min-h-screen">
        <div class="hero-content flex-col">
            <p class="text-5xl font-bold">Contato</p>

            <div class="mt-10 grid grid-cols-1 gap-12 lg:grid-cols-3">
                <div class="grid grid-cols-1 gap-12 sm:grid-cols-2 lg:grid-cols-1">
                    <div>
                        <span class="bg-accent inline-block rounded-full p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                            </svg>
                        </span>

                        <h2 class="text-primary mt-4">Email</h2>
                        <p class="text-primary mt-2 text-sm">Entre em contato via email.</p>
                        <p class="mt-2 text-sm">camposr@utfpr.alunos.edu.br</p>
                    </div>

                    <div>
                        <span class="bg-accent inline-block rounded-full p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                            </svg>
                        </span>

                        <h2 class="text-primary mt-4">UTFPR</h2>
                        <p class="text-primary mt-2 text-sm">Venha visitar a UTFPR.</p>
                        <p class="mt-2 text-sm">Av. Profa. Laura Pacheco Bastos, 800 - Industrial, Guarapuava - PR,
                            85053-525</p>
                    </div>

                    <div>
                        <span class="bg-accent inline-block rounded-full p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                            </svg>
                        </span>

                        <h2 class="text-primary mt-4">Telefones</h2>
                        <p class="mt-2 text-sm">(42) 99999-9999</p>
                        <p class="mt-2 text-sm">(42) 99999-9999</p>
                    </div>
                </div>

                <div class="h-96 overflow-hidden rounded-lg lg:col-span-2 lg:h-auto">
                    <iframe width="100%" height="100%" frameborder="0" title="map" marginheight="0" marginwidth="0"
                        scrolling="no"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3605.6145522682023!2d-51.4797471!3d-25.3507121!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ef37d3a2013a7f%3A0x167e4bb18692475a!2sUniversidade%20Tecnol%C3%B3gica%20Federal%20do%20Paran%C3%A1%20-%20Campus%20Guarapuava!5e0!3m2!1spt-BR!2sbr!4v1744918673750!5m2!1spt-BR!2sbr"></iframe>
                </div>
            </div>
        </div>
    </section>
@endsection
