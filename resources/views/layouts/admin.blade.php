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
                'route' => '/dashboard',
                'active' => true
            ],

            [
                'name' => 'Tables',
                'icon' => 'fas fa-table',
                'route' => '/tables',
                'active' => false
            ],

            [
                'name' => 'Billing',
                'icon' => 'fas fa-credit-card',
                'route' => '/billing',
                'active' => false
            ],

            [
                'name' => 'Virtual Reality',
                'icon' => 'fas fa-vr-cardboard',
                'route' => '/vr',
                'active' => false
            ],

            [
                'name' => 'RTL',
                'icon' => 'fas fa-language',
                'route' => '/rtl',
                'active' => false
            ],

            [
                'header' => 'ACCOUNT PAGES'
            ],

            [
                'name' => 'Profile',
                'icon' => 'fas fa-user-circle',
                'route' => '/profile',
                'active' => false
            ],

            [
                'name' => 'Sign In',
                'icon' => 'fas fa-sign-in-alt',
                'route' => '/login',
                'active' => false
            ],

            [
                'name' => 'Sign Up',
                'icon' => 'fas fa-user-plus',
                'route' => '/register',
                'active' => false
            ],

            [
                'name' => 'Profile',
                'icon' => 'fas fa-user-circle',
                'route' => '/profile',
                'active' => false
            ],

            [
                'name' => 'Sign In',
                'icon' => 'fas fa-sign-in-alt',
                'route' => '/login',
                'active' => false
            ],

            [
                'name' => 'Sign Up',
                'icon' => 'fas fa-user-plus',
                'route' => '/register',
                'active' => false
            ],
        ]

    @endphp

    <div class="flex">
        {{-- <aside class="w-64 h-screen py-4 ml-4 flex flex-col">

            <div class="h-[78px]">
                <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap text-slate-700" href="javascript:;" target="_blank">
                  <img src="./assets/img/logo-ct.png" class="inline h-full max-w-full transition-all duration-200 ease-nav-brand max-h-8" alt="main_logo" />
                  <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">Soft UI Dashboard</span>
                </a>
            </div>

            <hr class="h-px" />

            <nav class="mt-4 flex-1 overflow-auto">
                <ul class="space-y-2 ">

                    @foreach ($links as $link)


                        @isset($link['header'])

                            <li class="w-full pt-4">
                                <h6 class="pl-6 ml-2 font-bold leading-tight uppercase text-xs opacity-60">
                                    {{$link['header']}}
                                </h6>
                            </li>
                            
                        @else
                        
                            @if ($link['active'])
                                
                                <li>
                                    <a class="py-2.5 text-sm ml-4 flex items-center whitespace-nowrap rounded-lg bg-white px-4 font-semibold text-slate-700 transition-colors" href="./pages/dashboard.html">
                                        <div class="bg-gradient-to-tl from-purple-700 to-pink-500 shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                                            <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>shop</title>
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                                <g transform="translate(1716.000000, 291.000000)">
                                                    <g transform="translate(0.000000, 148.000000)">
                                                    <path
                                                        class="opacity-60"
                                                        d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"
                                                    ></path>
                                                    <path
                                                        class=""
                                                        d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"
                                                    ></path>
                                                    </g>
                                                </g>
                                                </g>
                                            </g>
                                            </svg>
                                        </div>
                                        <span class="ml-1 opacity-100 pointer-events-none">
                                            Dashboard
                                        </span>
                                    </a>
                                </li>

                            @else

                                <li class="mt-0.5 w-full">
                                    <a class="py-2.5 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="./pages/billing.html">

                                        <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
                                            <i class="{{$link['icon']}}"></i>
                                        </div>
                                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">
                                            {{$link['name']}}
                                        </span>
                                    </a>
                                </li>

                            @endif

                        @endisset

                    @endforeach

                </ul>
            </nav>

        </aside> --}}


        <aside class="fixed w-64 h-screen py-4 pl-4 flex flex-col">

          <div class="h-20 flex pl-8 items-center">
            <a href="/">
              <img class="h-6 object-cover" src="{{ asset('img/logo.png') }}" alt="">
            </a>
          </div>

          <hr>

          <nav class="flex-1 overflow-auto mt-4 pl-4 pr-1">
            <ul class="space-y-2 ">

              @foreach ($links as $link)

              @isset($link['header'])
                    
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

                {{-- @isset($link['header'])

                  <li class="w-full pt-4">
                    <h6 class="pl-6 ml-2 font-bold leading-tight uppercase text-xs opacity-60">
                      {{$link['header']}}
                    </h6>
                  </li>
                    
                @else
                
                  @if ($link['active'])
                      
                      <li>
                          <a class="py-2.5 text-sm ml-4 flex items-center whitespace-nowrap rounded-lg bg-white px-4 font-semibold text-slate-700 transition-colors" href="./pages/dashboard.html">
                              <div class="bg-gradient-to-tl from-purple-700 to-pink-500 shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                                  <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                  <title>shop</title>
                                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                      <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                      <g transform="translate(1716.000000, 291.000000)">
                                          <g transform="translate(0.000000, 148.000000)">
                                          <path
                                              class="opacity-60"
                                              d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"
                                          ></path>
                                          <path
                                              class=""
                                              d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"
                                          ></path>
                                          </g>
                                      </g>
                                      </g>
                                  </g>
                                  </svg>
                              </div>
                              <span class="ml-1 opacity-100 pointer-events-none">
                                  Dashboard
                              </span>
                          </a>
                      </li>

                  @else

                      <li class="mt-0.5 w-full">
                          <a class="py-2.5 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="./pages/billing.html">

                              <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
                                  <i class="{{$link['icon']}}"></i>
                              </div>
                              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">
                                  {{$link['name']}}
                              </span>
                          </a>
                      </li>

                  @endif

                @endisset --}}

              @endforeach
            </ul>
          </nav>

        </aside>

        <div class="flex-1">

        </div>

    </div>

    @stack('modals')

    @livewireScripts

    @stack('js')
</body>

</html>
