@extends('layouts.app')

@section('titulo')
    - Inicio
@endsection

@section('contenido')

<div class="container py-10" style="min-height: calc(90vh - 64px);">
    <!-- Encabezado con imagen de fondo -->
    <div class="relative bg-cover bg-center h-96 rounded-lg shadow-lg m-2" style="background-image: url('{{ asset('img/fondo-2.jpg') }}');">
        <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center">
            <h1 class="text-yellow-400 text-5xl text-center font-bold mb-4 ">Bienvenidos a Asadero Pija Pariente</h1>
            <p class="text-white text-xl text-center max-w-2xl">Disfruta de lo mejor de la gastronomía llanera en un ambiente familiar y acogedor.</p>
        </div>
    </div>

    <!-- Sección de promoción y platos destacados -->
    <div class="mt-12 text-center  m-4">
        <h2 class="text-3xl font-bold mb-6 text-yellow-400">Nuestra Especialidad</h2>
        <p class="text-xl text-white mb-10">Platos llenos de sabor y tradición que te harán sentir en casa.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Plato 1 -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img src="{{ asset('img/3.jpg') }}" alt="Plato Llanero" class="w-full h-56 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-3">Plato Llanero</h3>
                    <p class="text-gray-700 mb-4">Carne asada al carbón, acompañada de yuca y arepa, un clásico que no puedes dejar de probar.</p>

                </div>
            </div>
            <!-- Plato 2 -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img src="{{ asset('img/plato-01.jpeg') }}" alt="Sancocho" class="w-full h-56 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-3">Sancocho Llanero</h3>
                    <p class="text-gray-700 mb-4">Un delicioso sancocho con el auténtico sabor llanero, ideal para compartir en familia.</p>

                </div>
            </div>
            <!-- Plato 3 -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img src="{{ asset('img/1j.jpg') }}" alt="Asado Llanero" class="w-full h-56 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-3">Asado Llanero</h3>
                    <p class="text-gray-700 mb-4">El mejor asado de la región, con ese toque tradicional que solo encontrarás aquí.</p>

                </div>
            </div>
        </div>
    </div>

    <!-- Botones de navegación a menú y servicios -->
    <div class="mt-10 flex flex-col items-center gap-4">
        <a href="{{ route('menu') }}">
            <button class="bg-amber-500 hover:bg-amber-400 transition-colors cursor-pointer font-bold p-3 rounded-lg text-white w-48">
                Ir al MENÚ
            </button>
        </a>
        <a href="{{ route('servicios') }}">
                <input type="submit" value="Ir a SERVICIOS"
                    class="bg-amber-500 hover:bg-amber-400 transition-colors cursor-pointer font-bold p-2 rounded-lg text-white px-6">
                </input>
            </a>
    </div>

    <!-- Sección de contacto -->
    <div class="mt-16 bg-gray-100 p-8 rounded-lg text-center m-2">
        <h3 class="text-2xl font-bold mb-4">Contáctanos</h3>
        <p class="text-lg text-gray-700 mb-4">Haz tu pedido ahora o vístanos en nuestro restaurante, en la Calle 52F sur # 32-84  Barrio el Carmen</p>
        <p class="text-lg text-gray-700 mb-4">Pide más información al 3016260299</p>
        <p class="text-lg text-gray-700 mb-4">asaderopijapariente@hotmail.com</p>
    </div>
</div>


@endsection
