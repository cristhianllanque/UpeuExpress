<!-- resources/views/productos/edit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <!-- Nombre del Producto -->
                    <div>
                        <label for="nombre" class="block text-gray-700 font-semibold mb-2">Nombre del Producto:</label>
                        <input type="text" name="nombre" id="nombre" value="{{ $producto->nombre }}" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                    </div>

                    <!-- Descripción -->
                    <div>
                        <label for="descripcion" class="block text-gray-700 font-semibold mb-2">Descripción:</label>
                        <textarea name="descripcion" id="descripcion" class="w-full border-gray-300 rounded-lg shadow-sm" required>{{ $producto->descripcion }}</textarea>
                    </div>

                    <!-- Precio -->
                    <div>
                        <label for="precio" class="block text-gray-700 font-semibold mb-2">Precio:</label>
                        <input type="number" name="precio" id="precio" value="{{ $producto->precio }}" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                    </div>

                    <!-- Categoría -->
                    <div>
                        <label for="categoria" class="block text-gray-700 font-semibold mb-2">Categoría:</label>
                        <select name="categoria" id="categoria" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                            <option value="Electrónica" {{ $producto->categoria == 'Electrónica' ? 'selected' : '' }}>Electrónica</option>
                            <option value="Moda" {{ $producto->categoria == 'Moda' ? 'selected' : '' }}>Moda</option>
                            <option value="Hogar" {{ $producto->categoria == 'Hogar' ? 'selected' : '' }}>Hogar</option>
                            <option value="Deportes" {{ $producto->categoria == 'Deportes' ? 'selected' : '' }}>Deportes</option>
                            <option value="Belleza" {{ $producto->categoria == 'Belleza' ? 'selected' : '' }}>Belleza</option>
                            <option value="Juguetes" {{ $producto->categoria == 'Juguetes' ? 'selected' : '' }}>Juguetes</option>
                            <option value="Ofertas Especiales" {{ $producto->categoria == 'Ofertas Especiales' ? 'selected' : '' }}>Ofertas Especiales</option>
                        </select>
                    </div>

                    <!-- Stock -->
                    <div>
                        <label for="stock" class="block text-gray-700 font-semibold mb-2">Stock:</label>
                        <input type="number" name="stock" id="stock" value="{{ $producto->stock }}" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                    </div>

                    <!-- Fechas de inicio y fin -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="fecha_inicio" class="block text-gray-700 font-semibold mb-2">Fecha de Inicio:</label>
                            <input type="date" name="fecha_inicio" id="fecha_inicio" value="{{ $producto->fecha_inicio }}" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                        </div>
                        <div>
                            <label for="fecha_fin" class="block text-gray-700 font-semibold mb-2">Fecha de Fin:</label>
                            <input type="date" name="fecha_fin" id="fecha_fin" value="{{ $producto->fecha_fin }}" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                        </div>
                    </div>

                    <!-- Imagen del Producto -->
                    <div>
                        <label for="imagen" class="block text-gray-700 font-semibold mb-2">Imagen del Producto:</label>
                        <input type="file" name="imagen" id="imagen" class="w-full border-gray-300 rounded-lg shadow-sm">
                        <p class="text-sm text-gray-500 mt-1">Deja este campo vacío si no deseas cambiar la imagen.</p>
                    </div>

                    <!-- Botón de Actualizar -->
                    <div class="flex justify-end">
                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md">
                            Actualizar Producto
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
