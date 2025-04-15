<!DOCTYPE html>
<html>

@include('shared.head')

<body class="bg-gray-400 font-sans antialiased">

    @include('components.admin.header')

    @yield('content')

    @if (session('success'))
        <script>
            Swal.fire({
                position: "bottom-end",
                title: 'Sucesso!',
                text: '{{ session('success') }}',
                timer: 1500,
                timerProgressBar: true,
                showConfirmButton: false,
                color: 'green',
                width: 300,
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                position: "bottom-end",
                title: 'Ocorreu um erro!',
                text: '{{ session('error') }}',
                timer: 1500,
                timerProgressBar: true,
                showConfirmButton: false,
                color: 'red',
                width: 300,
            });
        </script>
    @endif
</body>

</html>
