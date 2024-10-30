@extends('layouts.app')

@section('titulo')
    Datos_para_tu_servico
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:items-center">

        <div class="ms:w-8/12 md:w-6/12  lg:w-4/12 bg-gray-200 p-4 shadow-xl rounded-lg m-4">
            <span class="text-2xl flex justify-center">Deja Tus Datos</span>

            <form action="{{ route('dejar-datos') }}" method="POST">
                @csrf <!--Token de seguridad  -->

                <div class="flex items-center mb-2 mt-4" id="nombre">
                    <span class=" p-2 bg-gray-200 rounded-md text-gray-700">Nombre</span>
                    <input type="text"
                        class="p-2 rounded-md w-full border-2 border-gray-300 focus:border-blue-500 focus:outline-none"
                        id="nombre" name="nombre" placeholder="Tu Nombre" value="{{ old('nombre') }}" />
                      @error('nombre')
                        <p class="bg-red-500 text-white my-2 rounded-lg tesxt-sm text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center mb-2" id="servicio">
                    <span class=" p-2 bg-gray-200 rounded-md text-gray-700">Servicio</span>
                    <input type="text"
                        class="p-2 rounded-md border-2 border-gray-300 focus:border-blue-500 focus:outline-none  w-full"
                        id="servicio" name="servicio" placeholder="El servicio que deseas" value="{{ old('servicio') }}" />
                    @error('servicio')
                        <p class="bg-red-500 text-white my-2 rounded-lg tesxt-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center mb-2" id="celular">
                    <span class=" p-2 bg-gray-200 rounded-md text-gray-700">Telefono</span>
                    <input type="text"
                        class="p-2 rounded-md border-2 border-gray-300 focus:border-blue-500 focus:outline-none w-full"
                        id="celular" name="celular" placeholder="Para comunicarnos contigo" value="{{ old('celular') }}" />
                    @error('celular')
                        <p class="bg-red-500 text-white my-2 rounded-lg tesxt-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <input type="submit" value="notificar"
                    class="bg-blue-500 hover:bg-blue-700 transition-colors cursor-pointer font-bold w-4/12 p-2 rounded-lg  "></input>
            </form>
        </div>
    </div>
@endsection
