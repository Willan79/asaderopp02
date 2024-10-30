@extends('layouts.app')

@section('titulo')
    Editar el servcio
@endsection

@section('contenido')
    <div class="container mx-auto p-4 w-5/12">
        @if (session('success'))
            <div class="bg-green-500 text-white p-2 rounded mb-4 text-center">
                {{ session('success') }}
            </div>
        @endif
        <p class="font-bold text-2xl text-amber-400">Editar Servicio</p>
        <form action="{{ route('servicio.update', $servicio->id) }}" method="POST" enctype="multipart/form-data"
            class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            @method('PUT') <!-- Método para actualizar -->

            <!-- Nombre del servicio -->
            <div class="mb-4">
                <label for="nombre_servicio" class="block text-gray-700 font-semibold mb-2">Nombre del servicio</label>
                <input type="text" id="nombre_servicio" name="nombre_servicio" class="w-full p-2 border border-gray-300 rounded"
                    value="{{ $servicio->nombre_servicio }}">
            </div>

            <!-- Descripción -->
            <div class="mb-4">
                <label for="descripcion" class="block text-gray-700 font-semibold mb-2">Descripción</label>
                <textarea id="descripcion" name="descripcion" class="w-full p-2 border border-gray-300 rounded" rows="4">{{ $servicio->descripcion }}</textarea>
            </div>


            <!-- Imagen -->
            <div class="mb-4">
                <label for="imagen" class="block text-gray-700 font-semibold mb-2">Imagen</label>
                @if ($servicio->imagen)
                    <img src="{{ asset('storage/' . $servicio->imagen) }}" alt="{{ $servicio->nombre }}" class="w-32 h-32 mb-4">
                @endif
                <input type="file" id="imagen" name="imagen" class="w-full p-2 border border-gray-300 rounded">
            </div>


            <!-- Botón de Enviar -->
            <div class="flex justify-end">
                <button type="submit"
                    class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Actualizar</button>
            </div>
        </form>
    </div>
@endsection