@extends('layouts.app')

@section('titulo')
    - Servicios
@endsection

@section('contenido')
    <div class="flex justify-center w-full mt-20">
        <div class="flex flex-col gap-12 md:flex-row justify-center w-full pb-20 pt-4">
            @foreach ($servicios as $servicio)
                <!-- cada servicio que se mostrara-->
                <div class="bg-white flex flex-col items-center justify-center w-auto md:w-1/3 gap-4 rounded-lg p-4 m-4">
                    <!-- Imagen del servicio -->
                    <img class="w-full h-auto object-contain" src="{{ asset('storage/' . $servicio->imagen) }}"
                        alt="{{ $servicio->nombre_servicio }}">

                    <!-- Información del servicio-->
                    <div class="flex flex-col justify-center ">
                        <h3 class=" text-center text-xl font-bold">{{ $servicio->nombre_servicio }}</h3>
                        <p class="text-left text-gray-600 font-semibold max-h-20 overflow-auto" title="{{ $servicio->descripcion }}">
                            {{ $servicio->descripcion }}
                        </p>

                        <div class="flex justify-between mt-4">
                            <!-- boton -->
                            <a href="{-{ route('datos') }}" class="bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-700">
                             notificar
                        </a>
                           <a href="tel:+573216475364">
                                <h6>llama al: </h6>
                                <p>+573216475364</p>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

