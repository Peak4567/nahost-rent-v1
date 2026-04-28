<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    {{-- google font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">

    {{-- Alpine --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- Sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- font-awesome --}}
    <link href="{{ asset('assets/font-awesome/css/all.min.css') }}" rel="stylesheet">

    {{-- tailwind cdn --}}
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">

    {{-- icon --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo/na-logo.png') }}">

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/logo/na-logo.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/logo/na-logo.png') }}">

    <link rel="apple-touch-icon" href="{{ asset('assets/img/apple-touch-icon.png') }}">
    <title>Nahost Rent V1</title>
</head>

<body>
    <x-frontend.navbar />
    <main>
        @yield('content')
    </main>
    <x-frontend.footer />
</body>

</html>
