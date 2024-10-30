<!-- Modal detalles de platos-->

<div id="platoModal" class="mt-20 flex fixed inset-0 bg-gray-800 bg-opacity-70 justify-center items-center hidden">
    <div class="bg-white rounded-lg shadow-lg p-6 w-3/4 md:w-1/2 relative">
        <!-- Botón para cerrar el modal -->
        <button onclick="closeModal()" class="absolute top-4 right-4 text-white bg-red-500 rounded-full px-4 py-2">
            &times;
        </button>

        <!-- Contenido del modal con diseño de plato -->
        <div class="flex flex-col md:flex-row items-center gap-6">
            <!-- Imagen del plato -->
            <img id="modal-imagen" src="" alt="Imagen del plato" class="w-48 h-auto mb-4 md:mb-0 md:mr-6">

            <!-- Detalles del plato-->
            <div class="text-center md:text-left">
                <h2 id="modal-nombre_plato" class="text-2xl font-bold mb-2">Nombre del Plato</h2>
                <p id="modal-descripcion" class="text-gray-700 mb-2">Descripción del plato</p>
                <p id="modal-precio" class="text-gray-800 font-bold mb-4">Precio:
                    ${{ number_format($plato->precio, 2, ',', '.') }}
                </p>
                <p id="modal-antidadDisponible" class="text-gray-800 font-bold mb-4"><span
                    id="modal-cantidadDisponible"></span></p>
            </div>

        </div>
    </div>
</div>
