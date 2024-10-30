@extends('layouts.app-admin')

@section('titulo')
    - Detalles Pedidos
@endsection

@section('contenido')
    <div class="max-w-2xl mx-auto p-6 bg-white rounded shadow-md mt-20 mb-4">
        <h2 class="text-xl font-bold mb-4">Editar Estado del Pedido</h2>

        <form action="{{ route('update-estado', $pedido->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="estado" class="block text-sm font-medium text-gray-700">Estado del Pedido:</label>
                <select name="estado" id="estado" class="block w-full border-black rounded-md shadow-sm mt-1 p-2 bg-slate-300" required>
                    <option value="pendiente" {{ $pedido->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="preparación" {{ $pedido->estado == 'preparación' ? 'selected' : '' }}>Preparación</option>
                    <option value="enviado" {{ $pedido->estado == 'enviado' ? 'selected' : '' }}>Enviado</option>
                    <option value="entregado" {{ $pedido->estado == 'entregado' ? 'selected' : '' }}>Entregado</option>
                    <option value="cancelado" {{ $pedido->estado == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                    <option value="finalizado" {{ $pedido->estado == 'finalizado' ? 'selected' : '' }}>Finalizado</option>
                </select>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Guardar
                    Cambios</button>
            </div>
        </form>
    </div>
@endsection
