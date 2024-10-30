@extends('layouts.app')

@section('titulo')
    Registro de Usuario
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:items-center mt-10">

        <div class="ms:w-8/12 md:w-6/12  lg:w-4/12 bg-gray-200 p-4 shadow-xl rounded-lg m-4">
            <span class="text-2xl flex justify-center mb-6">Registro de usuario</span>

            <form action="{{ route('register') }}" method="POST">
                @csrf <!--Token de seguridad  -->

                <div class="flex flex-col items-center mb-2" id="name">
                    <div class="flex w-full">
                        <span class=" p-2 bg-gray-200 rounded-md text-gray-700">Nombre</span>
                        <input type="text"
                        class="p-2 rounded-md w-full border-2 border-gray-300 focus:border-blue-500 focus:outline-none"
                        id="name" name="name" placeholder="Nombre" value="{{ old('name') }}" />
                    </div>
                    <div>
                        @error('name')
                            <p class="bg-red-500 text-white my-2 rounded-lg tesxt-sm p-2 text-center">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-col items-center mb-2" id="apellido">
                    <div class="flex w-full">
                        <span class=" p-2 bg-gray-200 rounded-md text-gray-700">Apellido</span>
                    <input type="text"
                        class="p-2 rounded-md border-2 border-gray-300 focus:border-blue-500 focus:outline-none  w-full"
                        id="apellido" name="apellido" placeholder="apellido" value="{{ old('apellido') }}" />

                    </div>
                    <div>
                        @error('apellido')
                            <p class="bg-red-500 text-white my-2 rounded-lg tesxt-sm p-2 text-center">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-col items-center mb-2" id="email">
                    <div class="flex w-full">
                        <span class=" p-2 bg-gray-200 rounded-md text-gray-700">Email</span>
                    <input type="email"
                        class="p-2 rounded-md border-2 border-gray-300 focus:border-blue-500 focus:outline-none w-full"
                        id="email" name="email" placeholder="Email" value="{{ old('email') }}" />

                    </div>
                    <div>
                        @error('email')
                            <p class="bg-red-500 text-white my-2 rounded-lg tesxt-sm p-2 text-center">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-col items-center mb-2" id="direción">
                    <div class="flex w-full">
                        <span class=" p-2 bg-gray-200 rounded-md text-gray-700">Dirección</span>
                    <input type="text"
                        class="p-2 rounded-md border-2 border-gray-300 focus:border-blue-500 focus:outline-none w-full"
                        id="direccion" name="direccion" placeholder="Dirección Completa" value="{{ old('direccion') }}" />

                    </div>
                    <div>
                        @error('direccion')
                            <p class="bg-red-500 text-white my-2 rounded-lg tesxt-sm p-2 text-center">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-col items-center mb-2" id="telefono">
                    <div class="flex w-full">
                        <span class=" p-2 bg-gray-200 rounded-md text-gray-700">Teléfono</span>
                        <input type="text"
                            class="p-2 rounded-md border-2 border-gray-300 focus:border-blue-500 focus:outline-none w-full"
                            id="telefono" name="telefono" placeholder="Teléfono" value="{{ old('telefono') }}" />

                    </div>
                    <div>
                        @error('telefono')
                            <p class="bg-red-500 text-white my-2 rounded-lg tesxt-sm p-2 text-center">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-col items-center mb-2 " id="password">
                    <div class="flex w-full">
                        <span class=" p-2 bg-gray-200 rounded-l-md text-gray-700">Contraseña</span>
                        <input type="password"
                            class="p-2 rounded-md border-2 border-gray-300 focus:border-blue-500 focus:outline-none w-full"
                            id="password" name="password" placeholder="Contraseña" />
                        <input type="password"
                            class="p-2 rounded-md border-2 border-gray-300 focus:border-blue-500 focus:outline-none w-full"
                            id="password_confirmation" name="password_confirmation" placeholder="Confirmar Contraseña" />
                    </div>
                    <div>
                        @error('password')
                            <p class="bg-red-500 text-white my-2 rounded-lg tesxt-sm p-2 text-center">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <input type="submit" value="Crear Cuenta"
                    class="text-white bg-blue-500 hover:bg-blue-700 transition-colors cursor-pointer font-bold w-4/12 p-2 rounded-lg"></input>
            </form>
        </div>
    </div>
@endsection
