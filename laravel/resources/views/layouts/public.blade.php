<!DOCTYPE html>
<html lang="pt-BR">

@include('shared.head')

<body class="font-sans antialiased min-h-screen flex flex-col">

    @include('components.public.header')

    @yield('content')

    @include('components.public.footer')

</body>

</html>
