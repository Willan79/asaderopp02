<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>Asaderopp @yield('titulo')</title>
    <script>
        function confirmDelete() {
            return confirm('¿Estás seguro de que deseas eliminar este plato?');
        }
    </script>
</head>

<body class="bg-amber-100">
    <div>
        <header class="p-4 boerder-b bg-amber-500 fixed top-0 left-0 w-full z-50">
            <h2 class=" text-center text-3xl font-bold">Panel administrativo @yield('titulo')</h2>
        </header>

        <div class="min-h-screen flex gap-4">
            <!-- Barra lateral -->
            <nav class="w-2/12 bg-gray-800 text-white p-1 ms:w-3/12 flex  justify-center ">
                <ul class="mt-20">
                    <li class="mb-4 bg-gray-700 hover:bg-gray-600 p-2 rounded"><a href="/" class=" flex gap-2">
                        <svg class="h-6 w-6 text-red-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                          </svg>
                        Inicio
                    </a></li>
                    <li class="mb-4 bg-gray-700 hover:bg-gray-600 p-2 rounded"><a href="{{ route('admin.index') }}" class="flex gap-2">
                        <svg class="h-6 w-6 text-red-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>
                             <polyline points="15 6 9 12 15 18" /></svg>
                        Panel
                    </a></li>
                    <li class="mb-4 bg-gray-700 hover:bg-gray-600 p-2 rounded"><a href="{{ route('tabla-platos') }}" class=" flex gap-2">
                        <svg class="h-6 w-6 text-red-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z"/>  <circle cx="12" cy="12" r="9" /></svg>
                        Platos
                    </a></li>
                    <li class="mb-4 bg-gray-700 hover:bg-gray-600 p-2 rounded"><a href="{{ route('tabla-pedidos') }}" class=" flex gap-2">
                        <svg class="h-6 w-6 text-red-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                             <path d="M9 17v1a3 3 0 0 0 6 0v-1" /></svg>
                        Pedidos
                    </a></li>
                    <li class="mb-4 bg-gray-700 hover:bg-gray-600 p-2 rounded"><a href="{{ route('tabla-servicio') }}" class=" flex gap-2">
                    <svg class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 3a.75.75 0 010 1.5H8.403a1.25 1.25 0 00-1.181.826l-.537 1.435a.75.75 0 01-.948.45l-1.286-.428a.75.75 0 00-.923.435l-.669 1.59a.75.75 0 00.221.846l1.073.877a.75.75 0 010 1.152l-1.073.877a.75.75 0 00-.221.846l.67 1.59a.75.75 0 00.922.435l1.286-.428a.75.75 0 01.948.45l.537 1.435a1.25 1.25 0 001.18.826H9.75a.75.75 0 010 1.5h4.5a.75.75 0 010-1.5h1.347a1.25 1.25 0 001.18-.826l.537-1.435a.75.75 0 01.948-.45l1.286.428a.75.75 0 00.922-.435l.67-1.59a.75.75 0 00-.222-.846l-1.073-.877a.75.75 0 010-1.152l1.073-.877a.75.75 0 00.222-.846l-.67-1.59a.75.75 0 00-.922-.435l-1.286.428a.75.75 0 01-.948-.45l-.537-1.435a1.25 1.25 0 00-1.18-.826H14.25a.75.75 0 010-1.5h-4.5zM12 15a3 3 0 100-6 3 3 0 000 6z" />
                        </svg>
                        Servicios
                    </a></li>
                    <li class="mb-4 bg-gray-700 hover:bg-gray-600 p-2 rounded"><a href="{{ route('tabla-user') }}" class=" flex gap-2">
                        <svg class="h-6 w-6 text-red-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                          </svg>
                        Usuarios
                    </a></li>
                    <li class="mb-4 bg-gray-700 hover:bg-gray-600 p-2 rounded">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="flex gap-2">
                                <svg class="h-6 w-6 text-red-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                  </svg>
                                Cerrar sesión
                            </button>
                        </form>
                    </li>
                </ul>
            </nav>

            <!-- Contenido principal -->
            @yield('contenido')

        </div>


    </div>

</body>

</html>
