@extends('layouts.app-admin')

@section('titulo')
    - Servicios
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
            <a href="{{ route('nuevo-servicio') }}">Nuevo Servicio</a>
        </button>
        <table class="min-w-full bg-white border border-gray-300">
            <thead class="bg-amber-400">
                <tr>
                    <th class="py-2 px-4 border-b">Código</th>
                    <th class="py-2 px-4 border-b">servici</th>
                    <th class="py-2 px-4 border-b">Descripción</th>
                    <th class="py-2 px-4 border-b">Imagen</th>
                    <th class="py-2 px-4 border-b">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($servicios as $servicio)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $servicio->id }}</td>
                        <td class="py-2 px-4 border-b">{{ $servicio->nombre_servicio }}</td>
                        <td class="py-2 px-4 border-b">{{ $servicio->descripcion }}</td>
                        <td class="py-2 px-4 border-b">
                            <img src="{{ $servicio->imagen ? asset('storage/' . $servicio->imagen) : 'https://via.placeholder.com/50' }}"
                                alt="Imagen plato" class="w-12 h-12">
                        </td>

                      <td class="py-2 px-4 border-b">
                            <a href="{{ route('editar-servicio', $servicio->id) }}"
                                class="bg-blue-500 text-white py-1 px-2 rounded hover:bg-blue-700">Editar</a>
                            <form action="{{ route('servicio.destroy', $servicio->id) }}" method="POST" onsubmit="return confirmDelete()" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 text-white py-1 px-2 rounded hover:bg-red-700">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
