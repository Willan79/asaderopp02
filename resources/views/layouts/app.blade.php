<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>Asaderopp @yield('titulo')</title>
    
    <link rel="stylesheet" href="{{ asset('css/icon.css') }}">

</head>

<body class="bg-slate-800 overflow-x-auto w-full">
    <div class="imagen bg-cover bg-center bg-opacity-50 relative min-w-screen">
        <div class="absolute inset-0 bg-slate-700 bg-opacity-60"></div>

        <header class="p-4 bg-amber-500 fixed top-0 left-0 w-full z-50">
            <div class="container mx-auto flex justify-between">
                <div class="flex items-center">
                    <img class="w-15 h-auto object-contain p-1 my-2" src="{{ asset('img/LG-032.png') }}"
                        alt="Alternativa img">
                </div>
                <!--Autenticado -->
                @auth
                    <nav class="flex  items-center font-bold ms:text-sm">
                        <a>
                            <span class="text-sky-800"> Hola: {{ auth()->user()->name }}</span>
                        </a>
                        <a href="{{ route('carrito.index') }}" class="text-black">
                            <div class="cart-icon relative hover:bg-amber-400 p-1 rounded my-2">
                                <svg class="h-7 w-7 text-black" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="9" cy="21" r="1" />
                                    <circle cx="20" cy="21" r="1" />
                                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6" />
                                </svg>
                                <span class="badge bg-red-500 text-white text-xs px-2 py-1">
                                    {{ $totalPlatos }}
                                </span>
                            </div>
                        </a>


                        @if (auth()->user()->role === 'user')
                        <a href="{{ route('ver-pedido') }}">
                            <p class="hover:bg-amber-400 p-2 rounded">Mi pedido</p>
                        </a>
                        @endif

                        @if (auth()->user()->role === 'admin')
                        <a href="{{ route('admin.index') }}">
                            <p class="hover:bg-amber-400 p-2 rounded">Admin</p>
                        </a>
                        @endif

                        <a href="/">
                            <p class="hover:bg-amber-400 p-2 rounded">Inicio</p>
                        </a>

                        <a href="{{ route('menu') }}">
                            <p class="hover:bg-amber-400 p-2 rounded">Menú</p>
                        </a>


                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="hover:bg-amber-400 p-2 rounded">
                                Salir
                            </button>
                        </form>
                    </nav>

                @endauth

                <!--No autenticado -->
                @guest
                    <nav class="flex gap-2 items-center font-bold">
                        <a href="/">Inicio</a>
                        <a href="{{ route('menu') }}">Menú</a>
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Registrarte</a>
                    </nav>
                @endguest

            </div>
        </header>

        <main class="relative container mx-auto mt-10">
            <h2 class=" text-center mb-2 mt-10 text-3xl font-bold">@yield('titulo')</h2>
            @yield('contenido')
        </main>

        <footer class=" relative text-center p-5 text-gray-500 mt-10 bg-slate-800 w-full">
            Asadero Pija Pariente todos los derechos reservados {{ now()->year }}
        </footer>
    </div>

    <script src="{{ asset('js/platos.js') }}"></script>
    <script src="{{ asset('js/modales.js') }}"></script>

</body>

</html>
