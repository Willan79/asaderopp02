@extends('layouts.app-admin')

@section('titulo')
    - Lista de Pedidos
@endsection

@section('contenido')
    <div class="max-w-7xl mx-auto p-4 mt-20">
        
        <table class="min-w-full bg-white border border-gray-300 shadow-md">
            <thead class="bg-amber-400">
                <tr>
                    <th class="py-2 px-4 border">ID Pedido</th>
                    <th class="py-2 px-4 border">Cliente</th>
                    <th class="py-2 px-4 border">Total</th>
                    <th class="py-2 px-4 border">Estado</th>
                    <th class="py-2 px-4 border">Método de Pago</th>
                    <th class="py-2 px-4 border">Fecha del Pedido</th>
                    <th class="py-2 px-4 border">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pedidos as $pedido)
                    <tr class="border-b">
                        <td class="py-2 px-4 border">{{ $pedido->id }}</td>
                        <td class="py-2 px-4 border">{{ $pedido->user->name }} {{ $pedido->user->apellido }}</td>
                        <td class="py-2 px-4 border">${{ number_format($pedido->total, 2) }}</td>
                        <td>
                            @if ($pedido->estado == 'pendiente')
                                <span class="text-red-500 font-bold">{{ ucfirst($pedido->estado) }}</span>
                            @else
                                <span>{{ ucfirst($pedido->estado) }}</span>
                            @endif
                        </td>
                        <td class="py-2 px-4 border">{{ ucfirst($pedido->metodo_pago) }}</td>
                        <td class="py-2 px-4 border">{{ $pedido->created_at->format('d/m/Y H:i') }}</td>
                        <!-- Fecha del pedido -->
                        <td class="py-2 px-4 border space-x-2">
                            <a href="{{ route('editar-estado', $pedido->id) }}"
                                class="bg-lime-500 hover:bg-lime-600 text-white py-1 px-2 rounded">Editar Estado</a>
                            <a href="{{ route('detalles-pedidos', $pedido->id) }}"
                                class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-2 rounded">Detalles</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
