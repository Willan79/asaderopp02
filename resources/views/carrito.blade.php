@extends('layouts.app')

@section('titulo')
    - Carrito
@endsection

@section('contenido')

    <div class="flex flex-col md:flex-row justify-center mt-10">

        <div class="bg-white md:w-6/12 p-4 rounded-lg md:flex flex-col  m-2">

            @if (session('success'))
                <div class="bg-green-500 text-white p-2 rounded mb-4 text-center">
                    {{ session('success') }}
                </div>
            @endif
            <h2 class="text-2xl font-bold mb-4">Tu carrito</h2>

            @if ($carrito && $carrito->items->count())
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-amber-300 rounded">
                            <th class="border-b-2 p-2">Plato</th>
                            <th class="border-b-2 p-2">Cantidad</th>
                            <th class="border-b-2 p-2">Precio Unidad</th>
                            <th class="border-b-2 p-2">X</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carrito->items as $item)
                            <tr class="border-b">
                                <!-- Nombre del plato -->
                                <td class="py-2">{{ $item->plato->nombre_plato }}</td>

                                <!-- Formulario para actualizar la cantidad -->
                                <td class="py-2">
                                    <form action="{{ route('carrito.updateCantidad', $item->id) }}" method="POST"
                                        class="flex items-center">
                                        @csrf
                                        <div>
                                            <input type="number" name="cantidad" value="{{ $item->cantidad }}"
                                                min="1" class="w-12 p-1 border rounded mr-2 text-center">
                                            <button type="submit"
                                                class="bg-blue-500 text-white p-1 rounded">Actualizar</button>
                                        </div>
                                    </form>
                                </td>

                                <!-- Precio del plato -->
                                <td class="py-2">${{ number_format($item->precio, 2, ',', '.') }}</td>

                                <!-- Botón para eliminar un plato del carrito -->
                                <td class="py-2">
                                    <form action="{{ route('carrito.remove', $item->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="bg-red-500 text-white px-4 py-1 rounded">X</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Botón para cerrar el carrito -->
                <form action="{{ route('carrito.close') }}" method="POST" class="mt-4">
                    @csrf
                    <button type="submit" class="bg-gray-500 text-white px-4 py-2 rounded">Vaciar Carrito</button>
                </form>

                <!-- Botón para proceder al pago  pedido.confirmar-->
                <div class="mt-4">
                    <a href="{{ route('confirmar-pago') }}" class="bg-green-500 text-white px-4 py-2 rounded">Proceder al
                        pago</a>
                </div>
            @else
                <p class="bg-red-500 p-2 rounded text-white">Tu carrito está vacío.</p>
            @endif
        </div>

        <div class="bg-white md:w-4/12 p-4 rounded-lg md:flex flex-col  m-2">
            @if ($carrito && $carrito->items->count())
                <table class="w-full text-left border-collapse">
                    <thead class="bg-amber-300 rounded">
                        <tr>
                            <th class="border-b-2 p-2">Plato</th>
                            <th class="border-b-2 p-2">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total = 0; // Inicializamos el total del carrito
                        @endphp

                        @foreach ($carrito->items as $item)
                            @php
                                $subtotal = $item->cantidad * $item->precio; // Calculamos el subtotal de cada plato
                                $total += $subtotal; // Sumamos el subtotal al total general del carrito
                            @endphp
                            <tr class="border-b">
                                <td class="py-2">{{ $item->plato->nombre_plato }}</td>
                                <!-- Mostramos el subtotal -->
                                <td class="py-2">${{ number_format($subtotal, 2, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                <!-- Mostramos el total general -->
                <p class="text-2xl font-bold mb-4 pt-10">Total: ${{ number_format($total, 2, ',', '.') }}</p>
            @endif
        </div>
    </div>
@endsection
