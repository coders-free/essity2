<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        
        {{-- Font Awesome --}}
        <script src="https://kit.fontawesome.com/e2d71e4ca2.js" crossorigin="anonymous"></script>

        @stack('css')

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-50">
        
        <header class="bg-white shadow-lg">
            <x-container class="px-4 py-4">
                <a href="/">
                    <img src="{{asset('img/logo.png')}}" alt="">
                </a>
            </x-container>
        </header>


        {{ $slot }}


        @include('layouts.includes.footer')

        @stack('js')
    </body>
</html>
