@extends('layouts.app-admin')

@section('titulo')
    - Platos
@endsection

@section('contenido')
    <!-- Contenido principal -->
    <div class="container mx-auto p-4 mt-20">
        @if (session('success'))
            <div class="bg-green-500 text-white p-2 rounded mb-4 text-center">
                {{ session('success') }}
            </div>
        @endif
        <button class=" bg-blue-500 text-white py-1 px-2 rounded hover:bg-blue-700 mb-2">
            <a href="{{ route('nuevoplato') }}">Nuevo plato</a>
        </button>
        <table class="min-w-full bg-white border border-gray-300">
            <thead class="bg-amber-400">
                <tr>
                    <th class="py-2 px-4 border-b">Código</th>
                    <th class="py-2 px-4 border-b">Plato</th>
                    <th class="py-2 px-4 border-b">Categoría</th>
                    <th class="py-2 px-4 border-b">Descripción</th>
                    <th class="py-2 px-4 border-b">Imagen</th>
                    <th class="py-2 px-4 border-b">Precio</th>
                    <th class="py-2 px-4 border-b">Disponibles</th>
                    <th class="py-2 px-4 border-b">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($platos as $plato)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $plato->id }}</td>
                        <td class="py-2 px-4 border-b">{{ $plato->nombre_plato }}</td>
                        <td class="py-2 px-4 border-b">{{ $plato->categoria }}</td>
                        <td class="py-2 px-4 border-b">{{ $plato->descripcion }}</td>
                        <td class="py-2 px-4 border-b">
                            <img src="{{ $plato->imagen ? asset('storage/' . $plato->imagen) : 'https://via.placeholder.com/50' }}"
                                alt="Imagen plato" class="w-12 h-12">
                        </td>
                        <td class="py-2 px-4 border-b">${{ $plato->precio }}</td>
                        <td class="py-2 px-4 border-b">{{ $plato->cantidadDisponible }}</td>

                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('editar-platos', $plato->id) }}"
                                class="bg-blue-500 text-white py-1 px-2 rounded hover:bg-blue-700">Editar</a>
                            <form action="{{ route('platos.destroy', $plato->id) }}" method="POST" onsubmit="return confirmDelete()" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 text-white py-1 px-2 rounded hover:bg-red-700 mt-2">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
