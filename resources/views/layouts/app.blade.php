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

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased bg-gray-50">
        <x-banner />

        <div class="bg-darkblue">

            <x-container>
                <nav class="flex justify-end py-1">
                    <ul class="text-white flex space-x-6 text-sm">
                        <li>
                            <a href="">Contacto</a>
                        </li>

                        <li>
                            <a href="{{ route('profile.show') }}">Mi cuenta</a>
                        </li>

                        <li>
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <a href="{{ route('logout') }}"
                                        @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                        </li>
                    </ul>
                </nav>
            </x-container>

        </div>

        <header class="bg-white shadow">
            <x-container class="px-4 py-4 flex items-center justify-between">
                <a href="/">
                    <img src="{{asset('img/logo.png')}}" alt="">
                </a>

                <ul class="flex text-darkblue space-x-4 font-semibold text-sm">
                    <li>
                        <a href="">
                            Pedir productos
                        </a>
                    </li>

                    <li>
                        <a href="">
                            Historial de productos
                        </a>
                    </li>

                    <li>
                        <a href="">
                            Pedir muestras y material PLV
                        </a>
                    </li>

                    <li>
                        <a href="">
                            Material digital
                        </a>
                    </li>

                    <li>
                        <a href="">
                            Videos
                        </a>
                    </li>
                </ul>
            </x-container>
        </header>

        
        <main>
            {{ $slot }}
        </main>


        @include('layouts.includes.footer')

        @stack('modals')

        @livewireScripts

        @stack('js')
    </body>
</html>
