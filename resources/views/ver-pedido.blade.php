@extends('layouts.app')

@section('titulo')
    - Mi pedido
@endsection

@section('contenido')

    <div class="bg-white p-8 rounded-lg shadow-lg max-w-lg mx-auto flex flex-col justify-center gap-6 mt-10">
        <h2 class="text-2xl font-bold text-green-600 text-center">Estado de tus Pedidos</h2>

        @if($pedidos->isEmpty())
            <p class="text-gray-600 text-center">No tienes pedidos en este momento.</p>
        @else
            <!-- Contenedor responsivo para la tabla -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-300">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border">ID del Pedido</th>
                            <th class="py-2 px-4 border">Total</th>
                            <th class="py-2 px-4 border">Estado</th>
                            <th class="py-2 px-4 border">Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pedidos as $pedido)
                            <tr>
                                <td class="border px-4 py-2">{{ $pedido->id }}</td>
                                <td class="border px-4 py-2">${{ number_format($pedido->total, 2) }}</td>
                                <td class="border px-4 py-2">{{ ucfirst($pedido->estado) }}</td>
                                <td class="border px-4 py-2">{{ $pedido->created_at->format('d/m/Y H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
