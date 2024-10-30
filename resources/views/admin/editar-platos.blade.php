@extends('layouts.app-admin')

@section('titulo')
    - Editar el plato
@endsection

@section('contenido')
    <div class="container mx-auto p-4 w-5/12 pt-20">
        @if (session('success'))
            <div class="bg-green-500 text-white p-2 rounded mb-4 text-center">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('platos.update', $plato->id) }}" method="POST" enctype="multipart/form-data"
            class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            @method('PUT') <!-- Método para actualizar -->

            <!-- Categoría -->
            <div class="mb-4">
                <label for="categoria" class="block text-gray-700 font-semibold mb-2">Categoría</label>
                <select id="categoria" name="categoria" class="w-full p-2 border border-gray-300 rounded">
                    <option value="Corriente" {{ $plato->categoria == 'Corriente' ? 'selected' : '' }}>Corriente</option>
                    <option value="Ejecutivo" {{ $plato->categoria == 'Ejecutivo' ? 'selected' : '' }}>Ejecutivo</option>
                    <option value="Especial" {{ $plato->categoria == 'Especial' ? 'selected' : '' }}>Especial</option>
                </select>
            </div>

            <!-- Nombre del Plato -->
            <div class="mb-4">
                <label for="nombre_plato" class="block text-gray-700 font-semibold mb-2">Nombre del Plato</label>
                <input type="text" id="nombre_plato" name="nombre_plato" class="w-full p-2 border border-gray-300 rounded"
                    value="{{ $plato->nombre_plato }}">
            </div>

            <!-- Descripción -->
            <div class="mb-4">
                <label for="descripcion" class="block text-gray-700 font-semibold mb-2">Descripción</label>
                <textarea id="descripcion" name="descripcion" class="w-full p-2 border border-gray-300 rounded" rows="2">{{ $plato->descripcion }}</textarea>
            </div>

            <!-- Precio -->
            <div class="mb-4">
                <label for="precio" class="block text-gray-700 font-semibold mb-2">Precio</label>
                <input type="number" id="precio" name="precio" class="w-full p-2 border border-gray-300 rounded"
                    value="{{ $plato->precio }}" step="0.01">
            </div>

            <!-- Imagen -->
            <div class="mb-4">
                <label for="imagen" class="block text-gray-700 font-semibold mb-2">Imagen</label>
                @if ($plato->imagen)
                    <img src="{{ asset('storage/' . $plato->imagen) }}" alt="{{ $plato->nombre }}" class="w-32 h-32 mb-4">
                @endif
                <input type="file" id="imagen" name="imagen" class="w-full p-2 border border-gray-300 rounded">
            </div>

            <!-- Cantidad Disponible -->
            <div class="mb-4">
                <label for="cantidadDisponible" class="block text-gray-700 font-semibold mb-2">Cantidad Disponible</label>
                <input type="number" id="cantidadDisponible" name="cantidadDisponible" class="w-full p-2 border border-gray-300 rounded"
                    value="{{ $plato->cantidadDisponible }}" min="1">
            </div>

            <!-- Botón de Enviar -->
            <div class="flex justify-end">
                <button type="submit"
                    class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Actualizar</button>
            </div>
        </form>
    </div>
@endsection
