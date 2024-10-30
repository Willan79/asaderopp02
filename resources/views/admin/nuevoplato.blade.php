@extends('layouts.app-admin')

@section('titulo')
    Nuevo plato
@endsection

@section('contenido')
    <div class="container mx-auto p-4 w-5/12 pt-20">
        @if (session('success'))
            <div class="bg-green-500 text-white p-2 rounded mb-4 text-center">
                {{ session('success') }}
            </div>
        @endif
        <p class="font-bold text-2xl text-amber-400">Nuevo Plato</p>
        <form action="{{ route('nuevoplato') }}" method="POST" enctype="multipart/form-data"
            class="bg-white p-6 rounded-lg shadow-md">
            @csrf <!-- Token de seguridad -->

            <!-- Categoría -->
            <div class="mb-4">
                <label for="categoria" class="block text-gray-700 font-semibold mb-2">Categoría</label>
                <select id="categoria" name="categoria" class="w-full p-2 border border-gray-300 rounded">
                    <option value=""></option>
                    <option value="Corriente">Corriente</option>
                    <option value="Especial">Especial</option>
                    <option value="Ejecutivo">Ejecutivo</option>
                </select>
                @error('categoria')
                    <p class="bg-red-500 text-white my-2 rounded-lg tesxt-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>

            <!-- Nombre del Plato -->
            <div class="mb-4">
                <label for="nombre_plato" class="block text-gray-700 font-semibold mb-2">Nombre del Plato</label>
                <input type="text" id="nombre_plato" name="nombre_plato"
                    class="w-full p-2 border border-gray-300 rounded" placeholder="Escribe el nombre del plato"
                    value="{{ old('nombre_plato') }}">
                @error('nombre_plato')
                    <p class="bg-red-500 text-white my-2 rounded-lg tesxt-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>

            <!-- Descripción -->
            <div class="mb-4">
                <label for="descripcion" class="block text-gray-700 font-semibold mb-2">Descripción</label>
                <textarea id="descripcion" name="descripcion" class="w-full p-2 border border-gray-300 rounded" rows="1"
                    placeholder="Escribe una breve descripción del plato"></textarea>
                @error('descripcion')
                    <p class="bg-red-500 text-white my-2 rounded-lg tesxt-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>

            <!-- Precio -->
            <div class="mb-4">
                <label for="precio" class="block text-gray-700 font-semibold mb-2">Precio</label>
                <input type="number" id="precio" name="precio" class="w-full p-2 border border-gray-300 rounded"
                    placeholder="Ingresa el precio del plato" min="0" step="0.01" value="{{ old('precio') }}">
                @error('precio')
                    <p class="bg-red-500 text-white my-2 rounded-lg tesxt-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>

            <!-- Imagen -->
            <div class="mb-4">
                <label for="imagen" class="block text-gray-700 font-semibold mb-2">Imagen</label>
                <input type="file" id="imagen" name="imagen" class="w-full p-2 border border-gray-300 rounded">
                @error('imagen')
                    <p class="bg-red-500 text-white my-2 rounded-lg tesxt-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>

            <!-- Cantidad Disponible -->
            <div class="mb-4">
                <label for="cantidadDisponible" class="block text-gray-700 font-semibold mb-2">Cantidad Disponible</label>
                <input type="number" id="cantidadDisponible" name="cantidadDisponible" class="w-full p-2 border border-gray-300 rounded"
                    placeholder="Ingresa la cantidad disponible" min="1" value="{{ old('cantidadDisponible') }}">
                @error('cantidadDisponible')
                    <p class="bg-red-500 text-white my-2 rounded-lg tesxt-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>

            <!-- Botón de Enviar -->
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Guardar</button>
            </div>
        </form>
    </div>
@endsection
