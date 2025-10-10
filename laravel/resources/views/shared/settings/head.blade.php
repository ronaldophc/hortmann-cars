<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

{{--    <link rel="icon" type="image/png" href="https://res.cloudinary.com/dihvrffhg/image/upload/v1/{{ $settings->logo }}?_a=BAAABnE0">--}}
    <link rel="manifest" href="{{ asset('images/favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>{{ config('app.name') }}</title>

    @vite('resources/js/app.js')
    @vite('resources/css/app.css')

</head>
