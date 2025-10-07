<footer class="footer sm:footer-horizontal bg-base-200 text-base-content p-10 shadow-inner">
    <aside>
        <a href="#">
            <img class="h-25 w-auto" src="{{ asset('images/logo.png') }}" alt="">
        </a>

    </aside>
    <nav>
        <h6 class="footer-title text-lg">Mapa do Site</h6>
        <a class="link link-hover text-md">Nossos carros</a>
        <a class="link link-hover text-md">Contato</a>
    </nav>
    <nav>
        <h6 class="footer-title text-lg">Telefones</h6>
        <a class="link link-hover text-md">{{ $settings->phone_1 }}</a>
        <a class="link link-hover text-md">{{ $settings->phone_2 }}</a>
        <h6 class="footer-title mt-2 text-lg">Horários</h6>
        <a class="link link-hover text-md">{{ $settings->opening_hours }}</a>
    </nav>
    <nav>
        <h6 class="footer-title text-lg">Redes Sociais</h6>
        <div class="flex">
            @if ($settings->instagram_url)
                <a href="{{ $settings->instagram_url }}" target="_blank" class="link link-hover"
                    aria-label="Instagram">
                    <i class="fa-brands fa-instagram fa-2x"></i>
                </a>
            @endif
            @if ($settings->linkedin_url)
                <a href="{{ $settings->linkedin_url }}" target="_blank" class="link link-hover"
                    aria-label="Linkedin">
                    <i class="fa-brands fa-linkedin fa-2x"></i>
                </a>
            @endif
            @if ($settings->facebook_url)
                <a href="{{ $settings->facebook_url }}" target="_blank" class="link link-hover"
                    aria-label="Facebook">
                    <i class="fa-brands fa-facebook fa-2x"></i>
                </a>
            @endif
            @if ($settings->x_url)
                <a href="{{ $settings->x_url }}" target="_blank" class="link link-hover" aria-label="X">
                    <i class="fa-brands fa-x-twitter fa-2x"></i>
                </a>
            @endif
        </div>
    </nav>
</footer>
<footer class="footer footer-horizontal footer-center bg-neutral text-accent-content p-5">
    <aside>
        <i class="fa-solid fa-code fa-2x"></i>
        <p class="font-bold text-md">
            Desenvolvido por
            <br />
            Ronaldo P H Campos
        </p>
    </aside>
    <nav>
        <div class="grid grid-flow-col gap-4">
            <a href="https://github.com/ronaldophc" target="_blank" class="link link-hover" aria-label="Github">
                <i class="fa-brands fa-github fa-2x"></i>

            </a>
            <a href="https://www.linkedin.com/in/ronaldophc/" target="_blank" class="link link-hover">
                <i class="fa-brands fa-linkedin fa-2x"></i>
            </a>
            <a href="https://www.instagram.com/ronaldohortmann" target="_blank" class="link link-hover">
                <i class="fa-brands fa-instagram fa-2x"></i>
            </a>
        </div>
    </nav>
</footer>
