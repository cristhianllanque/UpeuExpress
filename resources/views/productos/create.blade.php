<!-- resources/views/productos/create.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Publicar Producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">
                <h3 class="text-2xl font-bold text-gray-800 mb-6">Información del Producto</h3>
                <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Campo para la imagen -->
                        <div>
                            <label for="imagen" class="block text-sm font-medium text-gray-700">Imagen del producto:</label>
                            <input type="file" name="imagen" id="imagen" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <!-- Campo para el nombre -->
                        <div>
                            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre del producto:</label>
                            <input type="text" name="nombre" id="nombre" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <!-- Campo para la descripción -->
                        <div class="col-span-2">
                            <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción:</label>
                            <textarea name="descripcion" id="descripcion" required rows="4" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                        </div>

                        <!-- Campo para el precio -->
                        <div>
                            <label for="precio" class="block text-sm font-medium text-gray-700">Precio:</label>
                            <input type="number" name="precio" id="precio" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <!-- Campo para el stock -->
                        <div>
                            <label for="stock" class="block text-sm font-medium text-gray-700">Stock:</label>
                            <input type="number" name="stock" id="stock" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <!-- Campo para la categoría -->
                        <div>
                            <label for="categoria" class="block text-sm font-medium text-gray-700">Categoría:</label>
                            <select name="categoria" id="categoria" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="Electrónica">Electrónica</option>
                                <option value="Moda">Moda</option>
                                <option value="Hogar">Hogar</option>
                                <option value="Deportes">Deportes</option>
                                <option value="Belleza">Belleza</option>
                                <option value="Juguetes">Juguetes</option>
                                <option value="Ofertas Especiales">Ofertas Especiales</option>
                            </select>
                        </div>

                        <!-- Campo para la fecha de inicio -->
                        <div>
                            <label for="fecha_inicio" class="block text-sm font-medium text-gray-700">Fecha de inicio:</label>
                            <input type="date" name="fecha_inicio" id="fecha_inicio" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <!-- Campo para la fecha de fin -->
                        <div>
                            <label for="fecha_fin" class="block text-sm font-medium text-gray-700">Fecha de fin:</label>
                            <input type="date" name="fecha_fin" id="fecha_fin" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>

                    <!-- Botón de enviar -->
                    <div class="mt-8 text-center">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-6 rounded-md shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2">
                            Publicar Producto
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
