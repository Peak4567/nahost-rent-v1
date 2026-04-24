<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    {{-- google font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">



    {{-- font-awesome --}}
    <link href="{{ asset('assets/font-awesome/css/all.min.css') }}" rel="stylesheet">

    {{-- tailwind cdn --}}
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
    <title>Backend</title>
</head>

<body>
    <x-backend.sidebar />
    <main>
        @yield('content')
    </main>
</body>

</html>
