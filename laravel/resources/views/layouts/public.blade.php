<!DOCTYPE html>
<html lang="pt-BR">

@include('shared.head')

<body class="font-sans antialiased min-h-screen flex flex-col">

@include('components.public.header')

<main class="flex-grow">
    @yield('content')
</main>

@include('components.public.footer')

</body>

</html>
