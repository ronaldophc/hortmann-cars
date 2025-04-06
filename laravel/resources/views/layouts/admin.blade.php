<!DOCTYPE html>
<html>

@include('shared.head')

<body class="bg-gray-100 font-sans antialiased">

    @include('components.admin.header')

    <div class="container mx-auto">
        @yield('content')
    </div>
    
</body>

</html>