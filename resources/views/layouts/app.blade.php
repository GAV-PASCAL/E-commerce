<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/chat.css') }}">
    
    <script src="https://kit.fontawesome.com/79705818be.js" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    
    <!-- Livewire Styles -->
    @livewireStyles
    
    <!-- Vite -->

    @yield('vite')
    
</head>
<body>

    @yield('header')

    @yield('content')

    <script src="{{ asset('assets/js/script.js')}}"></script>
    
    <!-- Livewire Scripts -->
    @livewireScripts

</body>