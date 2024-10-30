@extends('layouts.app')

@section('titulo')
    Nuevo Servicio
@endsection

@section('contenido')
    <div class="container mx-auto p-4 w-5/12">
        @if (session('success'))
            <div class="bg-green-500 text-white p-2 rounded mb-4 text-center">
                {{ session('success') }}
            </div>
        @endif
        <p class="font-bold text-2xl text-amber-400">Nuevo Servicio</p>
        <form action="{{ route('nuevo-servicio') }}" method="POST" enctype="multipart/form-data"
            class="bg-white p-6 rounded-lg shadow-md">
            @csrf <!-- Token de seguridad -->

            <!-- Nombre del Servicio -->
            <div class="mb-4">
                <label for="nombre_servicio" class="block text-gray-700 font-semibold mb-2">Nombre del servicio</label>
                <input type="text" id="nombre_servicio" name="nombre_servicio"
                    class="w-full p-2 border border-gray-300 rounded" placeholder="Escribe el nombre del servicio"
                    value="{{ old('nombre_servicio') }}">
                @error('nombre_plato')
                    <p class="bg-red-500 text-white my-2 rounded-lg tesxt-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>

            <!-- Descripción -->
            <div class="mb-4">
                <label for="descripcion" class="block text-gray-700 font-semibold mb-2">Descripción</label>
                <textarea id="descripcion" name="descripcion" class="w-full p-2 border border-gray-300 rounded" rows="1"
                    placeholder="Escribe una breve descripción del servicio"></textarea>
                @error('descripcion')
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


            <!-- Botón de Enviar -->
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Guardar</button>
            </div>
        </form>
    </div>
@endsection
