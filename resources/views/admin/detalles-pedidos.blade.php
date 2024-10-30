@extends('layouts.app-admin')

@section('titulo')
    - Detalles Pedidos
@endsection

@section('contenido')
    <div class="max-w-4xl mx-auto p-6 bg-white rounded shadow-md mt-20 mb-4">
        <h2 class="text-2xl font-bold mb-4">Detalles del Pedido</h2>

        <div class="bg-gray-100 p-4 rounded mb-4">
            <h3 class="text-lg font-semibold">Información del Cliente</h3>
            <p><strong>Cliente:</strong> {{ $pedido->user->name }} {{ $pedido->user->apellido }}</p>
            <p><strong>Dirección de Envío:</strong> {{ $pedido->direccion_envio }}</p>
            <p><strong>Telefono:</strong> {{ $pedido->user->telefono }}</p>
            <p><strong>Método de Pago:</strong> {{ ucfirst($pedido->metodo_pago) }}</p>
            <p><strong>Total:</strong> ${{ number_format($pedido->total, 2) }}</p>
            <p><strong>Estado del Pedido:</strong> {{ ucfirst($pedido->estado) }}</p>
        </div>

        <table class="min-w-full bg-white border border-gray-300">
            <thead class="bg-gray-200">
                <tr>
                    <th class="py-2 px-4 border">Plato</th>
                    <th class="py-2 px-4 border">Cantidad</th>
                    <th class="py-2 px-4 border">Precio Unitario</th>
                    <th class="py-2 px-4 border">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pedido->detalles as $detalle)
                    <tr class="border-b">
                        <td class="py-2 px-4 border">{{ $detalle->plato->nombre_plato }}</td>
                        <td class="py-2 px-4 border">{{ $detalle->cantidad }}</td>
                        <td class="py-2 px-4 border">${{ number_format($detalle->precio, 2) }}</td>
                        <td class="py-2 px-4 border">${{ number_format($detalle->cantidad * $detalle->precio, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-6 flex justify-end">
            <a href="{{ route('tabla-pedidos') }}"
                class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded">Volver a la Lista de Pedidos</a>
        </div>
    </div>
@endsection
