
<div class="container mx-auto py-10" style="min-height: calc(90vh - 64px);">
    @if (session('success'))
        <div class="bg-green-500 text-white p-2 rounded
         m-4 flex flex-col items-center ">
            {{ session('success') }}
        </div>
    @endif
    <div class="mt-12 text-center  m-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($platos as $plato)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">

                    <img class="w-full h-56 object-cover" src="{{ asset('storage/' . $plato->imagen) }}"
                        alt="{{ $plato->nombre_plato }}">
                    <div class="p-2">
                        <h3 class="text-xl font-bold">{{ $plato->nombre_plato }}</h3>
                        <p class="text-gray-600 font-semibold">${{ number_format($plato->precio, 2) }}</p>
                        <p class="text-sm hidden">{{ $plato->cantidadDisponible }}</p>
                    </div>
                    <!-- Botones -->
                    <div class="flex justify-center mb-2">

                        <form action="{{ route('carrito.add') }}" method="POST" class="">
                            @csrf
                            <input type="hidden" name="plato_id" value="{{ $plato->id }}">
                            <input type="hidden" name="cantidad" value="1"> <!-- Valor por defecto -->
                            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Agregar</button>
                        </form>

                        <!-- Boton modal detalles del plato -->
                        <button onclick="openModal({{ $plato->id }})"
                            class="bg-blue-500 text-white px-2 rounded hover:bg-blue-700 ml-4">
                            Ver detalles
                        </button>
                    </div>
                </div>
                @include('components.modal_detalles')
            @endforeach
        </div>
    </div>
</div>
