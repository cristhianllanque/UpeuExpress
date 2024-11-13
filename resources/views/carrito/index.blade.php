<!-- resources/views/carrito/index.blade.php -->
<x-app-layout>
    <div class="container mx-auto py-10 px-4 lg:px-0">
        <h2 class="text-4xl font-extrabold text-center mb-8 text-gray-800">Carrito de Compras</h2>

        @if(session('carrito') && count(session('carrito')) > 0)
            <div class="space-y-4">
                @foreach (session('carrito') as $id => $item)
                    <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col md:flex-row items-center md:items-stretch justify-between space-y-4 md:space-y-0">
                        <!-- Imagen del Producto -->
                        <div class="md:w-1/4 flex-shrink-0">
                            <img src="{{ asset('storage/imagenes/' . $item['producto']->imagen) }}" alt="{{ $item['producto']->nombre }}" class="w-full h-32 md:h-40 object-cover rounded-lg shadow-md">
                        </div>

                        <!-- Información del Producto -->
                        <div class="md:w-1/2 flex flex-col space-y-2">
                            <h3 class="text-2xl font-semibold text-gray-800">{{ $item['producto']->nombre }}</h3>
                            <p class="text-lg text-gray-600">Precio unitario: <span class="font-bold text-red-500">PEN {{ number_format($item['producto']->precio, 2) }}</span></p>
                            <form action="{{ route('carrito.actualizar', $id) }}" method="POST" class="flex items-center space-x-3">
                                @csrf
                                <label for="cantidad" class="text-lg text-gray-700">Cantidad:</label>
                                <input type="number" name="cantidad" value="{{ $item['cantidad'] }}" min="1" class="w-16 text-center border rounded-lg shadow-sm p-2 text-lg">
                                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg font-semibold hover:bg-blue-600 transition duration-200">Actualizar</button>
                            </form>
                        </div>

                        <!-- Subtotal y Botón Eliminar -->
                        <div class="md:w-1/4 text-center md:text-right flex flex-col justify-between items-center md:items-end space-y-4">
                            <p class="text-xl font-bold text-red-500">Subtotal: PEN {{ number_format($item['producto']->precio * $item['cantidad'], 2) }}</p>
                            <form action="{{ route('carrito.eliminar', $id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded-lg font-semibold hover:bg-red-600 transition duration-200">Eliminar</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Total y Botón para Proceder a Comprar -->
            <div class="bg-gray-100 p-8 rounded-lg shadow-lg mt-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-2xl font-semibold">Total a pagar:</p>
                    <p class="text-3xl font-bold text-red-600 mt-4 md:mt-0">
                        PEN {{ number_format(collect(session('carrito'))->sum(fn($item) => $item['producto']->precio * $item['cantidad']), 2) }}
                    </p>
                </div>
                <div class="mt-8 text-center">
                    <a href="{{ route('carrito.checkout') }}" class="bg-green-500 text-white py-3 px-10 rounded-lg font-bold text-xl hover:bg-green-600 transition duration-200">Proceder a Comprar</a>
                </div>
            </div>
        @else
            <p class="text-gray-500 text-center mt-8">El carrito está vacío.</p>
        @endif
    </div>
</x-app-layout>
