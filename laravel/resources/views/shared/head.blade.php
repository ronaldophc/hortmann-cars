<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{$logoUrl}}">
    <link rel="manifest" href="{{ asset('images/favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>{{ config('app.name') }}</title>

    @vite('resources/js/app.js')
    @php
        $connection_name = $connection_name ?? session('connection_name');

        $customCssExists = $customCssExists ?? ($connection_name && file_exists(resource_path("css/{$connection_name}.css")));
    @endphp

    @if($customCssExists && !empty($connection_name))
        @vite("resources/css/{$connection_name}.css")
    @else
        @vite('resources/css/app.css')
    @endif

</head>
