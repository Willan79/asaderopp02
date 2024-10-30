@extends('layouts.app-admin')

@section('titulo')
    - Usuarios
@endsection

@section('contenido')
    <div class="container mx-auto p-4 mt-20">
        @if (session('success'))
            <div class="bg-green-500 text-white p-2 rounded mb-4 text-center">
                {{ session('success') }}
            </div>
        @endif
        <table class="min-w-full bg-white border border-gray-300">
            <thead class="bg-amber-400">
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Nombre</th>
                    <th class="py-2 px-4 border-b">Apellido</th>
                    <th class="py-2 px-4 border-b">Email</th>
                    <th class="py-2 px-4 border-b">Teléfono</th>
                    <th class="py-2 px-4 border-b">Dirección</th>
                    <th class="py-2 px-4 border-b">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $usuario->id }}</td>
                        <td class="py-2 px-4 border-b">{{ $usuario->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $usuario->apellido }}</td>
                        <td class="py-2 px-4 border-b">{{ $usuario->email }}</td>
                        <td class="py-2 px-4 border-b">{{ $usuario->telefono }}</td>
                        <td class="py-2 px-4 border-b">{{ $usuario->direccion }}</td>
                        <td class="py-2 px-4 border-b">
                            <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST"
                                onsubmit="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">
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
