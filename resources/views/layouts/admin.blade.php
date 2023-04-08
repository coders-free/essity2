@props(['breadcrumb' => []])

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

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('img/favicon.png') }}">

    @stack('css')

    <!-- Scripts -->
    @wireUiScripts
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHA_SITE_KEY') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {

            const forms = document.querySelectorAll('.g-recaptcha');

            //Escuchar evento submit en cada formulario        
            forms.forEach((form) => {

                form.addEventListener('submit', (event) => {

                    event.preventDefault();

                    grecaptcha.ready(function() {
                        grecaptcha.execute("{{ env('RECAPTCHA_SITE_KEY') }}", {
                            action: 'submit'
                        }).then(function(token) {
                            
                            let input = document.createElement('input');

                            input.setAttribute('type', 'hidden');
                            input.setAttribute('name', 'g-recaptcha-response');
                            input.setAttribute('value', token);

                            form.appendChild(input);

                            form.submit();

                        });
                    });

                });

            });

        });
    </script>

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased bg-gray-50 text-slate-500">
    <x-banner />


    @php
        $links = [
          [
            'name' => 'Dashboard',
            'icon' => 'fas fa-home',
            'route' => route('admin.dashboard'),
            'active' => request()->routeIs('admin.dashboard'),
          ],

          [
            'header' => 'Roles y privilegios',
          ],

          [
            'name' => 'Usuarios',
            'icon' => 'fas fa-users',
            'route' => route('admin.users.index'),
            'active' => request()->routeIs('admin.users.*'),
          ],

          [
            'name' => 'Roles',
            'icon' => 'fas fa-user-tag',
            'route' => route('admin.roles.index'),
            'active' => request()->routeIs('admin.roles.*'),
          ],
            
        ]

    @endphp

    {{-- <div class="flex">

      <aside class="fixed w-64 h-screen py-4 pl-4 flex flex-col">

        <div class="h-20 flex pl-8 items-center">
          <a href="/">
            <img class="h-6 object-cover" src="{{ asset('img/logo.png') }}" alt="">
          </a>
        </div>

        <hr>

        <nav class="flex-1 overflow-auto mt-4 pl-4 pr-1 scrollbar-thin scrollbar-rounded-lg scrollbar-thumb-gray-200 scrollbar-track-gray-100">
          <ul class="space-y-2 ">

            @foreach ($links as $link)

              @isset($link['header'])

                <li class="pt-4">
                  <h6 class="pl-4 font-bold leading-tight uppercase text-xs opacity-60">
                    {{$link['header']}}
                  </h6>
                </li>
                    
              @else

                <li>

                  <a href="" class="flex items-center py-2.5 px-4 rounded-lg {{ $link['active'] ? 'bg-white shadow' : 'hover:bg-gray-100' }}">

                    <span class="flex items-center justify-center h-8 w-8 rounded-lg {{ $link['active'] ? 'bg-gradient-to-br from-magenta-500 to-blue-500 text-white' : 'bg-white' }}">
                      <i class="{{$link['icon']}} text-xs"></i>
                    </span>

                    <span class="ml-2 opacity-100">
                      {{$link['name']}}
                    </span>
                  </a>

                </li>

              @endisset

            @endforeach
          </ul>
        </nav>

      </aside>

      <div class="flex-1">

      </div>

    </div> --}}

    <div class="flex">
      <aside class="h-screen py-4 pl-4" x-data>

        <div class="w-64 h-full bg-white rounded-2xl shadow-md overflow-hidden"
          x-on:mouseenter="
            $refs.scrollbar.classList.remove('scrollbar-none');
            $refs.scrollbar.classList.add('scrollbar-thin');
          "

          x-on:mouseleave="
            $refs.scrollbar.classList.remove('scrollbar-thin');
            $refs.scrollbar.classList.add('scrollbar-none');
          "
        >

          <div x-ref="scrollbar" class="h-full overflow-auto scrollbar-none scrollbar-thumb-gray-200 scrollbar-track-gray-100">

            {{-- Logotipo --}}
            <div class="px-4 sticky top-0 bg-white">

              <div class="h-20 px-4 flex items-center border-b border-gray-100">
                <a href="/">
                  <img class="h-6 object-cover" src="{{ asset('img/logo.png') }}" alt="">
                </a>
              </div>
  
            </div>

            {{-- Menu --}}
            <nav class="mt-4 px-4 ">
              <ul class="space-y-2 ">
    
                @foreach ($links as $link)
    
                  @isset($link['header'])
    
                    <li class="pt-4">
                      <h6 class="pl-4 font-bold leading-tight uppercase text-xs opacity-60">
                        {{$link['header']}}
                      </h6>
                    </li>
                        
                  @else
    
                    <li>
    
                      <a href="{{$link['route']}}" class="flex items-center py-2.5 px-4 rounded-lg {{ $link['active'] ? 'bg-white shadow' : 'hover:bg-gray-100' }}">
    
                        <span class="shadow flex items-center justify-center h-8 w-8 rounded-lg {{ $link['active'] ? 'bg-gradient-to-br from-magenta-500 to-blue-500 text-white' : 'bg-white' }}">
                          <i class="{{$link['icon']}} text-xs"></i>
                        </span>
    
                        <span class="ml-2 opacity-100">
                          {{$link['name']}}
                        </span>
                      </a>
    
                    </li>
    
                  @endisset
    
                @endforeach
              </ul>
            </nav>

          </div>

        </div>

      </aside>

      <div class="px-8 py-4 flex-1">
        <div class="flex justify-between items-center mb-6">
          <nav>
            <!-- breadcrumb -->
            <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
              
              @foreach ($breadcrumb as $item)
                  
                <li class="text-sm leading-normal capitalize text-slate-700 {{ $loop->first ? '' : "pl-2 before:float-left before:pr-2 before:text-gray-600 before:content-['/']"}}">

                  @isset($item['url'])
                    <a class="opacity-50 " href="{{$item['url']}}">
                      {{$item['name']}}
                    </a>
                  @else
                  {{$item['name']}}
                  @endisset

                </li>

              @endforeach
            </ol>

            @if (count($breadcrumb) > 1)
            
              <h6 class="mb-0 font-bold capitalize">
                {{ end($breadcrumb)['name'] }}
              </h6>

            @endif
          </nav>

          <div>
            <a href="./pages/sign-in.html" class="block px-0 py-2 font-semibold transition-all ease-nav-brand text-sm text-slate-500">
              <i class="fa fa-user sm:mr-1"></i>
              <span class="hidden sm:inline">{{auth()->user()->name}}</span>
            </a>
          </div>
        </div>

        <main>
          {{ $slot }}
        </main>
      </div>
    </div>

    @stack('modals')

    @livewireScripts

    @stack('js')
</body>

</html>
